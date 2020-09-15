<?php
if(function_exists('wp_recall')){
  /**
   * Show random phrase in the recallbar (like a Hello, Dolly plugin)
   */

    function pureweb_get_random_phrase(){

      if(pll_current_language('slug') == 'ru'){
        $phrase = "Падает тот, кто бежит, кто ползет - не падает!
        Не ошибается тот, кто ничего не делает
        Целься в луну, даже если промахнешься - останешься среди звезд!
        В поисках разума не потеряй сердце!
        Кто ищет, тот найдет
        Находишь всегда то, что не искал
        Не все еще потеряно
        Не доходите до крайности в поисках золотой середины
        Потеряешь - не жалей, найдешь - не радуйся";

      } else if (pll_current_language('slug') == 'en'){
        $phrase = "The one who runs, who crawls - does not fall!
        The one who does nothing is not mistaken
        Aim for the moon, even if you miss, you stay among the stars!
        In search of reason, do not lose your heart!
        He who seeks will find
        You find everything that you were not looking for
        All is not lost
        Don't go to the extreme looking for a middle ground
        If you lose - do not regret, if you find - do not rejoice";
      }

      // Split text into lines
      $phrase = explode("\n", $phrase);

      // Choose random line of text
      $phrase = wptexturize( $phrase[ mt_rand( 0, count( $phrase ) - 1 ) ] );
      return $phrase;
      // echo '<span class="pureweb_profile-random-phrase">'.$phrase.'</span>';

    }
    add_action('rcl_bar_left_icons', 'pureweb_get_random_phrase');


  /**
   * New notification icon with counter and link
   */
   if(is_user_logged_in()){
    function pureweb_rcl_bar_add_icon(){
      global $user_ID;
      rcl_bar_add_icon('pureweb_rcl-custom-notification',
      array(
        'icon'    => 'fa-bell',
        'url'     => rcl_format_url(get_author_posts_url($user_ID,'chat')) . 'tab=chat',
        'label'   => pll__('Новые сообщения'),
        'counter' => rcl_chat_noread_messages_amount( get_current_user_id() )
      ));

      rcl_bar_add_icon('pureweb_rcl-userslist',
      array(
        'icon'    => 'fa-users',
        'url'     => rcl_format_url(get_author_posts_url($user_ID,'userlist')) . 'tab=userlist',
        'label'   => pll__('Все пользователи')
      ));
    }
    add_action('rcl_bar_setup', 'pureweb_rcl_bar_add_icon', 10);
  }


  /**
   * Add new item to user menu
   */
   function pureweb_rcl_bar_add_menu_item(){
     global $userID;

     if(!is_user_logged_in()) return false;

     rcl_bar_add_menu_item('my-profile-link', array(
       'url'  => rcl_format_url(get_author_posts_url($userID, 'view')) . 'tab=view',
       'icon' => 'fa-id-card',
       'label'=> pll__('Карточка профиля')
     ));
   }
   add_action('rcl_bar_setup', 'pureweb_rcl_bar_add_menu_item', 10);

   /**
    * Change item in user menu
    */
    function pureweb_change_rcl_bar_menu($icons){
        $icons['admin-link']['icon']='fa-tachometer';
        return $icons;
    }
    add_action('rcl_bar_menu', 'pureweb_change_rcl_bar_menu', 10);

    /**
     * Custom publication form fields
     */
     add_filter('rcl_default_public_form_fields','pureweb_add_default_field_public_form',10,2);
     function pureweb_add_default_field_public_form($fields,$post_type){
      $fields[] = array(
          'type'   => 'radio',
          'slug'   => 'pureweb-post-size',
          'title'  => 'Размер поста',
          'notice' => 'Укажите одно из значений нашего поля',
          'values' => array(
              'big',
              'middle',
              'small'
          )

      );
      $fields[] = array(
          'type'   => 'text',
          'slug'   => 'pureweb-case-deadline',
          'title'  => 'Срок выполнения работы',
          'notice' => 'Напишите значение в свободной форме',
      );

      $fields[] = array(
          'type'   => 'text',
          'slug'   => 'pureweb-case-costs',
          'title'  => 'Стоимость работы',
          'notice' => 'Напишите значение в свободной форме',
      );

      $fields[] = array(
          'type'   => 'number',
          'slug'   => 'pureweb-case-rating',
          'title'  => 'Сложность работы',
          'notice' => 'Количество звезд. От 1 до 5',
      );

      $fields[] = array(
          'type'   => 'url',
          'slug'   => 'pureweb-case-link',
          'title'  => 'Ссылка на работу в интернете',
          'notice' => '',
      );
      return $fields;
    }

    // Вывод подписчиков определенного юзера
    function pureweb_rcl_followers_tab( $user_id ) {

    	$content = '<h4 class="subscribers-list__title">' . __( 'List of subscribers', 'wp-recall' ) . '</h4>';

    	$cnt = rcl_feed_count_subscribers( $user_id );

    	if ( ! $cnt )
    		return $content . rcl_get_notice( ['text' => __( 'You do not have any subscribers yet', 'wp-recall' ) ] );

    	// add_filter( 'rcl_user_description', 'rcl_add_userlist_follow_button', 90 );
    	add_filter( 'rcl_users_query', 'rcl_feed_subsribers_query_userlist', 10 );
    	$content .= rcl_get_userlist( array(
    		'template'		 => 'rows',
    		'per_page'		 => 12,
    		'orderby'		 => 'user_registered',
    		'filters'		 => 1,
    		'search_form'	 => 0,
    		'data'			 => '',
    		'add_uri'		 => array( 'tab' => 'followers' )
    		) );

    	return $content;
    }
}

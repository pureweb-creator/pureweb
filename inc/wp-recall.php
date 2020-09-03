<?php
if(function_exists('wp_recall')){
  /**
   * Show random phrase in the recallbar (like a Hello, Dolly plugin)
   */
  if(is_user_logged_in()){
    function pureweb_get_random_phrase(){
      $phrase = "Падает тот, кто бежит, кто ползет - не падает!
      Не ошибается тот, кто ничего не делает
      Целься в луну, даже если промахнешься - останешься среди звезд!
      В поисках разума не потеряй сердце!
      Кто ищет, тот найдет
      Находишь всега то, что не искал
      Не все еще потеряно
      Не доходите до крайности в поисках золотой середины
      Потеряешь - не жалей, найдешь - не радуйся";

      // Split text into lines
      $phrase = explode("\n", $phrase);

      // Choose random line of text
      $phrase = wptexturize( $phrase[ mt_rand( 0, count( $phrase ) - 1 ) ] );

      echo '<span class="pureweb_profile-random-phrase">'.$phrase.'</span>';

    }
    add_action('rcl_bar_left_icons', 'pureweb_get_random_phrase');
  }

  /**
   * New notification icon with counter and link
   */
   if(is_user_logged_in()){
    function pureweb_rcl_bar_add_icon(){
      global $user_ID;
      rcl_bar_add_icon('pureweb_rcl-custom-notification',
      array(
        'icon'    => 'fa-envelope',
        'url'     => rcl_format_url(get_author_posts_url($user_ID,'chat')) . 'tab=chat',
        'label'   => __('Новые сообщения'),
        'counter' => rcl_chat_noread_messages_amount( get_current_user_id() )
      ));

      rcl_bar_add_icon('pureweb_rcl-userslist',
      array(
        'icon'    => 'fa-users',
        'url'     => rcl_format_url(get_author_posts_url($user_ID,'userlist')) . 'tab=userlist',
        'label'   => __('Все люди')
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
       'icon' => 'fa-id-card-o',
       'label'=> __('Карточка профиля')
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
}

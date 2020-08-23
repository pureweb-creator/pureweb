<?php
/**
 * pureweb functions and definitions
 * Window to the core of WordPress
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pureweb
 */

if ( ! function_exists( 'pureweb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pureweb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pureweb, use a find and replace
		 * to change 'pureweb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pureweb', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'               => esc_html__( 'Primary', 'pureweb' ),
			'menu-2'               => esc_html__('Home menu 2', 'pureweb'),
            'work_process'         => esc_html__('Work Process List', 'pureweb'),
            'work_categories_list' => esc_html__('Work Categories List', 'pureweb'),
            'social_menu'          => esc_html__('Social Menu', 'pureweb')
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pureweb_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pureweb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pureweb_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pureweb_content_width', 640 );
}
add_action( 'after_setup_theme', 'pureweb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pureweb_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pureweb' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pureweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pureweb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pureweb_scripts() {
	wp_enqueue_style( 'pureweb-style', get_stylesheet_uri() );
	if(is_front_page() || is_page_template('template-home.php')){
  	wp_enqueue_style( 'pureweb-animate', get_template_directory_uri() . '/layouts/animate.min.css' );
	}
  wp_enqueue_style( 'pureweb-main', get_template_directory_uri() . '/layouts/main.min.css' );

  wp_enqueue_script( 'jquery');

	if(is_page_template('template-home.php')){
		wp_enqueue_script( 'pureweb-wow', get_template_directory_uri() . '/js/libs/wow.min.js', array(), '1.0', true );
		wp_enqueue_script( 'pureweb-jquery-masked-input', get_template_directory_uri() . '/js/libs/jquery.maskedinput.min.js', array(), '1.0', true);
		wp_enqueue_script( 'pureweb-parallax', 'https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js', array(), '1.0', true );
	}

	wp_enqueue_script( 'pureweb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'pureweb-main', get_template_directory_uri() . '/js/main.min.js', array(), '1.0', true );

	wp_enqueue_script( 'pureweb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pureweb_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sample Config Redux Framework fire
 */
require get_template_directory() . '/inc/sample-config.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * WP-RECALL functions
 */
 require get_template_directory() . '/inc/wp-recall.php';

/**
 * Hide admin bar in the site view
 */
show_admin_bar(false);

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function pureweb_services_post_type_init() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-welcome-learn-more',
    );

    register_post_type( 'services', $args );
}

add_action( 'init', 'pureweb_services_post_type_init' );

function pureweb_portfolio_post_type_init() {
    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array('category', 'post_tag'),
        'supports'           => array( 'title', 'thumbnail', 'comments'),
        'menu_icon'          => 'dashicons-portfolio',
    );

    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'pureweb_portfolio_post_type_init' );

function pureweb_faq_post_type_init() {
    $labels = array(
        'name'                  => _x( 'FAQ', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'FAQ', 'Post type singular name', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'excerpt' ),
        'menu_icon'          => 'dashicons-microphone',
    );

    register_post_type( 'faq', $args );
}

add_action( 'init', 'pureweb_faq_post_type_init' );

/**
 * Register a taxonomy for post type portfolio.
 *
 * @see register_post_type() for registering post types.
 */
function wpcourse_register_custom_taxonomy() {
    $portfolio_args = array(
        'label'        => __( 'Work category', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true
    );

    $portfolio_fav_args = array(
        'label'        => __( 'Favourite', 'textdomain' ),
        'public'       => true,
        'rewrite'      => false,
        'hierarchical' => true
    );

    register_taxonomy( 'portfolio_cat', 'portfolio', $portfolio_args );
    register_taxonomy( 'favourite', 'portfolio', $portfolio_fav_args );
}
add_action( 'init', 'wpcourse_register_custom_taxonomy', 0 );

/**
 * Remove type="text/javascipt" and type="text/css" from <script></script> and <link> tags
 */
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);

function codeless_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

/**
 * Cout of views
 */
add_action('wp_head', 'views_count');

function views_count(){
	/* Settings */
	$meta_key     = 'views'; // metabox key, where will be written count of views
	$who_count    = 0;       // Who visits cout? 0 - all, 1 - only the guests, 2 - only registered users
	$exclude_bots = 1;       // Exclude bots, robots, etc. 1(true) - yeas, exclude; 0(false) - include

	global $user_ID, $post;
	if (is_singular()){
		$id = (int)$post->ID;
		static $post_views = false;

		if ($post_views) return true;
		$post_views = (int)get_post_meta($id, $meta_key, true);
		$should_count = false;

		switch ( (int)$who_count ) {
			case 0:
				$should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}

		if ( (int)$exclude_bots == 1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot    = "Mozilla|Opera";
			$bot       = "Bot/|robot|Slurp|yahoo";

			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent)){
				$should_count = false;
			}
		}

		if ($should_count){
			if ( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
		}

		return true;
	}
}

/**
 * Pagination
 */

function ale_page_links($custom_query) {
	global $wp_query, $wp_rewrite;
	$custom_query->query_vars['paged'] > 1 ? $current = $custom_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base'      => @add_query_arg('page','%#%'),
		'format'    => '',
		'total'     => $custom_query->max_num_pages,
		'current'   => $current,
		'show_all'  => true,
		'type'      => 'plain',
		'next_text' => '&#10148;',
		'prev_text' => '&#10148;'
		);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($custom_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

	echo paginate_links($pagination);
}

/**
 * Commetns form
 */
add_filter('comment_form_default_fields', 'pw_custom_comment_form_default_fields');
function pw_custom_comment_form_default_fields($fields){
	unset($fields['url']);
	return $fields;
}

add_filter('comment_form_fields', 'pw_move_fields');
function pw_move_fields($fields){
	$comment_field = $fields['comment'];
	$cookie_field  = $fields['cookies'];

	unset( $fields['comment'] );
	unset( $fields['cookies'] );

	$fields['comment'] = $comment_field;
	$fields['cookies'] = $cookie_field;
	return $fields;
}

/**
 * Comments list
 */
function pw_comment( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>

	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		printf(
			__( '<cite class="fn">%s</cite>' ),
			get_comment_author_link()
		);
		?>
	</div>

	<div class="comments-text">
	<?php if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation">
			<?php _e( 'Your comment is awaiting moderation.' ); ?>
		</em><br/>
	<?php } ?>

	<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			printf(
				__( '%1$s at %2$s' ),
				get_comment_date(),
				get_comment_time()
			); ?>
		</a>

		<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
		<?php
		comment_reply_link(
			array_merge(
				$args,
				array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				)
			)
		); ?>
	</div>
	</div>

	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
}

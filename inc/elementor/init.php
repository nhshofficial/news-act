<?php

class NewsAct_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once(get_template_directory() . '/inc/elementor/addons/test.php');
		// require_once(get_template_directory() . '/inc/elementor/addons/section_2.php');

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\News_Act_Post_Layouts() );

		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Section_2() );
	}

    public function init() {
        
        // Register Widget Styles
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'newsact_elm_styles' ] );
    
        // Register Widget Scripts
            add_action( 'elementor/frontend/after_register_scripts', [ $this, 'newsact_elm_scripts' ] );
    
    }
    public function newsact_elm_styles() {

		// wp_register_style( 'widget-1', get_template_directory_uri() .'css/widget-1.css', __FILE__ );

	}
    public function newsact_elm_scripts() {

		// wp_register_script( 'widget-2', get_template_directory_uri() .'js/widget-2.js', __FILE__, [ 'jquery', 'some-library' ] );

	}
    

}

add_action( 'elementor/init', 'newsact_elementor_init' );
function newsact_elementor_init() {
	NewsAct_Elementor_Widgets::get_instance();
    
    // adding section
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'newsact',
		[
			'title' => __( 'News Act', 'newsact' ),
			'icon' => 'fa fa-plug', //default icon
		],
		1 // position
	);
}


//POST CATEGORY LIST GENERATING
function newsact_post_category_list(){

	$post_categories = get_terms( 'category' );
	
	$post_category_options = array( 
		'' =>	esc_html__( 'All Category', 'newsact' )
	);
	if ($post_categories){
		foreach ($post_categories as $post_category) {
			$post_category_options [ $post_category->term_id ] = $post_category->name;
		}
	}

	return $post_category_options;
}

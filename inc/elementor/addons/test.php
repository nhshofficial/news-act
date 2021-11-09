<?php

namespace Elementor;

class News_Act_Post_Layouts extends Widget_Base {
	// public function __construct($data = [], $args = null) {
	// 	parent::__construct($data, $args);
 
	// 	wp_register_script( 'ctb-script', get_template_directory_uri() .'/assets/js/content-toggle-button.js', [ 'elementor-frontend' ], '1.0.0', true );
		
	// 	wp_register_style( 'ctb-stylesheet', get_template_directory_uri() .'/assets/css/content-toggle-button.css' );
	//  }
 
	//  public function get_script_depends() {
	//    return [ 'ctb-script' ];
	//  }
 
	//  public function get_style_depends() {
	//    return [ 'ctb-stylesheet' ];
	//  }
	
	public function get_name() {
		return 'title-subtitle';
	}
	
	public function get_title() {
		return 'title & sub-title';
	}
	
	public function get_icon() {
		return 'fa fa-font';
	}
	
	public function get_categories() {
		return [ 'newsact' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'newsact' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_style',
			[
				'label' => __( 'Select Post Layout', 'newsact' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'section_one',
				'options' => [
					'section_one'   => __( 'Layout One', 'newsact' ),
					'section_two'   => __( 'Layout Two', 'newsact' ),
					'section_three' => __( 'Layout Three', 'newsact' ),
					'section_four'  => __( 'Layout Four', 'newsact' ),
					'section_five'  => __( 'Layout Five', 'newsact' ),
					'section_six'   => __( 'Layout Six', 'newsact' ),
					'section_seven' => __( 'Layout Seven', 'newsact' ),
					'section_eight' => __( 'Layout Eight', 'newsact' ),
				],
			]
		);

        // section one post count
		$this->add_control(
			'section_one_post_count',
			[
				'label' => __( 'Post Count', 'newsact' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 6,
				'step' => 1,
				'default' => 6,
				'condition' => [
					'post_style' => 'section_one'
				]
			]
		);

        // heading 1
		$this->add_control(
			'section_two_heading_one',
			[
				'label' => __( 'Left and Right Section Options', 'newsact' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

        // category for left right
		$this->add_control(
			'section_two_left_right_category',
			[
				'label' => __( 'Categories (left, right)', 'newsact' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => newsact_post_category_list(),
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

        // section two post count left right
		$this->add_control(
			'section_two_post_count_left_right',
			[
				'label' => __( 'Post Count (left, right)', 'newsact' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 8,
				'step' => 2,
				'default' => 4,
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

        // heading 2
		$this->add_control(
			'section_two_heading_two',
			[
				'label' => __( 'Center Section Options', 'newsact' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

        // category for center
		$this->add_control(
			'section_two_center_category',
			[
				'label' => __( 'Categories (center)', 'newsact' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => newsact_post_category_list(),
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

        // section two post count center
		$this->add_control(
			'section_two_post_count_center',
			[
				'label' => __( 'Post Count (center)', 'newsact' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 3,
				'max' => 9,
				'step' => 2,
				'default' => 5,
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

        // section two skip post
		$this->add_control(
			'section_two_post_skip_center',
			[
				'label' => __( 'Skip post (center)', 'newsact' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 30,
				'step' => 1,
				'default' => 0,
				'condition' => [
					'post_style' => 'section_two'
				]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$postStyle = $settings['post_style'];
		$postCountSectionOne = $settings['section_one_post_count'];
		$postCountSectionTwoLeftRight = $settings['section_two_post_count_left_right'];
		$postCountSectionTwoCenter = $settings['section_two_post_count_center'];
		$sectionTwoSkipPosts = $settings['section_two_post_skip_center'];

        // left right category
        if(empty($settings['section_two_left_right_category'])) {
            $lrCats = '';
        } else {
            $lrCats = implode(',', $settings['section_two_left_right_category']);
        }

        // center category
        if(empty($settings['section_two_center_category'])) {
            $centerCats = '';
        } else {
            $centerCats = implode(',', $settings['section_two_center_category']);
        }
		
        switch($postStyle) {
            case 'section_one' :
                sectionOne($postCountSectionOne);
                break;
            case 'section_two' :
                SectionTwo($postCountSectionTwoLeftRight, $postCountSectionTwoCenter, $lrCats, $centerCats, $sectionTwoSkipPosts);
                break;
            default:
            SectionTwo($postCountSectionTwoLeftRight, $postCountSectionTwoCenter, $lrCats, $centerCats, $sectionTwoSkipPosts);
        }

	}

}
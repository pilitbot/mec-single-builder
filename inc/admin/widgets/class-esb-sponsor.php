<?php
namespace Elementor;
namespace MEC_Single_Builder\Inc\Admin\Widgets;
use Elementor\Plugin;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class ESB_Sponsor extends \Elementor\Widget_Base {

	/**
	 * Retrieve Alert widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'event_sponsor';

	}

	/**
	 * Retrieve Alert widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return __( 'Sponsors', 'mec-single-builder' );

	}

	/**
	 * Retrieve Alert widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'eicon-product-upsell';

	}

	/**
	 * Set widget category.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget category.
	 */
	public function get_categories() {

		return [ 'single_builder' ];

	}

	/**
	 * Register Alert widget controls.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
		'mec_widget_sponsor_title',
			array(
				'label' 	=> __( 'Widget Title Settings', 'mec-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'mec_widget_sponsor_title_display', //param_name
			[
				'label' 	=> __( 'Display Widget Title', 'mec-single-builder' ), //heading
				'type' 		=> \Elementor\Controls_Manager::SELECT, //type
				'default' 	=> 'block',
				'options' 	=> [ //value
					'block' 		=> __( 'block', 'mec-single-builder' ),
					'none'  		=> __( 'none', 'mec-single-builder' ),
					'inline'  		=> __( 'inline', 'mec-single-builder' ),
					'inline-block'  => __( 'inline-block', 'mec-single-builder' ),

				],
				'selectors' => [
					'{{WRAPPER}} .mec-events-single-section-title' => 'display: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'mec_widget_align',
			[
				'label'		=> __( 'Alignment', 'mec-single-builder' ),
				'type'		=> \Elementor\Controls_Manager::CHOOSE,
				'options'	=> [
					'left' => [
						'title' => __( 'Left', 'mec-single-builder' ),
						'icon'	=> 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mec-single-builder' ),
						'icon'	=> 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mec-single-builder' ),
						'icon'	=> 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .mec-events-single-section-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'mec_widget_sponsor_title_typography',
				'label' 	=> __( 'Title Typography', 'mec-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .mec-events-single-section-title',
				'condition' 	=> [ //dependency
					'mec_widget_sponsor_title_display' 	=> [
						'block',
						'inline',
						'inline-block',
					],
				],
			]
		);

		$this->add_control(
			'mec_widget_sponsor_title_typography_color',
			[
				'label' 		=> __( 'Title Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-events-single-section-title' => 'color: {{VALUE}}',
				],
				'condition' 	=> [ //dependency
					'mec_widget_sponsor_title_display' 	=> [
						'block',
						'inline',
						'inline-block',
					],
				],
			]
		);

		$this->add_control(
			'mec_widget_sponsor_title_bg_color', //param_name
			[
				'label' 		=> __( 'Background Color', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::COLOR, //type
				'selectors' 	=> [
					'{{WRAPPER}} .mec-events-single-section-title' => 'background: {{VALUE}}',
				],
				'condition' 	=> [ //dependency
					'mec_widget_sponsor_title_display' 	=> [
						'block',
						'inline',
						'inline-block',
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_widget_sponsor_title_border',
				'label' 		=> __( 'Border', 'mec-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .mec-events-single-section-title',
				'condition' 	=> [ //dependency
					'mec_widget_sponsor_title_display' 	=> [
						'block',
						'inline',
						'inline-block',
					],
				],
			]
		);

		// $this->add_control(
		// 	'mec_widget_sponsor_title_before_color',
		// 	[
		// 		'label' 		=> __( 'Title Shape Color', 'mec-single-builder' ),
		// 		'type' 			=> \Elementor\Controls_Manager::COLOR,
		// 		'selectors' 	=> [
		// 			'{{WRAPPER}} .mec-events-single-section-title:before' => 'border-color: {{VALUE}}',
		// 		],
		// 		'condition' 	=> [ //dependency
		// 			'mec_widget_sponsor_title_display' 	=> [
		// 				'block',
		// 				'inline',
		// 				'inline-block',
		// 			],
		// 		],
		// 		'separator' 	=> 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'mec_widget_border_position',
		// 	[
		// 		'label'		=> __( 'Title Shape Alignment', 'mec-single-builder' ),
		// 		'type'		=> \Elementor\Controls_Manager::CHOOSE,
		// 		'options'	=> [
		// 			'0' => [
		// 				'title' => __( 'Left', 'mec-single-builder' ),
		// 				'icon'	=> 'eicon-text-align-left',
		// 			],
		// 			'calc(50% - 35px)' => [
		// 				'title' => __( 'Center', 'mec-single-builder' ),
		// 				'icon'	=> 'eicon-text-align-center',
		// 			],
		// 			'calc(100% - 70px)' => [
		// 				'title' => __( 'Right', 'mec-single-builder' ),
		// 				'icon'	=> 'eicon-text-align-right',
		// 			],
		// 		],
		// 		'default' => 'calc(50% - 35px)',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .mec-events-single-section-title:before' => 'left: {{VALUE}}; margin: 0;',
		// 		],
		// 		'condition' 	=> [ //dependency
		// 			'mec_widget_sponsor_title_display' 	=> [
		// 				'block',
		// 				'inline',
		// 				'inline-block',
		// 			],
		// 		],
		// 	]
		// );

		$this->add_responsive_control(
			'mec_widget_sponsor_title_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-events-single-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' 	=> [ //dependency
					'mec_widget_sponsor_title_display' 	=> [
						'block',
						'inline',
						'inline-block',
					],
				],
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'mec_widget_sponsor_title_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-events-single-section-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' 	=> [ //dependency
					'mec_widget_sponsor_title_display' 	=> [
						'block',
						'inline',
						'inline-block',
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mec_sponsor_box',
			array(
				'label' 	=> __('Sponsor Box', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'mec_sponsor_box_bg_color', //param_name
			[
				'label' 		=> __('Background Color', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::COLOR, //type
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_sponsor_box_padding', //param_name
			[
				'label' 		=> __('Padding', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_sponsor_box_margin', //param_name
			[
				'label' 		=> __('Margin', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_sponsor_box_border',
				'label' 		=> __('Border', 'mec-single-builder'),
				'selector' 		=> '{{WRAPPER}} .mec-sponsors-details',
			]
		);

		$this->add_control(
			'mec_sponsor_box_shape_radius', //param_name
			[
				'label' 		=> __('Border Radius', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'mec_sponsor_box_box_shadow',
				'label' 	=> __('Box Shadow', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-sponsors-details',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		'mec_single_sponsors_box',
			array(
				'label' 	=> __( 'Sponsors Item Box', 'mec-single-builder' ),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'mec_single_sponsors_box_bg_color', //param_name
			[
				'label' 		=> __( 'Background Color', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::COLOR, //type
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details ul li' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_single_sponsors_box_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_single_sponsors_box_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_single_sponsors_box_border',
				'label' 		=> __( 'Border', 'mec-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .mec-sponsors-details ul li',
			]
		);

		$this->add_control(
			'mec_single_sponsors_box_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-sponsors-details ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'mec_single_sponsors_box_box_shadow',
					'label' 	=> __( 'Box Shadow', 'mec-single-builder' ),
					'selector' 	=> '{{WRAPPER}} .mec-sponsors-details ul li',
				]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mec_widget_sponsor_name',
				array(
					'label' 	=> __( 'Sponsor Name', 'mec-single-builder' ),
					'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
				)
			);
	
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'mec_sponsor_name_link_typography',
					'label' 	=> __( 'Typography', 'mec-single-builder' ),
					'selector' 	=> '{{WRAPPER}} .mec-sponsors-details ul li .mec-sponsor-name',
				]
			);
	
			$this->add_control(
				'mec_sponsor_name_link_typography_color',
				[
					'label' 		=> __( 'Color', 'mec-single-builder' ),
					'type' 			=> \Elementor\Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li .mec-sponsor-name' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_control(
				'mec_sponsor_name_link_typography_color_hover',
				[
					'label' 		=> __( 'Hover Color', 'mec-single-builder' ),
					'type' 			=> \Elementor\Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li .mec-sponsor-name:hover' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_responsive_control(
				'mec_sponsor_name_link_typography_padding', //param_name
				[
					'label' 		=> __( 'Padding', 'mec-single-builder' ), //heading
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li .mec-sponsor-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->add_responsive_control(
				'mec_sponsor_name_link_typography_margin', //param_name
				[
					'label' 		=> __( 'Margin', 'mec-single-builder' ), //heading
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li .mec-sponsor-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
		$this->end_controls_section();

		$this->start_controls_section(
			'mec_widget_sponsor_image',
				array(
					'label' 	=> __( 'Sponsor Image', 'mec-single-builder' ),
					'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
				)
			);
	
			$this->add_responsive_control(
				'mec_sponsor_image_width',
				[
					'label' 		=> __( 'Image Width', 'mec-single-builder' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' 		=> [
						'unit' => 'px',
						'size' => 68,
					],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
	
			$this->add_responsive_control(
				'mec_sponsor_image_height',
				[
					'label' 		=> __( 'Image Height', 'mec-single-builder' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' 		=> [
						'unit' => 'px',
						'size' => 68,
					],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
	
			$this->add_control(
				'mec_sponsor_image_bg_color', //param_name
				[
					'label' 		=> __( 'Background Color', 'mec-single-builder' ), //heading
					'type' 			=> \Elementor\Controls_Manager::COLOR, //type
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo' => 'background: {{VALUE}}',
					],
					'separator' 	=> 'before',
				]
			);
	
			$this->add_responsive_control(
				'mec_sponsor_image_padding', //param_name
				[
					'label' 		=> __( 'Padding', 'mec-single-builder' ), //heading
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' 	=> 'before',
				]
			);
	
			$this->add_responsive_control(
				'mec_sponsor_image_margin', //param_name
				[
					'label' 		=> __( 'Margin', 'mec-single-builder' ), //heading
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 			=> 'mec_sponsor_image_border',
					'label' 		=> __( 'Border', 'mec-single-builder' ),
					'selector' 		=> '{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo',
					'separator' 	=> 'before',
				]
			);
	
			$this->add_control(
				'mec_sponsor_image_shape_radius',
				[
					'label' 		=> __( 'Border Radius', 'mec-single-builder' ),
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
					[
						'name' 		=> 'mec_sponsor_image_box_shadow',
						'label' 	=> __( 'Box Shadow', 'mec-single-builder' ),
						'selector' 	=> '{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo',
					]
			);
	
	
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 			=> 'mec_sponsor_image_hover_border',
					'label' 		=> __( 'Border Hover', 'mec-single-builder' ),
					'selector' 		=> '{{WRAPPER}} .mec-sponsors-details ul li a:hover img.mec-sponsor-logo',
					'separator' 	=> 'before',
				]
			);
	
			$this->add_control(
				'mec_sponsor_image_hover_shape_radius',
				[
					'label' 		=> __( 'Border Radius Hover', 'mec-single-builder' ),
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
					[
						'name' 		=> 'mec_sponsor_image_hover_shadow',
						'label' 	=> __( 'Box Shadow Hover', 'mec-single-builder' ),
						'selector' 	=> '{{WRAPPER}} .mec-sponsors-details ul li img.mec-sponsor-logo:hover',
					]
			);
	
		$this->end_controls_section();	

	}

	/**
	 * Render Alert widget output on the frontend.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		echo \MEC\SingleBuilder\SingleBuilder::getInstance()->output( 'event-sponsors' );
	}

}
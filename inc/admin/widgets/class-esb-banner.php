<?php
namespace Elementor;

namespace MEC_Single_Builder\Inc\Admin\Widgets;

use Elementor\Plugin;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class ESB_Banner extends \Elementor\Widget_Base
{

	/**
	 * Retrieve Alert widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{

		return 'event_banner';
	}

	/**
	 * Retrieve Alert widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{

		return __('Banner', 'mec-single-builder');
	}

	/**
	 * Retrieve Alert widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{

		return 'eicon-banner';
	}

	/**
	 * Set widget category.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget category.
	 */
	public function get_categories()
	{

		return ['single_builder'];
	}

	/**
	 * Register Alert widget controls.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'mec_banner_box',
			array(
				'label' 	=> __('Banner Box', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'mec_banner_box_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_banner_box_border',
				'label' 		=> __( 'Border', 'mec-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .mec-event-banner',
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'mec_banner_box_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'mec_banner_box_box_shadow',
				'label' 	=> __('Box Shadow', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-event-banner',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mec_banner_title',
			array(
				'label' 	=> __('Banner Title', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'banner_title_typography',
				'label' 	=> __( 'Typography', 'mec-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .mec-event-banner-title .mec-single-title',
			]
		);

		$this->add_control(
			'banner_title_color',
			[
				'label' 		=> __( 'Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-title .mec-single-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
            'banner_title_background_color', 
            [
                'label' 		=> __( 'Background Color', 'mec-single-builder' ), 
                'type' 			=> \Elementor\Controls_Manager::COLOR, 
                'selectors' 	=> [
                   '{{WRAPPER}} .mec-event-banner-title .mec-single-title' => 'background: {{VALUE}}',
                ],
            ]
        );

		$this->add_responsive_control(
			'mec_title_padding', //param_name
			[
				'label' 		=> __( 'Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-title .mec-single-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_title_margin', //param_name
			[
				'label' 		=> __( 'Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-title .mec-single-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_title_border',
				'label' 		=> __( 'Border', 'mec-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .mec-event-banner-title .mec-single-title',
			]
		);

		$this->add_control(
			'mec_title_shape_radius', //param_name
			[
				'label' 		=> __( 'Border Radius', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-title .mec-single-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mec_banner_date_time',
			array(
				'label' 	=> __('Banner Date & Time', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
            'mec_banner_date_time_wrapper_background', 
            [
                'label' 		=> __( 'Wrapper Background Color', 'mec-single-builder' ), 
                'type' 			=> \Elementor\Controls_Manager::COLOR, 
                'selectors' 	=> [
                   '{{WRAPPER}} .mec-event-banner-datetime' => 'background: {{VALUE}}',
                ],
            ]
        );

		$this->add_responsive_control(
			'mec_banner_date_time_wrapper_padding', //param_name
			[
				'label' 		=> __( 'Wrapper Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'before',
			]
		);

		$this->add_responsive_control(
			'mec_banner_date_time_wrapper_margin', //param_name
			[
				'label' 		=> __( 'Wrapper Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_banner_date_time_wrapper_border',
				'label' 		=> __( 'Wrapper Border', 'mec-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .mec-event-banner-datetime',
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'mec_banner_date_time_wrapper_radius', //param_name
			[
				'label' 		=> __( ' Wrapper Border Radius', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'mec_banner_date_time_wrapper_box_shadow',
				'label' 	=> __('Wrapper Box Shadow', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-event-banner-datetime',
				'separator' 	=> 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'banner_time_typography',
				'label' 	=> __( 'Time Typography', 'mec-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time',
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'mec_banner_time_color',
			[
				'label' 		=> __( 'Time Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_time_padding', //param_name
			[
				'label' 		=> __( 'Time Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_time_margin', //param_name
			[
				'label' 		=> __( 'Time Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_banner_time_icon_size',
			[
				'label' 		=> __( 'Time Icon Size', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'default' 		=> [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_banner_time_icon_color',
			[
				'label' 		=> __( 'Time Icon Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_time_icon_margin', //param_name
			[
				'label' 		=> __( 'Time Icon Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-time i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'banner_date_typography',
				'label' 	=> __( 'Date Typography', 'mec-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date',
			]
		);

		$this->add_control(
			'mec_banner_date_color',
			[
				'label' 		=> __( 'Date Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_date_padding', //param_name
			[
				'label' 		=> __( 'Date Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_date_margin', //param_name
			[
				'label' 		=> __( 'Date Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_banner_date_icon_size',
			[
				'label' 		=> __( 'Date Icon Size', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'default' 		=> [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_banner_date_icon_color',
			[
				'label' 		=> __( 'Date Icon Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_date_icon_margin', //param_name
			[
				'label' 		=> __( 'Date Icon Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-datetime .mec-single-event-date i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mec_banner_location',
			array(
				'label' 	=> __('Banner Location', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
            'mec_banner_location_wrapper_bg', 
            [
                'label' 		=> __( 'Wrapper Background Color', 'mec-single-builder' ), 
                'type' 			=> \Elementor\Controls_Manager::COLOR, 
                'selectors' 	=> [
                   '{{WRAPPER}} .mec-event-banner-location .mec-single-event-location' => 'background: {{VALUE}}',
                ],
            ]
        );

		$this->add_responsive_control(
			'mec_banner_location_wrapper_padding', //param_name
			[
				'label' 		=> __( 'Wrapper Padding', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'before',
			]
		);

		$this->add_responsive_control(
			'mec_banner_location_wrapper_margin', //param_name
			[
				'label' 		=> __( 'Wrapper Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_banner_location_wrapper_border',
				'label' 		=> __( 'Wrapper Border', 'mec-single-builder' ),
				'selector' 		=> '{{WRAPPER}} .mec-event-banner-location .mec-single-event-location',
			]
		);

		$this->add_control(
			'mec_banner_location_wrapper_radius', //param_name
			[
				'label' 		=> __( ' Wrapper Border Radius', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'after',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'banner_location_typography',
				'label' 	=> __( 'Location Typography', 'mec-single-builder' ),
				'selector' 	=> '{{WRAPPER}} .mec-event-banner-location .mec-single-event-location h6',
			]
		);

		$this->add_control(
			'mec_banner_location_color',
			[
				'label' 		=> __( 'Location Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location h6' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'mec_banner_location_icon_size',
			[
				'label' 		=> __( 'Icon Size', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'default' 		=> [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_banner_location_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'mec-single-builder' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_banner_location_icon_margin', //param_name
			[
				'label' 		=> __( 'Location Icon Margin', 'mec-single-builder' ), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-event-banner-location .mec-single-event-location i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 	=> 'after',
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

		$settings = $this->get_settings_for_display();
		$atts = array();

		echo \MEC\SingleBuilder\SingleBuilder::getInstance()->output( 'event-banner' ,0 ,$atts );
	}
}

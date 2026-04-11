<?php

namespace Elementor;

namespace MEC_Single_Builder\Inc\Admin\Widgets;

use Elementor\Plugin;

use Elementor\Post_CSS_File;
use Elementor\Core\Files\CSS\Post;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

class ESB_Content extends \Elementor\Widget_Base
{

    /**
     * Retrieve Alert widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {

        return 'event_content';

    }

    /**
     * Retrieve Alert widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {

        return __('Content', 'mec-single-builder');

    }

    /**
     * Retrieve Alert widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {

        return 'eicon-post-content';

    }

    /**
     * Set widget category.
     *
     * @return array Widget category.
     * @since 1.0.0
     * @access public
     *
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
            'mec_content_typo',
            array(
                'label' => __('Content Typography', 'mec-single-builder'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'mec-single-builder'),
                'selector' => '{{WRAPPER}} .mec-events-content, {{WRAPPER}} .mec-events-content p',
            ]
        );

        $this->add_control(
            'mec_content',
            [
                'label' => __('Color', 'mec-single-builder'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mec-events-content, {{WRAPPER}} .mec-events-content p' => 'color: {{VALUE}} !important;',
                ],
                'separator' 	=> 'before',
            ]
        );

        $this->add_control(
            'mec_title_background', 
            [
                'label' 		=> __( 'Background Color', 'mec-single-builder' ), 
                'type' 			=> \Elementor\Controls_Manager::COLOR, 
                'selectors' 	=> [
                   '{{WRAPPER}} .mec-events-content' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
			'mec_title_align',
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
						'icon'	=> 'eicon-text-align-center
',
					],
					'right' => [
						'title' => __( 'Right', 'mec-single-builder' ),
						'icon'	=> 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .mec-events-content' => 'text-align: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
            'mec_content_padding', //param_name
            [
                'label' => __('Padding', 'mec-single-builder'), //heading
                'type' => \Elementor\Controls_Manager::DIMENSIONS, //type
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mec-events-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' 	=> 'before',
            ]
        );

        $this->add_responsive_control(
            'mec_content_margin', //param_name
            [
                'label' => __('Margin', 'mec-single-builder'), //heading
                'type' => \Elementor\Controls_Manager::DIMENSIONS, //type
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mec-events-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'mec_content_border',
                'label' => __('Border', 'mec-single-builder'),
                'selector' => '{{WRAPPER}} .mec-events-content',
                'separator' 	=> 'before',
            ]
        );

        $this->add_control(
            'mec_title_shape_radius', //param_name
            [
                'label' => __('Border Radius', 'mec-single-builder'), //heading
                'type' => \Elementor\Controls_Manager::DIMENSIONS, //type
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mec-events-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'mec_title_box_shadow',
                'label' => __('Box Shadow', 'mec-single-builder'),
                'selector' => '{{WRAPPER}} .mec-events-content',
            ]
        );

        $this->add_control(
            'mec_content_loadmore',
            [
                'label' => esc_html__('Show Load More', 'mec-single-builder'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
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
    protected function render()
    {

        $event_id = \MEC\SingleBuilder\SingleBuilder::getInstance()->get_event_id();

        $settings = $this->get_settings_for_display();
        $atts = array(
            'mec_content_loadmore' => isset($settings['mec_content_loadmore']) && 'yes' === $settings['mec_content_loadmore'] ? true : false,
        );

        if (isset($settings['mec_content_loadmore']) && 'yes' === $settings['mec_content_loadmore']) {
            echo '<script>
				(function($){
                        $( document ).ready(function() {
          var text = $(".read-more-text").html();
//              text = text.replace(/(<([^>]+)>)/ig, "");
              text = text.replace(/<p[^>]*>/g, "").replace(/<\/p>/g, "<br><br>");
                 if (text.length > 200) {
                     $(".read-more-text").html("<p>"+text.substr(0, 200) + \'<span class="load-more-text">Load more</span><span class="more-text">\'+text.substr(200, text.length-1)+\'</span>\'+"</p>");
                     $(".read-more-text span.more-text").hide();
                     $(".read-more-text span.load-more-text").on("click",function(){
                          $(".read-more-text span.load-more-text").hide();
                            $(".read-more-text span.more-text").show();
                     });
                 }
    });

				})(jQuery);
			</script>';
        }


        if (class_exists('\Elementor\Core\Files\CSS\Post')) {
            $css_file = new Post($event_id);
        } elseif (class_exists('\Elementor\Post_CSS_File')) {
            $css_file = new Post_CSS_File($event_id);
        }
        $css_file->enqueue();

        echo \MEC\SingleBuilder\SingleBuilder::getInstance()->output('content', $event_id, $atts);
    }

}

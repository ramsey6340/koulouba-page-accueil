<?php
use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Element_Base;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Css_Filter;

if (!defined('ABSPATH')) {
    exit;
}

class The_Pack_Iconbox_Extra_Control
{
    public static function init()
    { 
        add_action('elementor/element/icon-box/section_style_content/after_section_end', [
            __CLASS__,
            'tp_icon_box_extra'
        ], 10, 2);
    }

    public static function tp_icon_box_extra($element, $args)
    {
        $element->start_controls_section(
            'tpbtnsx',
            [
                'label' => __('Extra style', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $element->add_control(
            'ibf_pop',
            [
                'label' => __('Icon before after', 'thepack'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
            ]
        );
        
        $element->start_popover();

        $element->add_responsive_control(
            'ibf_w',
            [
                'label' => __('Width', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon:after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'ibf_h',
            [
                'label' => __('Height', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'ibfbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon:after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'ib_y',
            [
                'label' => __('Offset Top', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon:after' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'ib_x',
            [
                'label' => __('Offset Left', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon:after' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'ib_brd',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px' , '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $element->end_popover();
        
        $element->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .elementor-icon',
                'label' => esc_html__('Box shadow', 'thepack'),
            ]
        );

        $element->add_control(
            'ibdclr',
            [
                'label' => esc_html__('Icon border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}.elementor-view-framed .elementor-icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $element->add_responsive_control(
            't-mrg',
            [
                'label' => esc_html__('Title margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $element->end_controls_section();
    }
}

The_Pack_Iconbox_Extra_Control::init();

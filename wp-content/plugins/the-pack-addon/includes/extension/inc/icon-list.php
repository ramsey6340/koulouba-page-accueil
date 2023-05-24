<?php

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Element_Base;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) {
    exit;
}

class The_Pack_Icon_List_Extra_Control
{
    public static function init()
    {
        add_action('elementor/element/icon-list/section_text_style/after_section_end', [
            __CLASS__,
            'tp_callback_function' 
        ], 10, 2);
    }

    public static function tp_callback_function($element, $args)
    {
        $element->start_controls_section(
            'tpbtnsx',
            [
                'label' => __('Extra styling', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $element->add_responsive_control(
            'i_pad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['em', 'px'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'i_bclr',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item a' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $element->add_control(
            'ibg',
            [
                'label' => esc_html__('Background color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item a' => 'background:{{VALUE}};',
                ],
            ]
        );

        $element->add_control(
            'ibgh',
            [
                'label' => esc_html__('Background color hover', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item a:hover' => 'background:{{VALUE}};',
                ],
            ]
        );

        $element->add_responsive_control(
            'ibrad',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ]

            ]
        );

        $element->end_controls_section();
    }
}

The_Pack_Icon_List_Extra_Control::init();

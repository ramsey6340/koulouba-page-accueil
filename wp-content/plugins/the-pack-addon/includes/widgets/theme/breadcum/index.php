<?php
namespace ThePackAddon\Widgets;

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class thepack_breadcum extends Widget_Base
{
    public function get_name()
    {
        return 'tp-breadcumb';
    }

    public function get_title()
    {
        return esc_html__('Breadcrumb', 'thepack');
    }

    public function get_icon()
    {
        return 'eicon-chevron-right';
    }

    public function get_categories()
    {
        return ['ashelement-addons'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_cnt',
            [
                'label' => esc_html__('Info', 'thepack'),
            ]
        );

        $this->add_control(
            'hme',
            [
                'label' => esc_html__('Home', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Home', 'thepack'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'auarc',
            [
                'label' => esc_html__('Author archive', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Author archive for', 'thepack'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'srch',
            [
                'label' => esc_html__('Search', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search query for', 'thepack'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'eror',
            [
                'label' => esc_html__('Error / 404', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Error 404', 'thepack'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'del_type',
            [
                'label' => esc_html__('Delimiter type', 'thepack'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text' => [
                        'title' => esc_html__('Text', 'thepack'),
                        'icon' => 'eicon-text',
                    ],

                    'icon' => [
                        'title' => esc_html__('Icon', 'thepack'),
                        'icon' => 'eicon-parallax',
                    ]

                ],
                'default' => 'text',
            ]
        );

        $this->add_control(
            'del',
            [
                'label' => esc_html__('Delimiter', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('-', 'thepack'),
                'label_block' => true,
                'condition' => [
                    'del_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'del_icon',
            [
                'label' => esc_html__('Icon', 'thepack'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'del_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => esc_html__('General', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gbg',
            [
                'label' => esc_html__('Background color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gbdrkl',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gbrad',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'border-radius:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'gpadr',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs('tctb');

        $this->start_controls_tab(
            'e1',
            [
                'label' => esc_html__('Text', 'thepack'),
            ]
        );

        $this->add_control(
            'l_color',
            [
                'label' => esc_html__('Link color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'thepack'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'thepack'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'thepack'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'thepack'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'selector' => '{{WRAPPER}} .xlbreadcrumb',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->add_responsive_control(
            'nav_mar',
            [
                'label' => esc_html__('Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xlbreadcrumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e2',
            [
                'label' => esc_html__('Delimiter', 'thepack'),
            ]
        );

        $this->add_responsive_control(
            'dlsp',
            [
                'label' => esc_html__('Spacing', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .delimiter' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'dlfs',
            [
                'label' => esc_html__('Font size', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .delimiter i.tp-icon' => 'font-size:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .delimiter img.tp-icon' => 'width:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $delimiter = $settings['del_type'] == 'text' ? $settings['del'] : the_pack_render_icon($settings['del_icon'], 'tp-icon');
        $args = [
            'home' => $settings['hme'],
            'author_archive' => $settings['auarc'],
            'search' => $settings['srch'],
            'error' => $settings['eror'],
            'delimiter' => $delimiter,
        ];
        if (Plugin::instance()->editor->is_edit_mode()) {
            echo '<div class="xlbreadcrumb"><div class="inner"><a href="#" rel="v:url" property="v:title">Home</a><span class="delimiter">' . $delimiter . '</span><span class="current">About Us 1</span></div></div>';
        } else {
            echo thepack_breadcum($args);
        }
    }
}

$widgets_manager->register(new \ThePackAddon\Widgets\thepack_breadcum());

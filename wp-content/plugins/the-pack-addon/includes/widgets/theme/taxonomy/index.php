<?php
namespace ThePackAddon\Widgets;

use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use WP_Query;

class thepack_post_taxolist extends Widget_Base
{
    public function get_name()
    {
        return 'tp-taxonomy';
    }

    public function get_title()
    {
        return esc_html__('Taxonomy', 'thepack');
    }

    public function get_icon()
    {
        return 'dashicons dashicons-sos';
    }

    public function get_categories()
    {
        return ['ashelement-addons'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_info',
            [
                'label' => esc_html__('Taxonomy', 'thepack'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Show as', 'thepack'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'list' => [
                        'title' => esc_html__('List', 'thepack'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'full' => [
                        'title' => esc_html__('Full width', 'thepack'),
                        'icon' => 'eicon-slider-push',
                    ],
                ],
                'default' => 'list',
            ]
        );

        $this->add_control(
            'taxonomy',
            [
                'label' => esc_html__('Taxonomy', 'thepack'),
                'type' => Controls_Manager::SELECT,
                'options' => thepaack_drop_taxolist(),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'show_count',
            [
                'label' => esc_html__('Hide count', 'thepack'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony span.count' => 'display: none;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general_style',
            [
                'label' => esc_html__('General', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'ftsp',
            [
                'label' => esc_html__('Spacing', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony.full li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};padding-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tp-taxomony.list li' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tp-taxomony.list' => 'margin-left: -{{SIZE}}{{UNIT}};margin-right: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'gpad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony.list li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'list',
                ],
            ]
        );

        $this->add_responsive_control(
            'gbrad',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony.list li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'list',
                ],
            ]
        );

        $this->start_controls_tabs('tctb');

        $this->start_controls_tab(
            'e1',
            [
                'label' => esc_html__('Label', 'thepack'),
            ]
        );

        $this->add_control(
            'tcol',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tcolh',
            [
                'label' => esc_html__('Hover color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony li a:hover .label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony.list li a' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'style' => 'list',
                ],
            ]
        );

        $this->add_control(
            'tbgh',
            [
                'label' => esc_html__('Hover background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-taxomony.list li a:hover' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'style' => 'list',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typot',
                'selector' => '{{WRAPPER}} .label',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e2',
            [
                'label' => esc_html__('Count', 'thepack'),
            ]
        );

        $this->add_control(
            'ccol',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .count' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cypot',
                'selector' => '{{WRAPPER}} .count',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }
}

$widgets_manager->register(new \ThePackAddon\Widgets\thepack_post_taxolist());

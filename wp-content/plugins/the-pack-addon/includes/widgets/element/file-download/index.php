<?php
namespace ThePackAddon\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class thepack_file_download extends Widget_Base
{
    public function get_name()
    {
        return 'tb_filedwnload';
    }

    public function get_title()
    {
        return esc_html__('File download', 'thepack');
    }

    public function get_icon()
    {
        return 'eicon-file-download';
    }

    public function get_categories()
    {
        return ['ashelement-addons'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_process_1',
            [
                'label' => esc_html__('Content', 'thepack'),
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => esc_html__('Icon/Image', 'thepack'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'icon' => [
                        'title' => esc_html__('Icon', 'thepack'),
                        'icon' => 'eicon-elementor-circle',
                    ],
                    'img' => [
                        'title' => esc_html__('Image', 'thepack'),
                        'icon' => 'eicon-image',
                    ]
                ],
                'default' => 'icon',
            ]
        );

        $this->add_control(
            'img',
            [
                'label' => esc_html__('Image', 'thepack'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'type' => ['img'],
                ],                
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'thepack'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'condition' => [
                    'type' => ['icon'],
                ],                 
            ]
        );

        $this->add_control(
            'ttl',
            [
                'label' => esc_html__('Title', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('Link', 'thepack'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'lbl',
            [
                'label' => esc_html__('Label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icn',
            [
                'label' => esc_html__('Icon', 'thepack'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ lbl }}}',
            ]
        );        
        $this->add_control(
            'btn',
            [
                'label' => esc_html__('Button label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
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

        $this->start_controls_tabs('tctb');

        $this->start_controls_tab(
            'e1',
            [
                'label' => esc_html__('Icon', 'thepack'),
            ]
        );

        $this->add_responsive_control(
            'ig_wid',
            [
                'label' => esc_html__('Width', 'thepack'),
                'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],                
                'selectors' => [
                    '{{WRAPPER}} .img-wrap' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'ifs',
            [
                'label' => esc_html__('Font size', 'thepack'),
                'type' => Controls_Manager::SLIDER,                
                'selectors' => [
                    '{{WRAPPER}} .tbicon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'i_clr',
            [
                'label' => esc_html__('Icon color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tbicon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e2',
            [
                'label' => esc_html__('Title', 'thepack'),
            ]
        );

        $this->add_control(
            't_clr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            't_mr',
            [
                'label' => esc_html__('Margin', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 't_typ',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e3',
            [
                'label' => esc_html__('Meta', 'thepack'),
            ]
        );

        $this->add_responsive_control(
            'msp',
            [
                'label' => esc_html__('Spacing', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .info span' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'm_clr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mi_clr',
            [
                'label' => esc_html__('Icon Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'm_typ',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .info',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e4',
            [
                'label' => esc_html__('Button', 'thepack'),
            ]
        );

        $this->add_control(
            'btn_pad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'btn_mr',
            [
                'label' => esc_html__('Margin', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .tour-btn',
            ]
        );

        $this->add_control(
            'btn_bgl',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bgh',
            [
                'label' => esc_html__('Hover Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_clr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_clrh',
            [
                'label' => esc_html__('Hover Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bw',
            [
                'label' => esc_html__('Border width', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],

                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'border-width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'btn_br',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'btn_bclr',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bclrh',
            [
                'label' => esc_html__('Hover Border Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-btn:hover' => 'border-color: {{VALUE}};',
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
        require dirname(__FILE__) . '/view.php';
    }
}

$widgets_manager->register(new \ThePackAddon\Widgets\thepack_file_download());

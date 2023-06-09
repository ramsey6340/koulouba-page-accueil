<?php
namespace ThePackAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class thepack_blog_list_intro extends Widget_Base
{
    public function get_name()
    {
        return 'tpblogslide';
    }

    public function get_title()
    {
        return esc_html__('Blog Grid', 'thepack');
    }

    public function get_icon()
    {
        return 'dashicons dashicons-schedule';
    }

    public function get_categories()
    {
        return ['ashelement-addons'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_posts_carousel',
            [
                'label' => esc_html__('Query', 'thepack'),
            ]
        );

        $this->add_control(
            'arc_query',
            [
                'label' => esc_html__('Enable archive query', 'thepack'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'query_type',
            [
                'label' => esc_html__('Query type', 'thepack'),
                'type' => Controls_Manager::SELECT,
                'condition' => [
                    'arc_query!' => 'yes',
                ],
                'options' => [
                    'category' => esc_html__('Category', 'thepack'),
                    'individual' => esc_html__('Individual', 'thepack'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => esc_html__('Category', 'thepack'),
                'type' => Controls_Manager::SELECT2,
                'options' => thepack_drop_cat('category'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'category',
                    'arc_query!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'id_query',
            [
                'label' => esc_html__('Posts', 'thepack'),
                'type' => Controls_Manager::SELECT2,
                'options' => thepack_drop_posts('post'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'individual',
                    'arc_query!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'meta',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Post meta', 'thepack'),
                'default' => '',
                'options' => thepack_metaa_fields(),
                'multiple' => false,
                'label_block' => true
            ]
        );

        $this->add_control(
            'metas',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'excerpt',
            [
                'label' => esc_html__('Excerpt length', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],

            ]
        );

        $this->add_control(
            'img_size',
            [
                'label' => esc_html__('Image size', 'thepack'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => thepack_image_size_choose(),
                'multiple' => false,
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
            'tmpl',
            [
                'label' => esc_html__('Template', 'thepack'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '1' => [
                        'title' => esc_html__('One', 'thepack'),
                        'icon' => 'eicon-folder',
                    ],
                    '2' => [
                        'title' => esc_html__('Two', 'thepack'),
                        'icon' => 'eicon-folder-o',
                    ]
                ],
            ]
        );

        $this->add_responsive_control(
            'gwid',
            [
                'label' => esc_html__('Column width', 'thepack'),
                'type' => Controls_Manager::NUMBER,
                'default' => '33.33',
                'selectors' => [
                    '{{WRAPPER}} .grid-item' => 'width: {{VALUE}}%;float:left;',
                ],
            ]
        );

        $this->add_control(
            'show_pagi',
            [
                'label' => __('Show pagination', 'thepack'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_responsive_control(
            'colspg',
            [
                'label' => esc_html__('Column padding', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .grid-item' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tp-grid-wrap' => 'margin-left: -{{SIZE}}{{UNIT}};margin-right: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tp-post-pagination' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'gbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-post-2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tp-post-1 .grid-content' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .tp-post-3 .grid-content' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'thmov',
            [
                'label' => esc_html__('Thumb overlay', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .thumb-box:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bdrclr',
            [
                'label' => esc_html__('Border Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-post-2' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .tp-post-1 .grid-content' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bxd',
                'selector' => '{{WRAPPER}} .tp-post-2,{{WRAPPER}} .tp-post-1 .grid-content',
                'label' => esc_html__('Box shadow', 'thepack'),
            ]
        );

        $this->add_control(
            'gpad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => [
                    'tmpl' => ['2'],
                ],                
                'selectors' => [
                    '{{WRAPPER}} .tp-post-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gbrd',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-post-2,{{WRAPPER}} .tp-post-1 .thumb-box,{{WRAPPER}} .tp-post-1 .grid-content' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],

            ]
        );

        $this->add_responsive_control(
            'ghti',
            [
                'label' => esc_html__('Height', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'condition' => [
                    'tmpl' => ['3'],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tp-post-3' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_contents',
            [
                'label' => esc_html__('Content', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cpad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .grid-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tctb');

        $this->start_controls_tab(
            'e1',
            [
                'label' => esc_html__('Title', 'thepack'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttypo',
                'selector' => '{{WRAPPER}} .title',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->add_control(
            't_col',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            't_colh',
            [
                'label' => esc_html__('Hover Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tmrg',
            [
                'label' => esc_html__('Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e2',
            [
                'label' => esc_html__('Excerpt', 'thepack'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'extyp',
                'selector' => '{{WRAPPER}} .post-entry',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->add_control(
            'exclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-entry' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'exmrg',
            [
                'label' => esc_html__('Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .post-entry' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e3',
            [
                'label' => esc_html__('Meta', 'thepack'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .leffect-1',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->add_control(
            'lkclrr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'iknclr',
            [
                'label' => esc_html__('Icon color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lkclr',
            [
                'label' => esc_html__('Link Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mlkhclr',
            [
                'label' => esc_html__('Link hover color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'e4',
            [
                'label' => esc_html__('Button', 'thepack'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btyp',
                'selector' => '{{WRAPPER}} .btn-more',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->add_control(
            'btclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bthclr',
            [
                'label' => esc_html__('Hover Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pgntin',
            [
                'label' => esc_html__('Pagination', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_pagi' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgtsp',
            [
                'label' => esc_html__('Top spacing', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-post-pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgisp',
            [
                'label' => esc_html__('Spacing', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li' => 'padding-left:{{SIZE}}{{UNIT}};padding-right:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .page-numbers' => 'margin-left: -{{SIZE}}{{UNIT}};margin-right: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgaln',
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
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .page-numbers' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgwh',
            [
                'label' => esc_html__('Width & height', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a,{{WRAPPER}} .page-numbers li span' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgbrad',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a,{{WRAPPER}} .page-numbers li span' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'pgbdkr',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a,{{WRAPPER}} .page-numbers li span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pgtyp',
                'selector' => '{{WRAPPER}} .page-numbers li',
                'label' => esc_html__('Typography', 'thepack'),
            ]
        );

        $this->add_control(
            'pgbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a,{{WRAPPER}} .page-numbers li span' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pgklr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a,{{WRAPPER}} .page-numbers li span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pgbgh',
            [
                'label' => esc_html__('Hover background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a:hover,{{WRAPPER}} .page-numbers li span.current' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pgklrh',
            [
                'label' => esc_html__('Hover color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-numbers li a:hover,{{WRAPPER}} .page-numbers li span.current' => 'color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

    protected function content_template()
    {
    }
}

$widgets_manager->register(new \ThePackAddon\Widgets\thepack_blog_list_intro());

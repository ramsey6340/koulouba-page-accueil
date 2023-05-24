<?php
namespace ThePackAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Plugin;
use Elementor\Utils;

class thepack_post_comment extends Widget_Base
{
    public function get_name()
    {
        return 'tp-post-comments';
    }

    public function get_title()
    {
        return esc_html__('Post Comment', 'thepack');
    }

    public function get_icon()
    {
        return 'eicon-comments';
    }

    public function get_categories()
    {
        return ['ashelement-addons'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_gnrl',
            [
                'label' => esc_html__('Content', 'thepack'),
            ]
        );

        $this->add_control(
            'preview',
            [
                'label' => esc_html__('Preview post', 'thepack'),
                'type' => Controls_Manager::SELECT2,
                'options' => thepack_drop_posts('post'),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'nc',
            [
                'label' => esc_html__('No comment label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('No Comment', 'thepack'),
            ]
        );

        $this->add_control(
            'com',
            [
                'label' => esc_html__('Comments label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Comments', 'thepack'),
            ]
        );

        $this->add_control(
            'onecom',
            [
                'label' => esc_html__('One comment label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('1 Comment', 'thepack'),
            ]
        );

        $this->add_control(
            'ofcom',
            [
                'label' => esc_html__('Comments off label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Comments are off for this post.', 'thepack'),
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => esc_html__('Name label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Name *', 'thepack'),
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => esc_html__('Email label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Email *', 'thepack'),
            ]
        );

        $this->add_control(
            'website',
            [
                'label' => esc_html__('Website label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Website', 'thepack'),
            ]
        );

        $this->add_control(
            'comment',
            [
                'label' => esc_html__('Comment label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Comment', 'thepack'),
            ]
        );

        $this->add_control(
            'sbmt',
            [
                'label' => esc_html__('Submit button label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Submit', 'thepack'),
            ]
        );

        $this->add_control(
            'rply',
            [
                'label' => esc_html__('Reply label', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Reply', 'thepack'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_circle',
            [
                'label' => esc_html__('General', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ttnmr',
            [
                'label' => esc_html__('Title Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .khbcomhead' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tttyp',
                'label' => esc_html__('Title Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .khbcomhead',
            ]
        );

        $this->add_control(
            'ttclr',
            [
                'label' => esc_html__('Title Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbcomhead' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .article' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gbdc',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .article' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gpad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .article' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('gt');

        $this->start_controls_tab(
            'gt1',
            [
                'label' => esc_html__('Thumb', 'thepack'),
            ]
        );

        $this->add_responsive_control(
            'thwd',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-commentwrap .article .author-pic' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'gt2',
            [
                'label' => esc_html__('Meta', 'thepack'),
            ]
        );

        $this->add_control(
            'ushed',
            [
                'label' => __('Name', 'thepack'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'usnmr',
            [
                'label' => esc_html__('Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .user-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ustyp',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .user-name',
            ]
        );

        $this->add_control(
            'usclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .user-name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'usthed',
            [
                'label' => __('Date', 'thepack'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'usdtyp',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .user-date',
            ]
        );

        $this->add_control(
            'usdclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .user-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'gt3',
            [
                'label' => esc_html__('Content', 'thepack'),
            ]
        );

        $this->add_control(
            'cnnmr',
            [
                'label' => esc_html__('Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .user-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cntyp',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .user-comment',
            ]
        );

        $this->add_control(
            'cnclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .user-comment' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rethed',
            [
                'label' => __('Reply Button', 'thepack'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'retyp',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .comment-reply-link',
            ]
        );

        $this->add_control(
            'reclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-reply-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_cfrm',
            [
                'label' => esc_html__('Form', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'inwd',
            [
                'label' => esc_html__('Width', 'thepack'),
                'type' => Controls_Manager::NUMBER,
                'default' => '33.33',
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field' => 'width: {{VALUE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'insp',
            [
                'label' => esc_html__('Spacing', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .form-submit,{{WRAPPER}} .comment-form-comment' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .comment-form' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .logged-in-as' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('frtb');

        $this->start_controls_tab(
            'frtb1',
            [
                'label' => esc_html__('Input', 'thepack'),
            ]
        );

        $this->add_control(
            'inbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field input,{{WRAPPER}} textarea' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'inlr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field input,{{WRAPPER}} textarea' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'inbdclr',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field input,{{WRAPPER}} textarea' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'in_pad',
            [
                'label' => esc_html__('Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field input,{{WRAPPER}} textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'in_bdwd',
            [
                'label' => esc_html__('Border width', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field input,{{WRAPPER}} textarea' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};border-style:solid;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'intyp',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .khbcomment-field input,{{WRAPPER}} textarea',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'frtb2',
            [
                'label' => esc_html__('Button', 'thepack'),
            ]
        );

        $this->add_responsive_control(
            'bttpsp',
            [
                'label' => esc_html__('Top spacing', 'thepack'),
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
                    '{{WRAPPER}} .submit' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'bttwd',
            [
                'label' => esc_html__('Full width', 'thepack'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'width:100%;',
                ],
            ]
        );

        $this->add_control(
            'bt_pad',
            [
                'label' => esc_html__('Padding', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'btbdclr',
            [
                'label' => esc_html__('Border color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btbrds',
            [
                'label' => esc_html__('Border radius', 'thepack'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bttyp',
                'label' => esc_html__('Typography', 'thepack'),
                'selector' => '{{WRAPPER}} .submit',
            ]
        );

        $this->add_control(
            'btbg',
            [
                'label' => esc_html__('Background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btclr',
            [
                'label' => esc_html__('Color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'color:{{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btbgh',
            [
                'label' => esc_html__('Hover background', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .submit:hover' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btclrh',
            [
                'label' => esc_html__('Hover color', 'thepack'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .submit:hover' => 'color:{{VALUE}};',
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

$widgets_manager->register(new \ThePackAddon\Widgets\thepack_post_comment());

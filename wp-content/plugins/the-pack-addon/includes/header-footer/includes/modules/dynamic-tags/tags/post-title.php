<?php
namespace ThePackKitThemeBuilder\Modules\DynamicTags\Tags;

use ThePackKitThemeBuilder\Modules\DynamicTags\Tags\Base\Tag;
use ThePackKitThemeBuilder\Modules\DynamicTags\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Post_Title extends Tag {
	public function get_name() {
		return 'post-title';
	}

	public function get_title() {
		return esc_html__( 'Post Title', 'thepack' );
	}

	public function get_group() {
		return Module::POST_GROUP;
	}

	public function get_categories() {
		return [ Module::TEXT_CATEGORY ];
	}

	public function render() {
		echo wp_kses_post( get_the_title() );
	}
}

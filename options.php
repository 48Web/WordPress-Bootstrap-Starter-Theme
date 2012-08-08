<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Homepage', 'options_framework_theme'),
		'desc' => __('Select a Homepage or default to recent posts', 'options_framework_theme'),
		'id' => 'homepage_select',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Advanced Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Responsive Theme', 'options_framework_theme'),
		'desc' => __('If you select responsive your site will work on mobile devices and tablets as well. this is a good thing.', 'woordpress-bootsrap'),
		'id' => 'responsive_theme',
		'std' => '1',
		'type' => 'checkbox');

	return $options;
}
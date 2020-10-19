<?php

add_theme_support( 'post-thumbnails' );

/**
 * ファイルの読み込み
 */
function add_files() {
	/**
	 * JSファイルの読み込み
	 */
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.min.js', array( 'jquery' ), '1.0.0', true );
	/**
	 * CSSファイルの読み込み
	 */
	wp_enqueue_style( 'reset', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css', array(), '1.0.0' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.min.css', array( 'reset' ), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'add_files' );

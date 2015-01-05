<?php
/**
 * Set up the customizer
 * 
 * @package Wordpress
 * @subpackage NeverCat
 * @since NeverCat 1.0
 */

class NeverCat_Customize {
	public static function register( $wp_customize ) {
		
		/*
		 * sidebar on the left or right side?
		 */
		$wp_customize->add_section(
			'theme_settings',
			array(
				'title'			=> __( 'positioning elements', 'nevercat' ),
				'description'	=> __( 'Here you can define element positions', 'nevercat' ),
				'priority'		=> 10
			)
		);
		$wp_customize->add_setting('sidebar_position', array(
				'default'	=> 0,
				'transport'	=> 'refresh'
			)
		);
		$wp_customize->add_control(
			'sidebar_position',
			array(
				'settings'	=> 'sidebar_position',
				'label'		=> __( 'sidebar on left side' , 'nevercat' ),
				'section'	=> 'theme_settings',
				'type'		=> 'checkbox'
			)
		);
		
		/*
		 * make usage of off canvas menu customizable
		 */
		$wp_customize->add_setting('off_canvas', array(
				'default'	=> 1,
				'transport'	=> 'postMessage'
			)
		);
		$wp_customize->add_control(
			'off_canvas',
			array(
				'settings' => 'off_canvas',
				'label' => __( 'Use Off-Canvas-Menu', 'nevercat' ),
				'section' => 'nav',
				'type' => 'checkbox',
			)
		);
	}
}
add_action( 'customize_register', array( 'NeverCat_Customize', 'register' ));

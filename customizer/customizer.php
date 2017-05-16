
<?php

/**
 * The script for displaying Customization options.
 *
 * This is the customizer script for info quotes in content of the different pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @author Mtsa
 *
 */



//Este archivo contendrá las nuevas opciones de personalización de Apariencia>Personalizar
//Se llamará desde el archivo functions.php
//(TUTORIAL: http://blascarr.com/customize-en-wordpress/)


function customizer_interface($wp_customize){

    $wp_customize->add_section( 'Seccion_Sidebar', array(
        'title'     => __( 'Sidebars', 'BL' ),
        'description' => __( 'Add as many custom sidebars as you need' ),
        'priority'  => 0,
    ) );

        $wp_customize->add_setting( 'sidebars', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'mytheme_text_sanitization',
    ) );
    $wp_customize->add_control( new Multi_Input_Custom_Control( $wp_customize, 'sidebars', array(
        'label'       => __( 'Sidebars', 'BL' ),
        'type'        => 'multi_input',
        'section'     => 'Seccion_Sidebar',
    ) ) );


    //////LOGO///////
    $wp_customize->add_section('Seccion_Logo', array( 
        'title' => __('Título de página', 'BL'),
        'description'=> 'Direccion del establecimiento',
        'priority' => 10,
    ));

     $wp_customize->add_setting('Logo_Principal', array(
        'default' => __('Título', 'BL'), 
        'sanitize_callback' => 'my_sanitize_text_field',
    ));
     
      $wp_customize->add_control('Logo_Principal', array(
        'type' => 'text',
        'label' => __('Título Principal:', 'BL'),
        'section' => 'Seccion_Logo',
        'priority' => 1,
    ));  
    $wp_customize->add_setting('Logo_Secundario', array(
        'default' => __('Subtítulo', 'BL'), 
        'sanitize_callback' => 'my_sanitize_text_field',
    ));
     
      $wp_customize->add_control('Logo_Secundario', array(
        'type' => 'text',
        'label' => __('Título Secundario:', 'BL'),
        'section' => 'Seccion_Logo',
        'priority' => 1,
    ));  
    
    //////DIRECCIÓN///////

    $wp_customize->add_section('Seccion_Dir', array( 
        'title' => __('Direccion', 'BL'),
        'description'=> 'Direccion del establecimiento',
        'priority' => 10,
    ));

    $tipoVia = array('C/ ' => 'Calle', 'Tr. ' => 'Travesía', 'Avda. ' => 'Avenida', 'Ctra. ' => 'Carretera');

	$wp_customize->add_setting('TipoVia', array(
        'default' => __($tipoVia[0], 'BL'), 
        'sanitize_callback' => 'my_sanitize_text_field',
    ));
     
  $wp_customize->add_control('TipoVia', array(
        'type' => 'select',
		'choices' => $tipoVia ,
        'label' => __('Dirección:', 'BL'),
        'section' => 'Seccion_Dir',
        'priority' => 1,
    ));  

     $wp_customize->add_setting('Calle', array(
        'default' => __('De Ejemplo, nº 1', 'BL'), 
        'sanitize_callback' => 'my_sanitize_text_field',
    ));
     
     $wp_customize->add_control('Calle', array(
        'type' => 'text',
        'label' => __('', 'BL'),
        'section' => 'Seccion_Dir',
        'priority' => 1,
    ));  

    $wp_customize->add_setting('Localidad', array(
        'default' => __('Localidad (Ciudad)', 'BL'), 
        'sanitize_callback' => 'my_sanitize_text_field',
    ));
     
      $wp_customize->add_control('Localidad', array(
        'type' => 'text',
        'label' => __('Localidad:', 'BL'),
        'section' => 'Seccion_Dir',
        'priority' => 1,
    ));  


//////////////////////////////////////////////////

     $wp_customize->add_section('Seccion_Entrada', array( 
        'title' => __('Entradas', 'BL'),
        'description'=> 'Entradas de la página',
        'priority' => 2,
    ));

     $catEntrada = array('estandar' => 'Estandar', 'columnas' => 'Columnas', 'carta' => 'Carta');

       $wp_customize->add_setting('TipoEntrada', array(
        'default' => __($catEntrada[0], 'BL'), 
        'sanitize_callback' => 'my_sanitize_text_field',
    ));

	$wp_customize->add_control('TipoEntrada', array(
        'type' => 'select',
        'choices' => $catEntrada,
        'label' => __('Categoría:', 'BL'),
        'section' => 'Seccion_Entrada',
        'priority' => 1,
    ));  




}
    
add_action( 'customize_register', 'customizer_interface' );

  // SANITIZE CALBACKS -- funcion que limpia el input. Es necesaria para que funcione

  function my_sanitize_text_field( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
  }

add_action( 'customize_controls_enqueue_scripts', 'mytheme_customizer_control_toggle' );
add_action( 'customize_preview_init', 'mytheme_customizer_live_preview' );
/**
 * Live preview script enqueue
 *
 * @since 1.0.0
 */
function mytheme_customizer_live_preview() {
    wp_enqueue_script( 'mytheme-themecustomizer', get_template_directory_uri() . '/customizer/js/customizer.js?v=' . rand(), array( 'jquery', 'customize-preview' ), false );
}
/**
 * Custom contextual controls
 *
 * @since 1.0.0
 */
function mytheme_customizer_control_toggle() {
    wp_enqueue_script( 'mytheme-contextualcontrols', get_template_directory_uri() . '/customizer/js/customizer-contextual.js?v=' . rand(), array( 'customize-controls' ), false );
    wp_add_inline_style( 'customize-controls', '.wp-full-overlay-sidebar { background: #fff }' );
}


/////////////////////





?>

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




}
    
add_action( 'customize_register', 'customizer_interface' );

  // SANITIZE CALBACKS -- funcion que limpia el input. Es necesaria para que funcione

  function my_sanitize_text_field( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
  }


/////////////////////





?>
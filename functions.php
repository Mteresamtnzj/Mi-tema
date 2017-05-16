<?php //le decimos a wordpress que registre nuestro menú para poder modificarlo desde el panel de control de WP
	register_nav_menus(array(
		'menu' => 'Menu superior',
		//si queremos agregar otros menús, copiamos la línea amarilla y cambiamos el nombre del menú
		)
	);

	add_theme_support('post-thumbnails');
	//add_image_size('list_articles_thumbs', 300, 500,true) //sería para añadir tamaño estático, cogería el 300


//AÑADIR OPCIONES DE PERSONALIZACIÓN EN Apariencia>Personalizar (TUTORIAL: http://blascarr.com/customize-en-wordpress/)

function customizer_init() { //llamada al archivo necesario customizer.php 
 
   $themePath = get_template_directory() ;
 
   if (is_file($themePath.'/customizer/customizer.php')){
      require_once $themePath.'/customizer/customizer.php';
   }
}
customizer_init();

?>
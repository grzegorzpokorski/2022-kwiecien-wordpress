<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php wp_title('-', true, 'right'); ?>
		<?php bloginfo('name'); ?>
	</title>
	
	<?php wp_head(); ?>

</head>
<body>

	<?php get_template_part('template-parts/parts/navbar/navbar'); ?>

<?php

if( have_rows('logo', 'general_setting') ) {
	while( have_rows('logo', 'general_setting') ) {
		the_row();

		$first_part = get_sub_field('first_part');
		$second_part = get_sub_field('second_part');

		$first_classes = get_sub_field('first_color') . ' ' . get_sub_field('first_font_weight');
		$second_classes = get_sub_field('second_color') . ' ' . get_sub_field('second_font_weight');
	}
}

?>
<header class="navigation w-100 py-1 py-md-2" id="menu">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a href="<?php echo home_url(); ?>" class="navbar-brand mb-0">

				<?php if(is_front_page()): ?>
					<h1 class="h4 mb-0 text-primary navbar-title">
				<?php endif; ?>

					<?php if( !empty($first_part) && !empty($second_part) ): ?>
						<span class="<?php echo esc_attr($first_classes); ?>"><?php echo $first_part; ?></span><span class="<?php echo esc_attr($second_classes); ?>"><?php echo $second_part; ?></span>
					<?php else: ?>
						<span class="fw-bold"><?php echo bloginfo('name'); ?></span>
					<?php endif; ?>

				<?php if(is_front_page()): ?>
					</h1>
				<?php endif; ?>

			</a>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php
				if( has_nav_menu('primary_menu' )){
					wp_nav_menu( array(
						'menu'            => 'primary_menu',
						'theme_location'  => 'primary_menu',
						'container'       => false,
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav ms-auto',
						'depth'           => 2,
						'walker'          => new navwalker()
					) );
				}
				?>

				<?php if( get_field( 'display_button', 'general_setting' ) && get_field( 'button_link', 'general_setting' ) ): ?>
					<a href="<?php echo get_field( 'button_link', 'general_setting' ); ?>" class="btn btn-green py-05 ms-md-1">
						<?php echo get_field( 'button_label', 'general_setting' ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</nav>
</header>
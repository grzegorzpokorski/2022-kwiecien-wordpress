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

	<footer class="bg-white text-gray-light py-5">
		<div class="container">
			<div class="row d-flex flex-column flex-md-row align-items-center gap-3 text-center">
				<div class="col text-md-start">
					<a href="<?php echo home_url(); ?>">
						<h3 class="mb-0">

						<?php if( !empty($first_part) && !empty($second_part) ): ?>
							<span class="<?php echo esc_attr($first_classes); ?>"><?php echo $first_part; ?></span><span class="<?php echo esc_attr($second_classes); ?>"><?php echo $second_part; ?></span>
						<?php else: ?>
							<span class="fw-bold"><?php echo bloginfo('name'); ?></span>
						<?php endif; ?>

						</h3>
					</a>
				</div>
				<nav class="col">
<!-- 					<ul class="unstyled-list d-flex flex-column flex-md-row gap-1 mb-0">
						<li>
							<a href="#" class="text-gray-light">O mnie</a>
						</li>
						<li>
							<a href="#" class="text-gray-light">Oferta</a>
						</li>
						<li>
							<a href="#" class="text-gray-light">Realizacje</a>
						</li>
						<li>
							<a href="#" class="text-gray-light">Blog</a>
						</li>
						<li>
							<a href="#" class="text-gray-light">Kontakt</a>
						</li>
					</ul> -->
<?php 

if( has_nav_menu('primary_menu' )){
	wp_nav_menu( array(
		'menu'            => 'footer_menu',
		'menu_class'      => 'unstyled-list d-flex flex-column flex-md-row gap-1 mb-0 menu menu--footer',
		'theme_location'  => 'footer_menu',
		'container'       => false,
		'menu_id'         => false,
		'depth'           => 1
	) );
}

?>

				</nav>
				<div class="col text-md-end">
					<p>
						<?php $footer_content = get_field('content', 'general_setting'); ?>
						<?php echo bloginfo('name'); ?> &copy; <?php echo Date('Y'); ?>. <?php echo ($footer_content) ? $footer_content : ''; ?>
						Created by Grzegorz Pokorski.
					</p>
				</div>
			</div>
		</div>
	</footer>
	
	<?php wp_footer(); ?>

</body>
</html>
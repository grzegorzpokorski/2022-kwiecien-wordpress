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

	<footer class="bg-white text-gray-light py-5 border-top border-1">
		<div class="container">
			<div class="row d-flex flex-column flex-md-row align-items-center gap-2 text-center">
				<nav class="col order-2 order-md-1">

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
				<div class="col order-1 order-md-2">
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

				<?php if( have_rows('footer_social_items', 'general_setting') and get_field('footer_display_social_media', 'general_setting') ): ?>

				<div class="col order-4 order-md-3">
					<ul class="unstyled-list mb-0 d-flex flex-row flex-wrap gap-1 justify-content-center justify-content-md-end">

						<?php while( have_rows('footer_social_items', 'general_setting') ): the_row(); ?>

						<li>
							<a href="<?php echo esc_url( get_sub_field('link') ); ?>">
								<span class="sr-only">
									<?php echo get_sub_field('label'); ?>
								</span>
								<span class="fa <?php echo esc_attr( get_sub_field('icon') ); ?>" aria-hidden="true"></span>
							</a>
						</li>

						<?php endwhile; ?>
						
					</ul>
				</div>

				<div class="col-12 order-3 order-md-4">

				<?php else: ?>

				<div class="col order-3 order-md-4 text-md-end">

				<?php endif; ?>

		
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
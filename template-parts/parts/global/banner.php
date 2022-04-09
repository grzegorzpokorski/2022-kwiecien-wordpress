<?php 

$title = get_field('banner_title', 'general_setting');
$description = get_field('banner_description', 'general_setting');

?>

<section class="bg-green text-white py-4 py-md-6">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto text-center">

				<?php if( $title ): ?>
				<h2 class="text-white">
					<?php echo $title; ?>
				</h2>
				<?php endif; ?>

				<?php if( $description ): ?>
				<p>
					<?php echo $description; ?>
				</p>
				<?php endif; ?>

				<?php if( have_rows('banner_buttons', 'general_setting') ): ?>
				<div class="d-flex flex-wrap justify-content-center gap-05 mt-1">

					<?php

					while( have_rows('banner_buttons', 'general_setting') ):

					the_row();

					$label = ( get_sub_field('label') ) ? get_sub_field('label') : get_sub_field('link')['title'];
					$link = get_sub_field('link')['url'];
					$target = get_sub_field('link')['target'];
					$style = get_sub_field('style');

					?>

					<a href="<?php echo esc_url($link); ?>" class="btn btn-hero <?php echo esc_attr($style); ?>" <?php echo ( $target ) ? 'target="$target"' : ''; ?>>
						<?php echo $label ?>
					</a>
					<?php endwhile; ?>

				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
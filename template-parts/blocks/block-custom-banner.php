<?php 

$title = get_field('banner_title');
$description = get_field('banner_description');
$bg_color = get_field('bg_color');

?>

<section class="py-4 py-md-6 text-white <?php echo esc_attr($bg_color); ?>" id="<?php echo ( isset($block['anchor']) ) ? $block['anchor'] : $block['id']; ?>">
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

				<?php if( have_rows('banner_buttons') ): ?>
				<div class="d-flex flex-wrap justify-content-center gap-05 mt-1">

					<?php

					while( have_rows('banner_buttons') ):

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
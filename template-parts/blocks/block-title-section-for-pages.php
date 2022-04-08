<?php 

$title = get_field('title');
$heading_level = get_field('heading_level');
$description = get_field('description');
$image_id = get_field('image_id');
$reverse_content = (get_field('reverse_content')) ? 'flex-row-reverse' : '';

?>

<section class="pt-4 pb-6" id="<?php echo $block['id']; ?>">
	<div class="container">
		<div class="row d-flex align-items-center <?php echo esc_attr($reverse_content); ?>">
			<header class="col-12 col-md-6 text-center text-md-start">

				<?php if( $title ): ?>
				<<?php echo $heading_level; ?> class="h1">
					<?php echo $title; ?>
				</<?php echo $heading_level; ?>>
				<?php endif; ?>

				<?php if( $description ): ?>
				<div>
					<?php echo $description; ?>
				</div>
				<?php endif; ?>

				<?php if( have_rows('buttons') ): ?>
				<div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-05 mt-1">

					<?php

					while( have_rows('buttons') ):

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

			</header>

			<?php if( $image_id ): ?>
			<figure class="col-12 col-md-6 mt-2 mt-md-0 mb-0">
				<?php echo wp_get_attachment_image($image_id, "size_medium", "", array("class" => "img-fluid")); ?>
			</figure>
			<?php endif; ?>

		</div>
	</div>
</section>
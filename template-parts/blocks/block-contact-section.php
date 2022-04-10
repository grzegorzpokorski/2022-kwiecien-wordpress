<?php 

$heading = get_field('heading');
$title = get_field('title');
$heading_level = get_field('heading_level');
$description = get_field('description');
$content = get_field('content');
$contact_form = get_field('contact_form');
$bg_color = get_field('bg_color');

?>

<section class="py-4 py-md-6  <?php echo esc_attr($bg_color); ?>" id="<?php echo ( isset($block['anchor']) ) ? $block['anchor'] : $block['id']; ?>">
	<div class="container">
		<div class="row d-flex align-items-center">
			<header class="col-12 col-md-8 mb-4">

				<?php if( $heading ): ?>
				<span class="d-block text-green text-uppercase fw-bold mb-05">
					<?php echo $heading; ?>
				</span>
				<?php endif; ?>

				<?php if( $title ): ?>
				<<?php echo $heading_level; ?> class="h2">
					<?php echo $title; ?>
				</<?php echo $heading_level; ?>>
				<?php endif; ?>

				<?php if( $description ): ?>
				<div>
					<?php echo $description; ?>
				</div>
				<?php endif; ?>

			</header>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 custom-content">
				<?php if( $contact_form ): ?>
				<?php echo do_shortcode($contact_form); ?>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-6 custom-content">
				<?php if( $content ): ?>
				<?php echo $content; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
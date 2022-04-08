<?php 

$heading = get_field('heading');
$title = get_field('title');
$heading_level = get_field('heading_level');
$description = get_field('description');
$content = get_field('content');
$bg_color = get_field('bg_color');
$columns = ( get_field('columns') ) ? 'custom-content--col-' . get_field('columns') : 'custom-content--col-1';

?>

<section class="py-4 py-md-6  <?php echo esc_attr($bg_color); ?>" id="<?php echo ( isset($block['anchor']) ) ? $block['anchor'] : $block['id']; ?>">
	<div class="container">
		<div class="row">
			<header class="col-12">

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

			<?php if( $content ): ?>
			<div class="custom-content <?php echo esc_attr($columns); ?> mt-2">
				<?php echo $content; ?>
			</div>
			<?php endif; ?>

		</div>
	</div>
</section>
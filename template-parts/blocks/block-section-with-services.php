<?php 

$heading = get_field('heading');
$title = get_field('title');
$heading_level = get_field('heading_level');
$description = get_field('description');
$bg_color = get_field('bg_color');

?>

<section class="py-4 py-md-6  <?php echo esc_attr($bg_color); ?>" id="<?php echo $block['id']; ?>">
	<div class="container">
		<div class="row d-flex align-items-center">
			<header class="col-12 col-md-8 mx-auto text-center">

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

				<?php if( have_rows('buttons') ): ?>
				<div class="d-flex flex-wrap justify-content-start gap-05 mt-1">

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

			<?php if( have_rows('items') ): ?>
			<div class="col-12">
				<ul class="row align-items-stretch justify-content-center mt-4 mt-md-6 list">

					<?php while( have_rows('items') ): the_row(); ?>
					<li class="col-12 col-md-4 list__item">
						<article class="d-flex flex-column gap-1 bg-white p-2 border border-2 border-green-light shadow h-100">
							<header class="d-flex gap-1 align-items-center">

								<?php if( get_sub_field('icon') ): ?>
								<span class="bg-green list__icon-wrapper">
									<span class="<?php echo esc_attr( get_sub_field('icon') ); ?> list__icon" aria-hidden="true"></span>
								</span>
								<?php endif; ?>

								<?php if( get_sub_field('name') ): ?>
								<h3 class="mb-0">
									<?php echo get_sub_field('name'); ?>
								</h3>
								<?php endif; ?>

							</header>
							
							<?php if( get_sub_field('description') ): ?>
							<div>
								<?php echo get_sub_field('description'); ?>
							</div>
							<?php endif; ?>

						</article>
					</li>
					<?php endwhile; ?>

				</ul>
			</div>
			<?php endif; ?>

		</div>
	</div>
</section>
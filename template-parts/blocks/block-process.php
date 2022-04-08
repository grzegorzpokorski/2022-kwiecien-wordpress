<?php 

$heading = get_field('heading');
$title = get_field('title');
$heading_level = get_field('heading_level');
$description = get_field('description');
$bg_color = get_field('bg_color');

?>

<section class="py-4 py-md-6 <?php echo esc_attr($bg_color); ?>" id="<?php echo ( isset($block['anchor']) ) ? $block['anchor'] : $block['id']; ?>">
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

			</header>

			<?php if( have_rows('items') ): ?>
			<div class="col-12">
				<ul class="row mt-3 process">

					<?php while( have_rows('items') ): the_row(); ?>
					<li class="d-flex flex-column process__item">
						<article class="col-10 col-md-5 process__inner bg-white shadow p-2">
							<header class="d-flex flex-row process__header">

								<span class="h3 text-green me-1 process__counter"></span>

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
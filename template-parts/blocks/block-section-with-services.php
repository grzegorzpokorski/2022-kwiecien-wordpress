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

								
								<?php 

								if( get_sub_field('add_link') and get_sub_field('link') ){
									echo "<a href='" . get_sub_field('link') . "'>";
								}

								?>
								
								<?php if( get_sub_field('name') ): ?>
								<h3 class="mb-0">
									<?php echo get_sub_field('name'); ?>
								</h3>
								<?php endif; ?>

								<?php 

								if( get_sub_field('add_link') and get_sub_field('link') ){
									echo "</a>";
								}

								?>

								

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
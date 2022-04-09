<?php 

$heading = get_field('heading');
$title = get_field('title');
$heading_level = get_field('heading_level');
$description = get_field('description');
$bg_color = get_field('bg_color');
$custom_button_label = get_field('custom_button_label');

?>

<?php 
			
$the_query = new WP_Query( array(
	'posts_per_page' => 3,
)); 

?>

<?php if ( $the_query->have_posts() ) : ?>

<section class="py-4 py-md-6 <?php echo esc_attr($bg_color); ?>" id="<?php echo ( isset($block['anchor']) ) ? $block['anchor'] : $block['id']; ?>">
	<div class="container">
		<div class="row">
			<header class="col-12 col-md-8">

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
				
			<div class="col-12">
				<ul class="row align-items-stretch justify-content-center mt-3 list">

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<li class="col-12 col-md-4 list__item">
							<article class="d-flex flex-column bg-white border border-2 border-green-light shadow-sm h-100">
								
								<?php if(has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>">
									<figure class="figure figure--article figure--scale">
										<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'size_medium', "", array("class" => "figure__image")); ?>
									</figure>
								</a>
								<?php endif; ?>

								<div class="p-2 d-flex flex-column gap-1">
									
									<?php $categories = get_the_category(); if($categories): ?>
										<div class="d-flex flex-row gap-1">

										<?php foreach($categories as $category): ?>
										<a href="<?php echo esc_url(get_tag_link($category->term_id)); ?>">
											<?php echo esc_html($category->name); ?>
										</a>
										<?php endforeach; ?>

										</div>
									<?php endif; ?>

									<a href="<?php the_permalink(); ?>">
										<h3 class="mb-0">
											<?php the_title(); ?>
										</h3>
									</a>
									<p>
										<?php echo get_the_excerpt(); ?>
									</p>
								</div>
							</article>
						</li>

					<?php endwhile; ?>

				</ul>
			</div>
			<footer class="col-12 text-center pt-2 pt-md-3">
				<a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn-green">
					<?php echo ( $custom_button_label ) ? $custom_button_label : 'Wszystkie wpisy'; ?>
				</a>
			</footer>
		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>
<?php endif; ?>
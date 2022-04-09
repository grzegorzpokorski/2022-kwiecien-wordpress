<?php 
			
$the_query = new WP_Query( array(
	'post_type'      => 'post',
	'post__not_in'   => array( $args['current_post_id'] ),
	'posts_per_page' => $args['number_of_posts'],
	'category__in'   =>	$args['categories'],
	'orderby'        => 'rand',

)); 

?>

<?php if( $the_query->have_posts() ): ?>

<section class="py-4 py-md-6 border-green-light">
	<div class="container">
		<div class="row">

			<header class="col-12 col-md-8">

				<?php if( $args['heading'] ): ?>
				<span class="d-block text-green text-uppercase fw-bold mb-05">
					<?php echo $args['heading']; ?>
				</span>
				<?php endif; ?>

				<?php if( $args['title'] ): ?>
				<h2>
					<?php echo $args['title']; ?>
				</h2>
				<?php endif; ?>

			</header>

			<div class="col-12">
				<ul class="row align-items-stretch justify-content-center mt-3 list">

					<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

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
		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>
<?php endif; ?>
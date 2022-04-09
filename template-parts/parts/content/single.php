<?php if(have_posts()): ?>

	<main id="main" class="bg-white">

	<?php while(have_posts()): the_post(); ?>

		<header class="bg-white py-4 py-md-6 single">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-9 mx-auto">
						<span class="d-flex flex-row align-items-center mb-1">
							
							<?php if( get_the_category() ): $category = get_the_category()[0]; ?>

							<a href="<?php echo esc_url( get_tag_link($category->term_id) ); ?>">
								<?php echo esc_html($category->name); ?>
							</a>

							<span class="text-separator" aria-hidden="true"></span>

							<?php endif; ?>

							<time datetime="<?php echo get_the_date('Y.m.d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
						</span>
						<h1 class="mb-0">
							<?php the_title(); ?>
						</h1>
					</div>

					<?php if( has_post_thumbnail() ): ?>
					<figure class="col-12 col-md-9 mx-auto mt-3 figure figure--single-header">
						<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'size_large', '', array('class' => 'figure__image') ); ?>
					</figure>
					<?php endif; ?>

				</div>
			</div>
		</header>

		<article class="pb-4 pb-md-6">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-7 mx-auto custom-content">
						<?php the_excerpt(); ?>
						<?php the_content(); ?>	
					</div>
					<footer class="col-12 col-md-7 mx-auto">

						<?php if( get_the_tags() ): $tags = get_the_tags(); ?>
						<ul class="d-flex flex-row flex-wrap gap-05 mt-2 list">
						
							<?php foreach($tags as $tag): ?>
							<?php //print_r($tag); ?>
							<li>
								<a href="<?php echo esc_url( get_tag_link($tag->term_id) ); ?>" class="btn btn-sm btn-white-green border-1 border-green">
									<?php echo esc_html($tag->name); ?>
								</a>
							</li>
							<?php endforeach; ?>

						</ul>
						<?php endif; ?>

					</footer>
				</div>
			</div>
		</article>

	<?php endwhile; ?>

	</main>

	<?php if( get_field('display_section_with_related_posts') ): ?>
	<?php

	get_template_part(
		'template-parts/parts/global/related-posts',
		'',
		array(
			'heading'         => get_field('related_heading'),
			'title'           => get_field('related_title'),
			'current_post_id' => get_the_ID(),
			'categories'      => get_field('related_categories'),
			'number_of_posts' => get_field('related_number_of_posts'),
		) 
	);

	?>
	<?php endif; ?>

	<?php if( get_field('display_section_with_banner') ): ?>
	<?php get_template_part( 'template-parts/parts/global/banner' ); ?>
	<?php endif; ?>

<?php else : ?>

<!-- brak tresci -->

<?php endif; ?>
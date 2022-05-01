<?php if(have_posts()): ?>

<main id="main">

	<section class="bg-white-green py-6">
		<div class="container">
			<div class="row">
				<header class="col-12 col-md-8">

					<?php

					if( is_archive() ){
						echo "<h1 class='h2'>" . get_the_archive_title() . "</h1>";
					}
					elseif( is_home() ){
						$title = wp_title('', false);

						if( get_field('blog_title', 'general_setting') ){
							$title = get_field('blog_title', 'general_setting');
						}

						echo "<h1 class='h2'>" . $title . "</h1>";
					}
					else{
						echo "<h1 clas=='h2'>" . wp_title('', false) . "</h1>";
					} ?>

					<?php if( get_the_archive_description() ): ?>
					<p>
						<?php echo wp_strip_all_tags( get_the_archive_description() ); ?>
					</p>

					<?php elseif( get_field('blog_description', 'general_setting') ): ?>

					<p>
						<?php echo get_field('blog_description', 'general_setting'); ?>
					</p>
					<?php endif; ?>

				</header>

				<?php if( have_posts() ): ?>

				<div class="col-12">
					<ul class="row align-items-stretch justify-content-start mt-6 list">

						<?php while(have_posts()): the_post(); ?>

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

				<?php endif; ?>

				<footer class="col-12 text-center pt-3">
					<nav class="d-flex flex-row gap-05 justify-content-center">

						<?php if(get_next_posts_link()): ?>

						<a href="<?php echo get_next_posts_page_link(); ?>" class="btn btn-green">
							Starsze
						</a>

						<?php endif; if(get_previous_posts_link()): ?>

						<a href="<?php echo get_previous_posts_page_link(); ?>" class="btn btn-green">
							Nowsze
						</a>

						<?php endif; ?>

					</nav>
				</footer>
			</div>
		</div>
	</section>

</main>

<?php endif; ?>
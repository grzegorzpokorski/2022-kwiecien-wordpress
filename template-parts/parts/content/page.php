<?php if(have_posts()): ?>

<?php if( !is_archive() and !is_page('kontakt') ): ?>
<main id="main" class="bg-white">
<?php else: ?>
<main id="main">
<?php endif; ?>


<?php while(have_posts()): the_post(); ?>

	<?php the_content(); ?>

	<?php if( get_field('display_section_with_banner') ): ?>
	<?php get_template_part('template-parts/parts/global/banner'); ?>
	<?php endif; ?>

<?php endwhile; ?>

</main>

<?php else : ?>

<!-- brak tresci -->

<?php endif; ?>
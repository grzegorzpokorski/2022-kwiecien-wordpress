<?php if(have_posts()): ?>

<?php if( !is_archive() ): ?>
<main id="main" class="bg-white">
<?php else: ?>
<main id="main">
<?php endif; ?>


<?php while(have_posts()): the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

</main>

<?php else : ?>

<!-- brak tresci -->

<?php endif; ?>
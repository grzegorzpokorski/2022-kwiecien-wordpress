<?php if(have_posts()): ?>

<main id="main" class="bg-white">

<?php while(have_posts()): the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

</main>

<?php else : ?>

<!-- brak tresci -->

<?php endif; ?>
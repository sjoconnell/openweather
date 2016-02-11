<?php 

/* Template Name: Homepage */ 
include 'create-pages.php';

?>

<?php while (have_posts()) : the_post(); ?>

    <ul>
        <?php wp_list_pages( 'exclude=5' ); ?>
    </ul>

<?php endwhile; ?>
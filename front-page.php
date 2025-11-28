<?php 
/* 
Template Name: Strona Główna
Template Post Type: page
*/
get_header();?>

<main>
    <?php get_template_part('includes/section', 'hero');?>
    <?php get_template_part('includes/section', 'desc');?>
    <?php get_template_part('includes/section', 'advantages');?>

    <?php get_template_part('includes/section', 'galleries');?>
</main>

<?php get_footer(); ?>
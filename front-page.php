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
    <?php get_template_part('includes/section', 'cta', [
        'data' => get_fields()['cta1'],
        'mode' => 1
    ]);?>

    <?php get_template_part('includes/section', 'cta', [
        'data' => get_fields()['cta2'],
        'mode' => 2
    ]);?>

    <?php get_template_part('includes/section', 'galleries');?>
</main>

<?php get_footer(); ?>
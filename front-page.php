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
    <?php get_template_part('includes/section', 'map');?>
    <?php get_template_part('includes/section', 'numbers');?>
    <?php get_template_part('includes/section', 'directions');?>
    <?php get_template_part('includes/section', 'offer');?>
    <?php get_template_part('includes/section', 'houses');?>
    <?php get_template_part('includes/section', 'cta', [
        'data' => get_fields()['cta2'],
        'mode' => 2
    ]);?>
    <?php get_template_part('includes/section', 'about');?>
    <?php get_template_part('includes/section', 'galleries');?>
    <?php get_template_part('includes/section', 'contact');?>
</main>

<?php get_footer(); ?>
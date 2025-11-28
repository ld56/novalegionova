<section class="ptb140 houses">
    <div class="wrapper">
        <h2 class="fz fz--44 c-charcoal fw-500 houses__main-heading">
            <?php echo esc_html(remove_orphans(get_fields()['houses']['heading'])); ?>
        </h2>
        <div class="fz fz--18 c-gray-888 houses__text">
            <?php echo wp_kses(remove_orphans(get_fields()['houses']['text']), tags_for_wysiwyg()); ?>
        </div>

        <div class="row">

            <div class="col col-6-t2">
                <?php get_template_part('components/component', 'houses-card', [
                    'key' => 'house1'
                ]);?>
            </div>

            <div class="col col-6-t2">
                <?php get_template_part('components/component', 'houses-card', [
                    'key' => 'house2'
                ]);?>
            </div>

        </div>

    </div>
</section>
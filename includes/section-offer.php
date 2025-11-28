<section class="ptb140 bgc-accent offer">
    <div class="wrapper">
        <h2 class="fz fz--44 fw-500 offer__heading">
            <?php echo esc_html(get_fields()['offer']['heading']); ?>
        </h2>
        <div class="fz fz--18 c-gray-888 offer__text">
            <?php echo wp_kses(remove_orphans(get_fields()['offer']['text']), tags_for_wysiwyg()); ?>
        </div>

        <div class="row offer__first-row">

            <div class="col col-6-t2">
                <?php if (get_fields()['offer']['ground']['mockup']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['offer']['ground']['mockup']['id'], 'full', false, [
                        'class' => 'img',
                        'loading' => false,
                        'sizes' => '(max-width: 1279px) 100vw, 50vw',
                    ]); ?>
                <?php endif; ?>
            </div>
            
            <div class="col col-5-t2 offer__text-content">

                <h3 class="fz fz--32 fw-500 offer__title">
                    <?php echo esc_html(get_fields()['offer']['ground']['title']); ?>
                </h3>
                <div class="fz fz--18 c-gray-888 offer__text">
                    <?php echo wp_kses(remove_orphans(get_fields()['offer']['ground']['desc']), tags_for_wysiwyg()); ?>
                </div>
                <?php
                $text = get_fields()['offer']['ground']['area'];                // full string
                $pattern = '/([0-9]+[.,][0-9]+)\s*m²/';                         // capture area value

                if (preg_match($pattern, $text, $match)) {
                    $value = $match[1];                                         // number only
                    $label = str_replace($match[0], '', $text);                 // text without area
                }
                ?>

                <p class="fz fz--20 offer__area">
                    <?php echo esc_html(trim($label)); ?>
                    <span class="fw-500"><?php echo esc_html($value . ' m²'); ?></span>
                </p>

            </div>
        
        </div>

        <div class="row offer__second-row">
            
            <div class="col col-5-t2 offer__text-content">

                <h3 class="fz fz--32 fw-500 offer__title">
                    <?php echo esc_html(get_fields()['offer']['floor']['title']); ?>
                </h3>
                <div class="fz fz--18 c-gray-888 offer__text">
                    <?php echo wp_kses(remove_orphans(get_fields()['offer']['floor']['desc']), tags_for_wysiwyg()); ?>
                </div>
                <?php
                $text = get_fields()['offer']['floor']['area'];                // full string
                $pattern = '/([0-9]+[.,][0-9]+)\s*m²/';                         // capture area value

                if (preg_match($pattern, $text, $match)) {
                    $value = $match[1];                                         // number only
                    $label = str_replace($match[0], '', $text);                 // text without area
                }
                ?>

                <p class="fz fz--20 offer__area">
                    <?php echo esc_html(trim($label)); ?>
                    <span class="fw-500"><?php echo esc_html($value . ' m²'); ?></span>
                </p>

            </div>

            <div class="col col-6-t2">
                <?php if (get_fields()['offer']['floor']['mockup']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['offer']['floor']['mockup']['id'], 'full', false, [
                        'class' => 'img',
                        'loading' => false,
                        'sizes' => '(max-width: 1279px) 100vw, 50vw',
                    ]); ?>
                <?php endif; ?>
            </div>
        
        </div>

    </div>
</section>
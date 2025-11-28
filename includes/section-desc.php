<section class="mtb140 desc">
    <div class="wrapper desc__wrapper">

        <div class="row desc__row1">
            
        <div class="col col-5-d1 desc__imgwrap1">
            <?php if (get_fields()['desc']['first-row']['image']) : ?>
                <?php echo wp_get_attachment_image(get_fields()['desc']['first-row']['image']['id'], 'full', false, [
                    'class' => 'img desc__img1',
                    'loading' => 'lazy',
                    'sizes' => '(max-width: 1279px) 95vw, (max-width: 1439px) 40vw, 555px',
                ]); ?>
            <?php endif; ?>
        </div>

            <div class="col col-6-d1 desc__text1">
                <h2 class="fz fz--44 fw-500 c-charcoal desc__heading1">
                    <?php echo esc_html(remove_orphans(get_fields()['desc']['first-row']['tc']['heading'])); ?>
                </h2>

                <div class="fz fz--18 c-gray-888 desc__wysiwyg">
                    <?php echo wp_kses(remove_orphans(get_fields()['desc']['first-row']['tc']['text']), tags_for_wysiwyg()); ?>
                </div>
            </div>
        </div>

        <div class="row desc__row2">

            <div class="col col-6-d1 desc__text2">
                <h2 class="fz fz--32 fw-500 c-charcoal desc__heading2">
                    <?php echo esc_html(remove_orphans(get_fields()['desc']['second-row']['tc']['heading'])); ?>
                </h2>

                <div class="fz fz--18 c-gray-888 desc__wysiwyg">
                    <?php echo wp_kses(remove_orphans(get_fields()['desc']['second-row']['tc']['text']), tags_for_wysiwyg()); ?>
                </div>
            </div>

            <div class="col col-6-d1 desc__imgwrap2">
                <?php if (get_fields()['desc']['second-row']['image']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['desc']['second-row']['image']['id'], 'full', false, [
                        'class' => 'img desc__img2',
                        'loading' => 'lazy',
                        'sizes' => '(max-width: 1279px) 95vw, (max-width: 1439px) 40vw, 576px',
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
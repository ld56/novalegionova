<section class="mtb140 about">
    <div class="wrapper about__wrapper">

        <div class="row about__row1">

            <div class="col col-6-t2 about__text1">
                <h2 class="fz fz--44 fw-500 c-charcoal about__heading1">
                    <?php echo esc_html(remove_orphans(get_fields()['about']['first-row']['tc']['heading'])); ?>
                </h2>

                <div class="fz fz--18 c-gray-888 about__wysiwyg">
                    <?php echo wp_kses(remove_orphans(get_fields()['about']['first-row']['tc']['text']), tags_for_wysiwyg()); ?>
                </div>
            </div>
            
            <div class="col col-5-t2 about__imgwrap1">
                <?php if (get_fields()['about']['first-row']['image']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['about']['first-row']['image']['id'], 'full', false, [
                        'class' => 'img about__img1',
                        'loading' => 'lazy',
                        'sizes' => '(max-width: 991px) 95vw, (max-width: 1439px) 40vw, 555px',
                    ]); ?>
                <?php endif; ?>
            </div>

        </div>

        <div class="row about__row2">

            <div class="col col-7-t2 about__imgwrap2">
                <?php if (get_fields()['about']['second-row']['image1']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['about']['second-row']['image1']['id'], 'full', false, [
                        'class' => 'img about__img2-1',
                        'loading' => 'lazy',
                        'sizes' => '(max-width: 991px) 95vw, (max-width: 1439px) 31vw, 440px',
                    ]); ?>
                <?php endif; ?>
                <div class="about__imgwrap-inside2">
                    <?php if (get_fields()['about']['second-row']['image2']) : ?>
                        <?php echo wp_get_attachment_image(get_fields()['about']['second-row']['image2']['id'], 'full', false, [
                            'class' => 'img about__img2-2',
                            'loading' => 'lazy',
                            'sizes' => '(max-width: 991px) 95vw, (max-width: 1439px) 31vw, 440px',
                        ]); ?>
                    <?php endif; ?>
                    <?php if (get_fields()['about']['second-row']['image3']) : ?>
                        <?php echo wp_get_attachment_image(get_fields()['about']['second-row']['image3']['id'], 'full', false, [
                            'class' => 'img about__img2-3',
                            'loading' => 'lazy',
                            'sizes' => '(max-width: 991px) 95vw, (max-width: 1439px) 31vw, 440px',
                        ]); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col col-4-t2 about__text2">
                <h2 class="fz fz--32 fw-500 c-charcoal about__heading2">
                    <?php echo esc_html(remove_orphans(get_fields()['about']['second-row']['tc']['heading'])); ?>
                </h2>

                <div class="fz fz--18 c-gray-888 about__wysiwyg">
                    <?php echo wp_kses(remove_orphans(get_fields()['about']['second-row']['tc']['text']), tags_for_wysiwyg()); ?>
                </div>
            </div>

        </div>

    </div>
</section>
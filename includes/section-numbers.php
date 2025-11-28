<div class="ptb80 bgc-charcoal numbers">
    <div class="wrapper">
        <div class="row numbers__main-row">
            <div class="col col-4-t2 numbers__left">
                <?php if (get_fields()['numbers']['image']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['numbers']['image']['id'], 'full', false, [
                        'class' => 'img numbers__image',
                        'loading' => false,
                        'sizes' => '(max-width: 1279px) 100vw, 50vw',
                    ]); ?>
                <?php endif; ?>
            </div>

            <div class="col col-7-t2 numbers__right">
                <div class="row numbers__cell-row">
                    <?php if (get_fields()['numbers']['numbers']) : ?>
                        <?php foreach (get_fields()['numbers']['numbers'] as $number) : ?>
                            <div class="col col-6-t2 col-4-d1 numbers__cell">
                                <p class="numbers__data">
                                    <span class="fz fz--72-2 c-white fw-500 numbers__value">
                                        <?php echo esc_html(remove_orphans($number['number'])); ?><span class="fz fz--32 c-white fw-500 numbers__unit"><?php echo esc_html(remove_orphans($number['unit'])); ?></span>
                                    </span>
                                </p>
                                    </span>
                                <p class="fz fz--18 c-gray-888 numbers__text">
                                    <?php echo esc_html($number['text']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
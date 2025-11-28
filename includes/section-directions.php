<section class="ptb140 directions">
    <div class="wrapper">
        <div class="row directions__row">
            <div class="col col-5-t2 directions__left">
                <h2 class="fz fz--44 c-charcoal fw-500 directions__heading">
                    <?php echo esc_html(remove_orphans(get_fields()['directions']['left']['heading'])); ?>
                </h2>
                <div class="wysiwyg fz fz--18 c-gray-888  directions__text">
                    <?php echo wp_kses(remove_orphans(get_fields()['directions']['left']['text']), tags_for_wysiwyg()); ?>
                </div>
            </div>
            <div class="col col-5-t2 directions__right">
                <?php if (get_fields()['directions']['image']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['directions']['image']['id'], 'full', false, [
                        'class' => 'img directions__image',
                        'loading' => 'lazy',
                        'sizes' => '(max-width: 1279px) 100vw, 50vw',
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="ptb58 cta">
    <div class="wrapper">

        <div class="cta__box">
            <?php if ($args['data']['image']) : ?>
                <?php echo wp_get_attachment_image($args['data']['image']['id'], 'full', false, [
                    'class' => 'img cta__bg',
                    'loading' => 'lazy',
                    'sizes' => '(max-width: 1279px) 100vw, 50vw',
                ]); ?>
            <?php endif; ?>

            <div class="cta__layer cta__layer--<?php echo $args['mode'] == 1 ? '1' : '2'; ?>"></div>

            <div class="cta__content">
                
                <h2 class="fz fz--48 fw-500 <?php echo $args['mode'] == 1 ? 'c-charcoal' : 'c-white'; ?> cta__heading">
                    <?php echo esc_html(remove_orphans($args['data']['heading'])); ?>
                </h2>
                <div class="wysiwyg fz fz--20 fw-500 m cta__text <?php echo $args['mode'] == 1 ? 'c-charcoal' : 'c-white'; ?>">
                    <?php echo wp_kses(remove_orphans($args['data']['text']), tags_for_wysiwyg()); ?>
                </div>

                <?php 
                    $link = $args['data']['button'];
                    if( isset($link['url']) ) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    }
                ?>
                <?php if ( isset($link['url']) ) : ?>
                    <a class="btn<?php echo $args['mode'] == 1 ? ' btn--charcoal ' : ' '; ?>cta__btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
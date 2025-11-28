<section class="ptb140 map">
    <div class="wrapper">
        <div class="row">

            <div class="col col-6-d1 map__left">
                <h2 class="fz fz--44 fw-500 map__heading">
                    <?php echo esc_html(remove_orphans(get_fields()['map']['text']['heading'])); ?>
                </h2>
                <div class="fz fz--18 c-gray-888 map__text">
                    <?php echo wp_kses(remove_orphans(get_fields()['map']['text']['text']), tags_for_wysiwyg()); ?>
                </div>

                <ul class="map__ul">
                    <?php if (get_fields()['map']['text']['bullets']) : ?>
                        <?php foreach (get_fields()['map']['text']['bullets'] as $bullet) : ?>
                            <li class="fz fz--18 map__li">
                                <?php echo esc_html($bullet['text']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <?php 
                    $link = get_fields()['map']['text']['button'];
                    if( isset($link['url']) ) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    }
                ?>
                <?php if ( isset($link['url']) ) : ?>
                    <a class="btn btn--charcoal map__btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="col col-6-d1">
                <?php if (get_fields()['map']['map']) : ?>
                    <?php echo wp_get_attachment_image(get_fields()['map']['map']['id'], 'full', false, [
                        'class' => 'img',
                        'loading' => false,
                        'sizes' => '(max-width: 1279px) 100vw, 50vw',
                    ]); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
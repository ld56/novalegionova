<section class="hero">

    <?php if (get_fields()['hero']['background']) : ?>
        <?php echo wp_get_attachment_image(get_fields()['hero']['background']['id'], 'full', false, [
            'class' => 'img hero__image',
            'loading' => false,
            'sizes' => '100vw',
        ]); ?>
    <?php endif; ?>

    <div class="hero__layer"></div>

    <div class="wrapper hero__wrapper">

        <div class="hero__content">

            <h1 class="fz fz--64 fw-500 c-white hero__heading">
                <?php echo esc_html(get_fields()['hero']['heading']); ?>
            </h1>

            <p class="fz fz--20 c-white hero__text">
                <?php echo wp_kses(remove_orphans(get_fields()['hero']['text']), tags_for_textarea()); ?>
            </p>

            <?php 
                $link = get_fields()['hero']['button'];
                if( isset($link['url']) ) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }
            ?>
            <?php if ( isset($link['url']) ) : ?>
                <a class="btn hero__btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a>
            <?php endif; ?>

        </div>

    </div>

</section>


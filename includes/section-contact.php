<?php 
$general = get_fields('options')['global']['general'];
?>

<section id="kontakt" class="ptb140 contact">
    <div class="wrapper">
        <h2 class="fz fz--44 fw-500 c-charcoal contact__heading">
            <?php echo esc_html(remove_orphans(get_fields()['contact']['heading'])); ?>
        </h2>

        <div class="contact__main">

            <div class="bgc-green-light contact__left">

                <h3 class="fz fz--32 c-charcoal fw-500 contact__heading3">
                    <?php echo esc_html(get_fields()['contact']['left']['heading']); ?>
                </h3>

                <div class="contact__cells">
                    <div class="contact__cell contact__addresss">
                        <h4 class="fz fz--20 c-gray-888 fw-400 contact__title">
                            Adres inwestycji
                        </h4>
                        <p class="fz fz--18 c-charcoal fw-400 tdn contact__text-content">
                            <?php echo esc_html(remove_orphans($general['address']['address'])); ?>
                        </p>
                    </div>

                    <div class="contact__cell contact__contact">
                        <h4 class="fz fz--20 c-gray-888 fw-400 contact__title">
                            Dane kontaktowe
                        </h4>
                        <p class="fz fz--18 c-charcoal fw-400 tdn contact__text-content">
                            <?php echo remove_orphans($general['sales-office']['person-in-charge']); ?>
                        </p>
                        <div class="contact__links">
                            <?php 
                                $link = $general['sales-office']['tel'];
                                if( isset($link['url']) ) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                }
                            ?>
                            <?php if ( isset($link['url']) ) : ?>
                                <a class="fz fz--18 c-charcoal fw-400 tdn contact__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                </a>
                            <?php endif; ?>
                            <?php 
                                $link = $general['sales-office']['email'];
                                if( isset($link['url']) ) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                }
                            ?>
                            <?php if ( isset($link['url']) ) : ?>
                                <a class="fz fz--18 c-charcoal fw-400 tdn contact__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ($general['socials']['socials']) : ?>
                    <div class="contact__cell contact__socials">
                        <h4 class="fz fz--20 c-gray-888 fw-400 contact__title">
                            Social media
                        </h4>
                        <div class="sm-buttons">
                            <?php foreach ($general['socials']['socials'] as $social) : ?>
                                <?php 
                                    $link = $social['link'];
                                    if( isset($link['url']) ) {
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    }
                                ?>
                                <?php if ( isset($link['url']) ) : ?>
                                    <a class="sm-buttons__button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>">
                                        <div class="svg sm-buttons__icon" style="background-image: url('<?php echo $social['icon']['url']; ?>');">
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="contact__right">
                <h3 class="fz fz--32 c-charcoal fw-500 contact__heading3">
                    <?php echo esc_html(get_fields()['contact']['right']['heading']); ?>
                </h3>
                <div class="inquiry-form">
                    <?php echo do_shortcode( get_fields()['contact']['right']['shortcode'] ); ?>
                </div>
            </div>

        </div>
    </div>
</section>
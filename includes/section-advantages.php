<section class="ptb140 bgc-gray-f5f advantages">

    <div class="wrapper">

        <h2 class="fz fz--44 fw-500 advantages__heading">
            <?php echo get_fields()['advantages']['heading']; ?>
        </h2>

        <div class="row advantages__row">

            <?php if (get_fields()['advantages']['advantages']) : ?>

                <?php foreach (get_fields()['advantages']['advantages'] as $advantage) : ?>

                    <div class="col col-6-t1 col-4-d1 advantages__advantage">

                        <div class="advantages__top">
                            <div class="bgc-green-light advantages__iconbox">
                                <div class="svg advantages__icon" style="background-image: url('<?php echo $advantage['icon']['url']; ?>');"></div>
                            </div>

                            <h3 class="fz fz--20 fw-500 c-charcoal advantages__title">
                                <?php echo esc_html($advantage['title']); ?>
                            </h3>
                        </div>

                        <p class="fz fz--16 c-gray-888 advantages__text">
                            <?php echo wp_kses(remove_orphans($advantage['text']), tags_for_textarea()); ?>
                        </p>

                    </div>

                <?php endforeach; ?>
            
            <?php endif; ?>
            
        </div>

    </div>
</section>
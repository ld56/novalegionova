<?php if (get_fields()['galleries']['visualization'] || get_fields()['galleries']['progress']) : ?>
<section class="bgc-gray-f5f ptb140 galleries">
    <div class="wrapper galleries__wrapper">
        <h2 class="fz fz--44 fw-500 galleries__heading">
            <?php echo esc_html(remove_orphans(get_fields()['galleries']['heading'])); ?>
        </h2>

        <div class="galleries__triggers">
            <?php if (get_fields()['galleries']['visualization']) : ?>
            <span class="c-gray-393 galleries__trigger galleries__trigger--visualizations galleries__trigger--active">
                Wizualizacje
            </span>
            <?php endif; ?>
            <?php if (get_fields()['galleries']['progress']) : ?>
            <span class="c-gray-393 galleries__trigger galleries__trigger--progress">
                Zdjęcia z buodwy
            </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="galleries__gallery galleries__gallery--current galleries__gallery--1">

        <div class="svg galleries__controller galleries__controller--left controller-for-gallery1-left"></div>
        <div class="svg galleries__controller galleries__controller--right controller-for-gallery1-right"></div>

        <div class="carousel galleries__carousel-1">
            <div class="carousel__ribbon galleries__ribbon-1">
                <?php if (get_fields()['galleries']['visualization']) : ?>
                    <?php foreach (get_fields()['galleries']['visualization'] as $item) : ?>
                        <div class="galleries__pane galleries__panel-1">

                            <?php echo wp_get_attachment_image($item['id'], 'full', false, [
                                'class' => 'img',
                                'loading' => false,
                                'sizes' => '(max-width: 1279px) 100vw, (max-width: 1919px) 75vw, 1920px',
                            ]); ?>

                        </div>
                    <?php endforeach; ?>
                    <?php foreach (get_fields()['galleries']['visualization'] as $item) : ?>
                        <div class="galleries__pane galleries__panel-1">

                            <?php echo wp_get_attachment_image($item['id'], 'full', false, [
                                'class' => 'img',
                                'loading' => false,
                                'sizes' => '(max-width: 1279px) 100vw, (max-width: 1919px) 75vw, 1920px',
                            ]); ?>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="galleries__gallery galleries__gallery--2">

        <div class="svg galleries__controller galleries__controller--left controller-for-gallery2-left"></div>
        <div class="svg galleries__controller galleries__controller--right controller-for-gallery2-right"></div>

        <div class="carousel galleries__carousel-2">
            <div class="carousel__ribbon galleries__ribbon-2">
                <?php if (get_fields()['galleries']['progress']) : ?>
                    <?php foreach (get_fields()['galleries']['progress'] as $item) : ?>
                        <div class="galleries__pane galleries__panel-2">

                            <?php echo wp_get_attachment_image($item['id'], 'full', false, [
                                'class' => 'img',
                                'loading' => false,
                                'sizes' => '(max-width: 1279px) 100vw, (max-width: 1919px) 75vw, 1920px',
                            ]); ?>

                        </div>
                    <?php endforeach; ?>
                    <?php foreach (get_fields()['galleries']['progress'] as $item) : ?>
                        <div class="galleries__pane galleries__panel-2">

                            <?php echo wp_get_attachment_image($item['id'], 'full', false, [
                                'class' => 'img',
                                'loading' => false,
                                'sizes' => '(max-width: 1279px) 100vw, (max-width: 1919px) 75vw, 1920px',
                            ]); ?>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
    </div>

</section>
<?php endif; ?>
<section class="pb policy">

    <div class="wrapper wrapper--2">
        <div class="policy__intro">
            <h1 class="fw-400 fz fz--14-17">
                <?php echo esc_html(get_fields()['policy']['heading-main']); ?>
            </h1>
            <div class="fz fz--12-15 c-navy wysiwyg policy__wysiwyg">
                <?php echo wp_kses(remove_orphans(get_fields()['policy']['intro']), tags_for_wysiwyg()); ?>
            </div>
        </div>

        <div class="policy__blocks">
            <?php if (get_fields()['policy']['section']) : ?>
                <?php foreach (get_fields()['policy']['section'] as $section) : ?>

                    <div class="policy__block">
                        <h2 class="fw-400 fz fz--14-17 policy__block-heading">
                            <?php echo esc_html(remove_orphans($section['title'])); ?>
                        </h2>

                        <div class="fz fz--12-15 c-navy wysiwyg policy__wysiwyg">
                            <?php echo wp_kses(remove_orphans($section['text']), tags_for_wysiwyg()); ?>
                        </div>

                    </div>
            
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</section>
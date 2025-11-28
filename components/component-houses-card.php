<div class="houses__card">

    <?php if (get_fields()['houses'][$args['key']]['image']) : ?>
        <?php echo wp_get_attachment_image(get_fields()['houses'][$args['key']]['image']['id'], 'full', false, [
            'class' => 'img',
            'loading' => false,
            'sizes' => '(max-width: 1279px) 100vw, 50vw',
        ]); ?>
    <?php endif; ?>

    <div class="bgc-gray-f5f houses__bottom">

        <h3 class="fz fz--28 c-saphire fw-500 houses__name">
            <?php echo esc_html(remove_orphans(get_fields()['houses'][$args['key']]['name'])); ?>
        </h3>

        <?php
        $status = get_fields()['houses'][$args['key']]['status'];
        $labels = [
            'green'  => 'Dostępny',
            'yellow' => 'Rezerwacja',
            'red'    => 'Sprzedane'
        ];
        ?>
        <span class="houses__status houses__status--<?php echo esc_html($status); ?>">
            <?php echo esc_html($labels[$status] ?? ''); ?>
        </span>

        <div class="houses__areabox">
            <?php
            $usable_raw = get_fields()['houses'][$args['key']]['usable_area'];
            $plot_raw   = get_fields()['houses'][$args['key']]['plot_area'];

            $usable_raw = str_replace(' ', '', $usable_raw);
            $plot_raw   = str_replace(' ', '', $plot_raw);

            $usable_raw = str_replace(',', '.', $usable_raw);
            $plot_raw   = str_replace(',', '.', $plot_raw);

            $usable_value = (float)$usable_raw;
            $plot_value   = (float)$plot_raw;

            $usable_formatted = (floor($usable_value) == $usable_value)
                ? number_format($usable_value, 0, ',', ' ')
                : number_format($usable_value, 2, ',', ' ');

            $plot_formatted = (floor($plot_value) == $plot_value)
                ? number_format($plot_value, 0, ',', ' ')
                : number_format($plot_value, 2, ',', ' ');
            ?>
            <p class="fz fz--20 c-charcoal houses__area">
                <span>Powierzchnia użytkowa:</span>
                <span><?php echo esc_html($usable_formatted); ?> m²</span>
            </p>

            <p class="fz fz--20 c-charcoal houses__area">
                <span>Powierzchnia działki:</span>
                <span><?php echo esc_html($plot_formatted); ?> m²</span>
            </p>
        </div>


        <?php
        $status = get_fields()['houses'][$args['key']]['status'];

        $price = get_fields()['houses'][$args['key']]['price'];
        $price = preg_replace('/\D/', '', $price);
        $price_value = (float)$price;

        $area = get_fields()['houses'][$args['key']]['plot_area'];
        $area = preg_replace('/\D/', '', $area);
        $area_value = (float)$area;

        $formatted_price = number_format($price_value, 0, ',', ' ');
        $price_per_m2 = $area_value > 0 ? $price_value / $area_value : 0;
        $formatted_m2 = number_format($price_per_m2, 0, ',', ' ');

        $price_display = $status === 'red' ? '-' : $formatted_price . ' zł';
        $price_m2_display = $status === 'red' ? '-' : $formatted_m2 . ' zł';
        ?>

        <div class="houses__pricebox">
            <p class="fz fz--20 c-charcoal">
                <span>Cena:</span>
                <span><?php echo esc_html($price_display); ?></span>
            </p>
            <p class="fz fz--18 c-gray-888">
                <span>Cena za m²:</span>
                <span><?php echo esc_html($price_m2_display); ?></span>
            </p>

            <div class="houses__lowest-price">
                <p class="fz fz--16 c-gray-888">Najniższa cena z 30 dni:</p>
                <p class="fz fz--16 c-gray-888"><span>- zł</span>, <span>- zł/m²</span></p>
            </div>
        </div>


        <div class="houses__buttons">
            
            <?php 
            $pdf = get_fields()['houses'][$args['key']]['pdf']['url'];
            ; ?>
            <?php if ($pdf) : ?>
            <a class="btn btn--charcoal houses__btn" href="<?php echo $pdf; ?>" target="_blank">
                Pobierz kartę lokalu
            </a>
            <?php endif; ?>

            <button class="btn btn--border picon picon--after picon--newcard houses__btn2">
                Sprawdź rejestr cen
            </button>

        </div>


    </div>

</div>
<div class="menu">
    <div class="wrapper menu__wrapper">

        <div class="menu__topbar">
            <button class="header__button header__button--close" id="menu-close" aria-label="Zamknij menu mobilne" aria-expanded="false"></button> 
        </div>
        
        <?php
        wp_nav_menu(
            array(
                'theme_location'       => 'header-menu',
                'menu'                 => '',
                'container'            => 'nav',
                'container_class'      => 'menu__nav',
                'container_id'         => '',
                'container_aria_label' => '',
                'menu_class'           => 'menu__ul',
                'menu_id'              => '',
                'walker'               => new ld56_header_menu_walker(),
                )
            );
        ?>

    </div>
</div>
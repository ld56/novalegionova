<?php


// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// SETUP
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////

// Date of upload of auto-updates.php (instead of data of finished development)
$date_project_start = '2025-11-02';

// Part of info about developer
$developer_info_status = true;

// Domains configuration
$domains = array(
    'local'      => 'novalegionova.dev',
    'staging'    => 'novalegionova.ldebski.dev',
    'production' => 'novalegionova.pl',
);

// Auto update settings per domain
// true włączy blokowanie, false wyłączy
$auto_updates_blocker = array(
    $domains['local']      => true, 
    $domains['staging']    => true,
    $domains['production'] => false, 
);

// List of plugins 
$excluded_plugins = array(
    'advanced-custom-fields-pro/acf.php',
    'webp-converter-for-media/webp-converter-for-media.php',
    'polylang/polylang.php',
    'polylang-pro/polylang.php',
    'autodescription/autodescription.php',
    'wp-sweep/wp-sweep.php',
    'force-regenerate-thumbnails/force-regenerate-thumbnails.php',
    'query-monitor/query-monitor.php',
    'contact-form-7/wp-contact-form-7.php',
    'wp-mail-smtp/wp_mail_smtp.php',
    'honeypot/wp-armour.php',
    'wps-hide-login/wps-hide-login.php',
    'duplicator/duplicator.php',
);



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// DETECT CURRENT DOMAIN
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
$current_domain = $_SERVER['HTTP_HOST'] ?? 'unknown';
$block_updates  = $auto_updates_blocker[$current_domain] ?? true; // default: block



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// SCRIPTS FOR COLLAPSIBLE NOTICE
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
function auto_updates_scripts() {
    echo '<script>
    document.addEventListener("DOMContentLoaded", function () {
        const trigger = document.querySelector(".auto-updates__trigger");
        const box = document.querySelector(".auto-updates__box");
        const details = document.querySelector(".auto-updates__details");

        if (trigger && box && details) {
            trigger.addEventListener("click", () => {
                const currentHeight = details.style.height;
                if (currentHeight && currentHeight !== "0px") {
                    details.style.height = "0";
                    trigger.textContent = "Rozwiń, by dowiedzieć się więcej"; 
                } else {
                    details.style.height = box.offsetHeight + "px";
                    trigger.textContent = "Schowaj szczegóły";
                }
            });
        }
    });
    </script>';
}
add_action('admin_head', 'auto_updates_scripts');



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// STYLES FOR NOTICE
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
function auto_updates_styles() {
    echo '<style>        
        .auto-updates {
            display: flex!important;
            flex-direction: column;
            margin-top: 20px!important;
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 3px, rgba(0, 0, 0, 0.14) 0px 1px 2px!important;
            font-size: 12px!important;
        }

        .auto-updates__content {
            padding: 6px!important;
        }

        .auto-updates__p {
            font-size: 12px!important;
            margin: 6px 0!important;
            padding: 0!important;
        }

        .auto-updates__note {
            font-size: 10px!important;
            font-style: italic!important;
            margin: 2px 0!important;
            padding: 0!important;
        }

        .ttu {
            text-transform:uppercase;
        }

        .auto-updates__p--title {
            display: flex;
            gap: 2px;
            align-items: center;
        }

        .auto-updates__ul {
            font-size: 12px!important;
            margin: 0!important;
            padding: 0!important;
            list-style-type: circle!important;
        }

        .auto-updates__li {
            font-size: 12px!important;
            margin: 0!important;
            padding: 0!important;
            margin-left: 20px!important;
        }

        .auto-updates__details {
            display: flex;
            flex-direction: column;
            height: 0;
            overflow: hidden;
            transition: height .3s ease-out;
        }

        .auto-updates__trigger {
            color: black!important;
            margin-top:10px!important;
            font-size:13px!important;
            width: fit-content!important;
            text-decoration: underline;
        }

        .auto-updates__trigger:hover {
            cursor: pointer;
        }

        .auto-updates__link {
            color: black;
        }

        .auto-updates__link:hover {
            color: black;
        }

        .status-in-heading {
            font-weight:700;
            color: #323232ff;
        }

        .date-in-desc {
            font-weight:700;
            color: #323232ff;
        }
    </style>';
}
add_action('admin_head', 'auto_updates_styles');



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// DISABLE AUTO-UPDATES FOR EXCLUDED PLUGINS
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
function exclude_plugins_from_auto_update($update, $item) {
    global $excluded_plugins, $block_updates;
    if ($block_updates && in_array($item->plugin, $excluded_plugins)) {
        return false;
    }
    return $update;
}
add_filter('auto_update_plugin', 'exclude_plugins_from_auto_update', 10, 2);



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// REMOVE UPDATE NOTIFICATIONS FOR EXCLUDED PLUGINS
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
function exclude_plugin_update_notifications($transient) {
    global $excluded_plugins, $block_updates;
    if (!$block_updates) return $transient;
    
    if (empty($transient->response)) return $transient;

    foreach ($excluded_plugins as $plugin) {
        if (isset($transient->response[$plugin])) {
            unset($transient->response[$plugin]);
        }
    }

    return $transient;
}
add_filter('site_transient_update_plugins', 'exclude_plugin_update_notifications');
add_filter('site_transient_update_themes', 'exclude_plugin_update_notifications');



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// CUSTOM ADMIN NOTICE
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
function custom_plugin_update_notice() {
    global $pagenow, $block_updates, $date_project_start;

    $date = new DateTime($date_project_start);
    $date_project_start = $date->format('d.m.Y');
    $first_date = (new DateTime($date_project_start))->modify('+6 months')->format('d.m.Y');
    $second_date = (new DateTime($date_project_start))->modify('+12 months')->format('d.m.Y');

    if ($pagenow !== 'plugins.php') return;

    // Determine colors and content based on auto updates status
    if ($block_updates) {
        // Auto updates OFF
        $bg_color = '#fcf9e8';
        $border_color = '#dba617';
        $highlighted_text_color = '#d96801';
        $title_text = 'Aktualizacje rdzenia WordPressa¹ i wtyczek bazowych² są <strong class="status-in-heading" >wyłączone</strong>';

        $details_text = '
            <p class="auto-updates__p">Automatyczne aktualizacje zostały wyłączone, by uniknąć niekontrolowanych zmian, które mogłyby wpłynąć na działanie strony.</p>
            <p class="auto-updates__p">Aby zapewnić stabilność i bezpieczeństwo strony zaleca się, by:</p>
            <ul class="auto-updates__ul"> 
                <li class="auto-updates__li">Ręcznie zaktualizować wtyczki oraz rdzeń WordPressa w środowisku testowym.</li>
                <li class="auto-updates__li">Po aktualizacji dokładnie sprawdzić działanie strony.</li>
                <li class="auto-updates__li">Jeśli wszystko jest w porządku - zaktualizować stronę w środowisku produkcyjnym.</li> 
            </ul>
            <p class="auto-updates__p">–––––––––––––––––––––––––</p>
            <p class="auto-updates__note">¹ Rdzeń WordPressa - sam system WordPress, jego pliki i mechanizmy; aktualizacje poprawiają bezpieczeństwo i działanie.</p>
            <p class="auto-updates__note">² Bazowe wtyczki - wtyczki zainstalowane przez programistę podczas tworzenia strony, często odpowiadające za jej kluczowe funkcjonalności. Nie dotyczy wtyczek, które zostały zainstalowane na własną rękę po zakończeniu prac nad stroną.</p>
        ';

        echo '<div class="updated notice auto-updates" style="background-color:' . $bg_color . '; border-left:4px solid ' . $border_color . ';">';
        echo '<div class="auto-updates__content">';
        echo '<p class="ttu auto-updates__p auto-updates__p--title"><b><span class="dashicons dashicons-info-outline" style="display:inline-block;margin-right:6px;"></span>' . $title_text . '</b></p>';
        echo '<p class="auto-updates__trigger">Rozwiń, by dowiedzieć się więcej</p>';
        echo '<div class="auto-updates__details">';
        echo '<div class="auto-updates__box">';
        echo '<p class="auto-updates__p">' . $details_text . '</p>';
        echo '</div></div></div></div>';
    } 
}
add_action('admin_notices', 'custom_plugin_update_notice');



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
// HIDE WORDPRESS CORE UPDATE NOTICES
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////
function remove_wp_update_nag() {
    remove_action('admin_notices', 'update_nag', 3);
}
add_action('admin_menu', 'remove_wp_update_nag');

function hide_wp_version_update_notice($transient) {
    if (isset($transient->updates) && is_object($transient)) {
        unset($transient->updates);
    }
    return $transient;
}
add_filter('pre_site_transient_update_core', 'hide_wp_version_update_notice');
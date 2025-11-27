<?php

function custom_dashboard_widget() {
    wp_add_dashboard_widget(
        'custom_versions_widget',
        'Informacje o wersjach systemu',
        'custom_dashboard_widget_display'
    );
}

add_action('wp_dashboard_setup', 'custom_dashboard_widget');

function custom_dashboard_widget_display() {
    $php_version = phpversion();
    $wordpress_version = get_bloginfo('version');
    $plugins = get_plugins();

    echo '<style>
        .custom-widget-table {
            width: 100%;
            border-collapse: collapse;
        }
        .custom-widget-table th, .custom-widget-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .custom-widget-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        </style>';
    
    echo '<table class="custom-widget-table">';
    echo '<tr><th>Kategoria</th><th>Wersja</th></tr>';
    echo '<tr><td>PHP</td><td>' . esc_html($php_version) . '</td></tr>';
    echo '<tr><td>WordPress</td><td>' . esc_html($wordpress_version) . '</td></tr>';

    echo '<tr><th colspan="2">Wtyczki</th></tr>';
    foreach ($plugins as $plugin_data) {
        echo '<tr>';
        echo '<td>' . esc_html($plugin_data['Name']) . '</td>';
        echo '<td>' . esc_html($plugin_data['Version']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

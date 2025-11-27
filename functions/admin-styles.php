<?php

function customize_admin_styles() {
    echo '<style>

        body.wp-admin {
            background-color: #dcdcdc;
        }

        .wp-list-table,
        .media-toolbar.wp-filter,
        .attachments-wrapper,
        .wp-list-table,
        .acf-postbox,
        .postbox,
        .theme-about,
        .accordion-section,
        .menu-edit,
        .manage-menus {
            border: 1px solid #a7aab0!important;
            margin-bottom: 30px!important;
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 3px, rgba(0, 0, 0, 0.14) 0px 1px 2px!important;
            background-color: #ffffff!important;
        }

        #acf-field-group-fields,
        #acf-field-group-options {
            overflow: hidden;
        }

        .accordion-section {
            margin-bottom: 0px!important;
            border: unset!important;
            border-bottom: 1px solid #f0f0f1!important;
        }

        .theme-actions {
            border: 1px solid #a7aab0!important;
        }

        .acf-field.acf-field-group {
            padding: 16px 20px 20px 20px;
        }

        .postbox-header {
            background: #f1f1f1;
            border-bottom: 1px solid #a7aab0!important;
        }
        #poststuff .stuffbox>h3, #poststuff h2, #poststuff h3.hndle {
            font-size: 14.5px;
        }

        // #postbox-container-1 {
        //     @media (min-width: 851px) {
        //         // width: 270px!important;
        //     }
        // }

        table.acf-table {
            border-collapse: collapse!important;
        }

        .acf-field-6550c14b6e06d > div > div > table > tbody > tr.acf-row > td {
            border-top-color: #adadad!important;
        }

        .acf-button[data-name="add-layout"],
        .acf-button.button.button-primary.acf-gallery-add {
            background: #679367;
            border-color: #679367;
        }

        .acf-button[data-name="add-layout"]:hover,
        .acf-button.button.button-primary.acf-gallery-add:hover {
            background: #4f744f;
            border-color: #4f744f;
        }

        .acf-button[data-name="add-layout"]:focus {
            background: #4f744f;
            border-color: #4f744f;
            outline: 2px solid green;
        }

        .layout {
            border: 1px solid #679367!important;
        }

        .acf-fc-layout-handle {
            background-color: #bed4be!important;
        }

        .acf-fc-layout-order {
            background-color: white!important;
            color: #4f744f!important;
            font-weight: bold!important;
        }

        .acf-tooltip.acf-fc-popup.top {
            background-color: #1d3925!important;
        }

        .acf-tooltip.acf-fc-popup.top > ul > li > a:hover {
            background-color: #27ab53!important;
        }

        // .acf-row:nth-child(even) > td,
        // .acf-row:nth-child(even) > td > div
        // .acf-row:nth-child(even) > td > div > div > div,
        // .acf-row:nth-child(even) > td > div > div > div > div,
        // .acf-row:nth-child(even) > td > div > div > div > div > div,
        // .acf-row:nth-child(even) > td > div > div > div > div > div > div,
        // .acf-row:nth-child(even) > td > div > div > div > div > div > div > div,
        // .acf-row:nth-child(even) > td > div > div > div > div > div > div > div > div {
        //     background-color: #f4f4f4!important;
        // }

        .theme-actions {
            border: 0px solid red!important;
        }
        
        .wp_tag {
            display: inline-block;
            padding:0px 4px 1px 4px;
            border-radius:4px;
            margin-left:3px;
            box-shadow: rgba(0, 0, 0, 0) 0px 2px 4px 0px inset;
            text-decoration: none;
            cursor: default;
            transition: box-shadow .2s ease-out, background-color .2s ease-out, color .2s ease-out;
            cursor: default;
        }

        a.wp_tag {
            cursor: pointer;
        }

        a.wp_tag:hover {
            box-shadow: rgba(0, 0, 0, 0.10) 0px 2px 4px 0px inset;
            background-color:#f8f797;
            color:#000000;
        }

        .wp_tag--blue {
            background-color:#d0ddea;
            color:#2271b1;
        }

        .wp_tag--red {
            background-color:#ead0d0;
            color:#4d0000;
        }

        .wp_tag--gray {
            background-color:#e4e4e4;
            color:#636363;
        }
        .acf-tooltip {
            max-width: 400px!important;
        }
        .handle-order-higher,
        .handle-order-lower {
            display: none!important;
        }

        .acf-tab-wrap.-top {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        .acf-tab-wrap .-top::-webkit-scrollbar {
            display: none;
        }
    </style>';
}

add_action('admin_head', 'customize_admin_styles');



// VISUALLY DISTINGUISH THE PARENT AND CHILDREN'S PAGES
// function custom_colors_for_parent_pages() {
//     if (
//         is_post_type_archive('tasmy-transportujace') 
//         || is_post_type_archive('pasy-napedowe') 
//         || is_post_type_archive('kola-pasowe')
//         || is_post_type_archive('pozostale')
//         || is_post_type_archive('uslugi')
//         || is_post_type_archive('o-firmie')
//         || isset($_GET['post_type']) && $_GET['post_type'] === 'page'
//     ) {
//         echo '<style>
//         /* Styl dla stron najwyższego poziomu */
//         .iedit.author-self.level-0 {
//             background-color: #eceded!important; 
//         }
//         .iedit.author-self.level-0 > td > strong > a {
//             color: #135e96!important; 
//             font-weight: 700!important; 
//         }
//         option.level-0 {
//             font-weight: bold!important;
//         }
//         option.level-1 {
//             color: #5e707c!important;
//         }
//         .iedit.author-self.level-1 {
//             background-color: #ffffff!important;
//         }
//         .iedit.author-self.level-1 > td > strong > a {
//             font-weight: 400!important; 
//         }
//         .iedit.author-self.level-1 > th.check-column {
//             padding-left: 24px!important;
//         }
//         .iedit.author-self.level-1 > td > strong > a {
//             padding-left: 14px!important;
//         }

//         option.level-2 {
//             color: #5e707c!important;
//         }
//         .iedit.author-self.level-2 {
//             background-color: #ffffff!important;
//         }
//         .iedit.author-self.level-2 > td > strong > a {
//             font-weight: 400!important; 
//         }
//         .iedit.author-self.level-2 > th.check-column {
//             padding-left: 48px!important;
//         }
//         .iedit.author-self.level-2 > td > strong > a {
//             padding-left: 40px!important;
//             font-style: italic;
//             font-size: 12px!important;
//             color: #768ccf!important;
//         }


//         .iedit.author-self:hover {
//             background-color: #d0e4f6!important;
//         }
//     </style>';
//     }
// }

// add_action('admin_head', 'custom_colors_for_parent_pages');
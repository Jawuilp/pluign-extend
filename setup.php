<?php
function plugin_init_responsiva() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['responsiva'] = true;
    $PLUGIN_HOOKS['menu_entry']['responsiva'] = false;
    $PLUGIN_HOOKS['add_css']['responsiva'] = [];
    $PLUGIN_HOOKS['add_javascript']['responsiva'] = [];
    
    // Añadir opción de exportación PDF
    $PLUGIN_HOOKS['plugin_item_add_actions']['responsiva'] = [
        'Ticket' => 'plugin_responsiva_add_actions'
    ];
}

function plugin_version_responsiva() {
    return [
        'name'           => 'Responsiva PDF',
        'version'        => '1.0.0',
        'author'         => 'Tu Nombre',
        'license'        => 'GPLv3',
        'requirements'   => [
            'glpi' => [
                'min' => '10.0.0'
            ]
        ]
    ];
}

function plugin_responsiva_check_prerequisites() {
    return true;
}

function plugin_responsiva_check_config() {
    return true;
}
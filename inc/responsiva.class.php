<?php
class PluginResponsivaResponsiva extends CommonDBTM {

    static function getTypeName($nb = 0) {
        return __('Carta Responsiva', 'responsiva');
    }

    // Añadir botón al menú de impresión
    static function plugin_responsiva_add_actions(Ticket $item) {
        if ($item->canView()) {
            return [
                "responsiva/pdf" => __('Generar Carta Responsiva', 'responsiva')
            ];
        }
        return [];
    }
}
<?php

namespace Igestis\Modules\Iframify;

/**
 * Description of ConfigMenu
 *
 * @author Gilles Hemmerlé
 */
class ConfigInitModule implements \Igestis\Interfaces\ConfigMenuInterface, \Igestis\Interfaces\ConfigRightsListInterface {
    /**
     * Return the right list used by the IgestisSecurity object to let it know which are all the rights of the differents section of the application
     * @return array Rights list
     */
    public static function getRightsList() {
        $module =   array(
            "MODULE_NAME" => ConfigModuleVars::moduleName,
            "MODULE_FULL_NAME" => _(ConfigModuleVars::moduleShowedName),
            "RIGHTS_LIST" => NULL);

        $rights = array(
            array(
                "CODE" => "NONE",
                "NAME" => "None",
                "DESCRIPTION" => "The user can only see the shared iframes"
            ),
            array(
                "CODE" => "ADMIN",
                "NAME" => "Administrator",
                "DESCRIPTION" => "Allowed to manage the iframes"
            )
        );

        $module['RIGHTS_LIST'] = $rights;

        return $module;
    }

    public static function menuSet(\application $context, \IgestisMenu &$menu) {
        $menu->addItem(dgettext(ConfigModuleVars::textDomain, "Administration"), dgettext(ConfigModuleVars::textDomain, "Iframify"), "iframify_iframes_index");
    }
}

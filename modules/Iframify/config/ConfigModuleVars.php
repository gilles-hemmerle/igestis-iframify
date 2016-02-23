<?php
/**
 * This class will permitt to set all global variables of the module
 * @Author : Gilles Hemmerlé <gilles.h@iabsis.com>
 */

namespace Igestis\Modules\Iframify;

define("IFRAMIFY_VERSION", "0.1-1");
define("IFRAMIFY_MODULE_NAME", "Iframify");
define("IFRAMIFY_TEXTDOMAIN", IFRAMIFY_MODULE_NAME .  IFRAMIFY_VERSION);
/**
 * Configuration of the module
 *
 * @author Gilles Hemmerlé
 */
class ConfigModuleVars {

    /**
     * @var String Numéro de version du module
     */
    const version = IFRAMIFY_VERSION;
    /**
     *
     * @var String Name of the module (used only on the source code)
     */
    const moduleName = IFRAMIFY_MODULE_NAME;

    /**
     *
     * @var String Name of the menu showed to the user
     */
    const moduleShowedName = "Iframify";

    /**
     *
     * @var String textdomain used for this module
     */
    const textDomain = IFRAMIFY_TEXTDOMAIN;
}

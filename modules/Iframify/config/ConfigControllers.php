<?php

/**
 * Description of ConfigControllers
 *
 * @author Gilles Hemmerlé
 */

namespace Igestis\Modules\Iframify;

class ConfigControllers extends \IgestisConfigController
{
    public static function get()
    {
        return array(
            /*********** Routes for the Iframify module ***********/
            array(
                "id" => "iframify_iframes_index",
                "Parameters" => array(
                    "Module" => "iframify",
                    "Action" => "index",
                ),
                "Controller" => "\Igestis\Modules\Iframify\IframifyController",
                "Action" => "indexAction",
                "Access" => array("IFRAMIFY:ADMIN"),
            ),

            array(
                "id" => "iframify_iframes_new",
                "Parameters" => array(
                    "Module" => "iframify",
                    "Action" => "new",
                ),
                "Controller" => "\Igestis\Modules\Iframify\IframifyController",
                "Action" => "newAction",
                "Access" => array("IFRAMIFY:ADMIN"),
            ),

            array(
                "id" => "iframify_iframes_edit",
                "Parameters" => array(
                    "Module" => "iframify",
                    "Action" => "edit",
                    'Id' => '{VAR}[0-9]+',
                ),
                "Controller" => "\Igestis\Modules\Iframify\IframifyController",
                "Action" => "editAction",
                "Access" => array("IFRAMIFY:ADMIN"),
            ),

            array(
                "id" => "iframify_iframes_del",
                "Parameters" => array(
                    "Module" => "iframify",
                    "Action" => "delete",
                    'Id' => '{VAR}[0-9]+',
                ),
                "Controller" => "\Igestis\Modules\Iframify\IframifyController",
                "Action" => "delAction",
                "Access" => array("IFRAMIFY:ADMIN"),
            ),
            array(
                "id" => "iframify_iframes_show",
                "Parameters" => array(
                    "Module" => "iframify",
                    "Action" => "show",
                    'Id' => '{VAR}[0-9]+',
                ),
                "Controller" => "\Igestis\Modules\Iframify\IframifyController",
                "Action" => "showAction",
                "Access" => array("AUTHENTICATED"),
            ),
        );
    }
}

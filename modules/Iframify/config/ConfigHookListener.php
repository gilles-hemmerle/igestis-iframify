<?php

/**
 * Hook listener for the iframify module
 *
 * @author Gilles Hemmerlé
 */
namespace Igestis\Modules\Iframify;

class ConfigHookListener implements \Igestis\Interfaces\HookListenerInterface
{
    public static function listen($HookName, \Igestis\Types\HookParameters $params = null)
    {
        switch ($HookName) {
            case "menuInitialized":
                $igestisMenu = $params->get('menu');
                $context = $params->get('context');

                $iframes = $context->getEntityManager()->getRepository("IframifyIframes")->findAll();

                foreach ($iframes as $currentIframe) {
                    $igestisMenu->addItem(
                        $currentIframe->getRootMenu(),
                        $currentIframe->getMenuEntry(),
                        \ConfigControllers::createUrl("iframify_iframes_show", array(
                            'Id' => $currentIframe->getId(),
                        ))
                    );
                }
                break;
            default:
                break;
        }

        return true;
    }
}

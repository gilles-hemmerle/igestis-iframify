<?php

namespace Igestis\Modules\Iframify;

use Igestis\I18n\Translate;

/**
 * Main controller of the iframify module
 *
 * @author Gilles Hemmerlé
 */
class IframifyController extends \IgestisController
{
    public function indexAction()
    {
        $this->context->render("pages/IframifyIndex.twig", array(
            'data_table' => $this->_em->getRepository("IframifyIframes")->findAll(),
        ));
    }

    /**
     * Add a bank account
     */
    public function newAction()
    {
        $iframe = new \IframifyIframes;

        if (!$iframe) {
            $this->context->throw404error();
        }

        // If the form has been received, manage the form...
        if ($this->request->IsPost()) {
            // Check the form validity

            // Set the new datas to the article
            $parser = new \IgestisFormParser();
            $iframe = $parser->FillEntityFromForm($iframe, $_POST);

            try {
                $this->context->entityManager->persist($iframe);
                $this->context->entityManager->flush();
            } catch (\Exception $e) {
                \IgestisErrors::createWizz($e, \IgestisErrors::TYPE_ANY);
                $this->redirect(\ConfigControllers::createUrl("iframify_iframes_index"));
            }

            // Show wizz to article the article update
            new \wizz(_("The new iframe has been successfully created"), \WIZZ::$WIZZ_SUCCESS);

            // Redirect to the article list
            $this->redirect(\ConfigControllers::createUrl("iframify_iframes_index"));
        }

        // If no form received, show the form
        $this->context->render("Iframify/pages/IframifyIframesNew.twig", array(
            'form_data' => $iframe,
        ));
    }

    /**
     * Get a form to edit or validate it if the form is received
     */
    public function editAction($Id)
    {
        $iframe = $this->context->entityManager->getRepository("IframifyIframes")->find($Id);

        if (!$iframe) {
            $this->context->throw404error();
        }

        // If the form has been received, manage the form...
        if ($this->request->IsPost()) {
            // Set the new datas to the entity
            $parser = new \IgestisFormParser();
            $iframe = $parser->FillEntityFromForm($iframe, $_POST);

            try {
                $this->context->entityManager->persist($iframe);
                $this->_em->flush();

                new \wizz(Translate::_("The iframe data has been successfully saved"), \WIZZ::$WIZZ_SUCCESS);
                $this->redirect(\ConfigControllers::createUrl("iframify_iframes_index"));

            } catch (\Exception $e) {
                \IgestisErrors::createWizz($e, \IgestisErrors::TYPE_MYSQL, sprintf(Translate::_("An error has occurred during the iframe update : %s"), $e->getMessage()));
                $this->redirect(\ConfigControllers::createUrl("iframify_iframes_index"));
            }

        }

        // If no form received, show the form
        $this->context->render("Iframify/pages/IframifyIframesEdit.twig", array(
            'form_data' => $iframe,
        ));
    }

    public function showAction($Id)
    {
        $iframe = $this->context->entityManager->getRepository("IframifyIframes")->find($Id);

        if (!$iframe) {
            $this->context->throw404error();
        }

        // If no form received, show the form
        $this->context->render("Iframify/iframe.twig", array(
            'iframe' => $iframe,
        ));
    }

    /**
     * Delete the bank account
     */
    public function delAction($Id)
    {
        $iframe = $this->_em->find("IframifyIframes", $Id);
        if (!$iframe) {
            $this->context->throw404error();
        }

        // Delete the purchasing article from the database
        try {
            $this->context->entityManager->remove($iframe);
            $this->context->entityManager->flush();
        } catch (\Exception $e) {
            // Show wizz to alert user that thebank account deletion has not realy been deleted
            \IgestisErrors::createWizz($e);
            $this->redirect(\ConfigControllers::createUrl("iframify_iframes_index"));
        }

        // Show wizz to confirm the update
        new \wizz(_("The bank account has been successfully deleted"), \WIZZ::$WIZZ_SUCCESS);

        // Redirect to the list
        $this->redirect(\ConfigControllers::createUrl("iframify_iframes_index"));
    }

}

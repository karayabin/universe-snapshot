<?php


namespace Ling\Light_Kit_Admin\JimToolbox;


/**
 * The JimToolboxItemHandler interface.
 */
interface JimToolboxItemHandlerInterface
{


    /**
     * Returns the pane body.
     *
     *
     *
     * The parameters are basically the received $_GET params.
     *
     * However some extra-parameters might be added depending on which method you use.
     *
     *
     * If you use the acp_class and current_uri $_GET parameters, then the extra-params are:
     *
     * - currentUri: the current_uri you passed, which represents the main page uri (i.e. not the ajax uri)
     *
     *
     * Otherwise, there are no extra params.
     *
     *
     * This method throws exception to signal something wrong happened.
     *
     *
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function getPaneBody(array $params): string;


    /**
     * Returns the title or the pane.
     * @return string
     */
    public function getPaneTitle(): string;
}
<?php

namespace Meredith\ListHandler;

use Meredith\ContentTransformer\ContentTransformerInterface;
use Meredith\ListButtonCode\ListButtonCodeInterface;
use Meredith\ListPreConfigScript\ListPreConfigScriptInterface;
use Meredith\MainController\MainControllerInterface;
use Meredith\OnModalOpenAfter\OnModalOpenAfterInterface;
use Meredith\TableStyleRenderer\TableStyleRendererInterface;

/**
 * LingTalfi 2015-12-28
 */
interface ListHandlerInterface
{

    public function getColumnLabels();

    public function getColumnNames2Types();

    public function getColumns();


    public function getOrderableColumns();

    public function getSearchableColumns();


    /**
     * Return an array of
     *      target position => ContentTransformerInterface
     *
     * The target position is any target of type integer, as define
     * in datatable docs, which means it is a number representing
     * the targeted column position.
     * This number can be either positive: 0 being the first column, 1 being the second, ...,
     * or negative, -1 being the last column, -2 the one before the last, ...
     *
     *
     * @return ContentTransformerInterface[]
     */
    public function getContentTransformers();

    /**
     * @return OnModalOpenAfterInterface
     */
    public function getOnModalOpenAfter();

    /**
     * @return ListPreConfigScriptInterface
     */
    public function getPreConfigScript();


    //------------------------------------------------------------------------------/
    // ADD COSMETIC RELATED METHODS
    //------------------------------------------------------------------------------/
    /**
     * @return string|null
     */
    public function getMainAlias();

    /**
     * Return the cosmetic fields aware from clause.
     *
     * @param MainControllerInterface $mc
     * @return string
     */
    public function getFrom(MainControllerInterface $mc);

    /**
     * @return array of fields to use in the sql request:
     *              those fields are aware of aliases.
     *              Unchanged fields are returned with the alias prefix,
     *              and cosmetic fields are returned as is.
     *
     *
     * In other words, request fields are fields prepared for the sql request.
     *
     */
    public function getRequestFields();

    /**
     * @return null|array of requestIdf => effectiveIdf
     *                  With:
     *                      requestIdf: request identifying fields as they are written in the sql request, only if enhanced by cosmetic changes.
     *                      effectiveIdf: idf that you need to actually interact with the sql server.
     *
     * If the request don't use such changes (cosmetic changes on idf), then the return is null.
     *
     *
     *
     * Rationale:
     * identifying fields might be different from request identifying fields.
     * This happens when the developer uses cosmetic change on identifying fields.
     *
     * In the GUI, when the list is displayed, we need to pass the real idfs,
     * because those are needed by the GUI to request services like fetch_row
     * or delete_rows.
     * But, on the other hand, if the developer uses cosmetic changes on identifying fields,
     * the sql request is changed and cosmetic idfs are returned to the GUI, which is a
     * big problem (cannot request the fetch_row and delete_rows services properly).
     *
     * Therefore, we provide the getRequestIdentifyingFields method, which corrects this problem
     * by passing the real identifying fields to the GUI.
     * This method is used in the datatables_server_side_processor, and the real idfs are passed
     * to datatables using its DT_RowData parameter.
     *
     * Note that you only need this method if you are applying cosmetic changes on idfs.
     *
     */
    public function getRequestIdentifyingFields();


    //------------------------------------------------------------------------------/
    // ADD REQUEST CUSTOMIZATION METHODS 
    //------------------------------------------------------------------------------/
    /**
     * @return string|null
     */
    public function getWhere();

    //------------------------------------------------------------------------------/
    // FETCH ROW SERVICE
    //------------------------------------------------------------------------------/
    /**
     * @param array $info
     * @param array $idf , the identifying fields
     * @return mixed
     */
    public function onFetchAfter(array &$info, array $idf);

}
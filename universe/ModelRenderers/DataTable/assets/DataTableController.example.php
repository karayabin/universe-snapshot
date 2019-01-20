<?php


namespace Controller\DataTable;


use Core\Controller\ApplicationController;
use Core\Services\X;
use Kamille\Architecture\Response\Web\JsonResponse;
use Kamille\Services\XLog;
use ModelRenderers\DataTable\DataTableRenderer;
use ModelRenderers\Renderer\ModelAwareRendererInterface;
use Models\DataTable\DataTableModel;
use Module\DataTable\DataTableProfileFinder\DataTableProfileFinderInterface;
use RowsGenerator\ArrayRowsGenerator;
use RowsGenerator\QuickPdoRowsGenerator;
use RowsGenerator\RowsGeneratorInterface;
use RowsGenerator\Util\RowsTransformerUtil;

class DataTableController extends ApplicationController
{
    public function handleAjax()
    {
        if (array_key_exists('id', $_POST)) {
            try {

                $datatableProfileId = $_POST['id'];


                //--------------------------------------------
                // LOADING DATATABLE PROFILE
                //--------------------------------------------
                $profileLoader = X::get("DataTable_profileFinder");
                /**
                 * @var $profileLoader DataTableProfileFinderInterface
                 */
                if (false !== ($profile = $profileLoader->getProfile($datatableProfileId))) {

                    $searchValues = [];
                    $sortValues = [];
                    $page = 1;
                    $nipp = 20;

                    //--------------------------------------------
                    // TAKE USER DATA, EXCEPT FOR THE VERY FIRST CALL
                    //--------------------------------------------
                    /**
                     * The very first call only posts the id,
                     * every subsequent call provides the other keys: searchValues, sortValues, page and nipp.
                     */
                    if (array_key_exists('model', $profile)) {
                        $m = $profile['model'];
                        if (array_key_exists('searchValues', $m)) {
                            $searchValues = $m['searchValues'];
                        }
                        if (array_key_exists('sortValues', $m)) {
                            $sortValues = $m['sortValues'];
                        }
                        if (array_key_exists('page', $m)) {
                            $page = $m['page'];
                        }
                        if (array_key_exists('nipp', $m)) {
                            $nipp = $m['nipp'];
                        }
                    }

                    $searchValues = (array_key_exists('searchValues', $_POST)) ? $_POST['searchValues'] : $searchValues;
                    $sortValues = (array_key_exists('sortValues', $_POST)) ? $_POST['sortValues'] : $sortValues;
                    $page = (array_key_exists('page', $_POST)) ? $_POST['page'] : $page;
                    $nipp = (array_key_exists('nipp', $_POST)) ? $_POST['nipp'] : $nipp;

                    $sortValues = array_filter($sortValues, function ($v) {
                        if ("none" === $v) {
                            return false;
                        }
                        return true;
                    });

                    $searchValues = array_filter($searchValues, function ($v) {
                        if ("" === $v) {
                            return false;
                        }
                        return true;
                    });


                    //--------------------------------------------
                    // CREATING ROWS GENERATOR
                    //--------------------------------------------
                    $rowsGenerator = $profile['rowsGenerator'];
                    $type = $rowsGenerator['type'];
                    if ('array' === $type) {
                        $path = $rowsGenerator['path'];
                        if (file_exists($path)) {
                            $rows = [];
                            include $path;
                            $generator = ArrayRowsGenerator::create()->setArray($rows);
                        } else {
                            $this->log("DataTableController: Path to array rowsGenerator File not found: $path");
                            $rows = [];
                        }
                    } elseif ('quickPdo' === $type) {
                        $generator = QuickPdoRowsGenerator::create()
                            ->setFields($rowsGenerator['fields'])->setQuery($rowsGenerator['query']);

                    } else {
                        return $this->log("Not implemented yet, generator with type $type", true);
                    }


                    //--------------------------------------------
                    // CONFIGURING THE ROWS GENERATOR
                    //--------------------------------------------
                    /**
                     * @var $generator RowsGeneratorInterface
                     */
                    $generator->setSearchItems($searchValues);
                    $generator->setSortValues($sortValues);
                    $generator->setPage($page);
                    $generator->setNbItemsPerPage($nipp);


                    //--------------------------------------------
                    // APPLY ROW TRANSFORMERS
                    //--------------------------------------------
                    $rows = $generator->getRows();
                    if (array_key_exists('transformers', $profile)) {
                        $headers = array_keys($profile['model']['headers']);
                        $rows = RowsTransformerUtil::transform($rows, $headers, $profile['transformers']);
                    }


                    //--------------------------------------------
                    // CONFIGURING THE MODEL BY USER DATA
                    //--------------------------------------------
                    $nbTotalItems = $generator->getNbTotalItems();

                    $model = DataTableModel::create()
                        //
                        ->setSearchValues($searchValues)
                        ->setSortValues($sortValues)
                        ->setNipp($nipp)
                        ->setPage($generator->getPage());
                    /**
                     * @var $model DataTableModel
                     */
                    $model
                        ->setRows($rows)
                        ->setNbTotalItems($nbTotalItems)
                        ->setSortValues($sortValues)
                        ->setSearchValues($searchValues);


                    // settings from the profile

                    $this->configureModelByProfile($model, $profile);


                    //--------------------------------------------
                    // RENDERING AND OUTPUT
                    //--------------------------------------------
                    $renderer = (array_key_exists('renderer', $profile)) ? $profile['renderer'] : 'ModelRenderers\DataTable\DataTableRenderer';
                    $oRenderer = new $renderer();
                    if ($oRenderer instanceof ModelAwareRendererInterface) {
                        $html = $oRenderer->setModel($model->getArray())->render();
                        return JsonResponse::create([
                            'type' => 'success',
                            'data' => $html,
                        ]);
                    }
                    else{
                        return $this->log("renderer not instance of ModelAwareRendererInterface");
                    }


                } else {
                    return $this->log("Profile not found: $datatableProfileId", true);
                }
            } catch (\Exception $e) {
                $this->log("$e");
                return JsonResponse::create([
                    'type' => 'error',
                    'data' => $e->getMessage(),
                ]);
            }
        } else {
            return JsonResponse::create([
                'type' => 'error',
                'data' => "no id",
            ]);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function log($msg, $response = false)
    {
        $msg = "DataTableController: " . $msg;
        XLog::error($msg);
        if (true === $response) {
            return JsonResponse::create([
                'type' => 'error',
                'data' => $msg,
            ]);
        }
    }

    private function configureModelByProfile(DataTableModel $model, array $profile)
    {
        if (array_key_exists('model', $profile)) {
            $m = $profile['model'];
            if (array_key_exists('headers', $m)) {
                $model->setHeaders($m['headers']);
            }
            if (array_key_exists('hidden', $m)) {
                $model->setHidden($m['hidden']);
            }
            if (array_key_exists('ric', $m)) {
                $model->setRic($m['ric']);
            }
            if (array_key_exists('checkboxes', $m)) {
                $model->setCheckboxes($m['checkboxes']);
            }
            if (array_key_exists('isSearchable', $m)) {
                $model->setIsSearchable($m['isSearchable']);
            }
            if (array_key_exists('unsearchable', $m)) {
                $model->setUnsearchable($m['unsearchable']);
            }
            if (array_key_exists('isSortable', $m)) {
                $model->setIsSortable($m['isSortable']);
            }
            if (array_key_exists('unsortable', $m)) {
                $model->setUnsortable($m['unsortable']);
            }
            if (array_key_exists('showCountInfo', $m)) {
                $model->setShowCountInfo($m['showCountInfo']);
            }
            if (array_key_exists('showNipp', $m)) {
                $model->setShowNipp($m['showNipp']);
            }
            if (array_key_exists('nippItems', $m)) {
                $model->setNippItems($m['nippItems']);
            }
            if (array_key_exists('showQuickPage', $m)) {
                $model->setShowQuickPage($m['showQuickPage']);
            }
            if (array_key_exists('showPagination', $m)) {
                $model->setShowPagination($m['showPagination']);
            }
            if (array_key_exists('paginationNavigators', $m)) {
                $model->setPaginationNavigators($m['paginationNavigators']);
            }
            if (array_key_exists('paginationLength', $m)) {
                $model->setPaginationLength($m['paginationLength']);
            }
            if (array_key_exists('showBulkActions', $m)) {
                $model->setShowBulkActions($m['showBulkActions']);
            }
            if (array_key_exists('showEmptyBulkWarning', $m)) {
                $model->setShowEmptyBulkWarning($m['showEmptyBulkWarning']);
            }
            if (array_key_exists('bulkActions', $m)) {
                $model->setBulkActions($m['bulkActions']);
            }
            if (array_key_exists('showActionButtons', $m)) {
                $model->setShowActionButtons($m['showActionButtons']);
            }
            if (array_key_exists('actionButtons', $m)) {
                $model->setActionButtons($m['actionButtons']);
            }
            //--------------------------------------------
            //
            //--------------------------------------------
            if (array_key_exists('textSearch', $m)) {
                $model->setTextSearch($m['textSearch']);
            }
            if (array_key_exists('textSearchClear', $m)) {
                $model->setTextSearchClear($m['textSearchClear']);
            }
            if (array_key_exists('textNoResult', $m)) {
                $model->setTextNoResult($m['textNoResult']);
            }
            if (array_key_exists('textCountInfo', $m)) {
                $model->setTextCountInfo($m['textCountInfo']);
            }
            if (array_key_exists('textNipp', $m)) {
                $model->setTextNipp($m['textNipp']);
            }
            if (array_key_exists('textNippAll', $m)) {
                $model->setTextNippAll($m['textNippAll']);
            }
            if (array_key_exists('textQuickPage', $m)) {
                $model->setTextQuickPage($m['textQuickPage']);
            }
            if (array_key_exists('textQuickPageButton', $m)) {
                $model->setTextQuickPageButton($m['textQuickPageButton']);
            }
            if (array_key_exists('textBulkActionsTeaser', $m)) {
                $model->setTextBulkActionsTeaser($m['textBulkActionsTeaser']);
            }
            if (array_key_exists('textEmptyBulkWarning', $m)) {
                $model->setTextEmptyBulkWarning($m['textEmptyBulkWarning']);
            }
            if (array_key_exists('textUseSelectedRowsEmptyWarning', $m)) {
                $model->setTextUseSelectedRowsEmptyWarning($m['textUseSelectedRowsEmptyWarning']);
            }
            if (array_key_exists('textPaginationFirst', $m)) {
                $model->setTextPaginationFirst($m['textPaginationFirst']);
            }
            if (array_key_exists('textPaginationPrev', $m)) {
                $model->setTextPaginationPrev($m['textPaginationPrev']);
            }
            if (array_key_exists('textPaginationNext', $m)) {
                $model->setTextPaginationNext($m['textPaginationNext']);
            }

            if (array_key_exists('textPaginationLast', $m)) {
                $model->setTextPaginationLast($m['textPaginationLast']);
            }
        }
    }
}
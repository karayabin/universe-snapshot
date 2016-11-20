<?php


require_once __DIR__ . "/../../../../init.php";


use Bat\ArrayTool;
use Meredith\Exception\MeredithException;
use Meredith\Supervisor\MeredithSupervisor;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


OpaqueTimServer::create()
    ->setServiceName('meredith.insert_update_row')
    ->start(function (TimServerInterface $server) {

        if (isset($_POST['meredithFormId'])) {
            $formId = (string)$_POST['meredithFormId'];

            //------------------------------------------------------------------------------/
            // allow manual override
            //------------------------------------------------------------------------------/
            if (false !== $processor = MeredithSupervisor::inst()->getFormProcessor($formId)) {

                $processor->process($_POST);
                if (null !== $msg = $processor->getSuccessMsg()) {
                    $server->success([
                        'msg' => $msg,
                    ]);
                }
                else {
                    $server->error($processor->getErrorMsg());
                }
            }
            //------------------------------------------------------------------------------/
            // insert/update automated workflow
            //------------------------------------------------------------------------------/
            else {


                $arr = $_POST; // maybe add an obfuscating layer here (if you are paranoid...)
                $userIdf = null;
                unset($arr['meredithFormId']);
                if (array_key_exists('meredithIdf', $arr)) {
                    $mode = 'update';
                    $userIdf = $arr['meredithIdf'];
                    unset($arr['meredithIdf']);
                }
                else {
                    $mode = 'insert';
                }


                $mc = MeredithSupervisor::inst()->getMainController($formId);
                $dp = $mc->getFormDataProcessor();
                $defaultValues = $dp->getDefaultValues();
                $foreignFields = $dp->getForeignFields();
                $table = $mc->getReferenceTable();


                $arr = array_replace($defaultValues, $arr);

                $lastInsertId = null;
                $idf2Values = null;
                $idf = $mc->getIdentifyingFields();
                $ac = $mc->getAutoIncrementedField();

                $nac2Values = [];
                foreach ($defaultValues as $field => $dv) {
                    if ($ac !== $field) {
                        $nac2Values[$field] = $arr[$field];
                    }
                }
                $foreignValues = array_intersect_key($arr, array_flip($foreignFields));

                $isSuccess = false;
                $conn = QuickPdo::getConnection();
                try {
                    $conn->beginTransaction();
                    if ('update' === $mode) {
                        //------------------------------------------------------------------------------/
                        // UPDATE
                        //------------------------------------------------------------------------------/
                        if (is_array($userIdf)) {

                            // update
                            if (true === MeredithSupervisor::inst()->isGranted($formId, 'update')) {

                                $idf2Values = array_intersect_key($userIdf, array_flip($idf));
                                $where = [];
                                foreach ($idf2Values as $k => $v) {
                                    $where[] = [$k, '=', $v];
                                }


                                $cancelMsg = null;
                                $dp->onUpdateBefore($table, $nac2Values, $cancelMsg, $foreignValues, $idf2Values);
                                if (null === $cancelMsg) {

                                    if (true === QuickPdo::update($table, $nac2Values, $where)) {
                                        $msg = $dp->getSuccessMessage($formId, 'update');
                                        if (false === $msg) {
                                            $msg = MeredithSupervisor::inst()->translate("The record has been successfully updated");
                                        }
                                        $server->success([
                                            'msg' => $msg,
                                        ]);
                                        $isSuccess = true;
                                    }
                                    else {
                                        $server->error(MeredithSupervisor::inst()->translate("An error occurred with the database, please retry later"));
                                    }
                                }
                                else {
                                    $server->error($cancelMsg);
                                }
                            }
                            else {
                                throw new MeredithException("Permission not granted to update with $formId");
                            }

                        }
                        else {
                            throw new MeredithException("invalid userIdf: not an array");
                        }
                    }
                    else {
                        //------------------------------------------------------------------------------/
                        // INSERT
                        //------------------------------------------------------------------------------/
                        if (true === MeredithSupervisor::inst()->isGranted($formId, 'insert')) {

                            $cancelMsg = null;
                            $dp->onInsertBefore($table, $nac2Values, $cancelMsg, $foreignValues);
                            if (null === $cancelMsg) {

                                if (false !== $lastInsertId = QuickPdo::insert($table, $nac2Values)) {
                                    $msg = $dp->getSuccessMessage($formId, 'insert');
                                    if (false === $msg) {
                                        $msg = MeredithSupervisor::inst()->translate("The record has been successfully recorded");
                                    }
                                    $server->success([
                                        'msg' => $msg,
                                    ]);
                                    $isSuccess = true;
                                }
                                else {
                                    $server->error(MeredithSupervisor::inst()->translate("An error occurred with the database, please retry later"));
                                }
                            }
                            else {
                                $server->error($cancelMsg);
                            }
                        }
                        else {
                            throw new MeredithException("Permission not granted to insert with $formId");
                        }
                    }


                    /**
                     * In case of successful insert/update, the dev might want to perform additional changes to the database,
                     * for instance, adding tags after that an article has been created...
                     */
                    if (true === $isSuccess) {
                        $dp->onSuccessAfter($mode, $nac2Values, $foreignValues, $lastInsertId, $idf2Values);
                    }


                    /**
                     * Note that we commit AFTER the onSuccessAfter method,
                     * because we aim for the integrity of the database, rather than
                     * "do as much as you can" handling.
                     */
                    $conn->commit();


                } catch (\PDOException $e) {

                    $conn->rollBack();
                    $exceptionHandled = false;

                    if ('23000' === $e->getCode()) { // integrity constraint violation

                        $msg = false;
                        if ('mysql' === QuickPdoInfoTool::getDriver()) {
                            if (1062 === $e->errorInfo[1]) { // Duplicate entry '%s' for key %d 
                                $exceptionHandled = true;
                                $msg = $dp->getDuplicateEntryMessage($formId, $mode);
                                if (false === $msg) {
                                    $msg = "A similar item already exists in the database";
                                }
                            }
                        }
                        if (false === $msg) {
                            $msg = $dp->getDefaultErrorMessage($formId, $mode);
                            $exceptionHandled = true;
                            if (false === $msg) {
                                $msg = 'A problem occurred with the database';
                            }
                        }
                        $server->error($msg);
                    }


                    if (true === $exceptionHandled) {
                        // we still want to log it
                        MeredithSupervisor::inst()->log($e);
                    }
                    else {
                        throw $e;
                    }


                }
            }
        }
        else {
            $server->error(MeredithSupervisor::inst()->translate("Invalid data: undefined meredithFormId"));
        }
    })->output();
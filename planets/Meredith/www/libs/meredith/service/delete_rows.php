<?php


require_once __DIR__ . "/../../../../init.php";


use Meredith\Exception\MeredithException;
use Meredith\Supervisor\MeredithSupervisor;
use QuickPdo\QuickPdo;
use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


OpaqueTimServer::create()
    ->setServiceName('meredith.delete_rows')
    ->start(function (TimServerInterface $server) {


        if (
            isset($_POST['formId']) &&
            isset($_POST['ids']) &&
            is_array($_POST['ids'])
        ) {
            $ids = $_POST['ids'];
            $formId = (string)$_POST['formId'];


            if (true === MeredithSupervisor::inst()->isGranted($formId, 'delete')) {


                $mc = MeredithSupervisor::inst()->getMainController($formId);
                $table = $mc->getReferenceTable();


                if ($ids) {

                    $idFields = $mc->getIdentifyingFields();


                    $optimizedQuery = false;
                    // Performance optimization: most tables use id auto incremented column...
                    if (1 === count($idFields)) {
                        $field = reset($idFields);
                        $ac = $mc->getAutoIncrementedField();
                        if ($ac === $field) {

                            $optimizedQuery = true;

                            $safeIds = [];
                            foreach ($ids as $uidf) {
                                if (is_array($uidf) && array_key_exists($field, $uidf)) {
                                    $safeIds[] = (int)$uidf[$field];
                                }
                            }
                            if (false !== $nbDelete = QuickPdo::delete($table, $field . " in (" . implode(", ", $safeIds) . ")")) {
                                $server->success("ok");
                            }
                            else {
                                throw new MeredithException("Couldn't delete rows from table $table, with field $field in " . implode(', ', $safeIds));
                            }
                        }
                    }

                    // ...but not all
                    if (false === $optimizedQuery) {
                        $stmt = "DELETE FROM $table WHERE (" . implode(', ', $idFields) . ") IN (";
                        $markers = [];
                        $n = 0;
                        foreach ($ids as $userIdf) {
                            if (is_array($userIdf)) {
                                if (0 !== $n) {
                                    $stmt .= ', ';
                                }
                                $stmt .= '(';
                                $c = 0;
                                foreach ($userIdf as $idf => $value) {
                                    if (in_array($idf, $idFields, true)) {
                                        if (0 !== $c) {
                                            $stmt .= ', ';
                                        }
                                        $marker = ':a' . $n++;
                                        $stmt .= $marker;
                                        $markers[$marker] = $value;
                                    }
                                    else {
                                        throw new MeredithException("Wrong userIdf: $idf is not a valid identifying field for table $table");
                                    }
                                    $c++;
                                }
                                $stmt .= ')';
                            }
                            else {
                                throw new MeredithException("Wrong userIdf data: an array was expected");
                            }
                        }
                        $stmt .= ")";
                        if (false !== QuickPdo::freeStmt($stmt, $markers)) {
                            $server->success("ok");
                        }
                        else {
                            throw new MeredithException("Something wrong happened with the delete request in table $table, with query $stmt");
                        }
                    }

                }
                else {
                    $server->success("ok");
                }

            }
            else {
                throw new MeredithException("Permission not granted to access rows with $formId");
            }
        }
        else {
            $server->error(MeredithSupervisor::inst()->translate("Invalid data"));
        }
    })->output();
<?php


require_once __DIR__ . "/../../../../init.php";


use Meredith\Exception\MeredithException;
use Meredith\Supervisor\MeredithSupervisor;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoStmtTool;
use StringFormatter\StringFormatterTool;
use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


OpaqueTimServer::create()
    ->setServiceName('meredith.fetch_row')
    ->start(function (TimServerInterface $server) {


        if (
            isset($_POST['formId']) &&
            isset($_POST['idf']) &&
            is_array($_POST['idf'])
        ) {
            $idf2Values = $_POST['idf'];
            $formId = (string)$_POST['formId'];


            if (true === MeredithSupervisor::inst()->isGranted($formId, 'fetch')) {


                // automated workflow with one single table
                $mc = MeredithSupervisor::inst()->getMainController($formId);


                $table = $mc->getReferenceTable();
                $realIdf = $mc->getIdentifyingFields();

                $realIdf2Values = [];
                foreach ($realIdf as $idf) {
                    if (array_key_exists($idf, $idf2Values)) {
                        $realIdf2Values[$idf] = $idf2Values[$idf];
                    }
                    else {
                        throw new MeredithException("Insufficient identifying fields data, missing idf: $idf");
                    }
                }


                $markers = [];
                $stmt = "select * from $table";
                QuickPdoStmtTool::addWhereEqualsSubStmt($realIdf2Values, $stmt, $markers);
                if (false !== $info = QuickPdo::fetch($stmt, $markers)) {
                    $mc->getListHandler()->onFetchAfter($info, $realIdf2Values);
                    $server->success($info);
                }
                else {
                    throw new MeredithException(StringFormatterTool::format("Cannot fetch info using stmt $stmt and markers {markers}", [
                        '{markers}' => $markers,
                    ]));
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
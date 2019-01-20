<?php


namespace Kamille\Utils\Morphic\Util\ModuleConfiguration;


use Bat\SessionTool;
use Bat\StringTool;
use Kamille\Utils\Morphic\Helper\MorphicHelper;
use QuickPdo\QuickPdo;
use SokoForm\Control\SokoInputControl;
use SokoForm\Form\SokoFormInterface;

class MorphicModuleConfigurationUtil
{

    private static $configurationEntries = null;


    protected $configurationTable;
    protected $textSuccessUpdate;
    protected $controlMap;
    protected $serializedFields;


    public function __construct()
    {
        $this->configurationTable = "mymodule_configuration";
        $this->textSuccessUpdate = "Les valeurs de configuration ont bien été mises à jour";
        $this->controlMap = [];
        $this->serializedFields = [];
    }


    public static function create()
    {
        return new static();
    }

    public function setSerializedFields(array $serializedFields)
    {
        $this->serializedFields = $serializedFields;
        return $this;
    }


    public function setTableName(string $configurationTable)
    {
        $this->configurationTable = $configurationTable;
        return $this;
    }


    public function decorateSokoFormInstance(SokoFormInterface $form)
    {
        $rows = $this->getConfigurationEntries();

        foreach ($rows as $row) {


            // depending on the type we can have a boolean or other controls...
            $type = $row['type'];
            $typeParams = $row['type_params'];
            $key = $row['the_key'];
            $value = $row['the_value'];
            $label = $row['label'];
            $description = $row['description'];



            if (in_array($key, $this->serializedFields, true)) {
                $value = StringTool::unserializeAsArray($value);
            }


            // choose the control
            $getControlCallback = $this->controlMap[$type] ?? null;
            if (null !== $getControlCallback) {
                $control = call_user_func($getControlCallback, $typeParams);
            } else {
                $control = SokoInputControl::create();

            }


            // common control properties
            $control
                ->setName($key)
                ->setLabel($label)
                ->addProperties([
                    "info" => $description,
                ])
                ->setValue($value);


            // add the control
            $form->addControl($control);
        }
    }

    public function getFeedFunction()
    {
        return function (SokoFormInterface $form, array $ric) {
            if (SessionTool::pickupFlag("form-module_configuration")) {
                $form->addNotification($this->textSuccessUpdate, "success");
            }
        };
    }


    public function getProcessFunction(array $options = [])
    {
        return function ($fData, SokoFormInterface $form) use ($options) {

            $onUpdateFieldBefore = $options['onUpdateFieldBefore'] ?? null;


            $entries = $this->getConfigurationEntries();


            foreach ($entries as $entry) {
                $theKey = $entry['the_key'];
                if (array_key_exists($theKey, $fData)) {
                    $value = $fData[$theKey];


                    if (in_array($theKey, $this->serializedFields, true)) {
                        $value = serialize($value);
                    }


                    if (null !== $onUpdateFieldBefore) {
                        call_user_func($onUpdateFieldBefore, $theKey, $value);
                    }


                    QuickPdo::update($this->configurationTable, [
                        "the_value" => $value,
                    ], [
                        ["the_key", "=", $theKey],
                    ]);


                }
            }


            /**
             * We redirect to refresh the tree
             */
            SessionTool::setFlag("form-module_configuration");
            MorphicHelper::redirect();
            return false;
        };
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getConfigurationEntries()
    {
        if (null === self::$configurationEntries) {
            self::$configurationEntries = QuickPdo::fetchAll("select * from $this->configurationTable");
        }
        return self::$configurationEntries;
    }

}
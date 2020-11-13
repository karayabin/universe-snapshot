<?php


namespace Ling\Light_Kit_Admin_UserPreferences\Controller\Custom;


use Ling\Chloroform\Field\DateField;
use Ling\Chloroform\Field\NumberField;
use Ling\Chloroform\Field\StringField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Chloroform\FormNotification\SuccessFormNotification;
use Ling\Chloroform\Validator\IsIntegerValidator;
use Ling\Chloroform\Validator\IsMysqlDatetimeValidator;
use Ling\Chloroform\Validator\IsMysqlDateValidator;
use Ling\Chloroform\Validator\IsNumberValidator;
use Ling\Chloroform\Validator\MinMaxCharValidator;
use Ling\Chloroform\Validator\RequiredValidator;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_UserPreferences\Service\LightUserPreferencesService;

/**
 * The LightKitAdminUserPreferencesUserMainPageController class.
 */
class LightKitAdminUserPreferencesUserMainPageController extends AdminPageController
{

    /**
     * Renders the user main page.
     *
     * @return \Ling\Light\Http\HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base";
        $page = "Light_Kit_Admin_UserPreferences/kit/zeroadmin/generated/kit_admin_user_preferences_mainpage";




        /**
         * @var $lup LightUserPreferencesService
         */
        $lup = $this->getContainer()->get("user_preferences");
        $api = $lup->getFactory()->getUserPreferenceApi();
        $plugin2Rows = $api->getPreferencesByUserId(null, [
            'groupByPlugin' => true,
        ]);


        //--------------------------------------------
        // PREPARING THE FORM, BASED ON THE TABLE ROWS
        //--------------------------------------------
        $form = new Chloroform();
        $form->setFormId("lka-up-mainpage-controller");
        $originalRpwValues = [];
        foreach ($plugin2Rows as $plugin => $rows) {
            foreach ($rows as $index => $row) {
                $type = $row['value_type'];

                $validationRules = '';
                $p = explode(':', $type, 2);
                $renderType = array_shift($p);
                if ($p) {
                    $validationRules = array_shift($p);
                }


                $field = null;
                $validators = [];
                switch ($renderType) {
                    case "int":
                        $field = NumberField::create($row['name']);
                        $p = explode('|', $validationRules);
                        $val = IsIntegerValidator::create();
                        if (in_array('positive', $p)) {
                            if (in_array('zero', $p)) {
                                $val->setMode('positiveAndZero');
                            } else {
                                $val->setMode('onlyPositive');
                            }
                        }
                        $validators[] = $val;


                        break;
                    case "number":
                        $field = NumberField::create($row['name']);
                        $validators[] = IsNumberValidator::create();

                        break;
                    case "text":
                        $field = StringField::create($row['name']);
                        if ('optional' !== $validationRules) {
                            $validators[] = RequiredValidator::create();
                        }
                        $validators[] = MinMaxCharValidator::create()->setMax(32);
                        break;
                    case "date":
                        $field = DateField::create($row['name']);
                        $val = IsMysqlDateValidator::create();
                        if ('optional' === $validationRules) {
                            $val->setAcceptEmpty(true);
                        }
                        $validators[] = $val;
                        break;
                    case "datetime":
                        $field = DateField::create($row['name']);
                        $val = IsMysqlDatetimeValidator::create();
                        if ('optional' === $validationRules) {
                            $val->setAcceptEmpty(true);
                        }
                        $validators[] = $val;
                        break;
                    default:
                        $this->error("Don't know this renderType: $renderType (value_type=$type).");
                        break;
                }


                $id = 'field-' . $row['id'];
                $field->setValue($row['value']);
                $originalRpwValues[$id] = $row['value'];
                $field->setId($id);
                $form->addField($field, $validators);

                $plugin2Rows[$plugin][$index]['field'] = $field;
                $plugin2Rows[$plugin][$index]['render_type'] = $renderType;
            }
        }


        if ($form->isPosted()) {
            if ($form->validates()) {

                /**
                 * updating database
                 */
                $data = $form->getVeryImportantData();




                // here we just want the data that bas been changed, to limit costly db insert operations
                foreach ($data as $k => $v) {
                    if (
                        false === array_key_exists($k, $originalRpwValues) ||
                        $v === $originalRpwValues[$k]
                    ) {
                        unset($data[$k]);
                    }
                    else{
                        $id = (int)substr($k, 6);
                        $api->updateUserPreferenceById($id, [
                            'value' => $v,
                        ], [
                            'lud_user_id' => $this->getUser()->getId(),
                        ]);
                    }
                }
                $form->addNotification(SuccessFormNotification::create("The data has been successfully updated."));



            } else {

                $validationErrors = $form->getValidationErrors();
                if ($validationErrors) {
                    $form->addNotification(ErrorFormNotification::create("The form contains some errors, please fix them, and submit the form again."));
                }
            }
        }


        return $this->renderAdminPage($page, [
            "form" => $form,
            "plugin2Rows" => $plugin2Rows,
            "parent_layout" => $parentLayout,
        ]);
    }
}
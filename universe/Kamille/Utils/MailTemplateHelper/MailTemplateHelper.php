<?php


namespace Kamille\Utils\MailTemplateHelper;

use DirScanner\YorgDirScannerTool;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Registry\ApplicationRegistry;
use Kamille\Services\XLog;


/**
 * This class proposes a filesystem organization for mail templates.
 * Modules should adopt this system to promote consistency.
 *
 *
 *
 * All mail templates should be located at the root of the "mails" directory.
 * Those are fallbacks email templates, and the language of those mail templates is up to the website admin.
 *
 * Then, we can provide translations by creating an email template with the same name under the relevant
 * language's (3 letters iso code) directory.
 *
 * For instance:
 *
 *
 * - mail
 *      - MyModule.my_mail_template.html.tpl.php
 *      - MyModule.my_mail_template2.html.tpl.php
 *      - fra
 *          - MyModule.my_mail_template.html.tpl.php
 *          - MyModule.my_mail_template2.html.tpl.php
 *      - end
 *          - MyModule.my_mail_template.html.tpl.php
 *          - MyModule.my_mail_template2.html.tpl.php
 *
 *
 * The naming convention of an email template is the following:
 *
 *
 * - mailTemplate: <ModuleName> <.> <template_id> <.> <type> <.tpl.php>
 * - ModuleName: the module name using CamelCase (first letter is uppercase)
 * - template_id: an email template identifier. Snake case is recommended. The template identifier CANNOT contain a dot
 *                  (as the dot is used as the components separator)
 * - type: html|plain, indicates the type of email
 *
 *
 */
class MailTemplateHelper
{

    public static function getMailTemplatesList()
    {
        $ret = [];
        $mailDir = ApplicationParameters::get("app_dir") . "/mails";
        if (file_exists($mailDir)) {
            $list = YorgDirScannerTool::getFilesWithExtension($mailDir, "tpl.php", false, false, true);
            foreach ($list as $template) {
                $ret[$template] = $template;
            }
        }
        return $ret;
    }


    /**
     * @param $mailTemplate
     * @return array|false, if array:
     *              - module: the module name
     *              - template_id: the template identifier
     *              - type: the type of the template (html|plain)
     */
    public static function getMailTemplateInfo($mailTemplate)
    {
        $p = explode('.', $mailTemplate, 3);
        if (3 === count($p)) {
            $end = explode(".", $p[2]);
            $type = array_shift($end);
            return [
                'module' => $p[0],
                'template_id' => $p[1],
                'type' => $type,
            ];
        }
        return false;
    }


    /**
     * Return content of given template in given lang dir first,
     * or if it fails, return the fallback mail template (at the root of the mails directory),
     * or if it fails again, return false.
     *
     *
     * @param $mailTemplate
     * @param null $lang
     * @param null $type
     * @return bool|string
     * @throws \Kamille\Architecture\ApplicationParameters\Exception\ApplicationParametersException
     * @throws \Kamille\Architecture\Registry\Exception\RegistryException
     */
    public static function getMailTemplateContent($mailTemplate, $lang = null, $type = null)
    {
        if (null === $lang) {
            $mailDir = ApplicationParameters::get("app_dir") . "/mails";
            $lang = ApplicationRegistry::get("lang", "eng");
            $langTemplate = $mailDir . "/$lang/$mailTemplate";
            if (file_exists($langTemplate)) {
                return file_get_contents($langTemplate);
            } else {
                $template = $mailDir . "/$mailTemplate";
                if (file_exists($template)) {
                    XLog::warn("[Kamille.MailTemplateHelper]: file not found: $langTemplate, using $template instead");
                    return file_get_contents($template);
                }
                XLog::error("[Kamille.MailTemplateHelper]: files not found: $langTemplate, and $template");
            }
        }
        return false;
    }
}
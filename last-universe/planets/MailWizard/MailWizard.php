<?php

namespace MailWizard;

/*
 * LingTalfi 2015-12-16
 * This wizard uses trimail notation.
 * https://github.com/lingtalfi/ConventionGuy/blob/master/notation/notation.trimail-template.eng.md
 * 
 * 
 * 
 */
class MailWizard
{

    private $templateDir;
    private $onTemplateNotReadableCb;
    private $sendCb;

    private $subject;
    private $plainText;
    private $htmlText;


    public function __construct()
    {
        $this->templateDir = '/tmp';
    }


    public static function create()
    {
        return new static();
    }

    public function setTemplateDir($templateDir)
    {
        $this->templateDir = $templateDir;
        return $this;
    }


    public function prepareTemplate($template, array $tags = [])
    {
        $this->subject = null;
        $this->plainText = null;
        $this->htmlText = null;


        $tFile = $this->templateDir . '/' . $template;
        if (file_exists($tFile) && is_readable($tFile)) {

            $keys = array_keys($tags);
            $values = array_values($tags);

            $data = file_get_contents($tFile);
            $p = explode('---html---', $data, 2);
            if (array_key_exists(1, $p)) {
                $this->htmlText = trim($p[1]);
                $this->htmlText = str_replace($keys, $values, $this->htmlText);
            }
            $p2 = explode(PHP_EOL, $p[0], 2);
            if (array_key_exists(1, $p2)) {
                $this->plainText = trim($p2[1]);
                $this->plainText = str_replace($keys, $values, $this->plainText);
            }
            $this->subject = $p2[0];
            $this->subject = str_replace($keys, $values, $this->subject);


        }
        else {
            $this->onTemplateNotReadable($tFile, $template);
        }
        return $this;
    }


    /**
     * @param array $recipients , an array of <recipient>
     *          <recipient>: string|array
     *                          string: the email
     *                          array:
     *                              0: email
     *                              1: pretty name
     *
     * @return bool|mixed
     */
    public function sendTo(array $recipients)
    {
        if (is_callable($this->sendCb)) {
            return call_user_func($this->sendCb, $recipients, $this->subject, $this->plainText, $this->htmlText);
        }
        return false;
    }




    //------------------------------------------------------------------------------/
    // BATCH SENDING, DO IT YOURSELF (this will be faster than the sendTo method...)
    //------------------------------------------------------------------------------/
    public function getSubject()
    {
        return $this->subject;
    }

    public function getPlainText()
    {
        return $this->plainText;
    }

    public function getHtmlText()
    {
        return $this->htmlText;
    }

    public function hasHtmlText()
    {
        return (null !== $this->htmlText);
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    /**
     * @param callable $onTemplateNotReadableCb ( str:templateFile, str:template )
     * @return $this
     */
    public function setOnTemplateNotReadableCb(callable $onTemplateNotReadableCb)
    {
        $this->onTemplateNotReadableCb = $onTemplateNotReadableCb;
        return $this;
    }

    public function setSendCb(callable $sendCb)
    {
        $this->sendCb = $sendCb;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function onTemplateNotReadable($templateFile, $template)
    {
        if (is_callable($this->onTemplateNotReadableCb)) {
            call_user_func($this->onTemplateNotReadableCb, $templateFile, $template);
        }
    }

}

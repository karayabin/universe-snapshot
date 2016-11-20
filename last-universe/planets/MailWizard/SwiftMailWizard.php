<?php

namespace MailWizard;

/*
 * LingTalfi 2015-12-16
 * 
 */
use MailWizard\Exception\BadConfigurationException;

class SwiftMailWizard extends MailWizard
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    private $from;


    public function __construct()
    {
        parent::__construct();
        $this->setSendCb(function (array $recipients, $subject, $plainText, $htmlText) {
            if (null !== $this->mailer) {
                if (null !== $this->from) {

                    // Create a message
                    $message = \Swift_Message::newInstance($subject)
                        ->setFrom(MAIL_FROM)
                        ->setTo($recipients)
                        ->setBody($plainText, 'text/plain');


                    if (null !== $htmlText) {
                        $message->addPart($htmlText, 'text/html');
                    }

                    // Send the message
                    $result = $this->mailer->send($message);
                    return $result;
                    
                    
                }
                else {
                    throw new BadConfigurationException("from property not set");
                }
            }
            else {
                throw new BadConfigurationException("Mailer object not set");
            }
        });
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setMailer(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
        return $this;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }


}

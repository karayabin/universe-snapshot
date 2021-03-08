<?php


namespace Ling\Light_Mailer\Service;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\ArrayVariableResolver\ArrayVariableResolverUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\FileSystemTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Logger\LightLoggerService;
use Ling\Light_Mailer\Exception\LightMailerException;
use Swift_ByteStream_FileByteStream;

/**
 * The LightMailerService class.
 */
class LightMailerService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the transports for this instance.
     * It's an array of id => transport.
     * See the multi-transports section in the @page(Light_Mailer conception notes) for more details.
     *
     * @var array
     */
    protected $transports;


    /**
     * This property holds the senders for this instance.
     * It's an array of id => sender.
     * See the multi-senders section in the @page(Light_Mailer conception notes) for more details.
     *
     * @var array
     */
    protected $senders;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     * - useDebug: bool = false.
     *      If true, we send logs via the mailer.debug channel.
     *
     * See the @page(Light_Mailer conception notes) for more details.
     *
     * @var array
     */
    protected $options;


    /**
     * This property holds the tagOpening for this instance.
     * @var string = {
     */
    protected $tagOpening;

    /**
     * This property holds the tagClosing for this instance.
     * @var string = }
     */
    protected $tagClosing;

    /**
     * This property holds the templatePartsAlias2Directories for this instance.
     * @var array
     */
    protected $templatePartsAlias2Directories;


    /**
     * Builds the LightMailerService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->transports = [];
        $this->senders = [];
        $this->options = [];
        $this->templatePartsAlias2Directories = [];
        $this->tagOpening = '{';
        $this->tagClosing = '}';
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Sets a transport.
     *
     * @param string $id
     * @param array $transport
     */
    public function setTransport(string $id, array $transport)
    {
        $this->transports[$id] = $transport;
    }

    /**
     * Sets the transports.
     *
     * @param array $transports
     */
    public function setTransports(array $transports)
    {
        $this->transports = $transports;
    }


    /**
     * Sets a sender.
     *
     * @param string $id
     * @param array $sender
     */
    public function setSender(string $id, array $sender)
    {
        $this->senders[$id] = $sender;
    }

    /**
     * Sets the senders.
     *
     * @param array $senders
     */
    public function setSenders(array $senders)
    {
        $this->senders = $senders;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Registers a template parts directory with the given $alias.
     *
     * @param string $alias
     * @param string $path
     */
    public function registerTemplatePartsDirectory(string $alias, string $path)
    {
        $this->templatePartsAlias2Directories[$alias] = $path;
    }

    /**
     * Sends the email which template id was given to the recipientList, and returns the number of successful emails sent, (including bcc and cc recipients if defined).
     *
     * Note: if the dryTrace option is set to true, the message won't be sent.
     *
     *
     * The recipient list must be one of the following:
     *
     * - plain string, string: a valid email address
     * - array: array of items, each of which can be either:
     *      - a valid email address
     *      - an array:
     *          - 0: a valid email address
     *          - 1: the name (if you want to personalize the email address)
     *
     *      For more info, see the [syntax for addresses](https://swiftmailer.symfony.com/docs/messages.html#adding-recipients-to-your-message) in the swift documentation.
     *
     *
     *
     * Available options are:
     *
     * - transportId: string = "default", the id of the transport item to use
     * - senderId: string = "default", the id of the sender item to use
     * - senderFrom: string, to override the "sender.from" property on the fly (see the conception notes for more details)
     * - vars: array of variables to apply identically to every recipient in the list
     * - recipientVars: array of recipientEmailAddress => variables (array of key => value) to apply to this specific recipient
     *      This is only available in batch mode (i.e. when batch=true).
     * - subject: string=null, to override the subject on the fly
     * - batch: bool=true, whether to send a mail separately with their own address in the "To:" field.
     *      If false, then all the recipient list will show up in the "To:" field.
     *      For more info, see the [swift mailer documentation](https://swiftmailer.symfony.com/docs/sending.html#sending-emails-in-batch)
     * - attachedFiles: an array of items, each of which can be either:
     *      - path, string: the absolute path to the file to add
     *      - fileInfo, array: detailed information about the file to add, it has the following entries:
     *          - path, string, the file absolute path. You should specify either the path or the content, but not both.
     *          - content, string, the content of the file. You should specify either the path or the content, but not both.
     *          - fileName, string=null, the file name.
     *          - mimeType, string=null, the mime type.
     *          - isInline, bool=false, whether to make the attachment appear inline (if supported by the mail client).
     *
     *          All properties are optional, except for the path/content which must be provided.
     *
     * - embeddedFiles: an array of referenceId => items, each of which can be either:
     *      - path, string: the absolute path to the file to embed
     *      - fileInfo, array: detailed information about the file to embed, it has the following entries:
     *          - path, string, the file absolute path. You should specify either the path or the content, but not both.
     *          - content, string, the content of the file. You should specify either the path or the content, but not both.
     *          - fileName, string=null, the file name.
     *          - mimeType, string=null, the mime type.
     *
     *          All properties are optional, except for the path/content which must be provided.
     *
     *      The referenceId becomes available as a tag that you can use like a normal variable (see the vars property).
     *      Note: make sure your variable names don't conflict with your reference ids (otherwise results are unpredictable).
     *
     *
     *
     * - bcc: an extra recipient list (i.e. same format), but those recipients receive a copy of the message without anybody else knowing it
     * - cc: an extra recipient list (i.e. same format), but those recipients are visible in the message headers and will be seen by the other recipients
     * - dryTrace: bool = false.
     *      If true, this method will print the trace of the first message on the screen and not send the message.
     *      This is useful for debug purposes.
     * - errMode: string=exc.
     *      Available error modes are:
     *      - exc: throws an exception if something goes wrong
     *      - log: catches the exception if something goes wrong, and send it to the log.
     *          This uses the Light_Logger service under the hood, with a channel of "error".
     *          See the [error logging convention](https://github.com/lingtalfi/TheBar/blob/master/discussions/error-logging-convention.md) document for more info.
     *
     *
     *
     * See more details in the @page(Light_Mailer conception notes).
     *
     *
     * Note: if the subject is not set (whether in the template or in the option), then an error will be thrown (and the email
     * won't be sent).
     *
     *
     * @param string $templateId
     * @param $recipientList
     * @param array $options
     *
     * @return int
     *
     */
    public function send(string $templateId, $recipientList, array $options = []): int
    {

        $numSent = 0;
        $errMode = $options['errMode'] ?? "exc";


        try {


            $transportId = $options['transportId'] ?? "default";
            $transport = $this->getTransport($transportId);
            $mailer = new \Swift_Mailer($transport);


            $batch = $options['batch'] ?? true;


            $message = new \Swift_Message();


            if (true === $batch) {
                if (is_string($recipientList)) {
                    $recipientList = [$recipientList];
                }
                foreach ($recipientList as $k => $v) {


                    // address & name
                    //--------------------------------------------
                    $address = null;
                    if (is_int($k)) {
                        $address = $v;
                    } else {
                        $address = $k;
                    }
                    $message->setTo([$k => $v]);
                    $this->prepareMessageBody($message, $templateId, $options, $address);

                    $numSent += $this->sendMessage($mailer, $message, $address, $templateId, $options);

                }


            } else {


                $message->setTo($recipientList);
                $this->prepareMessageBody($message, $templateId, $options);
                $numSent += $this->sendMessage($mailer, $message, $recipientList, $templateId, $options);
            }
        } catch (\Exception $e) {
            switch ($errMode) {
                case "log":
                    /**
                     * @var $logger LightLoggerService
                     */
                    $logger = $this->container->get('logger');
                    $logger->log($e, 'error');


                    break;
                default:
                    throw $e;
            }
        }


        return $numSent;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sends a message to the log (if the useDebug option is true).
     *
     * @param string $msg
     */
    protected function debugLog(string $msg)
    {
        $useDebug = $this->options['useDebug'] ?? false;
        if (true === $useDebug) {
            /**
             * @var $logger LightLoggerService
             */
            $logger = $this->container->get("logger");
            $logger->log($msg, "mailer.debug");
        }
    }


    /**
     * Sends the given message, using the given mailer, and returns the number of emails sent.
     *
     * If an error occurs, the behaviour is defined by the throwEx option.
     *
     *
     * Available options are:
     *
     *
     * - throwEx: bool=true. Whether to throw an exception if the sending fails.
     *
     *
     *
     *
     * @param \Swift_Mailer $mailer
     * @param \Swift_Message $message
     * @param array|string $recipientList
     * @param string $templateId
     * @param array $options
     * @return int
     */
    protected function sendMessage(\Swift_Mailer $mailer, \Swift_Message $message, $recipientList, string $templateId, array $options = []): int
    {
        $numSent = 0;
        $throwEx = $options['throwEx'] ?? true;
        try {


            $dryTrace = $options['dryTrace'] ?? false;
            if (true === $dryTrace) {
                echo nl2br($message);
                exit;
            }


            $numSent = $mailer->send($message);
        } catch (\Exception $e) {


            $useDebug = $this->options['useDebug'] ?? false;
            $useSendFailuresLog = $this->options['useSendFailuresLog'] ?? true;

            $sRecipientList = $recipientList;
            if (is_array($recipientList)) {
                $sRecipientList = ArrayToStringTool::toInlinePhpArray($recipientList);
            }


            if (true === $useDebug) {
                $this->debugLog("The sending of an email failed, with recipientList=\"$sRecipientList\", templateId=\"$templateId\", with exception: " . $e);
            }
            if (true === $useSendFailuresLog) {
                $sep = ' .. ';
                $msg = $sRecipientList . $sep . $templateId . $sep . date("Y-m-d H:i:s");
                $this->container->get("logger")->log($msg, "mailer.send_failures");
            }

            if (true === $throwEx) {
                throw $e;
            }
        }


        if ($numSent > 0) {
            $event = LightEvent::createByContainer($this->container);
            $event->setVar("recipientList", $recipientList);
            $event->setVar("templateId", $templateId);
            /**
             * @var $events LightEventsService
             */
            $events = $this->container->get("events");
            $events->dispatch("Light_Mailer.on_mail_sent", $event);
        }
        return $numSent;
    }


    /**
     * Returns the raw template content(s) corresponding to the given template id.
     *
     * Template parts references, if any.
     *
     * The return is an array containing:
     *
     * 0: html, string|null: the html content (or null if not defined)
     * 1: plain, string: the plain content (always defined)
     * 2: subject string|null, the subject of the email (or null if not defined)
     *
     *
     *
     * Security warning: for now we trust the templateId provider, which means you can use path escalation
     * to call unexpected files out of the mailer root dir.
     *
     *
     * Note: raw means no variable is interpreted yet (but template references are).
     *
     *
     * @param string $templateId
     * @return array
     * @throws \Exception
     */
    protected function getTemplateContent(string $templateId): array
    {
        $htmlContent = null;
        $plainContent = null;
        $subjectContent = null;

        $tplDir = $this->getMailerRootDir() . "/" . $templateId;
        if (is_dir($tplDir)) {

            $plainFile = $tplDir . "/plain.txt";
            $htmlFile = $tplDir . "/html.html";
            $subjectFile = $tplDir . "/subject.txt";

            if (true === file_exists($htmlFile)) {
                $htmlContent = file_get_contents($htmlFile);
                if (true === file_exists($plainFile)) {
                    $plainContent = file_get_contents($plainFile);
                } else {
                    $plainContent = strip_tags($htmlContent);
                }
            } elseif (true === file_exists($plainFile)) {
                $plainContent = file_get_contents($plainFile);
            } else {
                $this->error("No template file found in $tplDir. ");
            }
            $subjectContent = file_get_contents($subjectFile);


            //--------------------------------------------
            // RESOLVING TEMPLATE PARTS REFERENCES
            //--------------------------------------------
            $this->resolveTemplatePartsReferences($plainContent, $templateId);


            if (null !== $htmlContent) {
                $this->resolveTemplatePartsReferences($htmlContent, $templateId);
            }

            if (null !== $subjectContent) {
                $this->resolveTemplatePartsReferences($subjectContent, $templateId);
            }

        } else {
            $this->error("Template directory not found: $tplDir.");
        }
        return [
            $htmlContent,
            $plainContent,
            $subjectContent,
        ];
    }


    /**
     * Resolves in place the template parts references from the given $content.
     *
     * @param string $content
     * @param string $templateId
     */
    protected function resolveTemplatePartsReferences(string &$content, string $templateId)
    {
        $content = preg_replace_callback('!\{([^}]*)\}!', function ($match) use ($templateId) {
            $inner = $match[1];
            $p = explode(':', $inner, 2);
            if (2 === count($p)) {
                $alias = $p[0];
                $relPath = $p[1];
                if (false === array_key_exists($alias, $this->templatePartsAlias2Directories)) {
                    $this->error("Alias not registered: $alias (templateId=$templateId).");
                }
                $dir = $this->templatePartsAlias2Directories[$alias];
                $tplPath = FileSystemTool::removeTraversalDots($dir . "/" . $relPath);

                if (false === is_file($tplPath)) {
                    $this->error("Template part not found: $tplPath (templateId=$templateId, alias=$alias).");
                }

                return file_get_contents($tplPath);


            }
            return $match[0];
        }, $content);
    }


    /**
     * Returns the transport for the given id.
     *
     *
     * @param string $transportId
     * @return \Swift_Transport
     */
    protected function getTransport(string $transportId): \Swift_Transport
    {
        $transport = null;
        if (array_key_exists($transportId, $this->transports)) {
            $transportConf = $this->transports[$transportId];
            $type = $transportConf['type'] ?? null;
            switch ($type) {
                case "smtp":

                    $missingKeys = [];
                    if (true === ArrayTool::arrayKeyExistAll([
                            "host",
                            "port",
                            "username",
                            "password",
                        ], $transportConf, false, $missingKeys)) {

                        $c = $transportConf;


                        $transport = new \Swift_SmtpTransport($c['host'], $c['port']);
                        $transport
                            ->setUsername($c['username'])
                            ->setPassword($c['password']);

                    } else {
                        $this->error("The following properties were not configured for your smtp transport: " . implode(', ', $missingKeys) . ".");
                    }
                    break;
                default:
                    $this->error("This transport type is not implemented yet: \"$type\".");
                    break;
            }


        } else {
            $this->error("Transport not configured with id=\"$transportId\".");
        }
        return $transport;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the absolute path to the mailer root dir, which contains all the templates.
     *
     * @return string
     */
    private function getMailerRootDir(): string
    {
        return $this->container->getApplicationDir() . "/templates/Light_Mailer";
    }


    /**
     * Check that the subject is set, and if not throws an exception.
     * @param $subject
     * @param string $templateId
     */
    private function checkSubject($subject, string $templateId)
    {
        if (null === $subject) {
            $this->error("You didn't define a subject for your email (templateId=$templateId).");
        }
        if (true == empty($templateId)) {
            $this->error("You can't send a message with an empty subject (templateId=$templateId).");
        }
    }


    /**
     * Prepares the message.
     *
     * Available options are explained in the send method comments:
     *
     * - bcc
     * - cc
     * - senderFrom
     * - senderId
     * - attachedFiles
     * - embeddedFiles
     *
     *
     *
     * The address parameter is only required if you're sending mail in batch mode.
     * It's used to get the recipientSpecific variables.
     *
     *
     *
     *
     *
     * @param \Swift_Message $message
     * @param string $templateId
     * @param array $options
     * @param string|null $address
     * @throws \Ling\ArrayVariableResolver\Exception\ArrayVariableResolverException
     */
    private function prepareMessageBody(\Swift_Message $message, string $templateId, array $options, string $address = null)
    {

        /**
         * For efficiency purposes, I merge the common variables and the recipient specific variables, so that
         * we only resolve once...
         * Note: it's also merged with the embedded file references for the same reason
         */
        $allVariables = $options['vars'] ?? [];


        // extra recipients
        //--------------------------------------------
        if (array_key_exists('bcc', $options)) {
            $message->addBcc($options['bcc']);
        }
        if (array_key_exists('cc', $options)) {
            $message->addCc($options['cc']);
        }


        // sender details
        //--------------------------------------------
        if (array_key_exists('senderFrom', $options)) {
            $message->addFrom($options['senderFrom']);
        } else {
            $senderId = $options['senderId'] ?? 'default';
            $senderItem = $this->getSenderItem($senderId);
            if (false === array_key_exists('from', $senderItem)) {
                $this->error("The \"from\" property is missing in the mailer configuration with senderId=\"$senderId\".");
            }
            $from = $senderItem['from'];
            if (false === is_array($from)) {
                $from = [$from];
            }
            foreach ($from as $fromItem) {
                $fromName = null;
                if (is_array($fromItem)) {
                    list($fromAddress, $fromName) = $fromItem;
                } else {
                    $fromAddress = $fromItem;
                }
                $message->addFrom($fromAddress, $fromName);
            }


            if (array_key_exists('sender', $senderItem)) {
                $message->setSender($senderItem['sender']);
            }
            if (array_key_exists('returnPath', $senderItem)) {
                $message->setReturnPath($senderItem['returnPath']);
            }
        }


        // attached files
        //--------------------------------------------
        $attachedFiles = $options['attachedFiles'] ?? [];
        foreach ($attachedFiles as $fileInfo) {

            if (is_string($fileInfo)) {
                $attachment = \Swift_Attachment::fromPath($fileInfo);
                $attachment->setDisposition("attachment");
            } else {

                $path = $fileInfo['path'] ?? null;
                $content = $fileInfo['content'] ?? null;
                $fileName = $fileInfo['fileName'] ?? null;
                $mimeType = $fileInfo['mimeType'] ?? null;
                $isInline = $fileInfo['isInline'] ?? false;

                if (null === $path && null === $content) {
                    $this->error("Problem while attaching file: neither the path or the content is defined (templateId=\"$templateId\").");
                }


                if (null !== $path) {
                    $attachment = \Swift_Attachment::fromPath($path, $mimeType);
                    if (null !== $fileName) {
                        $attachment->setFilename($fileName);
                    }
                } else {
                    $attachment = new \Swift_Attachment($content, $fileName, $mimeType);
                }
                if (true === $isInline) {
                    $attachment->setDisposition('inline');
                }

            }
            $message->attach($attachment);
        }


        // embedded files
        //--------------------------------------------
        $embeddedFiles = $options['embeddedFiles'] ?? [];
        foreach ($embeddedFiles as $refId => $fileInfo) {

            if (is_string($fileInfo)) {
                $allVariables[$refId] = $message->embed(\Swift_Image::fromPath($fileInfo));
            } else {


                $path = $fileInfo['path'] ?? null;
                $content = $fileInfo['content'] ?? null;
                $fileName = $fileInfo['fileName'] ?? null;
                $mimeType = $fileInfo['mimeType'] ?? null;

                if (null === $path && null === $content) {
                    $this->error("Problem while embedding file: neither the path or the content is defined (templateId=\"$templateId\").");
                }

                if (null !== $path) {
                    $img = (new \Swift_Image())->setFile(new Swift_ByteStream_FileByteStream($path));
                } else {
                    $img = new \Swift_Image($content, $fileName, $mimeType);
                }

                if ($mimeType) {
                    $img->setContentType($mimeType);
                }
                if ($fileName) {
                    $img->setFilename($fileName);
                }
                $allVariables[$refId] = $message->embed($img);
            }
        }


        // resolve variables
        //--------------------------------------------
        $recipientVars = $options['recipientVars'] ?? [];
        $contents = $this->getTemplateContent($templateId);


        if (null !== $address) { // recipient specific vars
            if ($recipientVars && true === array_key_exists($address, $recipientVars)) {
                $allVariables = array_replace($allVariables, $recipientVars[$address]);
            }

        }

        $tagResolver = new ArrayVariableResolverUtil();
        $tagResolver->setFirstSymbol('');
        $tagResolver->setOpeningBracket($this->tagOpening);
        $tagResolver->setClosingBracket($this->tagClosing);
        $tagResolver->resolve($contents, $allVariables);


        // subject & body
        //--------------------------------------------
        list($htmlContent, $plainContent, $subjectContent) = $contents;
        $this->checkSubject($subjectContent, $templateId);
        $message->setSubject($subjectContent);
        if (null !== $htmlContent) {
            $message->setBody($htmlContent, 'text/html');
            $message->addPart($plainContent, 'text/plain');
        } else {
            $message->setBody($plainContent, 'text/plain');
        }


    }

    /**
     * Returns the sender item for the given id.
     *
     * See the @page(multi-sender section of the conception notes) for more details.
     *
     *
     * @param string $senderId
     * @return \Swift_Transport
     * @throws \Exception
     */
    private function getSenderItem(string $senderId): array
    {
        $item = null;
        if (array_key_exists($senderId, $this->senders)) {
            return $this->senders[$senderId];
        } else {
            $this->error("Sender not configured with id=\"$senderId\".");
        }
        return $item;
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightMailerException($msg);
    }
}
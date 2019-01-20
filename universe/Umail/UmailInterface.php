<?php


namespace Umail;


use Umail\Exception\UmailException;
use Umail\Renderer\RendererInterface;
use Umail\TemplateLoader\TemplateLoaderInterface;


/**
 * This class serves as the documentation cheatsheet for the Umail class.
 * Umail needs SwiftMailer to be available before it can be used.
 *
 *
 *
 * Note:
 * if you want to get the invalid emails that have been rejected,
 * you have to hope that your concrete class provides you with hooks to do so:
 * there is no such capability inherent to this interface.
 * This is the desired design.
 *
 *
 */
interface UmailInterface
{


    /**
     * Create the base instance and returns it,
     * it should always be the first method that you call.
     *
     *
     * @return UmailInterface
     * @throws UmailException if SwiftMailer library is not available
     */
    public static function create();

    /**
     * @return \Swift_Mailer, returns the Swift_Mailer instance,
     * so that further customization can be done.
     * The returned instance has a transport bound to it already.
     */
    public function getMailer();

    /**
     * @return \Swift_Message instance,
     * so that you can customize it further.
     *
     *
     * For instance, if you want to use embed files
     * (http://swiftmailer.org/docs/messages.html#embedding-existing-files)
     * without variable references (or you can use the embedFile method in
     * that specific case).
     */
    public function getMessage();


    /**
     * Set the recipients of the email.
     *
     * $recipients:
     * recipient(s) of the email.
     * If it's a string, it's the email of the recipient.
     * If it's an array, it's an array of recipients.
     *
     * $batchMode: bool, whether to use the batchMode or not.
     * If the batch mode is used (default), every recipient receives her own email,
     * a VarLoader object can be used, and the "to" field only contains the recipient address.
     *
     * If the batch mode is NOT used, then every recipient receives the SAME email,
     * which means that the VarLoader object is useless (see more info in the comments of the setVarLoader method),
     * and the "to" field contains the email addresses of every recipient (i.e. everybody knows who the mail was sent to).
     *
     * @return UmailInterface
     *
     */
    public function to($recipients, $batchMode = true);

    /**
     * @return UmailInterface
     */
    public function bcc($recipients);

    /**
     * @return UmailInterface
     */
    public function cc($recipients);

    /**
     * @return UmailInterface
     */
    public function from($recipients);

    /**
     * Specifies the address where replies are sent to
     * @return UmailInterface
     */
    public function replyTo($recipient);

    /**
     * @return UmailInterface
     */
    public function subject($subject);

    /**
     * htmlBody and plainBody set the content of the email,
     * they are only used if no template is set (see the setTemplate method).
     *
     * In other words, you either use the template system (with the setTemplate method),
     * or the default system (with the htmlBody and plainBody methods), but
     * you cannot mix systems together (i.e. you cannot have your html
     * set with the template system and your plain with the default)
     *
     * @return UmailInterface
     */
    public function htmlBody($content);


    /**
     * @return UmailInterface
     */
    public function plainBody($content);

    /**
     * Sets a template.
     *
     * If the template is set, it will be used instead of the content set by
     * the htmlBody and plainBody methods.
     *
     * This method sets the template name, from which the template content (for both html and/or plain version)
     * can be guessed (with the help of the TemplateLoader object).
     *
     * It's a template for the mail body only (not a template for the mail subject).
     *
     * @return UmailInterface
     */
    public function setTemplate($templateName);

    /**
     * Set the template loader object, which is responsible for resolving
     * a template name into a template content for both the html and
     * the plain text versions.
     *
     * @return UmailInterface
     */
    public function setTemplateLoader(TemplateLoaderInterface $loader);


    /**
     * @param RendererInterface $renderer
     * @return UmailInterface
     */
    public function setRenderer(RendererInterface $renderer);


    public function setTransport(\Swift_Transport $transport);

    /**
     * Variables
     * --------------
     *
     * Variables can be injected in the body and or the subject of an email.
     * You can use variables no matter where the body comes from (htmlBody method,
     * or setTemplate method).
     *
     * This method sets the variables to use.
     *
     * There are two types of variables:
     *
     * - common variables: they are the same for every recipient
     * - email variables: they depend on the recipient's email address
     *
     * Both types are in the form of an array of variable => value.
     *
     *
     * @param array $commonVars : an array of common variables
     * @param callable $emailVarsCb : a callable which takes an email address as input,
     *                  and returns an array of corresponding variables.
     *
     * @return UmailInterface
     */
    public function setVars(array $commonVars, $emailVarsCb = null);

    /**
     * A variable injected into a body is called "variable reference".
     *
     * The func argument is a callable that takes a variable as input,
     * and returns a variable reference as the output.
     *
     * Typically, a variable reference is like a variable, but with curly braces around.
     * For instance {myVariable} could be the variable reference for the variable myVariable.
     *
     * @return UmailInterface
     */
    public function setVarReferenceWrapper($func);


    /**
     * Attach a file to the mail body.
     *
     * If allow_url_fopen is on, you can even attach files from other websites.
     *
     * @param $file , the path to the file, or the data of a file (for instance if you
     *                      want to generate a pdf dynamically)
     * @param $fileName , the name of the file, by default, the name of the
     *                  attached file will be used. Example: kool.jpg
     * @param $mimeType , the mime type of the file (ex: image/jpeg).
     *                      Is guessed automatically for common formats (images,
     *                      pdf, spreadsheets,...)
     * @param bool $inline =false, whether or not you prefer that the attached
     *              file appears inline, assuming that the mimeType allows it.
     *              More info here: http://swiftmailer.org/docs/messages.html#changing-the-disposition
     *
     *              Note: from my personal tests, the client has its own preferences
     *              to and it can choose inline mode even if you don't specify it
     *              with this inline argument.
     *
     * @param bool $isFilePath =true, whether or not the given file is a file path or a dynamically generated content
     *
     *
     *
     * @return UmailInterface
     */
    public function attachFile($file, $fileName = null, $mimeType = null, $inline = false, $isFilePath = true);

    /**
     * @param $file , the path to the file, or the data of a file (for instance if you
     *                      want to generate an image dynamically)
     * @param $fileName , the name of the file, by default, the name of the
     *                  attached file will be used. Example: kool.jpg
     * @param $mimeType , the mime type of the file (ex: image/jpeg).
     *                      Is guessed automatically for common formats (images)
     *
     * @param bool $isFilePath =true, whether or not the given file is a file path or a dynamically generated content
     *
     * @return string, the contentId that you need to include in your html body,
     *              inside the src attribute of your image (or video) to make
     *              the media appear embedded.
     *
     *
     */
    public function embedFile($file, $fileName = null, $mimeType = null, $isFilePath = true);


    /**
     * Send the prepared email to the prepared recipients,
     * and return the number of emails successfully sent.
     *
     * @return int
     */
    public function send();


}
<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Mail\SmtpMailer;


/**
 * This interface provides special methods for the following headers:
 *
 * - from
 * - to
 * - cc
 * - bcc
 *
 * All those methods accept a $recipients parameter which can be one of:
 *
 * - string: an emailAddress
 * - array: an array of either:
 *              - numericKey => emailAddress
 *              or
 *              - emailAddress => displayName
 * 
 * 
 */
interface SmtpClientInterface
{


    /**
     * @param $plainMsg
     * @return int, the number of recipients to which the message has been sent
     */
    public function send($plainMsg);


    /**
     * @return SmtpClientInterface
     */
    public function subject($subject);
    /**
     * Sets header field, except for To, Bcc, Cc and From which have their own method
     * @return SmtpClientInterface
     */
    public function set($name, $value);

    /**
     * @return SmtpClientInterface
     */
    public function to($recipients);

    /**
     * @return SmtpClientInterface
     */
    public function bcc($recipients);


    /**
     * @return SmtpClientInterface
     */
    public function cc($recipients);


    /**
     * @return SmtpClientInterface
     */
    public function from($recipients);

    /**
     * Adds a html body to the mime message
     * @return SmtpClientInterface
     */
    public function html($html);
    
    /**
     * @param $file ,
     *              this can be either a file path, or a base64 encoded string
     *              in php, use this:
     *                      $base64 = base64_encode($file);
     * 
     *              If you use the base64 form, you must specify the mime type (third argument). 
     *
     *
     * @param $cid
     * @param null|string $mimeType
     * @return SmtpClientInterface
     *
     *
     * To use an embed image,
     * use the syntax <img src="cid:whatever">
     * The "src=cid:" part is required for the email client to recognize the <img> tag as an embedded image
     * while the "whatever" part is the actual Content-Id (argument $cid of this method)
     */
    public function embed($file, $cid, $mimeType = null);

    /**
     * @param $file
     *              this can be either a file path, or a base64 encoded string
     *              in php, use this:
     *                      $base64 = base64_encode($file);
     * 
     *              If you use the base64 form, you might want to specify the mime type (third argument). 
     *
     * @param null|string $displayName
     * @param null|string $mimeType
     * @return SmtpClientInterface
     */
    public function attach($file, $displayName = null, $mimeType = null);



}

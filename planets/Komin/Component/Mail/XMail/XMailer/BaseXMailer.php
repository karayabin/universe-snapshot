<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Mail\XMail\XMailer;


/**
 * BaseXMailer
 * @author Lingtalfi
 * 2014-12-07
 *
 * Params for BaseXMailer are:
 *
 *
 *
 *
 *
 * - subject
 *
 * - plain
 * - (andOr)
 * - html
 *
 * - to: <recipient>
 * - ?cc: <recipient>
 * - ?bcc: <recipient>
 *
 * - from: <recipient>
 * - (andOr)
 * - sender: <emailAddress>   # higher precedence than from
 *
 * - ?returnPath: string (email address)
 *
 * - embed: array of <tag> => <embedded>
 * - attach: array of <attach>
 *
 *
 *
 * With:
 *
 * - recipient: <emailAddress> | array of <emailAddress>
 * - emailAddress: string|array, the email address, or the array: emailAddress => pretty name
 * - tag: string, an unique identifier
 * - embedded:
 * ----- path: path to the file (image?) to embed
 * ----- (xOr)
 * ----- data: data of the file ( for instance base64_decode ( base64EncodedImage ) )
 *
 * ----- ?name: pretty name of the file
 * ----- ?mimeType:
 * - attach:
 * ----- path: path to the file (image?) to embed
 * ----- xOr
 * ----- data: data of the file ( for instance base64_decode ( base64EncodedImage ) )
 *
 * ----- ?name: pretty name of the file
 * ----- ?mimeType:
 * ----- ?inline: bool, whether or not to dispose the content inline
 *
 *
 */
abstract class BaseXMailer implements XMailerInterface
{

    protected $params;

    abstract protected function doSendMail(array $params);


    /**
     * @return bool: whether or not the configuration went ok
     */
    public function configure(array $params = [])
    {
        $this->params = $params;
    }


    /**
     * @return int: number of sent emails
     */
    public function sendMail(array $params = [])
    {
        $params = array_replace($this->params, $params);
        return $this->doSendMail($params);
    }
}

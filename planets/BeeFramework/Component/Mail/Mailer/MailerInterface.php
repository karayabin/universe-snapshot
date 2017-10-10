<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Mail\Mailer;


/**
 * MailerInterface
 * @author Lingtalfi
 *
 *
 */
interface MailerInterface
{

    /**
     * @param $to: <emailAddress> | array of <emailAddress>
     *
     *      With:
     *          - emailAddress: string|array, the email address, or the array: emailAddress => pretty name
     *
     *
     * @param $subject
     *
     * @param $message: the message to send. String (plain) or array:
     *                                                          - ?html: html version
     *                                                          - ?plain: plain version
     *
     * @param null $from: same syntax as to
     * @param array $options:
     *                 - embed: array of <tag> => <embed>
     *
     *                      With:
     *
     *                         - tag: string, an identifier
     *                         - embed:
     *                         ----- path: path to the file (image?) to embed
     *                         ----- xOr
     *                         ----- data: data of the file ( for instance base64_decode ( base64EncodedImage ) )
     *
     *                         ----- ?name: pretty name of the file
     *                         ----- ?mimeType:
     *
     *                 - cc: same syntax as to
     *                 - bcc: same syntax as to
     *                 - sender: string: email address of the one person who sent the message
     *                 - returnPath: string: email address of where bounce notifications should be sent
     *                 - attach: array of <attach>
     *
     *                      With:
     *
     *                         - attach:
     *                         ----- path: path to the file (image?) to embed
     *                         ----- xOr
     *                         ----- data: data of the file ( for instance base64_decode ( base64EncodedImage ) )
     *
     *                         ----- ?name: pretty name of the file
     *                         ----- ?mimeType:
     *                         ----- ?inline: bool, whether or not to dispose the content inline
     *                                              (note, I had some issues with this: not working very well with 5.0.1, probably my fault?)
     *
     *
     *
     * @return int|false, the number of emails sent, or false on failure
     */
    public function sendMail($to, $subject, $message, $from = null, array $options = array());
}

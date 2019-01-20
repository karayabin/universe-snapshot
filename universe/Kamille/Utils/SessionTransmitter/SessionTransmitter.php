<?php


namespace Kamille\Utils\SessionTransmitter;

use Bat\FileSystemTool;


/**
 * Sometimes, the tools used by your application needs to work together in order to produce the desired result.
 *
 * Occasionally, you will use programs that fetch an uri in order to do their job correctly (for instance wkhtmltopdf
 * can recreate a pdf from a web page, which means: it fetches the web page).
 *
 * When that's the case, the session context of your program naturallly differs from your connected user's context,
 * and if you need to access the session user context, then you need to workaround this problem.
 *
 * A naive approach is to pass the sessionId via the uri.
 * The problem with this is that the sessionId is transmitted directly via the uri, creating another attack vector
 * for malicious users.
 *
 * To limit this problem (or at least try to), the class below implements the following pattern where the sessionId is first encapsulated
 * in a temporary file (on the application server), and then the path to the file is transmitted via the uri
 * (thus limitating the attack window).
 *
 * Then, your application has the responsibility to recognize that a file was passed (checking a simple GET or POST
 * param) and call session_id() before the session starts again.
 *
 * Actually, that was the idea BEFORE I realize that trying to re-emulate the session from the session_id in my
 * case didn't work. Therefore, this class will save the whole $_SESSION array as a serialized string,
 * and unserialize it and paste it to the $_SESSION on the new process.
 *
 *
 *
 * So, the tool below should help you do that.
 *
 * We recommend the following identifier in your GET params to pass the file name to your next tool in your chain:
 *
 * - _st
 *      (meaning session transmitter)
 *
 *
 */
class SessionTransmitter
{

    /**
     * Encapsulate the session id in a temporary file, and return the relative path to this temporary file.
     * The baseDir is defined by you, so that the malicious user don't know what's the base
     * dir (/tmp, /myapp/secret, ...).
     *
     */
    public static function encapsulateSession($baseDir = null, $fileName = null)
    {
        if (null === $baseDir) {
            $baseDir = "/tmp";
        }
        if (null === $fileName) {
            $fileName = uniqid();
        }
        $file = $baseDir . "/" . $fileName;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        FileSystemTool::mkfile($file, serialize($_SESSION));
        return $fileName;
    }


    /**
     * This method listens to the _sit key in GET (or another key if you want),
     * and then if there is such a key:
     *
     * - extract the session id from the corresponding file
     * - calls session_id (so that the session will be recreated)
     * - destroys the temporary file
     *
     * You should call this method at the very beginning of your app (in your init for instance)
     *
     */
    public static function recreateSessionIfNecessary($key = null, $baseDir = null)
    {


        if (null === $baseDir) {
            $baseDir = "/tmp";
        }
        if (null === $key) {
            $key = "_st";
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (array_key_exists($key, $_GET)) {
            $file = $baseDir . "/" . $_GET[$key];
            if (file_exists($file)) {
                $session = unserialize(file_get_contents($file));
                unlink($file);
                if (is_array($session)) {
                    $_SESSION = $session;
                }
            }
        }
    }
}
<?php


namespace Ling\Light\Http;


/**
 * The HttpAttachmentResponse class.
 *
 */
class HttpAttachmentResponse extends HttpResponse
{

    /**
     * This property holds the file path for this instance.
     * @var string
     */
    protected $file;

    /**
     * This property holds the filename to suggest to the browser.
     *
     * Note: this is a suggestion that most browsers consider, but not an official feature.
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Disposition
     *
     * @var string=null
     */
    protected $filename;

    /**
     * Creates and returns the http attachment response instance.
     *
     *
     * @param string $file
     * @param string|null $filename =null
     *
     * @return $this
     */
    public static function create(string $file, string $filename = null)
    {
        $o = new static(file_get_contents($file));
        $o->file = $file;
        $o->filename = $filename;
        return $o;
    }


    /**
     * @overrides
     */
    protected function sendHeaders()
    {
        $s = 'Content-Disposition: attachment';
        if (null !== $this->filename) {
            $s .= '; filename="' . addslashes($this->filename) . '"';
        }
        header($s);
        return parent::sendHeaders();
    }


}
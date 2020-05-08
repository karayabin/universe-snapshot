<?php


namespace Ling\Light\Http;


/**
 * The HttpAttachmentResponse class.
 *
 *
 */
class HttpAttachmentResponse extends HttpResponse
{


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
     * @param string $path
     * @param string|null $filename =null
     *
     * @return $this
     */
    public static function create(string $path, string $filename = null)
    {
        $o = new static(file_get_contents($path));
        $o->filename = $filename;
        return $o;
    }


    /**
     * Sets the file and optionally filename for this attachment.
     *
     * @param string $path
     * @param string|null $filename
     * @throws \Exception
     */
    public function setFile(string $path, string $filename = null)
    {
        $this->getBody()->truncate()->write(file_get_contents($path));
        $this->filename = $filename;
    }


    /**
     * @overrides
     */
    protected function sendHeaders()
    {

        $value = "attachment";
        if (null !== $this->filename) {
            $value .= '; filename="' . addslashes($this->filename) . '"';
            $this->setHeader("Content-Disposition", $value);

            return parent::sendHeaders();
        }
    }

}
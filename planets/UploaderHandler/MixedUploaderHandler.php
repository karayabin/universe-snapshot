<?php

namespace UploaderHandler;

/*
 * LingTalfi 2016-01-11
 * This handler handles:
 * 
 * - chunking
 * - upload via $_FILES
 * - upload via php://input (post body)
 * 
 * It accepts various input, and therefore is called MIXED uploader.
 * 
 * 
 * Synopsis (in a perfect world)
 * ---------------
 * 
 * The idea behind this implementation is the following:
 * 
 * 
 * The file is submitted to the server, using one of the allowed methods (chunking, regular upload).
 * 
 * prepare
 * The server checks that the client has the right to do so, 
 * and puts the file (or fragment of file in case of chunking) to a temporary directory.
 * 
 * filter
 * Then the server applies its filters to the temporary uploaded file to see if there is something wrong about it.
 * 
 * 
 * accept
 * if everything is ok, then the server moves the temporary uploaded file to its final location and echoes back 
 * an appropriate message for the client
 * 
 * refute
 * if a filter failed, then the server removes the temporary uploaded file and echoes back an appropriate message
 * for the client 
 * 
 * 
 * 
 * 
 * 
 * 
 *
 * The strategy
 * ----------------
 * 
 * The file/chunk is uploaded:
 * 
 * - prepare the uploader 
 * ----- define the path where the uploaded file/chunk will be stored at first, 
 *              then you can move it again during onFileAccepted phase,
 *              or decide to delete it during onFileRejected phase.
 * ----- the prepare method also handles the upload (display appropriate messages) when it fails
 * ----- you can for instance check that the user is authenticated to your app
 * ----- you can set a tmp directory, outside the web server dir, where the file will be uploaded
 * 
 * 
 * - apply filters (either on chunking, or regular upload, or both)
 * ----- you can use filters to check for max size for instance (to prevent infinite chunking uploading)
 * ----- apply on file rejected if a filter returned false
 * 
 * - the accept method is called if all filters passed
 * ----- you can for instance move the file from a tmp directory to the web 
 *                  server root (if you want to provide a web access to the uploaded file)
 * ----- it's also a good place to display the appropriate server's response (maybe return
 *       the file's web url if user should access the file through the web) 
 * 
 * - the refute method is called if at least one filter fails (returns false)
 *      Failing filters should populate the errors array passed to them.
 * 
 * 
 * 
 */
class MixedUploaderHandler implements UploaderHandlerInterface
{


    /**
     * @var array of [callable, onFileUploaded=true, onChunkUploaded=false]
     *      The callable is a filter:
     *                      bool  callable ( str:absolutePath, bool:isChunk, UploaderHandlerInterface:instanceBeingInvoked )
     *
     */
    private $filters;
    /**
     * All callables below have the same definition as the callable define for the filters property above
     */
    private $onPrepareCb;
    private $filtersCb;
    private $onFileRejectedCb;
    private $onFileAcceptedCb;

    public function __construct()
    {
        $this->filters = [];
    }

    public static function create()
    {
        return new static();
    }


    /**
     * Might display things.
     * @return void
     */
    public function handle()
    {
        $isChunk = false;
        $path = null; // absolute path where the file/chunk is uploaded first
        if (false !== $this->prepare($path, $isChunk)) {
            $errors = [];
            if (true === $this->filter($path, $isChunk, $errors)) {
                $this->accept($path, $isChunk);
            }
            $this->refute($path, $isChunk, $errors);
        }
    }


    /**
     * @param $path
     * @param $isChunk
     * @return false|void, false if the preparation was a failure (unauthenticated user for instance...)
     */
    protected function prepare(&$path, &$isChunk)
    {
        if (null !== $this->onPrepareCb) {
            return call_user_func_array($this->onPrepareCb, [&$path, &$isChunk, $this]);
        }
    }

    protected function filter($path, $isChunk, array &$errors)
    {
        foreach ($this->filters as $info) {
            list($cb, $onFile, $onChunk) = $info;
            if (
                (true === $onFile && false === $isChunk) ||
                (true === $onChunk && true === $isChunk) ||
                (false === call_user_func_array($cb, [$path, $isChunk, &$errors, $this]))
            ) {
                return false;
            }
        }
        if (null !== $this->filtersCb) {
            return call_user_func_array($this->filtersCb, [$path, $isChunk, &$errors, $this]);
        }
        return true;
    }

    protected function accept($path, $isChunk)
    {
        if (null !== $this->onFileAcceptedCb) {
            call_user_func($this->onFileAcceptedCb, $path, $isChunk, $this);
        }
    }
    
    protected function refute($path, $isChunk, array $errors)
    {
        if (null !== $this->onFileRejectedCb) {
            call_user_func($this->onFileRejectedCb, $path, $isChunk, $errors, $this);
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function addFilter(callable $filter, $onFileUploaded = true, $onChunkUploaded = false)
    {
        $this->filters[] = [$filter, $onFileUploaded, $onChunkUploaded];
        return $this;
    }

    public function setFiltersCb(callable $filtersCb)
    {
        $this->filtersCb = $filtersCb;
        return $this;
    }

    public function setOnFileAcceptedCb(callable $onFileAcceptedCb)
    {
        $this->onFileAcceptedCb = $onFileAcceptedCb;
        return $this;
    }

    public function setOnFileRejectedCb(callable $onFileRejectedCb)
    {
        $this->onFileRejectedCb = $onFileRejectedCb;
        return $this;
    }

    public function setOnPrepareCb(callable $onPrepareCb)
    {
        $this->onPrepareCb = $onPrepareCb;
        return $this;
    }


}

<?php


namespace Kamille\Utils\Claws\Helper;


use Kamille\Architecture\Controller\Exception\ClawsHttpResponseException;
use Kamille\Architecture\Response\Web\HttpResponse;
use Kamille\Services\XLog;
use Kamille\Utils\Claws\Claws;
use Kamille\Utils\Claws\Renderer\ClawsRenderer;

class ClawsHelper
{


    /**
     * @param callable $callback , receives a ClawsInterface instance
     * @param array $options
     * @return HttpResponse|\Kamille\Architecture\Response\Web\HttpResponseInterface
     */
    public static function getHttpResponseByClaws(callable $callback, array $options = [])
    {

        $notHandledExceptionText = $options['notHandledExceptionText'] ?? "Unknown error from ClawsHelper, please watch your logs";

        try {


            $claws = new Claws();
            call_user_func($callback, $claws);

            $renderer = new ClawsRenderer();
            $content = $renderer->setClaws($claws)->render();
            $ret = HttpResponse::create($content);


        } catch (\Exception $e) {
            if ($e instanceof ClawsHttpResponseException) {
                $ret = $e->getHttpResponse();
            } else {
                XLog::error("[ClawsHelper] -- exception: $e");
                $ret = HttpResponse::create($notHandledExceptionText);
            }
        }
        return $ret;
    }

}
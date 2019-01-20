<?php


namespace Kamille\Architecture\Request\Web;


class FakeHttpRequest extends HttpRequest
{

    public static function create()
    {

        $o = new static();

        $fake = '-*fake*-';
        $o->server = [
            "REQUEST_URI" => $fake,
            "QUERY_STRING" => $fake,
            "HTTPS" => $fake,
            "REQUEST_METHOD" => $fake,
            "SERVER_NAME" => $fake,
            "SERVER_PORT" => $fake,
            "SERVER_PROTOCOL" => $fake,
            "REMOTE_ADDR" => $fake,
            "REMOTE_PORT" => $fake,
        ];
        return $o;
    }


    public function setHost($host)
    {
        $this->server['SERVER_NAME'] = $host;
        return $this;
    }
}

Example #1: the call method
--------------------------------------------


The following code:

```php
$url = "http://www.example.com/";
$curl = new SimpleCurl();
if (false !== $response = $curl->call($url)) {
    a($response->getHttpCode()); // int 200
    a($response->getHeaders());
    a($response->getBody());
} else {
    a($curl->getErrors());
}

```

Would produce this kind of output:


```php


int(200)



array(10) {
  ["cache-control"] => array(1) {
    [0] => string(14) "max-age=604800"
  }
  ["content-type"] => array(1) {
    [0] => string(24) "text/html; charset=UTF-8"
  }
  ["date"] => array(1) {
    [0] => string(29) "Thu, 14 Mar 2019 16:44:51 GMT"
  }
  ["etag"] => array(1) {
    [0] => string(23) ""1541025663+gzip+ident""
  }
  ["expires"] => array(1) {
    [0] => string(29) "Thu, 21 Mar 2019 16:44:51 GMT"
  }
  ["last-modified"] => array(1) {
    [0] => string(29) "Fri, 09 Aug 2013 23:54:35 GMT"
  }
  ["server"] => array(1) {
    [0] => string(14) "ECS (dcb/7F83)"
  }
  ["vary"] => array(1) {
    [0] => string(15) "Accept-Encoding"
  }
  ["x-cache"] => array(1) {
    [0] => string(3) "HIT"
  }
  ["content-length"] => array(1) {
    [0] => string(4) "1270"
  }
}





string(1270) "<!doctype html>
<html>
<head>
    <title>Example Domain</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
    body {
        background-color: #f0f0f2;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

    }
    div {
        width: 600px;
        margin: 5em auto;
        padding: 50px;
        background-color: #fff;
        border-radius: 1em;
    }
    a:link, a:visited {
        color: #38488f;
        text-decoration: none;
    }
    @media (max-width: 700px) {
        body {
            background-color: #fff;
        }
        div {
            width: auto;
            margin: 0 auto;
            border-radius: 0;
            padding: 1em;
        }
    }
    </style>
</head>

<body>
<div>
    <h1>Example Domain</h1>
    <p>This domain is established to be used for illustrative examples in documents. You may use this
    domain in examples without prior coordination or asking for permission.</p>
    <p><a href="http://www.iana.org/domains/example">More information...</a></p>
</div>
</body>
</html>
"

```


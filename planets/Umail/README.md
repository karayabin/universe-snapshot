Umail
============
2017-02-06 --> 2017-02-07



A helper class to send mails.


It's part of the [universe framework](https://github.com/karayabin/universe-snapshot),
and it uses [SwiftMailer](http://swiftmailer.org/) library.




Features
----------
 
- basic email features (subject, to, from, htmlBody, plainBody, ...)  
- variable references system, using {thisNotation} by default 
- attach files, or embed files 
- template system




Example 1: send an email
--------------------------

Note: I tested this example on 2017-02-06, and it worked 
on my local machine (macbook pro). However, it failed on my iMac (late 2009)(gate timeout error).

Note2: retested on my new iMac (late 2015), it works fine.


In other words, if your machine allows it, you can send emails without using smtp settings (username, password, ...).


```php
<?php


use Umail\Umail;

require_once __DIR__ . "/../init.php";

//------------------------------------------------------------------------------/
// SEND SIMPLE MAIL
//------------------------------------------------------------------------------/
$res = Umail::create()
    ->to('myemail@gmail.com')
    ->from('johndoe@gmail.com')
    ->subject("Hi, just a test mail")
    ->htmlBody('Hi, this is <b>just</b> an <span style="color: red">test message</span>')
    ->plainBody('Hi, this is just an test message')
    ->send();
a($res);
```


I've been testing the above code with success on my computer, although the message went directly in the junk.
You might want to set a transport to make your messages more trustworthy:

```php
$transport = (new Swift_SmtpTransport('smtp.example.org', 25, 'ssl'))
    ->setUsername('your username')
    ->setPassword('your password')
;

$res = Umail::create()
->setTransport($transport); 
```





Example 2: using batch mode or merge mode
--------------------------

In batch mode, each recipient sees only its own mail in the "to" field (of the mail software).
If batch mode is off, each recipient sees all the recipients to which the email was sent. 
Default is batch on.

```php
$batchMode = true; // change this to true|false and observe the "to" field in the received emails
$res = Umail::create()
    ->to([
        'lingtalfi@gmail.com' => 'ling',
        'agenceweb37@gmail.com',
    ], $batchMode)
    ->from('johndoe@gmail.com')
    ->subject("Hi, just a test mail")
    ->htmlBody('Hi, this is <b>just</b> an <span style="color: red">test message</span>')
    ->plainBody('Hi, this is just an test message')
    ->send();
a($res);

```


Example 3: using variables
-----------------------------

Variables can be injected in the body and or the subject of an email.

There are two types of variables:
- common variables: they are the same for every recipient   
- email variables: they depend on the recipient's email address
     
More info in the comments of the UmailInterface source code.
  
     
Below is an example illustrating the use of "common variables".     
     
```php
$res = Umail::create()
    ->to([
        'lingtalfi@gmail.com' => 'ling',
    ])
    ->from('johndoe@gmail.com')
    ->subject("Hi {somebody}, just a test mail")
    ->setVars([
        'message' => 'variable message',
        'somebody' => "there",
    ])
    ->htmlBody('Hi, this is <b>just</b> a <span style="color: red">{message}</span>')
    ->plainBody('Hi, this is just a test message')
    ->send();
a($res);
```


And below is an example showing both common and email variables:

```php
$res = Umail::create()
    ->to([
        'lingtalfi@gmail.com' => 'ling',
    ])
    ->from('johndoe@gmail.com')
    ->subject("Hi {somebody}, just a test mail")
    ->setVars([
        'message' => 'variable message',
    ], function ($email) {
        return [
            'somebody' => substr($email, 0, strpos($email, '@')),
        ];
    })
    ->htmlBody('Hi, this is <b>just</b> a <span style="color: red">{message}</span>')
    ->plainBody('Hi, this is just a test message')
    ->send();
a($res);
```



Example 4: attaching a file
-----------------------------

```php
$file = "/Users/my/Desktop/zilu-db.png";
$res = Umail::create()
    ->to([
        'lingtalfi@gmail.com' => 'ling',
    ])
    ->from('johndoe@gmail.com')
    ->subject("Hi, testing attach file")
    ->htmlBody('Hi, this is <b>just</b> a <span style="color: red">message to test file attachment</span>')
    ->plainBody('Hi, this is just a test message to test file attachment')
    ->attachFile($file)
    ->send();
a($res);
```



Example 5: embedding a file
-----------------------------

Sometimes, attached files are blocked by mail clients.
By embedding your media directly into the message, you have two benefits:

- you circumvent the blocking problem that attached files have 
- you can place the media where you want


```php
$file = "/Users/my/Desktop/ps_product_attribute.png";

$mail = Umail::create();
$cid = $mail->embedFile($file);
$res = $mail->to([
    'lingtalfi@gmail.com' => 'ling',
])
    ->from('johndoe@gmail.com')
    ->subject("Hi, testing attach file")
    ->htmlBody(
        '<html>' .
        ' <head></head>' .
        ' <body>' .
        '  Here is an image <img src="' . // Embed the file
        $cid .
        '" alt="Image" />' .
        '  Rest of message' .
        ' </body>' .
        '</html>'
    )
    ->plainBody('Hi, this is just a test message to test file attachment')
    ->send();
a($res);
```


Example 6: using a template
-------------------------------

You can use either a template or the default htmlBody/plainBody methods.
The main benefit of using a template is re-usability.

To use a template, you need to use a TemplateLoader object.
A TemplateLoader object will resolve a template name into the actual template content.

There is a default template loader (which explains why the code below works): the FileTemplateLoader.

By default, the FileTemplateLoader will try to find a template file in the "mails" directory at the root 
of the application.
With FileTemplateLoader,you can have a template for both html and/or plain versions.

A template file ending with ".html" will be a template for the html version, while a template
ending with ".txt" will be a template for the plain text version.

Of course, you can create your own template loader if necessary.


The example below uses a mail template called log_alert.html.
It comes from prestashop 1.6.

I've no affiliation with prestashop, but I just happened to work with it.

If you are interested in, I've also created a script that helps visualizing what 
prestashop mail templates (or any template in general) looks like.

This tool is called mail-viewer.php and you will find it in this repository.

The good part with html template is that we can use them both as a web page and as a mail body.


 
```php
$vars = function ($email) {
    // normally, you would call some object...
    switch ($email) {
        case 'lingtalfi@gmail.com':
            return [
                'firstname' => 'ling',
                'lastname' => 'talfi',
            ];
            break;
        default:
            $name = explode('@', $email)[0];
            return [
                'firstname' => $name,
                'lastname' => '',
            ];
            break;
    }
};


$mail = Umail::create();
$logoFile = __DIR__ . "/myshop-logo.jpg";
$commonVars = [
    'shop_name' => 'my shop',
    'shop_url' => 'http://my_shop.com',
    'shop_logo' => $mail->embedFile($logoFile),
];
$res = $mail->to([
    'lingtalfi@gmail.com' => 'ling',
    'delphine@myshop.com',
])
    ->from('johndoe@gmail.com')
    ->subject("Hi, testing template")
    ->setVars($commonVars, $vars)
    ->setTemplate('log_alert')
    ->send();
a($res);

``` 


Here is the template I used:

```html
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Message from {shop_name}</title>


    <style>    @media only screen and (max-width: 300px) {
        body {
            width: 218px !important;
            margin: auto !important;
        }

        .table {
            width: 195px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        span.title {
            font-size: 20px !important;
            line-height: 23px !important
        }

        span.subtitle {
            font-size: 14px !important;
            line-height: 18px !important;
            padding-top: 10px !important;
            display: block !important;
        }

        td.box p {
            font-size: 12px !important;
            font-weight: bold !important;
        }

        .table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr {
            display: block !important;
        }

        .table-recap {
            width: 200px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

        .address {
            display: block !important;
            margin-bottom: 10px !important;
        }

        .space_address {
            display: none !important;
        }
    }

    @media only screen and (min-width: 301px) and (max-width: 500px) {
        body {
            width: 308px !important;
            margin: auto !important;
        }

        .table {
            width: 285px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        .table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr {
            display: block !important;
        }

        .table-recap {
            width: 295px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

    }

    @media only screen and (min-width: 501px) and (max-width: 768px) {
        body {
            width: 478px !important;
            margin: auto !important;
        }

        .table {
            width: 450px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }
    }

    @media only screen and (max-device-width: 480px) {
        body {
            width: 308px !important;
            margin: auto !important;
        }

        .table {
            width: 285px;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        .table-recap {
            width: 295px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

        .address {
            display: block !important;
            margin-bottom: 10px !important;
        }

        .space_address {
            display: none !important;
        }
    }
    </style>

</head>
<body style="-webkit-text-size-adjust:none;background-color:#fff;width:650px;font-family:Open-sans, sans-serif;color:#555454;font-size:13px;line-height:18px;margin:auto">
<table class="table table-mail"
       style="width:100%;margin-top:10px;-moz-box-shadow:0 0 5px #afafaf;-webkit-box-shadow:0 0 5px #afafaf;-o-box-shadow:0 0 5px #afafaf;box-shadow:0 0 5px #afafaf;filter:progid:DXImageTransform.Microsoft.Shadow(color=#afafaf,Direction=134,Strength=5)">
    <tr>
        <td class="space" style="width:20px;padding:7px 0">&nbsp;</td>
        <td align="center" style="padding:7px 0">
            <table class="table" bgcolor="#ffffff" style="width:100%">
                <tr>
                    <td align="center" class="logo" style="border-bottom:4px solid #333333;padding:7px 0">
                        <a title="{shop_name}" href="{shop_url}" style="color:#337ff1">
                            <img src="{shop_logo}" alt="{shop_name}"
                                 style="max-width:100%; max-height:100px; height:auto; width:auto;"/>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td align="center" class="titleblock" style="padding:7px 0">
                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                            <span class="title"
                                  style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px">Hi {firstname} {lastname},</span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="space_footer" style="padding:0!important">&nbsp;</td>
                </tr>
                <tr>
                    <td class="box" style="border:1px solid #D6D4D4;background-color:#f8f8f8;padding:7px 0">
                        <table class="table" style="width:100%">
                            <tr>
                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                <td style="padding:7px 0">
                                    <font size="2" face="Open-sans, sans-serif" color="#555454">
                                        <p data-html-only="1"
                                           style="border-bottom:1px solid #D6D4D4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                            You have received a new log alert </p>
                                        <span style="color:#777">
							<span style="color:#333"><strong>Warning:</strong></span> you have received a new log alert in your Back Office.<br/><br/>
							You can check for it in the <span
                                                style="color:#333"><strong>"Tools" &gt; "Logs"</strong></span> section of your Back Office.						</span>
                                    </font>
                                </td>
                                <td width="10" style="padding:7px 0">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="space_footer" style="padding:0!important">&nbsp;</td>
                </tr>
                <tr>
                    <td class="footer" style="border-top:4px solid #333333;padding:7px 0">
                        <span><a href="{shop_url}" style="color:#337ff1">{shop_name}</a></span>
                    </td>
                </tr>
            </table>
        </td>
        <td class="space" style="width:20px;padding:7px 0">&nbsp;</td>
    </tr>
</table>
</body>
</html>
```


Example 7: adding a tracker
-----------------------------

Adding a tracker to an email is useful if you want to collect statistics about
who opened your emails.

A tracker is basically an url which displays an image, 
it also extracts the desired statistic information from the url.


Since it's an image, it might be blocked by email clients, so keep that in mind when collecting
statistics.

The code below was tested successfully on two machines on which the mail was opened and tracked:

- a macbookpro El Capitan 10.11.12, with mail
- a pc windows seven, with outlook 2010

It probably works with other mail clients as well.


```php
<?php


use Umail\Umail;

require_once __DIR__ . "/../init.php";


//------------------------------------------------------------------------------/
// EMBED A FILE
//------------------------------------------------------------------------------/


$logoFile = __DIR__ . "/myshop-logo.jpg";
$mail = Umail::create();


$vars = function ($email) use ($mail) {


    // normally, you would call some object...
    switch ($email) {
        case 'lingtalfi@gmail.com':
            $ret = [
                'firstname' => 'ling',
                'lastname' => 'talfi',
            ];
            break;
        default:
            $name = explode('@', $email)[0];
            $ret = [
                'firstname' => $name,
                'lastname' => '',
            ];
            break;
    }
    $markerImage = 'https://www.leaderfit-equipement.com/ling/service/tracker.php?email=' . $email;
//    $ret['marker'] = $mail->embedFile($markerImage); // didn't work: file was embedded as an .exe file
    $ret['marker'] = $markerImage; 
    return $ret;
};
$commonVars = [
    'shop_name' => 'my shop',
    'shop_url' => 'http://my_shop.com',
    'shop_logo' => $mail->embedFile($logoFile),
];
$res = $mail->to([
    'lingtalfi@gmail.com' => 'ling',
    'delphine@myshop.com',
])
    ->from('johndoe@gmail.com')
    ->subject("Hi, testing template")
    ->setVars($commonVars, $vars)
    ->setTemplate('log_alert')
    ->send();
a($res);
```






Here is the template I used.
It's the same as the previous example, except for the last lines (which contains the marker code).

```html
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Message from {shop_name}</title>


    <style>    @media only screen and (max-width: 300px) {
        body {
            width: 218px !important;
            margin: auto !important;
        }

        .table {
            width: 195px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        span.title {
            font-size: 20px !important;
            line-height: 23px !important
        }

        span.subtitle {
            font-size: 14px !important;
            line-height: 18px !important;
            padding-top: 10px !important;
            display: block !important;
        }

        td.box p {
            font-size: 12px !important;
            font-weight: bold !important;
        }

        .table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr {
            display: block !important;
        }

        .table-recap {
            width: 200px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

        .address {
            display: block !important;
            margin-bottom: 10px !important;
        }

        .space_address {
            display: none !important;
        }
    }

    @media only screen and (min-width: 301px) and (max-width: 500px) {
        body {
            width: 308px !important;
            margin: auto !important;
        }

        .table {
            width: 285px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        .table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr {
            display: block !important;
        }

        .table-recap {
            width: 295px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

    }

    @media only screen and (min-width: 501px) and (max-width: 768px) {
        body {
            width: 478px !important;
            margin: auto !important;
        }

        .table {
            width: 450px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }
    }

    @media only screen and (max-device-width: 480px) {
        body {
            width: 308px !important;
            margin: auto !important;
        }

        .table {
            width: 285px;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        .table-recap {
            width: 295px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

        .address {
            display: block !important;
            margin-bottom: 10px !important;
        }

        .space_address {
            display: none !important;
        }
    }
    </style>

</head>
<body style="-webkit-text-size-adjust:none;background-color:#fff;width:650px;font-family:Open-sans, sans-serif;color:#555454;font-size:13px;line-height:18px;margin:auto">
<table class="table table-mail"
       style="width:100%;margin-top:10px;-moz-box-shadow:0 0 5px #afafaf;-webkit-box-shadow:0 0 5px #afafaf;-o-box-shadow:0 0 5px #afafaf;box-shadow:0 0 5px #afafaf;filter:progid:DXImageTransform.Microsoft.Shadow(color=#afafaf,Direction=134,Strength=5)">
    <tr>
        <td class="space" style="width:20px;padding:7px 0">&nbsp;</td>
        <td align="center" style="padding:7px 0">
            <table class="table" bgcolor="#ffffff" style="width:100%">
                <tr>
                    <td align="center" class="logo" style="border-bottom:4px solid #333333;padding:7px 0">
                        <a title="{shop_name}" href="{shop_url}" style="color:#337ff1">
                            <img src="{shop_logo}" alt="{shop_name}"
                                 style="max-width:100%; max-height:100px; height:auto; width:auto;"/>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td align="center" class="titleblock" style="padding:7px 0">
                        <font size="2" face="Open-sans, sans-serif" color="#555454">
                            <span class="title"
                                  style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px">Hi {firstname} {lastname},</span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="space_footer" style="padding:0!important">&nbsp;</td>
                </tr>
                <tr>
                    <td class="box" style="border:1px solid #D6D4D4;background-color:#f8f8f8;padding:7px 0">
                        <table class="table" style="width:100%">
                            <tr>
                                <td width="10" style="padding:7px 0">&nbsp;</td>
                                <td style="padding:7px 0">
                                    <font size="2" face="Open-sans, sans-serif" color="#555454">
                                        <p data-html-only="1"
                                           style="border-bottom:1px solid #D6D4D4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                            You have received a new log alert </p>
                                        <span style="color:#777">
							<span style="color:#333"><strong>Warning:</strong></span> you have received a new log alert in your Back Office.<br/><br/>
							You can check for it in the <span
                                                style="color:#333"><strong>"Tools" &gt; "Logs"</strong></span> section of your Back Office.						</span>
                                    </font>
                                </td>
                                <td width="10" style="padding:7px 0">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="space_footer" style="padding:0!important">&nbsp;</td>
                </tr>
                <tr>
                    <td class="footer" style="border-top:4px solid #333333;padding:7px 0">
                        <span><a href="{shop_url}" style="color:#337ff1">{shop_name}</a></span>
                    </td>
                </tr>
            </table>
        </td>
        <td class="space" style="width:20px;padding:7px 0">&nbsp;</td>
    </tr>
</table>
<img src="{marker}" alt="tracker image"/>
</body>
</html>
```


And here is the server side code of the (archaic) tracker script:

```php
<?php


if (array_key_exists('email', $_GET)) {
    $date = date('Y-m-d H:i:s');
    $email = $_GET['email'];

    $data = $email . PHP_EOL;
    $data .= $date . PHP_EOL;
    $data .= '--' . PHP_EOL;

    $file = __DIR__ . '/tracked.txt';
    file_put_contents($file, $data, FILE_APPEND);
}


header("content-type: image/gif");
echo file_get_contents(__DIR__ . '/transparent.gif');
```




Dependencies
----------------
- [lingtalfi/DirScanner 1.3.0](https://github.com/lingtalfi/DirScanner): only if you use the mail-viewer script



History Log
------------------
    
- 1.3.0 -- 2017-08-24

    - add Umail.setTransport method 
    
- 1.2.1 -- 2017-07-02

    - Umail fix "to" method not resetting correctly 
    
- 1.2.0 -- 2017-05-29

    - FileTemplateLoader: some variables are now protected instead of private
    
- 1.1.1 -- 2017-02-17

    - forgot files from last commit
    
- 1.1.0 -- 2017-02-14

    - revisit TemplateLoader technique to handle php templates
    
- 1.0.0 -- 2017-02-07

    - initial commit
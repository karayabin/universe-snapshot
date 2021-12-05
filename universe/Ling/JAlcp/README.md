JAlcp
===========
2021-06-24 -> 2021-08-09

A js tool to help with the [alcp protocol](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/alcp-response.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller)
via [light-cli](https://github.com/lingtalfi/Light_Cli)

```bash
lt install Ling.JAlcp
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/JAlcp
```

Or just download it and place it where you want otherwise.






How to use
==========
2021-06-24

This tool is based around the idea of organizing the **alcp request** visually.

In other words, when we need to call
an [alcp service](https://github.com/lingtalfi/TheBar/blob/master/discussions/alcp-service.md), we don't only think of
the service parameters, but also where the user clicked (or what the user did) to trigger the service.

The **alcp request** originates from a zone, which is a portion of the gui.

In that zone, that we call the **context**, we will display a loader (aka spinner) before the request is sent, and we
will remove this loader when the request is completed.

It doesn't matter if the request was successful or erroneous, we just want to provide the user with a visual feedback of
that a request is pending.

In other words, with every **alcp request**, we have a loader.

Apart from the loader part, we also have other elements that we can help with: error messages, and success messages.

By default, we provide some naming conventions for you to use, and if you use them, our tool will automatically do
things for you.

See the source code of the **getContextualPostCallback** method for more details.

Here is an example of how I use this tool:

```html

<div class="modal-body" id="form-header-login">
    <div class="alert alert-danger alert-dismissible fade show the-error" role="alert">
                    <span class="the-error-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


    <div class="alert alert-success alert-dismissible fade show the-success" role="alert">
                    <span class="the-success-message">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form>
        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control form-collect" id="floatingInput"
                   placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control form-collect" id="floatingPassword"
                   placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="mb-3 form-check">
            <input name="remember_me" type="checkbox" class="form-check-input form-collect"
                   id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Keep me signed in until I log out</label>
        </div>
        <button type="submit" class="btn btn-primary submit-header-login-form">
                        <span class="spinner-border spinner-border-sm the-loader" role="status"
                              aria-hidden="true"></span>
            Log in
        </button>
    </form>
</div>
```


In the html above, notice the following classes:

- the-error
- the-success
- the-loader


Those are the conventions used by this tool.

To start with, all those elements are automatically hidden by this tool when you call the **getContextualPostCallback** method.




```js


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
    $(document).ready(function () {

        var jFormLogin = $("#form-header-login");


        var postLoginCb = AlcpHelper.getContextualPostCallback(jFormLogin, {
            success: function (jTheSuccessMsg, response, textStatus, jqXHR) {
                // since the page is reloaded, you won't see this alert more than a fraction of second, 
                // but I just wanted to give you an example on how to use jTheSuccessMsg.
                jTheSuccessMsg.html("Successful login :)");
                location.reload();
            },
        });


        $("body").on("click.kit_store_header", function (e) {
            var jTarget = $(e.target);
            if (jTarget.hasClass("submit-header-login-form")) {

                var data = FormCollect.collect({
                    context: jFormLogin,
                });
                var url = "<?php echo $loginUrl; ?>";
                postLoginCb(url, data);
                return false;
            }
        });


    });
});
</script>

```

So in the above example, there is a signIn **alcp service** that we call when the user clicks on the submit button of the
login form. The email and password are sent via the **alcp request**.

If the response is erroneous, the "the-error" container will automatically be filled with the error message.

See more details in the source code of the **getContextualPostCallback** method.



History Log
=============

- 1.0.4 -- 2021-08-09

    - fix getContextualPostCallback throwing error jSuccess is null
  
- 1.0.3 -- 2021-08-09

    - add arguments list in method source code comment
  
- 1.0.2 -- 2021-07-30

    - fix getContextualPostCallback throwing error if jTheSuccess is not defined

- 1.0.1 -- 2021-06-29

    - now the error/success container are destroyed/cloned rather than hidden/shown.

- 1.0.0 -- 2021-06-24

    - initial commit
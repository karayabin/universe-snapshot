JCookie
=================
2016-04-05



A javascript library to handle cookies.


JCookie is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import JCookie
```


Features
-------------

- simple api (set, get, delete)
- lightweight: less than 50 lines of code




How to use
--------------


Codepen of the example below: 


http://codepen.io/lingtalfi/pen/aNVWZa


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script src="https://cdn.rawgit.com/lingtalfi/JCookie/master/www/libs/jcookie/js/jcookie.js"></script>
    <title>Html page</title>
</head>

<body>

<button class="cookie1">create cookie 1: name=John Doe</button>
<button class="cookie2">create cookie 2: age=37</button>
<button class="delcookie1">remove cookie 1</button>
<button class="delcookie2">remove cookie 2</button>
<button class="upcookie1">Modify cookie 1: name=John Dar</button>
<button class="discookie1">Display cookie 1</button>
<button class="discookie2">Display cookie 2</button>
<script>


    (function ($) {
        $(document).ready(function () {
            $('button').on('click', function (e) {
                var jTarget = $(e.target);
                if (jTarget.hasClass('cookie1')) {
                    jcookie.set('name', 'John Doe');
                }
                else if (jTarget.hasClass('cookie2')) {
                    jcookie.set('age', 37);
                }
                else if (jTarget.hasClass('delcookie1')) {
                    jcookie.delete('name');
                }
                else if (jTarget.hasClass('delcookie2')) {
                    jcookie.delete('age');
                }
                else if (jTarget.hasClass('upcookie1')) {
                    jcookie.set('name', 'John Dar');
                }
                else if (jTarget.hasClass('discookie1')) {
                    var val = jcookie.get('name');
                    alert(val);
                }
                else if (jTarget.hasClass('discookie2')) {
                    var val = jcookie.get('age');
                    alert(val);
                }
                return false;
            });
        });
    })(jQuery);


</script>
</body>
</html>
```





History Log
------------------
    
- 1.0.0 -- 2016-04-05

    - initial commit
    
    






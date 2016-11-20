vswitch
============
2016-03-03




Simple helper to show/hide portions of your html page.


vswitch can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


Features
---------

- uses jquery
- require ecma script 5+
- lightweight
- simple/flexible views toggling system



Basic concepts
----------------

A **surface** is a portion of your html page which contain **views**.
A **view** can be in one of two states: visible/hidden.



When you instantiate the object, you define the surface and the views.
Then you toggle the view states using the api methods (see methods below).


Methods to show/hide the views
----------

For every method below, the **views** argument can be either a string of separated class, 
or an array of classes.


| Method  | Description | Examples
| ------------- | ------------- | ------------- |
| switchView ( views, cbArg )  | kick in the given views, and kick out the other ones  | switchView( "form" ); switchView ( "view1 view2" ); switchView( ["view1", "view2"] ) | 
| kickIn  ( views, cbArg ) | kick in the given views  | kickIn ( "view1 view2" ) |
| kickOut  ( views, cbArg ) | kick out the given views  | kickOut ( "purple red" ) |
| toggle  ( views, cbArg ) | toggle the given views  | toggle ( "active" ); toggle ( "blue purple"  ) |




Example
----------


```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/libs/vswitch/js/vswitch.js"></script>
	<title>Html page</title>
</head>

<body>


<div class="surface">
	<div class="form">
		<form>
			<input type="text" name="name" value="">
			<input type="submit" value="submit">
		</form>
	</div>

	<div class="success">
		The form was sent successfully!
	</div>
</div>


<script>
	$(document).ready(function () {
		var jSurface = $('.surface');
		var oswitch = new vswitch(jSurface, "form success", {mode: 'fade', starter: "form"});

		var jForm = $('form', jSurface);
		jForm.on('submit', function () {

			// post data, then...
			if ('form is success') {
				oswitch.switchView("success");
			}

			return false;
		})

	});
</script>
</body>
</html>
```


There are more examples in the [demo directory](https://github.com/lingtalfi/vswitch/blob/master/www/demo):

- how to use [vswitch with css only](https://github.com/lingtalfi/vswitch/blob/master/www/demo/css.html) 
- [vswitch differents methods, using css only](https://github.com/lingtalfi/vswitch/blob/master/www/demo/css_flexible.html) 
- how to use [vswitch with built-in fade effect](https://github.com/lingtalfi/vswitch/blob/master/www/demo/fade.html) 
- [vswitch differents methods, using fade effect](https://github.com/lingtalfi/vswitch/blob/master/www/demo/fade_flexible.html) 
- [simple form example, with an error message](https://github.com/lingtalfi/vswitch/blob/master/www/demo/form_with_dumb_error.html) 
- [how to use vswitch callbacks: simple form example, with an error message and a variable](https://github.com/lingtalfi/vswitch/blob/master/www/demo/form_with_variable_error.html) 





Another example with callback
--------------------------------

If you want, you can define callbacks that gets triggered depending on which method was called.
There are three types of callbacks:

- init (triggered for every views that kicks in during the call to the vswitch object instantiation)
- in (triggered for every views that kicks in during a call to the following methods: switchView, kickIn, toggle)
- out (triggered for every views that kicks out during a call to the following methods: switchView, kickIn, toggle)



The following example, found in the demo dir demonstrates the use of callbacks with vswitch.


```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/libs/vswitch/js/vswitch.js"></script>
	<title>Html page</title>
	<style>
		.error {
			color: red;
		}

		/*--------------------------------------------------------------------------*
		// THE CSS BELOW IS ONLY NECESSARY IF YOU USE CSS MODE
		/*--------------------------------------------------------------------------*/
		/*.view {*/
		/*display: none;*/
		/*}*/

		/*.surface.form .form,*/
		/*.surface.form_error_required_name .form_error_required_name,*/
		/*.surface.success .success {*/
		/*display: initial;*/
		/*}*/

	</style>
</head>

<body>


<div class="surface">
	<div class="view form">
		<form>
			<input type="text" name="name" value="">
			<span class="view error form_error_required_name">The name must contain at least $minChar characters</span>
			<input type="submit" value="submit">
		</form>
	</div>

	<div class="view success">
		The form was sent successfully!
	</div>
</div>


<script>
	$(document).ready(function () {
		var jSurface = $('.surface');
		var oswitch = new vswitch(jSurface, "form success form_error_required_name", {
			mode: 'fade',
			starter: "form",
			callbacks: {
				form: {
					init: function (jView, args) {
						console.log("form init");
					}
				},
				form_error_required_name: {
					'in': function (jView, min) {
						console.log("form_error_required_name in");
						vswitch.template(jView, {minChar: min});
					},
					'out': function () {
						console.log("form_error_required_name out");
					}
				}
			}
		});

		var jForm = $('form', jSurface);
		var jName = $('input[name=name]', jForm);
		jForm.on('submit', function () {

			// post data, then...
			var minChars = 2;
			var name = jName.val();
			if (name.length >= minChars) {
				oswitch.switchView("success");
			}
			else {
				oswitch.kickIn("form_error_required_name", minChars);
				jName
						.off('click')
						.on('click', function () {
							oswitch.kickOut("form_error_required_name");
							jName.off('click');
						});
			}


			return false;
		})

	});
</script>
</body>
</html>
```




Options
----------

```js
{
    /**
     * @param mode - string (css|show|fade).
     *      Default value is css.
     *      When mode is set to css, the object assumes that the
     *      show/hide mechanisms and transitions are handled by you.
     *      It's the "Do it yourself" mode.
     *
     *      When mode is set to show, the object handles the show/hide
     *      strategy for you, using jquery's show/hide method when appropriate.
     *
     *      When mode is set to fade, it does the same as when it's set
     *      to show, except that the transitions used are jquery's fadeIn and
     *      fadeOut methods.
     *
     *
     *
     */
    mode: 'css',
    /**
     * @param starter - string|array
     * A space (exactly one) separated string of classes that should be displayed on instantiation.
     * Or, can be an array of classes.
     */
    starter: "",
    /**
     * @param fadeSpeed - int,
     *              Default = 250
     *              the speed of the fadeIn and fadeOut for the following methods (only if mode=fade):
     *              kickIn, kickOut, toggle.
     */
    fadeSpeed: 250,
    /**
     * @param callbacks - map:
     *                      - viewName:
     *                      ----- callbackName: function ( jHandle:jView, mixed:callbacksArg )
     *                      ----- ...
     *
     *               callbackName can be one of:
     *               - init (triggered for every views that kicks in for the first time)
     *               - in (triggered for every views that kicks in during a call to the following methods: switchView, kickIn, toggle)
     *               - out (triggered for every views that kicks out during a call to the following methods: switchView, kickIn, toggle)
     *
     *              callbacksArg:
     *                  - init: undefined
     *                  - in/out: mixed, the second argument that you passed to the
     *                                  switchView, kickIn, kickOut or toggle methods.
     *
     *
     *              Note: callbacks are executed BEFORE the visual transition occurs.
     */
    callbacks: {},
}
```


 



History Log
------------------
    
- 1.3.0 -- 2016-04-02

    - create the library only if it not already exist

- 1.2.0 -- 2016-03-04

    - add on the fly mode argument to switchView, kickIn, kickOut and toggle methods
    - review init callback, now runs once per view no matter which method was used
    - removed warning when toggle is applied to a non existing class
    - main method return this for chainability
    
- 1.1.0 -- 2016-03-03

    - vswitch attaches itself to the jSurface object on init
    
- 1.0.0 -- 2016-03-03

    - initial commit
    
    


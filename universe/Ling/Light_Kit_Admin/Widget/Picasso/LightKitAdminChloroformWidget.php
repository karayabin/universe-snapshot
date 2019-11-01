<?php


namespace Ling\Light_Kit_Admin\Widget\Picasso;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget;


/**
 * The LightKitAdminChloroformWidget class.
 *
 *
 * Conception notes
 * -----------
 * 2019-07-31
 *
 *
 * This widget is the @page(ChloroformWidget) version for Light_Kit_Admin (lka).
 *
 * I created this widget when I realized that using ChloroformWidget alone would not fill all my needs.
 * My needs were to be able to create all kinds of forms, starting with the form in the user profile page
 * of the lka gui.
 *
 * This page contains two forms, and both of them I couldn't create with ChloroformWidget.
 *
 * The first form contains the following fields:
 *
 * - pseudo
 * - password
 * - avatar_url
 *
 * For the password, I don't know if you've ever thought about how you allow an user to change her password,
 * but my idea was that if the field if empty, it means the user doesn't want to change it, and if it's
 * not empty, then it means she wants to change it.
 * And I prefer to avoid a second confirm password field, because it creates more field (although I might
 * change my mind on that later).
 *
 * However this technique (without a confirm password field) is a bit risky in that the user might accidentally
 * change her password, and next thing you know is that she is logged out forever, unable to reconnect to the lka
 * app.
 * So I wanted to add a little change password switch, with the help of javascript, which would hide/show the
 * password related field(s).
 * And that, for starter, ChloroformWidget couldn't do that.
 *
 * What you need for those kind of things is more freedom in the rendering side.
 * The problem with the ChloroformWidget is that you get the Chloroform_HeliumRenderer, and that's it.
 * Now the Chloroform_HeliumRenderer is obviously not flexible enough to handle all possible forms,
 * and so we need another solution.
 *
 * I thought about two techniques:
 * - extending the Chloroform_HeliumRenderer for lka, which would have all the flexibility I want, but the boring
 * part being to implement all methods, one every time I want to create a new type of control. Benefit being
 * re-usability of those controls later.
 * - the second technique is to create the control on the fly directly in the template file. The main problem
 *      of this technique is: no re-usability. Benefit: full freedom, meaning speed of development.
 *
 * My preferred method is the second one for the controls I believe I won't reuse (one shot controls).
 * And I intend to drop javascript validation support: an extra layer of work for almost nothing.
 * I mean, I don't care that the user reloads the page, as long as I can code my control in a very straight
 * forward manner. So basically my intent is to use freestyle coding in the templates, basically writing the controls,
 * and a static error message with basic condition, all that in plain php in the template, and I would be a happy guy
 * if this works.
 *
 * So, those were my thoughts BEFORE the implementation. Now let's see what the concrete implementation
 * has to say about that.
 *
 * Ps: By the way, the second fields that the Chloroform helium renderer didn't provide was the rights control,
 * some kind of list with groups, but I have a specific display in mind which is not a simple select with group,
 * but rather a more aesthetic pleasing control.
 *
 *
 *
 * Oh, and I forgot: my implementation plan is to create one template per form.
 * I call those one shot template, as they will only be used for a form in particular.
 *
 *
 *
 */
class LightKitAdminChloroformWidget extends EasyLightPicassoWidget
{

    /**
     * Attaches the helium renderer assets to the html page copilot instance.
     */
    protected function useHelium()
    {
        $this->registerLibrary("Chloroform_HeliumRenderer", [
            "/libs/universe/Ling/Chloroform_HeliumRenderer/helium.css",
            "/plugins/Light_Kit_Admin/fileuploader/fileuploader.css",
        ], [
            "/libs/universe/Ling/Chloroform_HeliumRenderer/helium.js",
            "/plugins/Light_Kit_Admin/fileuploader/fileuploader.js",
        ]);
    }


}
Pages 
=================
2019-08-07 -> 2020-12-03





The pages included with light kit admin
-------------
2020-12-03



**Light_Kit_Admin** provides a few pages on its own:


- lka_route-home (/) --> Ling\Light_Kit_Admin\Controller\DashboardController->render
- lka_route-login (/login) --> Ling\Light_Kit_Admin\Controller\LoginFormController->render
- lka_route-logout (/logout) --> Ling\Light_Kit_Admin\Controller\LogoutController->render
- lka_route-forbidden_page (/forbidden) --> Ling\Light_Kit_Admin\Controller\ForbiddenController->render
- lka_route-tool_multiple_form_edit (/tool/multiple-form-edit) --> Ling\Light_Kit_Admin\Controller\Tools\RealformMultipleEditController->render
- lka_route-forgotten_password (/forgotten-password) --> Ling\Light_Kit_Admin\Controller\ForgottenPasswordController->render





Create a page in light kit admin using kit
------------
2020-12-03



### How can I inject my widgets in the light kit admin environment gui?
2020-12-03


If you're a plugin author and you want to create a page using [kit](https://github.com/lingtalfi/Light_Kit), then there are a few things to be aware of.


The thing is, when you create a page in kit, you can include a parent layout in which your page will be inserted.


We provide a parent layout for you, in case you want to include your widget(s) use our gui environment.

To call our parent layout from your kit page, create a **_parent** property with a value fixed to **${lka_parent_layout}**, like this for instance:


```yaml

_parent: ${lka_parent_layout}
zones:
    body:
        -
            name: zeroadmin_statsummaryicon
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminStatSummaryIconWidget
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminStatSummaryIconWidget
            template: default.php
            vars:
                card_column_class: col-sm-6 col-xl-3 mb-3
                cards:
                    -
                        icon: fas fa-cart-arrow-down bg-blue fa-2x
                        value: 1678
                        value_class: text-blue
                        text: Orders

                    -
                        icon: fas fa-user-friends bg-yellow fa-2x
                        value: 78443
                        value_class: text-yellow
                        text: Users
                    -
                        icon: fas fa-dollar-sign bg-red fa-2x
                        value: $12.700,88
                        value_class: text-red
                        text: Revenue
                    -
                        icon: fas fa-car bg-green fa-2x
                        value: 654449
                        value_class: text-green
                        text: Visits
```   





Then, call one of our methods for rendering a kit page:
 
- LightKitAdminController->renderPage
- AdminPageController->renderAdminPage

Those methods will automatically create **lka_parent_layout** [dynamic variable](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md#dynamic-variables)
for you, so that if we change the path to our parent layout in the future, you don't have to rewrite your code.


This **lka_parent_layout** variable is therefore a reserved dynamic variable that you can't use for your own purposes.



### Where do I create my page?
2020-12-03

There is no hard rule as for where you create your page, but be aware we use css themes.

At the moment, our theme is **zeroadmin** (from the [zero admin template](https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html)).

The bottom line is this: if we change our theme, you might want to change your widget's css to adapt our new theme.

We don't plan to change theme anywhere soon, however just in case, we recommend that you create your pages in the following directory:


- $app/config/data/$planetName/kit/$theme


With:

- **$app**: the absolute path to the application
- **$planetName**: the absolute path to the application
















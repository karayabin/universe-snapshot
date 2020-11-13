SicTools, conception notes
==========
2020-08-17






SicFileCombinerUtil
-----------
2020-08-17


So today I added the "replace variable references" section in the **combine** method.


The use case that it takes into account was this basic **_zzz.byml** file:


```yaml
my_vars:
    app_dir: /komin/jin_site_demo
    app_name: JIN DEMO APP



$zephyr_template_vars.root_dir: ${my_vars.app_dir}
$quick_mail_alert_vars.appName: ${my_vars.app_name}


$database.methods.init.settings:
    pdo_database: blabla
    pdo_user: root
    pdo_pass: root
    pdo_options:
        persistent: true
        errmode: exception
        initCommand: SET NAMES 'UTF8'

```


Where we can see that the **$quick_mail_alert_vars.appName**, which overrides a 3rd party plugin variable,
uses an internal **my_vars.app_name** internal reference, for organization purpose.

Indeed, it makes sense to factorize variables declaration wherever we can, and so this zzz config file is no exception.
So here the maintainer wishes to declare the application name only once, and send it to plugin which require it,
such as the **quick_mail_alert** service in the example above.

Note that the **_vars** suffix is a convention that I use in those of my services which beg for external variable
override. Since this convention works well for me so far, I can only recommend plugin authors to use it as well,
although there is nothing official here.







  
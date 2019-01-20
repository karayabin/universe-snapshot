Installer
===============
2016-12-22



Generic installer for a cms/framework.



Intro
----------
This installer is the one I use for the [nullos admin](https://github.com/lingtalfi/nullos-admin) project.

It's a generic installer that can install anything.


Concept
----------

The install (and/or uninstall) process is composed of many **operations**.

Each **operation** can add **messages** to the **Report**.

An **operation** can throw an AbortInstallException, to abort the installation (or uninstallation) procedure.

Any other type of exception thrown by an **operation** will not interrupt the overall installation/uninstallation procedure,
but will be automatically converted to a simple message, and that message would be added to the **report**.

The **report** is just an object that the developer can inspect after an installation/uninstallation procedure.





Concrete Example
----------------

Example Code from FrontOne module (nullos admin):

```php
<?php


namespace FrontOne;

use FrontOne\Installer\Operations\DeployFilesOperation;
use FrontOne\Installer\Operations\Init\InstallInitAutoloadOperation;
use FrontOne\Installer\Operations\Init\UninstallInitAutoloadOperation;
use FrontOne\Installer\Operations\Layout\InstallLayoutBridgeDisplayLeftMenuBlockOperation;
use FrontOne\Installer\Operations\Layout\UninstallLayoutBridgeDisplayLeftMenuBlockOperation;
use FrontOne\Installer\Operations\RemoveFilesOperation;
use FrontOne\Installer\Operations\Router\InstallRouterBridgeUri2PagesOperation;
use FrontOne\Installer\Operations\Router\UninstallRouterBridgeUri2PagesOperation;
use Installer\Installer;
use Installer\Report\Report;


/**
 * Install process is composed of many operations
 *
 * Each operation can add messages to the Report.
 *
 * An operation can throw an AbortInstallException, which would stop the
 * whole process.
 *
 * An operation can throw any other exception, which would automatically be added
 * to the report.
 *
 */
class FrontOneInstaller
{
    public static function install()
    {
        /**
         * Deploy Files:
         * - /app-vitrine-one/
         * - /pages/modules/frontOne/
         * - /layout-elements/nullos/modules/frontOne/
         * - /lang/++/modules/frontOne/
         * - /assets/modules/frontOne/
         * - ../class-shared
         * - /services/modules/frontOne/
         *
         *
         * Hook into:
         * - class/Router/RouterServices
         * - class/Layout/LayoutServices
         * - init.php (autoloader)
         */
        $installer = new Installer();
        $installer->addOperation(InstallInitAutoloadOperation::create());
        $installer->addOperation(InstallLayoutBridgeDisplayLeftMenuBlockOperation::create());
        $installer->addOperation(InstallRouterBridgeUri2PagesOperation::create());
        $installer->addOperation(DeployFilesOperation::create());

        $report = new Report();
        $installer->run($report);
        return $report;
    }


    public static function uninstall()
    {
        $installer = new Installer();
        $installer->addOperation(UninstallInitAutoloadOperation::create());
        $installer->addOperation(UninstallLayoutBridgeDisplayLeftMenuBlockOperation::create());
        $installer->addOperation(UninstallRouterBridgeUri2PagesOperation::create());
        $installer->addOperation(RemoveFilesOperation::create());


        $report = new Report();
        $installer->run($report);
        return $report;
    }
}
```



Dependencies
-----------------
- [Bat 1.34](https://github.com/lingtalfi/Bat)  
 
 
 
History Log
------------------


- 1.2.2 -- 2016-12-27

    - add debug some error message precision 
    
- 1.2.1 -- 2016-12-25

    - fix forget interface
    
- 1.2.0 -- 2016-12-25

    - add Report->hasMessages

- 1.1.1 -- 2016-12-23

    - fix InstallerInterface methods
    
- 1.1.0 -- 2016-12-22

    - add InstallerInterface

- 1.0.0 -- 2016-12-22

    - initial commit 
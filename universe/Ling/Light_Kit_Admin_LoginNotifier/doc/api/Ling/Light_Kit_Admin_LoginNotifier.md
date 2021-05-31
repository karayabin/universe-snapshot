Ling/Light_Kit_Admin_LoginNotifier
================
2020-11-30 --> 2021-05-31




Table of contents
===========

- [LlnConnexionController](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Controller/Generated/LlnConnexionController.md) &ndash; The LlnConnexionController class.
    - [LlnConnexionController::renderList](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Controller/Generated/LlnConnexionController/renderList.md) &ndash; Renders the connexion list page.
    - [LlnConnexionController::renderForm](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Controller/Generated/LlnConnexionController/renderForm.md) &ndash; Renders the connexion form page.
    - RealAdminPageController::__construct &ndash; Builds the instance.
    - RealAdminPageController::render &ndash; Renders a page to interact with a table data.
    - RealAdminPageController::setOnSuccessIframeSignal &ndash; Sets the iframeSignal to use in case of a valid form.
    - AdminPageController::renderAdminPage &ndash; if she is not connected yet.
    - LightKitAdminController::setRoute &ndash; Sets the matching route to this controller instance.
    - LightKitAdminController::renderPage &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
    - LightKitAdminController::renderDefaultPage &ndash; Renders the default page, and returns the corresponding http response.
    - LightController::setLight &ndash; Sets the light instance.
- [LightKitAdminLoginNotifierLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/LightKitAdminPlugin/Generated/LightKitAdminLoginNotifierLkaPlugin.md) &ndash; The LightKitAdminLoginNotifierLkaPlugin class.
    - BaseLightKitAdminPlugin::__construct &ndash; Builds the BaseLightKitAdminPlugin instance.
    - BaseLightKitAdminPlugin::getPluginOptions &ndash; Returns the options of this kit admin plugin.
    - BaseLightKitAdminPlugin::setOptionsFile &ndash; Sets the file.
- [LightKitAdminLoginNotifierControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_ControllerHub/Generated/LightKitAdminLoginNotifierControllerHubHandler.md) &ndash; The LightKitAdminLoginNotifierControllerHubHandler class.
    - [LightKitAdminLoginNotifierControllerHubHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_ControllerHub/Generated/LightKitAdminLoginNotifierControllerHubHandler/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
    - LightBaseControllerHubHandler::__construct &ndash; Builds the LightKitAdminControllerHubHandler instance.
    - LightBaseControllerHubHandler::setContainer &ndash; Sets the light service container interface.
- [LightKitAdminLoginNotifierPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_PlanetInstaller/LightKitAdminLoginNotifierPlanetInstaller.md) &ndash; The LightKitAdminLoginNotifierPlanetInstaller class.
    - LightKitAdminBasePlanetInstaller::init2 &ndash; Executes the init 2 phase of the install command.
    - LightKitAdminBasePlanetInstaller::undoInit2 &ndash; Undoes the init 2 phase.
    - LightKitAdminBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
    - LightKitAdminBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightKitAdminLoginNotifierPluginInstaller](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_PluginInstaller/LightKitAdminLoginNotifierPluginInstaller.md) &ndash; The LightKitAdminLoginNotifierPluginInstaller class.
    - LightKitAdminBasePortPluginInstallerWithDatabase::__construct &ndash; Builds the LightKitAdminBasePluginInstallerWithDatabase instance.
    - LightKitAdminBasePortPluginInstallerWithDatabase::install &ndash; Installs the plugin in the light application.
    - LightKitAdminBasePortPluginInstallerWithDatabase::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
    - LightKitAdminBasePortPluginInstallerWithDatabase::uninstall &ndash; Uninstalls the plugin.
    - LightKitAdminBasePortPluginInstallerWithDatabase::getDependencies &ndash; Returns the array of dependencies.
    - LightUserDatabaseBasePluginInstaller::setContainer &ndash; Sets the container.
    - LightUserDatabaseBasePluginInstaller::getTableScope &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- [LightKitAdminLoginNotifierService](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Service/LightKitAdminLoginNotifierService.md) &ndash; The LightKitAdminLoginNotifierService class.
    - LightKitAdminStandardServicePlugin::__construct &ndash; Builds the LightLingStandardService01 instance.
    - LightKitAdminStandardServicePlugin::setContainer &ndash; Sets the container.
    - LightKitAdminStandardServicePlugin::setOptions &ndash; Sets the options.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_ControllerHub](https://github.com/lingtalfi/Light_ControllerHub)
- [Light_Kit](https://github.com/lingtalfi/Light_Kit)
- [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin)
- [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase)



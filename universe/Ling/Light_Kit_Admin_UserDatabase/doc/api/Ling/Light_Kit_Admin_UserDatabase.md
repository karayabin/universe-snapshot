Ling/Light_Kit_Admin_UserDatabase
================
2020-06-25 --> 2020-06-25




Table of contents
===========

- [UserProfileController](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Controller/User/UserProfileController.md) &ndash; The UserProfileController class.
    - [UserProfileController::render](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Controller/User/UserProfileController/render.md) &ndash; Renders the user profile page, where the user can change her profile.
    - [UserProfileController::processForm](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Controller/User/UserProfileController/processForm.md) &ndash; Work in progress...
    - AdminPageController::renderAdminPage &ndash; if she is not connected yet.
    - LightKitAdminController::__construct &ndash; Builds the LightController instance.
    - LightKitAdminController::setRoute &ndash; Sets the matching route to this controller instance.
    - LightKitAdminController::renderPage &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
    - LightController::setLight &ndash; Sets the light instance.
- [LightKitAdminUserDatabaseControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/ControllerHub/LightKitAdminUserDatabaseControllerHubHandler.md) &ndash; The LightKitAdminUserDatabaseControllerHubHandler class.
    - [LightKitAdminUserDatabaseControllerHubHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/ControllerHub/LightKitAdminUserDatabaseControllerHubHandler/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
    - LightBaseControllerHubHandler::__construct &ndash; Builds the LightKitAdminControllerHubHandler instance.
    - LightBaseControllerHubHandler::setContainer &ndash; Sets the container.
- [LightKitAdminUserDatabaseLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/LightKitAdminPlugin/LightKitAdminUserDatabaseLkaPlugin.md) &ndash; The LightKitAdminUserDatabaseLkaPlugin class.
    - BaseLightKitAdminPlugin::__construct &ndash; Builds the BaseLightKitAdminPlugin instance.
    - BaseLightKitAdminPlugin::getPluginOptions &ndash; Returns the options of this kit admin plugin.
    - BaseLightKitAdminPlugin::setOptionsFile &ndash; Sets the file.
- [LightKitAdminUserDatabaseService](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService.md) &ndash; The LightKitAdminUserDatabaseService class.
    - [LightKitAdminUserDatabaseService::__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/__construct.md) &ndash; Builds the LightKitAdminUserDataService instance.
    - [LightKitAdminUserDatabaseService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/setContainer.md) &ndash; Sets the container.
    - [LightKitAdminUserDatabaseService::install](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/install.md) &ndash; Installs the plugin in the light application.
    - [LightKitAdminUserDatabaseService::uninstall](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/uninstall.md) &ndash; Uninstalls the plugin.
    - [LightKitAdminUserDatabaseService::isInstalled](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
    - [LightKitAdminUserDatabaseService::getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/getDependencies.md) &ndash; Returns the array of dependencies.
    - [LightKitAdminUserDatabaseService::inject](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/inject.md) &ndash; Injects menu fragments in the given menu, knowing the "menuStructureId" context.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Chloroform](https://github.com/lingtalfi/Chloroform)
- [GormanJsonDecoder](https://github.com/lingtalfi/GormanJsonDecoder)
- [Light](https://github.com/lingtalfi/Light)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin)
- [Light_UserData](https://github.com/lingtalfi/Light_UserData)
- [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase)
- [Light_User](https://github.com/lingtalfi/Light_User)
- [WiseTool](https://github.com/lingtalfi/WiseTool)
- [Light_ControllerHub](https://github.com/lingtalfi/Light_ControllerHub)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Light_BMenu](https://github.com/lingtalfi/Light_BMenu)
- [Light_PluginInstaller](https://github.com/lingtalfi/Light_PluginInstaller)



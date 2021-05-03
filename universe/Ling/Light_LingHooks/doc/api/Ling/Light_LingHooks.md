Ling/Light_LingHooks
================
2020-08-17 --> 2021-03-22




Table of contents
===========

- [LightLingHooksException](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Exception/LightLingHooksException.md) &ndash; The LightLingHooksException class.
- [LightLingHooksPlanetInstaller](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller.md) &ndash; The LightLingHooksPlanetInstaller class.
    - [LightLingHooksPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/onMapCopyAfter.md) &ndash; This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightLingHooksService](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService.md) &ndash; The LightLingHooksService class.
    - [LightLingHooksService::__construct](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/__construct.md) &ndash; Builds the LightLingHooksService instance.
    - [LightLingHooksService::setContainer](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/setContainer.md) &ndash; Sets the container.
    - [LightLingHooksService::setOptions](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/setOptions.md) &ndash; Sets the options.
    - [LightLingHooksService::addImportantNotifications](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/addImportantNotifications.md) &ndash; Adds important notifications.
    - [LightLingHooksService::onUserNotificationSendQuickMailAlert](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService/onUserNotificationSendQuickMailAlert.md) &ndash; When an userNotification is sent, send an email alert to the admin, depending on the configuration.


Dependencies
============
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)
- [Light_QuickMailAlert](https://github.com/lingtalfi/Light_QuickMailAlert)



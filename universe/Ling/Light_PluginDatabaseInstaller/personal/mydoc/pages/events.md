Events
=====================
2020-02-06




The Light_PluginDatabaseInstaller plugin provides the following events:


- **Light_PluginDatabaseInstaller.on_uninstall_before**: this event is triggered from LightPluginDatabaseInstallerService->executeByPluginName,
    just before the install of a plugin is executed.
    
    The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) with the following variables:
    - **pluginName**: the name of the plugin about to be installed
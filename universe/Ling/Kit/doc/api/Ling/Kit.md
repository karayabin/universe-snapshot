Ling/Kit
================
2019-04-24 --> 2020-12-08




Table of contents
===========

- [BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md) &ndash; The BabyYamlConfStorage interface.
    - [BabyYamlConfStorage::__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/__construct.md) &ndash; Builds the BabyYamlConfStorage instance.
    - [BabyYamlConfStorage::setVariables](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/setVariables.md) &ndash; Sets the variables to inject to this instance.
    - [BabyYamlConfStorage::getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getPageConf.md) &ndash; Returns the page conf array for the given $pageName, or false if a problem occurs.
    - [BabyYamlConfStorage::getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getErrors.md) &ndash; Returns the errors that occurred during the last method call.
    - [BabyYamlConfStorage::setRootDir](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/setRootDir.md) &ndash; Sets the rootDir.
- [ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) &ndash; The ConfStorageInterface interface.
    - [ConfStorageInterface::getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getPageConf.md) &ndash; Returns the page conf array for the given $pageName, or false if a problem occurs.
    - [ConfStorageInterface::getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getErrors.md) &ndash; Returns the errors that occurred during the last method call.
- [VariableAwareConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/VariableAwareConfStorageInterface.md) &ndash; The VariableAwareConfStorageInterface interface.
    - [VariableAwareConfStorageInterface::setVariables](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/VariableAwareConfStorageInterface/setVariables.md) &ndash; Sets the variables to inject to this instance.
- [KitException](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/Exception/KitException.md) &ndash; The KitException class.
- [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md) &ndash; The KitPageRenderer class.
    - [KitPageRenderer::__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/__construct.md) &ndash; Builds the KitPageRenderer instance.
    - [KitPageRenderer::countWidgets](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/countWidgets.md) &ndash; Returns the number of widgets for a given zone.
    - [KitPageRenderer::setPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setPageConf.md) &ndash; Sets the pageConf.
    - [KitPageRenderer::setStrictMode](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setStrictMode.md) &ndash; Sets the strictMode.
    - [KitPageRenderer::setErrorHandler](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setErrorHandler.md) &ndash; Sets the errorHandler.
    - [KitPageRenderer::registerWidgetHandler](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/registerWidgetHandler.md) &ndash; Registers a widget handler for the given (widget) type.
    - [KitPageRenderer::setLayoutRootDir](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/setLayoutRootDir.md) &ndash; Sets the layoutRootDir.
    - [KitPageRenderer::addWidgetConfDecorator](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/addWidgetConfDecorator.md) &ndash; Adds a widget configuration decorator to this instance.
    - [KitPageRenderer::printPage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printPage.md) &ndash; Prints the page.
    - [KitPageRenderer::printZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printZone.md) &ndash; Prints a zone.
- [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md) &ndash; The KitPageRendererAwareInterface interface.
    - [KitPageRendererAwareInterface::setKitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface/setKitPageRenderer.md) &ndash; Sets the KitPageRenderer instance.
- [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) &ndash; The KitPageRendererInterface interface.
    - [KitPageRendererInterface::setPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface/setPageConf.md) &ndash; Sets the pageConf.
    - [KitPageRendererInterface::printPage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface/printPage.md) &ndash; Prints the page.
    - [KitPageRendererInterface::printZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface/printZone.md) &ndash; Prints a zone.
    - [KitPageRendererInterface::countWidgets](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface/countWidgets.md) &ndash; Returns the number of widgets for a given zone.
- [KitWidgetInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/Widget/KitWidgetInterface.md) &ndash; The KitWidgetInterface interface.
- [WidgetConfDecoratorInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md) &ndash; The WidgetConfDecoratorInterface interface.
    - [WidgetConfDecoratorInterface::decorate](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface/decorate.md) &ndash; Decorates the given widget configuration array.
- [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) &ndash; The WidgetHandlerInterface interface.
    - [WidgetHandlerInterface::handle](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/handle.md) &ndash; Returns the html code of the widget, according to the widget configuration.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [HtmlPageTools](https://github.com/lingtalfi/HtmlPageTools)



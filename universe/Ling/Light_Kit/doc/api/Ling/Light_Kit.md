Ling/Light_Kit
================
2019-04-25 --> 2021-04-09




Table of contents
===========

- [ConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ConfigurationTransformerInterface.md) &ndash; The ConfigurationTransformerInterface interface.
    - [ConfigurationTransformerInterface::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ConfigurationTransformerInterface/transform.md) &ndash; Transforms the given configuration array in place.
- [DynamicVariableAwareInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableAwareInterface.md) &ndash; The DynamicVariableAwareInterface interface.
    - [DynamicVariableAwareInterface::setVariables](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableAwareInterface/setVariables.md) &ndash; Sets the dynamic variables into the instance.
- [DynamicVariableTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer.md) &ndash; The DynamicVariableTransformer class.
    - [DynamicVariableTransformer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer/__construct.md) &ndash; Builds the DynamicVariableTransformer instance.
    - [DynamicVariableTransformer::setFirstSymbol](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer/setFirstSymbol.md) &ndash; Sets the firstSymbol.
    - [DynamicVariableTransformer::setOpeningBracket](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer/setOpeningBracket.md) &ndash; Sets the openingBracket.
    - [DynamicVariableTransformer::setClosingBracket](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer/setClosingBracket.md) &ndash; Sets the closingBracket.
    - [DynamicVariableTransformer::setVariables](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer/setVariables.md) &ndash; Sets the dynamic variables into the instance.
    - [DynamicVariableTransformer::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/DynamicVariableTransformer/transform.md) &ndash; Transforms the given configuration array in place.
- [MethodCallResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md) &ndash; The MethodCallResolver class.
    - [MethodCallResolver::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/MethodCallResolver/__construct.md) &ndash; Builds the MethodCallResolver instance.
    - [MethodCallResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/MethodCallResolver/resolve.md) &ndash; Interprets the given $expr and returns the result.
    - [MethodCallResolver::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/MethodCallResolver/setContainer.md) &ndash; Sets the container.
- [RouteResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/RouteResolver.md) &ndash; The RouteResolver class.
    - [RouteResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/RouteResolver/resolve.md) &ndash; Resolves the given $routeExpr and returns the corresponding url.
- [LazyReferenceResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver.md) &ndash; The LazyReferenceResolver class.
    - [LazyReferenceResolver::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/__construct.md) &ndash; Builds the LazyReferenceResolver instance.
    - [LazyReferenceResolver::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/setContainer.md) &ndash; Sets the light service container interface.
    - [LazyReferenceResolver::setStrictMode](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/setStrictMode.md) &ndash; Sets the strictMde.
    - [LazyReferenceResolver::setResolvers](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/setResolvers.md) &ndash; Sets the resolvers.
    - [LazyReferenceResolver::registerResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/registerResolver.md) &ndash; Registers the resolver and assigns it to the given token.
    - [LazyReferenceResolver::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver/transform.md) &ndash; Transforms the given configuration array in place.
- [LightExecuteNotationResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver.md) &ndash; The LightExecuteNotationResolver class.
    - [LightExecuteNotationResolver::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/__construct.md) &ndash; Builds the LightExecuteNotationResolver instance.
    - [LightExecuteNotationResolver::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/setContainer.md) &ndash; Sets the light service container interface.
    - [LightExecuteNotationResolver::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/transform.md) &ndash; Transforms the given configuration array in place.
- [ThemeTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ThemeTransformer.md) &ndash; The ThemeTransformer class.
    - [ThemeTransformer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ThemeTransformer/__construct.md) &ndash; Builds the ThemeTransformer instance.
    - [ThemeTransformer::setTheme](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ThemeTransformer/setTheme.md) &ndash; Sets the theme.
    - [ThemeTransformer::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ThemeTransformer/transform.md) &ndash; Transforms the given configuration array in place.
- [LightKitCssFileGenerator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator.md) &ndash; The LightKitCssFileGenerator class.
    - [LightKitCssFileGenerator::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator/__construct.md) &ndash; Builds the LightKitCssFileGenerator instance.
    - [LightKitCssFileGenerator::generate](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/CssFileGenerator/LightKitCssFileGenerator/generate.md) &ndash; and returns the url to this css file.
- [LightKitException](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Exception/LightKitException.md) &ndash; The LightKitException class.
- [WidgetVariablesHelper](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper.md) &ndash; The WidgetVariablesHelper class.
    - [WidgetVariablesHelper::injectWidgetVariables](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper/injectWidgetVariables.md) &ndash; Injects the widget variables in the page conf.
    - [WidgetVariablesHelper::injectWidgetConf](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper/injectWidgetConf.md) &ndash; Injects the widget conf in the page conf.
- [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md) &ndash; The PageConfUpdator class.
    - [PageConfUpdator::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/__construct.md) &ndash; Builds the PageConfUpdator instance.
    - [PageConfUpdator::create](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/create.md) &ndash; Builds and returns a PageConfUpdator instance.
    - [PageConfUpdator::update](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/update.md) &ndash; Updates the given $pageConf array.
    - [PageConfUpdator::setMergeArray](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/setMergeArray.md) &ndash; Sets the mergeArray.
    - [PageConfUpdator::updateWidget](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/updateWidget.md) &ndash; Updates widget identified by $widgetIdentifier using the $newWidgetConfLayer layer.
- [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md) &ndash; The LightKitPageRenderer class.
    - [LightKitPageRenderer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/__construct.md) &ndash; Builds the LightKitPageRenderer instance.
    - [LightKitPageRenderer::setConfStorage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setConfStorage.md) &ndash; Sets the confStorage.
    - [LightKitPageRenderer::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setContainer.md) &ndash; Sets the container.
    - [LightKitPageRenderer::addPageConfigurationTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/addPageConfigurationTransformer.md) &ndash; Adds a ConfigurationTransformerInterface to this instance.
    - [LightKitPageRenderer::configure](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/configure.md) &ndash; Configures thi instance.
    - [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md) &ndash; Renders the given page.
    - [LightKitPageRenderer::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getContainer.md) &ndash; Returns a light service container instance.
    - KitPageRenderer::countWidgets &ndash; Returns the number of widgets for a given zone.
    - KitPageRenderer::setPageConf &ndash; Sets the pageConf.
    - KitPageRenderer::setStrictMode &ndash; Sets the strictMode.
    - KitPageRenderer::setErrorHandler &ndash; Sets the errorHandler.
    - KitPageRenderer::registerWidgetHandler &ndash; Registers a widget handler for the given (widget) type.
    - KitPageRenderer::setLayoutRootDir &ndash; Sets the layoutRootDir.
    - KitPageRenderer::addWidgetConfDecorator &ndash; Adds a widget configuration decorator to this instance.
    - KitPageRenderer::printPage &ndash; Prints the page.
    - KitPageRenderer::printZone &ndash; Prints a zone.
- [LightKitService](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Service/LightKitService.md) &ndash; The LightKitService class.
    - [LightKitPageRenderer::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/__construct.md) &ndash; Builds the LightKitPageRenderer instance.
    - [LightKitPageRenderer::setConfStorage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setConfStorage.md) &ndash; Sets the confStorage.
    - [LightKitPageRenderer::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/setContainer.md) &ndash; Sets the container.
    - [LightKitPageRenderer::addPageConfigurationTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/addPageConfigurationTransformer.md) &ndash; Adds a ConfigurationTransformerInterface to this instance.
    - [LightKitPageRenderer::configure](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/configure.md) &ndash; Configures thi instance.
    - [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md) &ndash; Renders the given page.
    - [LightKitPageRenderer::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getContainer.md) &ndash; Returns a light service container instance.
    - KitPageRenderer::countWidgets &ndash; Returns the number of widgets for a given zone.
    - KitPageRenderer::setPageConf &ndash; Sets the pageConf.
    - KitPageRenderer::setStrictMode &ndash; Sets the strictMode.
    - KitPageRenderer::setErrorHandler &ndash; Sets the errorHandler.
    - KitPageRenderer::registerWidgetHandler &ndash; Registers a widget handler for the given (widget) type.
    - KitPageRenderer::setLayoutRootDir &ndash; Sets the layoutRootDir.
    - KitPageRenderer::addWidgetConfDecorator &ndash; Adds a widget configuration decorator to this instance.
    - KitPageRenderer::printPage &ndash; Prints the page.
    - KitPageRenderer::printZone &ndash; Prints a zone.
- [LightKitPicassoWidgetHandler](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler.md) &ndash; The LightKitPicassoWidgetHandler class.
    - [LightKitPicassoWidgetHandler::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/__construct.md) &ndash; Builds the LightKitPicassoWidgetHandler instance.
    - [LightKitPicassoWidgetHandler::getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/getContainer.md) &ndash; Returns the container of this instance.
    - [LightKitPicassoWidgetHandler::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/WidgetHandler/LightKitPicassoWidgetHandler/setContainer.md) &ndash; Sets the container.
    - PicassoWidgetHandler::setKitPageRenderer &ndash; Sets the KitPageRenderer instance.
    - PicassoWidgetHandler::setWidgetBaseDir &ndash; Sets the widgetBaseDir.
    - PicassoWidgetHandler::process &ndash; Process the widget.
    - PicassoWidgetHandler::render &ndash; Returns the html code of the widget, according to the widget configuration.


Dependencies
============
- [ArrayVariableResolver](https://github.com/lingtalfi/ArrayVariableResolver)
- [Bat](https://github.com/lingtalfi/Bat)
- [HtmlPageTools](https://github.com/lingtalfi/HtmlPageTools)
- [Kit](https://github.com/lingtalfi/Kit)
- [Kit_PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget)
- [Kit_PrototypeWidget](https://github.com/lingtalfi/Kit_PrototypeWidget)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)



Ling/Light_PrettyError
================
2019-04-05 --> 2021-05-31




Table of contents
===========

- [LightPrettyErrorException](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Exception/LightPrettyErrorException.md) &ndash; The LightPrettyErrorException class.
- [LightPrettyErrorPlanetInstaller](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller.md) &ndash; The LightPrettyErrorPlanetInstaller class.
    - [LightPrettyErrorPlanetInstaller::init2](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightPrettyErrorPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Light_PlanetInstaller/LightPrettyErrorPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightPrettyErrorService](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService.md) &ndash; The LightPrettyErrorService class.
    - [LightPrettyErrorService::renderPage](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/renderPage.md) &ndash; Returns the html code for a beautiful error page showing the exception.
    - [LightPrettyErrorService::onLightExceptionCaught](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/onLightExceptionCaught.md) &ndash; This method is a callable to execute when the [Ling.Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md) is triggered.


Dependencies
============
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)
- [UniversalTemplateEngine](https://github.com/lingtalfi/UniversalTemplateEngine)



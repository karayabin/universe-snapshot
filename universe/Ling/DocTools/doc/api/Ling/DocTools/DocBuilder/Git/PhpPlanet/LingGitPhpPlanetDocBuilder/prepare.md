[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md)


LingGitPhpPlanetDocBuilder::prepare
================



LingGitPhpPlanetDocBuilder::prepare — Prepares the doc builder instance.




Description
================


public [LingGitPhpPlanetDocBuilder::prepare](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/prepare.md)(array $settings = []) : void




Prepares the doc builder instance.
After the call to this method, you should be able to call the showReport method and/or
the buildDoc method directly.

The content of this method should generally:

- define a parser (class parser or planet parser).
- use the setReport method to define a parser report (DocTools\Report\ReportInterface).

- trigger the parser to obtain the info object (DocTools\Info\InfoInterface) and fill the report.
     The info object should be stored and re-used in the buildDoc method.




Parameters
================


- settings

    Settings (all mandatory except those prefixed with question mark):

- planetDir: string. The location of the planet directory to parse.
- ?reportIgnore: array. An array of class names to not include in the report if they fail.
             This might be useful in case your class extends an external class for instance.
- ?reportShowMethodsWithoutReturn: bool=true, whether to display methods without "@return" tag.
- ?projectStartDate: date in mysql format (i.e. 2019-02-21). The date when the project was started.
             Templates will use it to differentiate between the last update date and the project creation date.

- generatedClassBaseDir: string. Where (in the filesystem) to write/create the documentation pages.
- insertsBaseDir: string. The inserts base dir location. See @concept(inserts) for more info.
- generatedClassBaseUrl: string. The base url for the generated classes.

- ?copyModuleSrc: string. The source of the copy module. See @page(copy module) for more info.
- ?copyModuleDst: string. The destination of the copy module. See @page(copy module) for more info.
- ?copyModuleOptions: array. Options to pass to the copy module. See @page(copy module) for more info.
             The available options are:
             - filter: array. An array of file name to not copy. This might be useful for files
                 which documents the @concept(inline functions), and so you don't want to interpret the
                 inline functions in it because it will try to interpret them, but they are part of the documentation
                 and shouldn't be interpreted as functions but as plain text.


- ?keyWord2UrlMap: array. An array of keyword => (absolute) url to use for resolving keywords.
             See the @keyword(keyword inline function page) for more details.
- ?externalClass2Url: array. An array of external custom class name => url pointing to the class documentation.
             External custom class name means:
             - the class is external to the given planetDir
             - this is not a php built-in class (like \Exception for instance)
- ?markdownTranslator: object. Instance of a @class(DocTools\Translator\MarkdownTranslatorInterface).
             If set, all generated files will be converted by this translator.
- ?mode: string = md (html|md). Whether to generate md files or html files.
             By default, the md format is used (markdown).
             If you use html, be sure to also set an appropriate markdownTranslator, which will convert
             markdown to html.


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







See Also
================

The [LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md) class.

Next method: [buildDoc](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder/buildDoc.md)<br>


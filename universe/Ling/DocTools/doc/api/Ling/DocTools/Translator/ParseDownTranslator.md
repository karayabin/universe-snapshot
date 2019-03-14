[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ParseDownTranslator class
================
2019-02-21 --> 2019-03-13






Introduction
============

The MarkdownTranslatorInterface interface.



Class synopsis
==============


class <span class="pl-k">ParseDownTranslator</span> extends [Parsedown](https://github.com/lingtalfi/ParseDown) implements [MarkdownTranslatorInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/MarkdownTranslatorInterface.md) {

- Inherited constants
    - public const [Parsedown::version](#constant-version) = 1.8.0-beta-5 ;

- Inherited properties
    - protected  [Parsedown::$breaksEnabled](#property-breaksEnabled) ;
    - protected  [Parsedown::$markupEscaped](#property-markupEscaped) ;
    - protected  [Parsedown::$urlsLinked](#property-urlsLinked) = true ;
    - protected  [Parsedown::$safeMode](#property-safeMode) ;
    - protected  [Parsedown::$strictMode](#property-strictMode) ;
    - protected  [Parsedown::$safeLinksWhitelist](#property-safeLinksWhitelist) = ['http://','https://','ftp://','ftps://','mailto:','tel:','data:image/png;base64,','data:image/gif;base64,','data:image/jpeg;base64,','irc:','ircs:','git:','ssh:','news:','steam:'] ;
    - protected  [Parsedown::$BlockTypes](#property-BlockTypes) = ['#' => ['Header'],'*' => ['Rule','List'],'+' => ['List'],'-' => ['SetextHeader','Table','Rule','List'],['List'],['List'],['List'],['List'],['List'],['List'],['List'],['List'],['List'],['List'],':' => ['Table'],'<' => ['Comment','Markup'],'=' => ['SetextHeader'],'>' => ['Quote'],'[' => ['Reference'],'_' => ['Rule'],'`' => ['FencedCode'],'|' => ['Table'],'~' => ['FencedCode']] ;
    - protected  [Parsedown::$unmarkedBlockTypes](#property-unmarkedBlockTypes) = ['Code'] ;
    - protected  [Parsedown::$InlineTypes](#property-InlineTypes) = ['!' => ['Image'],'&' => ['SpecialCharacter'],'*' => ['Emphasis'],':' => ['Url'],'<' => ['UrlTag','EmailTag','Markup'],'[' => ['Link'],'_' => ['Emphasis'],'`' => ['Code'],'~' => ['Strikethrough'],'\\' => ['EscapeSequence']] ;
    - protected  [Parsedown::$inlineMarkerList](#property-inlineMarkerList) = !*_&[:<`~\ ;
    - protected  [Parsedown::$DefinitionData](#property-DefinitionData) ;
    - protected  [Parsedown::$specialCharacters](#property-specialCharacters) = ['\\','`','*','_','{','}','[',']','(',')','>','#','+','-','.','!','|','~'] ;
    - protected  [Parsedown::$StrongRegex](#property-StrongRegex) = ['*' => '/^[*]{2}((?:\\\\\\*|[^*]|[*][^*]*+[*])+?)[*]{2}(?![*])/s','_' => '/^__((?:\\\\_|[^_]|_[^_]*+_)+?)__(?!_)/us'] ;
    - protected  [Parsedown::$EmRegex](#property-EmRegex) = ['*' => '/^[*]((?:\\\\\\*|[^*]|[*][*][^*]+?[*][*])+?)[*](?![*])/s','_' => '/^_((?:\\\\_|[^_]|__[^_]*__)+?)_(?!_)\\b/us'] ;
    - protected  [Parsedown::$regexHtmlAttribute](#property-regexHtmlAttribute) = [a-zA-Z_:][\w:.-]*+(?:\s*+=\s*+(?:[^"'=<>`\s]+|"[^"]*+"|'[^']*+'))?+ ;
    - protected  [Parsedown::$voidElements](#property-voidElements) = ['area','base','br','col','command','embed','hr','img','input','link','meta','param','source'] ;
    - protected  [Parsedown::$textLevelElements](#property-textLevelElements) = ['a','br','bdo','abbr','blink','nextid','acronym','basefont','b','em','big','cite','small','spacer','listing','i','rp','del','code','strike','marquee','q','rt','ins','font','strong','s','tt','kbd','mark','u','xm','sub','nobr','sup','ruby','var','span','wbr','time'] ;

- Methods
    - public [translate](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/ParseDownTranslator/translate.md)(string $string) : string

- Inherited methods
    - public Parsedown::text(?$text) : void
    - protected Parsedown::textElements(?$text) : void
    - public Parsedown::setBreaksEnabled(?$breaksEnabled) : void
    - public Parsedown::setMarkupEscaped(?$markupEscaped) : void
    - public Parsedown::setUrlsLinked(?$urlsLinked) : void
    - public Parsedown::setSafeMode(?$safeMode) : void
    - public Parsedown::setStrictMode(?$strictMode) : void
    - protected Parsedown::lines(array $lines) : void
    - protected Parsedown::linesElements(array $lines) : void
    - protected Parsedown::extractElement(array $Component) : void
    - protected Parsedown::isBlockContinuable(?$Type) : void
    - protected Parsedown::isBlockCompletable(?$Type) : void
    - protected Parsedown::blockCode(?$Line, $Block = null) : void
    - protected Parsedown::blockCodeContinue(?$Line, ?$Block) : void
    - protected Parsedown::blockCodeComplete(?$Block) : void
    - protected Parsedown::blockComment(?$Line) : void
    - protected Parsedown::blockCommentContinue(?$Line, array $Block) : void
    - protected Parsedown::blockFencedCode(?$Line) : void
    - protected Parsedown::blockFencedCodeContinue(?$Line, ?$Block) : void
    - protected Parsedown::blockFencedCodeComplete(?$Block) : void
    - protected Parsedown::blockHeader(?$Line) : void
    - protected Parsedown::blockList(?$Line, array $CurrentBlock = null) : void
    - protected Parsedown::blockListContinue(?$Line, array $Block) : void
    - protected Parsedown::blockListComplete(array $Block) : void
    - protected Parsedown::blockQuote(?$Line) : void
    - protected Parsedown::blockQuoteContinue(?$Line, array $Block) : void
    - protected Parsedown::blockRule(?$Line) : void
    - protected Parsedown::blockSetextHeader(?$Line, array $Block = null) : void
    - protected Parsedown::blockMarkup(?$Line) : void
    - protected Parsedown::blockMarkupContinue(?$Line, array $Block) : void
    - protected Parsedown::blockReference(?$Line) : void
    - protected Parsedown::blockTable(?$Line, array $Block = null) : void
    - protected Parsedown::blockTableContinue(?$Line, array $Block) : void
    - protected Parsedown::paragraph(?$Line) : void
    - protected Parsedown::paragraphContinue(?$Line, array $Block) : void
    - public Parsedown::line(?$text, $nonNestables = []) : void
    - protected Parsedown::lineElements(?$text, $nonNestables = []) : void
    - protected Parsedown::inlineText(?$text) : void
    - protected Parsedown::inlineCode(?$Excerpt) : void
    - protected Parsedown::inlineEmailTag(?$Excerpt) : void
    - protected Parsedown::inlineEmphasis(?$Excerpt) : void
    - protected Parsedown::inlineEscapeSequence(?$Excerpt) : void
    - protected Parsedown::inlineImage(?$Excerpt) : void
    - protected Parsedown::inlineLink(?$Excerpt) : void
    - protected Parsedown::inlineMarkup(?$Excerpt) : void
    - protected Parsedown::inlineSpecialCharacter(?$Excerpt) : void
    - protected Parsedown::inlineStrikethrough(?$Excerpt) : void
    - protected Parsedown::inlineUrl(?$Excerpt) : void
    - protected Parsedown::inlineUrlTag(?$Excerpt) : void
    - protected Parsedown::unmarkedText(?$text) : void
    - protected Parsedown::handle(array $Element) : void
    - protected Parsedown::handleElementRecursive(array $Element) : void
    - protected Parsedown::handleElementsRecursive(array $Elements) : void
    - protected Parsedown::elementApplyRecursive(?$closure, array $Element) : void
    - protected Parsedown::elementApplyRecursiveDepthFirst(?$closure, array $Element) : void
    - protected Parsedown::elementsApplyRecursive(?$closure, array $Elements) : void
    - protected Parsedown::elementsApplyRecursiveDepthFirst(?$closure, array $Elements) : void
    - protected Parsedown::element(array $Element) : void
    - protected Parsedown::elements(array $Elements) : void
    - protected Parsedown::li(?$lines) : void
    - protected static Parsedown::pregReplaceElements(?$regexp, ?$Elements, ?$text) : void
    - public Parsedown::parse(?$text) : void
    - protected Parsedown::sanitiseElement(array $Element) : void
    - protected Parsedown::filterUnsafeUrlInAttribute(array $Element, ?$attribute) : void
    - protected static Parsedown::escape(?$text, $allowQuotes = false) : void
    - protected static Parsedown::striAtStart(?$string, ?$needle) : void
    - public static Parsedown::instance($name = default) : void

}






Methods
==============

- [ParseDownTranslator::translate](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/ParseDownTranslator/translate.md) &ndash; and returns the result.
- Parsedown::text &ndash; 
- Parsedown::textElements &ndash; 
- Parsedown::setBreaksEnabled &ndash; 
- Parsedown::setMarkupEscaped &ndash; 
- Parsedown::setUrlsLinked &ndash; 
- Parsedown::setSafeMode &ndash; 
- Parsedown::setStrictMode &ndash; 
- Parsedown::lines &ndash; 
- Parsedown::linesElements &ndash; 
- Parsedown::extractElement &ndash; 
- Parsedown::isBlockContinuable &ndash; 
- Parsedown::isBlockCompletable &ndash; 
- Parsedown::blockCode &ndash; 
- Parsedown::blockCodeContinue &ndash; 
- Parsedown::blockCodeComplete &ndash; 
- Parsedown::blockComment &ndash; 
- Parsedown::blockCommentContinue &ndash; 
- Parsedown::blockFencedCode &ndash; 
- Parsedown::blockFencedCodeContinue &ndash; 
- Parsedown::blockFencedCodeComplete &ndash; 
- Parsedown::blockHeader &ndash; 
- Parsedown::blockList &ndash; 
- Parsedown::blockListContinue &ndash; 
- Parsedown::blockListComplete &ndash; 
- Parsedown::blockQuote &ndash; 
- Parsedown::blockQuoteContinue &ndash; 
- Parsedown::blockRule &ndash; 
- Parsedown::blockSetextHeader &ndash; 
- Parsedown::blockMarkup &ndash; 
- Parsedown::blockMarkupContinue &ndash; 
- Parsedown::blockReference &ndash; 
- Parsedown::blockTable &ndash; 
- Parsedown::blockTableContinue &ndash; 
- Parsedown::paragraph &ndash; 
- Parsedown::paragraphContinue &ndash; 
- Parsedown::line &ndash; 
- Parsedown::lineElements &ndash; 
- Parsedown::inlineText &ndash; 
- Parsedown::inlineCode &ndash; 
- Parsedown::inlineEmailTag &ndash; 
- Parsedown::inlineEmphasis &ndash; 
- Parsedown::inlineEscapeSequence &ndash; 
- Parsedown::inlineImage &ndash; 
- Parsedown::inlineLink &ndash; 
- Parsedown::inlineMarkup &ndash; 
- Parsedown::inlineSpecialCharacter &ndash; 
- Parsedown::inlineStrikethrough &ndash; 
- Parsedown::inlineUrl &ndash; 
- Parsedown::inlineUrlTag &ndash; 
- Parsedown::unmarkedText &ndash; 
- Parsedown::handle &ndash; 
- Parsedown::handleElementRecursive &ndash; 
- Parsedown::handleElementsRecursive &ndash; 
- Parsedown::elementApplyRecursive &ndash; 
- Parsedown::elementApplyRecursiveDepthFirst &ndash; 
- Parsedown::elementsApplyRecursive &ndash; 
- Parsedown::elementsApplyRecursiveDepthFirst &ndash; 
- Parsedown::element &ndash; 
- Parsedown::elements &ndash; 
- Parsedown::li &ndash; 
- Parsedown::pregReplaceElements &ndash; Replace occurrences $regexp with $Elements in $text.
- Parsedown::parse &ndash; 
- Parsedown::sanitiseElement &ndash; 
- Parsedown::filterUnsafeUrlInAttribute &ndash; 
- Parsedown::escape &ndash; 
- Parsedown::striAtStart &ndash; 
- Parsedown::instance &ndash; 





Location
=============
Ling\DocTools\Translator\ParseDownTranslator


SeeAlso
==============
Previous class: [MarkdownTranslatorInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/MarkdownTranslatorInterface.md)<br>Next class: [ClassMethodsWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget.md)<br>

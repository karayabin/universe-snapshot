Ling/SicTools
================
2019-04-25 --> 2019-07-18




Table of contents
===========

- [CodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock.md) &ndash; The CodeBlock class is a container for php code.
    - [CodeBlock::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/__construct.md) &ndash; Builds the CodeBlock instance.
    - [CodeBlock::addStatement](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/addStatement.md) &ndash; Adds a statement to the code block.
    - [CodeBlock::getStatements](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/CodeBlock/CodeBlock/getStatements.md) &ndash; Returns all the statements attached to this code block.
- [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md) &ndash; which contains methods based on the sic notation.
    - [ColdServiceResolver::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/__construct.md) &ndash; Builds the ColdServiceResolver instance.
    - [ColdServiceResolver::getServicePhpCode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/getServicePhpCode.md) &ndash; Returns the php code (based on the given sic block) to put in the body of your service container's method.
- [SicBlockWillNotResolveException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicBlockWillNotResolveException.md) &ndash; The SicBlockWillNotResolveException indicates that a sic block cannot resolve into a service.
- [SicToolsException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicToolsException.md) &ndash; The SicToolsException class is the base class for all exceptions of the SicTools planet.
- [HotServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver.md) &ndash; on the fly from a stored sic notation.
    - [HotServiceResolver::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/__construct.md) &ndash; Builds the HotServiceResolver instance.
    - [HotServiceResolver::getService](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/getService.md) &ndash; Returns the service (an instance of a class) defined in the given sic block.
- [SicTool](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/SicTool.md) &ndash; The SicTool class contains general purpose methods to work with the sic notation.
    - [SicTool::isSicBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/SicTool/isSicBlock.md) &ndash; Returns whether the given $thing is a sic block.
- [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md) &ndash; The SicFileCombinerUtil class.
    - [SicFileCombinerUtil::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/__construct.md) &ndash; Builds the SicFileCombinerUtil instance.
    - [SicFileCombinerUtil::setLazyOverrideSymbol](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setLazyOverrideSymbol.md) &ndash; Sets the lazyOverrideSymbol.
    - [SicFileCombinerUtil::setVariableSymbol](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setVariableSymbol.md) &ndash; Sets the variableSymbol.
    - [SicFileCombinerUtil::setEnvironmentVariables](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setEnvironmentVariables.md) &ndash; Sets the environmentVariables.
    - [SicFileCombinerUtil::combine](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/combine.md) &ndash; Combines the babyYaml files found in the given directory, and returns the resulting array.


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)



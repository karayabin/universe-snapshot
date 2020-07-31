[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Util\ServiceManagerUtil class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md)


ServiceManagerUtil::addPropertyByTemplate
================



ServiceManagerUtil::addPropertyByTemplate — Adds the given property to the service class, and optionally with its initialization and accessor methods.




Description
================


public [ServiceManagerUtil::addPropertyByTemplate](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addPropertyByTemplate.md)(string $propertyName, string $templateContent, ?array $options = []) : void




Adds the given property to the service class, and optionally with its initialization and accessor methods.

By default, the property is written below the last property if any.
If not, it's written before the first method of the class if any.
If not, it's added at the beginning of the class (just after the class declaration).

Or, you can decide exactly where to put it with the **afterProperty** option.





Available options are:
- constructorInit: string, the initialization string to append to the constructor method body (if any).
     Note that the constructor must be there, it will not be added if it's not there, and in fact,
     an exception will be thrown if that's the case.
     Note2: by default, if the constructorInit string is found in the constructor, it will not be added again.


- accessors: string, the methods to add to the class, those will just be appended to the class by default,
     or appended after the method name defined with the accessorsAfter property if set
- accessorsAfter: string, the name of the method after which the accessors string shall be appended.
- afterProperty: string, the property after which to insert the new property. See the [class cooker's addProperty documentation](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/addProperty.md) for more details.
- onError: callable|null|false = null, how to react when an error occurs, or when we try to add something that already exists.
     If callable, the signature is:
     - fn ( errorMessage, errorType ): void
     The errorType is one of:
     - propertyAlreadyExists
     - noConstructorFound
     - constructorStringFound
     - accessorMethodAlreadyExists
     - useStatementAlreadyExists

     If it's null, an exception will be thrown.
     If it's false, this method will fail silently.

- useStatements: array of (complete) use statements to add
- process: WebWizardToolsProcess=null. If passed, the trace messages will be added directly to that process via the addLogMessage method of the process.




Parameters
================


- propertyName

    

- templateContent

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ServiceManagerUtil::addPropertyByTemplate](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Util/ServiceManagerUtil.php#L156-L251)


See Also
================

The [ServiceManagerUtil](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil.md) class.

Previous method: [addMethod](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addMethod.md)<br>Next method: [addUseStatements](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Util/ServiceManagerUtil/addUseStatements.md)<br>


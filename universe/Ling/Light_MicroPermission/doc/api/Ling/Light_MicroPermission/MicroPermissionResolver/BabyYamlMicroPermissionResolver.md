[Back to the Ling/Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md)



The BabyYamlMicroPermissionResolver class
================
2019-09-26 --> 2019-10-30






Introduction
============

The BabyYamlMicroPermissionResolver class.



Class synopsis
==============


class <span class="pl-k">BabyYamlMicroPermissionResolver</span> implements [LightMicroPermissionResolverInterface](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/LightMicroPermissionResolverInterface.md) {

- Properties
    - protected string [$file](#property-file) ;
    - protected array [$conf](#property-conf) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/__construct.md)() : void
    - public [resolve](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/resolve.md)(string $microPermission) : string | false
    - public [setFile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/setFile.md)(string $file) : void

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file for this instance.
    
    

- <span id="property-conf"><b>conf</b></span>

    This property holds the conf cache for this instance.
    
    



Methods
==============

- [BabyYamlMicroPermissionResolver::__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/__construct.md) &ndash; Builds the BabyYamlMicroPermissionResolver instance.
- [BabyYamlMicroPermissionResolver::resolve](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/resolve.md) &ndash; Returns the permission corresponding to the given micro-permission.
- [BabyYamlMicroPermissionResolver::setFile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/setFile.md) &ndash; Sets the file.





Location
=============
Ling\Light_MicroPermission\MicroPermissionResolver\BabyYamlMicroPermissionResolver<br>
See the source code of [Ling\Light_MicroPermission\MicroPermissionResolver\BabyYamlMicroPermissionResolver](https://github.com/lingtalfi/Light_MicroPermission/blob/master/MicroPermissionResolver/BabyYamlMicroPermissionResolver.php)



SeeAlso
==============
Previous class: [LightMicroPermissionException](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Exception/LightMicroPermissionException.md)<br>Next class: [LightMicroPermissionResolverInterface](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/LightMicroPermissionResolverInterface.md)<br>

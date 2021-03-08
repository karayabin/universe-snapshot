[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightWebsiteUserDatabaseBullsheeter class
================
2019-07-19 --> 2021-03-05






Introduction
============

The LightWebsiteUserDatabaseBullsheeter class.



Class synopsis
==============


class <span class="pl-k">LightWebsiteUserDatabaseBullsheeter</span> extends [LightAbstractBullsheeter](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightAbstractBullsheeter.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md) {

- Properties
    - protected string [$avatarImgDir](#property-avatarImgDir) ;
    - protected string [$applicationDir](#property-applicationDir) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightAbstractBullsheeter::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/__construct.md)() : void
    - public [generateRows](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/generateRows.md)(int $nbRows, ?array $options = []) : void
    - public [setAvatarImgDir](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/setAvatarImgDir.md)(string $avatarImgDir) : void
    - public [setApplicationDir](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/setApplicationDir.md)(string $applicationDir) : void

- Inherited methods
    - public LightAbstractBullsheeter::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-avatarImgDir"><b>avatarImgDir</b></span>

    This property holds the path to the avatar image dir.
    This image should be located under the web root of the application (the www directory of the app).
    
    

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the applicationDir for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightWebsiteUserDatabaseBullsheeter::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/__construct.md) &ndash; Builds the LightAbstractBullsheeter instance.
- [LightWebsiteUserDatabaseBullsheeter::generateRows](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/generateRows.md) &ndash; Populates the database with $nbRows random rows in the appropriate table(s).
- [LightWebsiteUserDatabaseBullsheeter::setAvatarImgDir](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/setAvatarImgDir.md) &ndash; Sets the avatarImgDir.
- [LightWebsiteUserDatabaseBullsheeter::setApplicationDir](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Bullsheet/LightWebsiteUserDatabaseBullsheeter/setApplicationDir.md) &ndash; Sets the applicationDir.
- LightAbstractBullsheeter::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_UserDatabase\Bullsheet\LightWebsiteUserDatabaseBullsheeter<br>
See the source code of [Ling\Light_UserDatabase\Bullsheet\LightWebsiteUserDatabaseBullsheeter](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Bullsheet/LightWebsiteUserDatabaseBullsheeter.php)



SeeAlso
==============
Previous class: [LightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory.md)<br>Next class: [LightUserDatabaseException](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Exception/LightUserDatabaseException.md)<br>

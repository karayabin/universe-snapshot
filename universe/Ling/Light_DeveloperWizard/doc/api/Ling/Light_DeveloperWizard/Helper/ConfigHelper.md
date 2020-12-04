[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The ConfigHelper class
================
2020-06-30 --> 2020-12-03






Introduction
============

The ConfigHelper class.



Class synopsis
==============


class <span class="pl-k">ConfigHelper</span>  {

- Methods
    - public static [hasSectionComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/hasSectionComment.md)(string $confFile, string $bannerName) : bool
    - public static [getBannerContent](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/getBannerContent.md)(string $bannerName) : string
    - public static [removeSectionComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/removeSectionComment.md)(string $configFile, string $bannerName) : void
    - public static [repositionSectionComments](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/repositionSectionComments.md)(string $configFile) : void
    - public static [sortHooks](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/sortHooks.md)(string $configFile) : void

}






Methods
==============

- [ConfigHelper::hasSectionComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/hasSectionComment.md) &ndash; Returns whether the given config file contains a [section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md) named $bannerName.
- [ConfigHelper::getBannerContent](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/getBannerContent.md) &ndash; Returns a [section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md) named $bannerName.
- [ConfigHelper::removeSectionComment](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/removeSectionComment.md) &ndash; Removes a banner from a config file.
- [ConfigHelper::repositionSectionComments](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/repositionSectionComments.md) &ndash; Reposition the [section comments](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md) found in the given config file, so that it implements [the Standard service configuration file](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#standard-service-configuration-file) convention.
- [ConfigHelper::sortHooks](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/ConfigHelper/sortHooks.md) &ndash; Sort the hooks alphabetically (asc) in the given config file, and reposition the section comments.





Location
=============
Ling\Light_DeveloperWizard\Helper\ConfigHelper<br>
See the source code of [Ling\Light_DeveloperWizard\Helper\ConfigHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Helper/ConfigHelper.php)



SeeAlso
==============
Previous class: [LightDeveloperWizardException](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Exception/LightDeveloperWizardException.md)<br>Next class: [CreateFileHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/CreateFileHelper.md)<br>

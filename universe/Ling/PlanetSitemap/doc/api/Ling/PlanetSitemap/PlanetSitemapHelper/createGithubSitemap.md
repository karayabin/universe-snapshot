[Back to the Ling/PlanetSitemap api](https://github.com/lingtalfi/PlanetSitemap/blob/master/doc/api/Ling/PlanetSitemap.md)<br>
[Back to the Ling\PlanetSitemap\PlanetSitemapHelper class](https://github.com/lingtalfi/PlanetSitemap/blob/master/doc/api/Ling/PlanetSitemap/PlanetSitemapHelper.md)


PlanetSitemapHelper::createGithubSitemap
================



PlanetSitemapHelper::createGithubSitemap — and returns whether the sitemap was created successfully.




Description
================


public static [PlanetSitemapHelper::createGithubSitemap](https://github.com/lingtalfi/PlanetSitemap/blob/master/doc/api/Ling/PlanetSitemap/PlanetSitemapHelper/createGithubSitemap.md)(string $planetDir, string $baseUrl) : bool




Creates a simple sitemap in txt format at the root of the given $planetDir,
and returns whether the sitemap was created successfully.

The created sitemap will have the name "sitemap.txt".
If the file already exists it will be replaced.


The method will proceed as follow:

- if the planetDir contains the doc/api directory, it assumes that a [DocTools](https://github.com/lingtalfi/DocTools) doc is available,
and will create an appropriate sitemap
- otherwise, it will parse all md files and create a sitemap entry for each of them




Parameters
================


- planetDir

    

- baseUrl

    The url of the github account.
Example: https://github.com/lingtalfi


Return values
================

Returns bool.








See Also
================

The [PlanetSitemapHelper](https://github.com/lingtalfi/PlanetSitemap/blob/master/doc/api/Ling/PlanetSitemap/PlanetSitemapHelper.md) class.




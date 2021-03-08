[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Util\CommitUtil class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/CommitUtil.md)


CommitUtil::regularLingCommit
================



CommitUtil::regularLingCommit — This methods emulates what I normally do when I manually commit a planet.




Description
================


public static [CommitUtil::regularLingCommit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/CommitUtil/regularLingCommit.md)(string $planetDir, string $commitMessage, ?string $appDir = null) : void




This methods emulates what I normally do when I manually commit a planet.

I tried to execute this from the browser, but the git command didn't push.
I believe it doesn't recognize my .gitconfig, since the browser is not me/

Anyway, calling this from a terminal on my local machine seems to work fine.




Parameters
================


- planetDir

    

- commitMessage

    

- appDir

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [CommitUtil::regularLingCommit](https://github.com/lingtalfi/LingTalfi/blob/master/Util/CommitUtil.php#L42-L63)


See Also
================

The [CommitUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/CommitUtil.md) class.

Previous method: [commitAllPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/CommitUtil/commitAllPlanets.md)<br>


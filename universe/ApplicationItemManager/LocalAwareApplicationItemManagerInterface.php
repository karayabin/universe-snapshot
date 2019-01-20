<?php


namespace ApplicationItemManager;


interface LocalAwareApplicationItemManagerInterface extends ApplicationItemManagerInterface
{

    public function setLocalRepo($localRepoPath);

    public function getLocalRepo();

    public function toDir();

    public function toLink();

    public function flash($asLink = true, $force = false);


    /**
     * Use the local repo to import planets using symlinks.
     * This method is much faster than a regular import,
     * as it just creates symlinks from the local machine
     * instead of fetching planets on the web.
     */
    public function zimport($item, $force = false);
}





















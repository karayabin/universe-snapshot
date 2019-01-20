<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\FixtureStorage;

use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;
use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;
use Komin\Component\Db\FixtureLoader\Fixture\Fixture;
use Komin\Component\Db\FixtureLoader\Fixture\FixtureInterface;
use Komin\Component\Db\FixtureLoader\FixtureStorage\Exception\FixtureStorageException;


/**
 * BabyYamlFixtureStorage
 * @author Lingtalfi
 * 2015-05-30
 *
 */
class BabyYamlFixtureStorage extends FileSystemFixtureStorage
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return FixtureInterface|false
     */
    protected function fileToFixture($file)
    {
        $conf = BabyYamlTool::parseFile($file);
        if (
            array_key_exists('target', $conf) &&
            array_key_exists('data', $conf) && is_array($conf['data'])
        ) {
            return Fixture::create()->setTarget($conf['target'])->setData($conf['data']);
        }
        return false;
    }


}

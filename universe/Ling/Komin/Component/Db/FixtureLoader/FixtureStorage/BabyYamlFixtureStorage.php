<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\Komin\Component\Db\FixtureLoader\FixtureStorage;

use Ling\BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use Ling\BeeFramework\Component\FileSystem\Finder\Finder;
use Ling\BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;
use Ling\Komin\Component\Db\FixtureLoader\Fixture\Fixture;
use Ling\Komin\Component\Db\FixtureLoader\Fixture\FixtureInterface;
use Ling\Komin\Component\Db\FixtureLoader\FixtureStorage\Exception\FixtureStorageException;


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

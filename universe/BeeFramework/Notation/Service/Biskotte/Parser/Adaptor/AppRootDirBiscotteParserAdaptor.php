<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\Parser\Adaptor;


/**
 * PsnBiscotteParserAdaptor
 * @author Lingtalfi
 * 2015-06-10
 *
 */
class AppRootDirBiscotteParserAdaptor extends BiscotteParserAdaptor
{


    private $appRootDir;

    public function __construct()
    {
        $this->appRootDir = '';
    }


    //------------------------------------------------------------------------------/
    // DEFINES BiscotteParserAdaptor
    //------------------------------------------------------------------------------/
    protected function getName()
    {
        return 'ard';
    }

    protected function getContent($content)
    {
        return str_replace('[root]', $this->appRootDir, $content);
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setAppRootDir($appRootDir)
    {
        $this->appRootDir = $appRootDir;
        return $this;
    }


}

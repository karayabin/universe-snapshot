<?php


namespace Ling\ApplicationItemManager\Program;


use Ling\ApplicationItemManager\ApplicationItemManager;
use Ling\ApplicationItemManager\ApplicationItemManagerInterface;
use Ling\ApplicationItemManager\Exception\ApplicationItemManagerException;
use Ling\ApplicationItemManager\LocalAwareApplicationItemManagerInterface;
use Ling\ApplicationItemManager\ProgramOutputAwareApplicationItemManagerInterface;
use Ling\Bat\FileSystemTool;
use Ling\CommandLineInput\CommandLineInputInterface;
use Ling\Dir2Symlink\ProgramOutputAwareDir2Symlink;
use Ling\DirectoryCleaner\DirectoryCleaner;
use Ling\Output\ProgramOutputInterface;
use Ling\Program\Program;
use Ling\Program\ProgramHelper;
use Ling\Program\ProgramInterface;

class LocalAwareApplicationItemManagerProgram extends ApplicationItemManagerProgram
{


    public function __construct()
    {
        parent::__construct();


        $itemType = $this->getItemType();

        $this
            ->addCommand("setlocalrepo", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {

                $path = $input->getParameter(2);
                $this->getLocalAwareManager($output)->setLocalRepo($path);
            })
            ->addCommand("getlocalrepo", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {
                $this->getLocalAwareManager($output)->getLocalRepo();
            })
            ->addCommand("todir", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {
                $this->getLocalAwareManager($output)->toDir();
            })
            ->addCommand("tolink", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {
                $this->getLocalAwareManager($output)->toLink();
            })
            ->addCommand("flash", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {
                $asLink = $input->getFlagValue("l");
                $force = $input->getFlagValue("f");
                $this->getLocalAwareManager($output)->flash($asLink, $force);

            })
            ->addCommand("zimport", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) use ($itemType) {
                $force = $input->getFlagValue('f');
                if (false !== ($itemName = ProgramHelper::getParameter(2, $itemType, $input, $output))) {
                    $this->getLocalAwareManager($output)->zimport($itemName, $force);
                }
            });


    }




    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * @return LocalAwareApplicationItemManagerInterface
     */
    private function getLocalAwareManager(ProgramOutputInterface $output)
    {
        if ($this->manager instanceof ProgramOutputAwareApplicationItemManagerInterface) {
            $this->manager->setOutput($output);
        }
        return $this->manager;
    }
}


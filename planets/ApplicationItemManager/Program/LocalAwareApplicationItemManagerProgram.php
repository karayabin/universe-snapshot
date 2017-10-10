<?php


namespace ApplicationItemManager\Program;


use ApplicationItemManager\ApplicationItemManager;
use ApplicationItemManager\ApplicationItemManagerInterface;
use ApplicationItemManager\Exception\ApplicationItemManagerException;
use ApplicationItemManager\LocalAwareApplicationItemManagerInterface;
use ApplicationItemManager\ProgramOutputAwareApplicationItemManagerInterface;
use Bat\FileSystemTool;
use CommandLineInput\CommandLineInputInterface;
use Dir2Symlink\ProgramOutputAwareDir2Symlink;
use DirectoryCleaner\DirectoryCleaner;
use Output\ProgramOutputInterface;
use Program\Program;
use Program\ProgramHelper;
use Program\ProgramInterface;

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


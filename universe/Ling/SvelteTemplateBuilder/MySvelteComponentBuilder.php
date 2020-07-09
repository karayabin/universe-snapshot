<?php


namespace Ling\SvelteTemplateBuilder;


use Ling\Bat\FileSystemTool;

/**
 * The MySvelteComponentBuilder class.
 * Executes the steps described in https://github.com/lingtalfi/my-svelte-component.
 * Except that it instead of cloning the files, it creates them from scratch.
 *
 *
 */
class MySvelteComponentBuilder
{

    /**
     * This directory containing our svelte component directory.
     * @var string
     */
    protected $baseDir;


    /**
     * This property holds the componentName for this instance.
     * @var string
     */
    protected $componentName;

    /**
     * This property holds the dirName for this instance.
     * @var string
     */
    protected $dirName;


    /**
     * Builds the MySvelteComponentBuilder instance.
     */
    public function __construct()
    {
        $this->baseDir = null;
        $this->componentName = null;
        $this->dirName = null;

    }

    /**
     * Sets the baseDir.
     *
     * @param string $baseDir
     */
    public function setBaseDir(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }

    /**
     * Sets the componentName (the ClassName if you will).
     *
     * @param string $componentName
     */
    public function setComponentName(string $componentName)
    {
        $this->componentName = $componentName;
    }

    /**
     * Sets the dirName.
     *
     * @param string $dirName
     */
    public function setDirName(string $dirName)
    {
        $this->dirName = $dirName;
    }


    /**
     * Creates the component directory.
     */
    public function build()
    {

        //--------------------------------------------
        // COPY THE DIR
        //--------------------------------------------
        $src = __DIR__ . "/assets/my-svelte-component";
        $target = $this->baseDir . "/" . $this->dirName;
        FileSystemTool::copyDir($src, $target);




        //--------------------------------------------
        // MAIN PART
        //--------------------------------------------
        /**
         * main.js
         */
        $sourceMain = __DIR__ . "/assets/my-svelte-component/src/main.js";
        $sourceMainContent = file_get_contents($sourceMain);
        $sourceMainContent = str_replace('MyComponent', $this->componentName, $sourceMainContent);
        $targetMain = $target . "/src/main.js";
        FileSystemTool::mkfile($targetMain, $sourceMainContent);


        /**
         * rename MyComponent file
         */
        $sourceComponent = $target . "/src/MyComponent.svelte";
        $targetComponent = $target . "/src/$this->componentName.svelte";
        FileSystemTool::move($sourceComponent, $targetComponent);


        /**
         * change reference in index.html
         */
        $sourceIndex = $target . "/index.html";
        $sourceIndexContent = file_get_contents($sourceIndex);
        $sourceIndexContent = str_replace('MyComponent', $this->componentName, $sourceIndexContent);
        FileSystemTool::mkfile($sourceIndex, $sourceIndexContent);


        //--------------------------------------------
        // TEST PART
        //--------------------------------------------
        $componentName = $this->componentName . "Test";
        /**
         * test.js
         */
        $sourceMain = __DIR__ . "/assets/my-svelte-component/src/test.js";
        $sourceMainContent = file_get_contents($sourceMain);
        $sourceMainContent = str_replace('MyComponentTest', $componentName, $sourceMainContent);
        $targetMain = $target . "/src/test.js";
        FileSystemTool::mkfile($targetMain, $sourceMainContent);


        /**
         * update & rename MyComponentTestFile
         */
        $sourceComponent = $target . "/src/MyComponentTest.svelte";
        $sourceComponentContent = file_get_contents($sourceComponent);
        $sourceComponentContent = str_replace("MyComponent",$this->componentName, $sourceComponentContent);
        $targetComponent = $target . "/src/$componentName.svelte";
        FileSystemTool::mkfile($targetComponent, $sourceComponentContent);
        unlink($sourceComponent);



        /**
         * change reference in index-test.html
         */
        $sourceIndex = $target . "/index-test.html";
        $sourceIndexContent = file_get_contents($sourceIndex);
        $sourceIndexContent = str_replace('MyComponentTest', $componentName, $sourceIndexContent);
        FileSystemTool::mkfile($sourceIndex, $sourceIndexContent);




    }

}
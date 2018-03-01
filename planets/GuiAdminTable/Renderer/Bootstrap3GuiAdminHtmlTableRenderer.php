<?php


namespace GuiAdminTable\Renderer;


class Bootstrap3GuiAdminHtmlTableRenderer extends GuiAdminHtmlTableRenderer
{
    /**
     * @var array of colName => widthString,
     *              with widthString one of the bootstrap class
     *              (for instance col-md-1, ...)
     */
    private $colWidths;

    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttributes("table", [
            'class' => 'datatable dataTable table table-striped table-bordered table-hover',
        ]);
        $this->addHtmlAttributes("trSearch", [
            'class' => 'filter-bar',
        ]);
        $this->colWidths = [];
    }

    public function setColWidths(array $colWidths)
    {
        $this->colWidths = $colWidths;
        return $this;
    }

    public function setColWidth($colName, $colWidth)
    {
        $this->colWidths[$colName] = $colWidth;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getHeaderColClasses($col)
    {
        $classes = parent::getHeaderColClasses($col);
        if (array_key_exists($col, $this->colWidths)) {
            $classes[] = $this->colWidths[$col];
        }
        return $classes;
    }

}
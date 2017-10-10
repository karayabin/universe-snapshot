<?php


namespace Kamille\Architecture\Response\Web;



/**
 * This gscp response comes with modal capabilities.
 *
 * Gui Simple Communication Protocol.
 *
 * For modals, by default it uses the ModalContent widget (https://github.com/KamilleWidgets/ModalContent)
 * if found.
 *
 */
class GscpResponse extends HttpResponse
{

    private $type;

    public static function make($data, $type = "success")
    {
        $o = parent::create($data, 200);
        $o->type = $type;
        return $o;
    }

    protected function sendContent()
    {
        echo json_encode([
            'type' => $this->type,
            'data' => $this->content,
        ]);
    }


}
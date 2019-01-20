<?php


namespace SokoForm\Control;

use Bat\HashTool;
use Bat\StringTool;

/**
 * See SafeUploader planet for more info.
 * https://github.com/lingtalfi/SafeUploader
 *
 */
class SokoSafeUploadControl extends SokoFileControl
{

    protected $profileId;
    protected $ric;
    protected $ricPool;
    protected $extraPayloadVars;

    public function __construct()
    {
        parent::__construct();
        $this->type = 'safe-upload';
        $this->ric = [];
        $this->extraPayloadVars = [];
        $this->ricPool = $_GET;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
        return $this;
    }

    public function setRic(array $ric)
    {
        $this->ric = $ric;
        return $this;
    }

    public function setPayloadVar($k, $v)
    {
        $this->extraPayloadVars[$k] = $v;
        return $this;
    }


    protected function getSpecificModel() // override me
    {
        $ric2Values = [];
        $ricComplete = true;
        foreach ($this->ric as $col) {
            if (array_key_exists($col, $this->ricPool)) {
                $ric2Values[$col] = $this->ricPool[$col];
            } else {
                $ricComplete = false;
                break;
            }
        }


        // creating the payload
        $isTmp = false;
        if (true === $ricComplete) { // update
            $sRic = implode('-', $ric2Values);
        } else { // insert
            $sRic = date("Y-m-d--H-i-s") . '---' . HashTool::getRandomHash64();
            $isTmp = true;
        }
        $payload = [
            'ric' => $sRic,
            'isTmp' => $isTmp,
        ];

        $payload = array_merge($payload, $this->extraPayloadVars);

        return array_replace(parent::getSpecificModel(), [
            "profileId" => $this->profileId,
            "payload" => $payload,
        ]);
    }


}
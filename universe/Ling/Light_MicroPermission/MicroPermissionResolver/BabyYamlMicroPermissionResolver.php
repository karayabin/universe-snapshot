<?php


namespace Ling\Light_MicroPermission\MicroPermissionResolver;


use Ling\BabyYaml\BabyYamlUtil;

/**
 * The BabyYamlMicroPermissionResolver class.
 */
class BabyYamlMicroPermissionResolver implements LightMicroPermissionResolverInterface
{

    /**
     * This property holds the file for this instance.
     * @var string
     */
    protected $file;

    /**
     * This property holds the conf cache for this instance.
     * @var array=null
     */
    protected $conf;

    /**
     * Builds the BabyYamlMicroPermissionResolver instance.
     */
    public function __construct()
    {
        $this->file = null;
        $this->conf = null;
    }


    /**
     * @implementation
     */
    public function resolve(string $microPermission)
    {
        if (null === $this->conf) {
            $this->conf = BabyYamlUtil::readFile($this->file);
        }
        if (array_key_exists($microPermission, $this->conf['micro_permissions'])) {
            return $this->conf['micro_permissions'][$microPermission];
        }
        return false;
    }

    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }


}
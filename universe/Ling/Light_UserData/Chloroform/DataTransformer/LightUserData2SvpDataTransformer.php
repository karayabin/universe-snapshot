<?php


namespace Ling\Light_UserData\Chloroform\DataTransformer;


use Ling\Chloroform\DataTransformer\BaseDataTransformer;
use Ling\Chloroform\Field\FieldInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserData\Service\LightUserDataService;

/**
 * The LightUserData2SvpDataTransformer class.
 *
 *
 * This implements the second step of the @page(2svp system).
 *
 * Basically, this class assumes that the data to transform is a filename containing the .2svp extension.
 *
 * It will move (i.e. rename) the file to the same filename without the .2svp extension.
 * It will also update the new filename in the luda_resource table in the database.
 *
 *
 *
 *
 *
 */
class LightUserData2SvpDataTransformer extends BaseDataTransformer
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUserData2SvpDataTransformer instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function transform(&$value, array $postedData, FieldInterface $field): void
    {


        /**
         * Assuming the value has the following form:
         *
         * /user-data?file=images/avatar.2svp.png&id=$2y$10$MLxVef2wksJhoQP/HSaT8u/CQVmMbz9YHPYN.rRkHw.OFJ6aJHBD6&t=1571821652
         *
         *
         */
        $p = explode('?', $value, 2);
        $base = array_shift($p);
        $query = array_shift($p);
        $result = [];
        parse_str($query, $result);
        if (
            array_key_exists('file', $result) &&
            array_key_exists('id', $result)
        ) {
            $file = $result['file'];
            /**
             * Note: never trust the user, the result.id could be faked easily, so we rely on the current user in session.
             * In this case it should work because we assume the user is posting the form and wants to upload her own file.
             * Reminder: if you need to double check the user identity, remember that the Light_UserData plugin has
             * added the obfuscated name of the user in the lud_user table, which should be accessible via the session (i.e. no extra db call).
             *
             */

            /**
             * @var $userDataService LightUserDataService
             */
            $userDataService = $this->container->get('user_data');
            $newValue = $userDataService->update2SvpResource($file);
            $value = $base . '?file=' . $newValue . '&id=' . $result['id'];

        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return $this
     */
    public function setContainer(LightServiceContainerInterface $container): LightUserData2SvpDataTransformer
    {
        $this->container = $container;
        return $this;
    }
}
<?php


namespace Ling\Light_Kit_Admin\Rights;


/**
 * The LightKitAdminRightsManager class.
 *
 *
 *
 * UPDATE 2019-08-08
 * -------------
 * NOTE: this might be deprecated.
 * I now believe an external plugin manager plugin should be created, and this plugin will let you install a plugin
 * from the gui, and the plugin would handle a method call setup, which is called only once, which basically
 * would add the plugin rights once.
 * I believe the problem with the class below is that it doesn't have the notion of how many times the rights
 * were added.
 *
 *
 *
 *
 * This service allows other plugins to register their rights,
 * and to decide how to assign them to a newly created user.
 *
 * Note: the light kit admin gui has an user form, where a (light kit) root user
 * can assign any rights to any user. Note2: only the root user can do that.
 * A regular can see her rights, but not change them.
 *
 *
 */
class LightKitAdminRightsManager
{


    /**
     * This property holds the rights for this instance.
     * The rights used by the light kit admin service and related plugins.
     * See the @page(user rights page) for more info.
     *
     * Each item of the array is an array of rights.
     *
     * @var array
     */
    protected $rights;

    /**
     * This property holds the rightsAssigners for this instance.
     * Each rightsAssigner is either an array of rights, or a callable (taking the @object(Light_User) as
     * argument) and returning an array of rights.
     * Those represents the rights to assign to a newly created user.
     *
     * @var array
     */
    protected $rightsAssigners;


    /**
     * Builds the LightKitAdminRightsManager instance.
     */
    public function __construct()
    {
        $this->rights = [];
        $this->rightsAssigners = [];
    }


    /**
     * Adds the rights to the light kit admin system.
     * Usually, a plugin will use this method to register all the available
     * rights (all the rights provided by the plugin).
     *
     *
     * @param array $rights
     */
    public function registerRights(array $rights)
    {
        $this->rights[] = $rights;
    }


    /**
     * Defines which rights to assign to an user when she is created.
     *
     * The assigner parameter has multiple forms:
     *
     * - array: the list of rights to add to the user.
     *          For instance, if your plugin is named MyPlugin, you could use an array like this:
     *          - MyPlugin.*
     *          or
     *          - MyPlugin.postArticle
     *          - MyPlugin.editArticle
     *          - MyPlugin.deleteArticle
     *
     *          See my @page(rights conception page) (the Light_User conception page) for more details about the rights notation.
     *
     * - callable: a callable returning the aforementioned array.
     *          The callable receives the Light_User instance as its parameter.
     *
     *
     * Note: you need to use the callable form only when you want to assign different rights, depending on the user.
     * In other cases, the array form should be sufficient.
     *
     *
     *
     *
     * @param array|callable $assigner
     */
    public function registerRightsAssigner($assigner)
    {
        $this->rightsAssigners[] = $assigner;
    }


    //--------------------------------------------
    // GETTERS
    //--------------------------------------------
    /**
     * Returns the rights of this instance.
     *
     * @return array
     */
    public function getRights(): array
    {
        return $this->rights;
    }

    /**
     * Returns the rightsAssigners of this instance.
     *
     * @return array
     */
    public function getRightsAssigners(): array
    {
        return $this->rightsAssigners;
    }


}
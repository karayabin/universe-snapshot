Ling Breeze Generator config
=================
2019-09-13 -> 2019-10-30


Config example
-------------

```yaml
breeze_generator:
    instance: Ling\Light_BreezeGenerator\Service\LightBreezeGeneratorService
    methods:
        setContainer:
            container: @container()
        setConf:
            conf:
                ling:
                    class: Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator
                    conf:
                        dir: ${app_dir}/tmp/Light_BreezeGenerator
                        # prefix is always separated from the table by one underscore
                        prefix: lud
                        factoryClassName: LightKitAdmin
                        namespace: Ling\Test\$prefix
                        # The suffix to add to the class name.
                        # For instance if the class is User and the suffix is Object,
                        # The class name will be UserObject
                        # The default value is Object
                        classSuffix: Object
                        # Whether to overwrite existing files (if false, skip them)
                        # Used mainly for debugging purposes, in production you probably should set this to false
                        # The default value is false
                        overwriteExisting: true
                        # The custom prefix (see the "adding custom methods" section for more details)
                        customPrefix: Custom
                    
                        # Whether to use the micro-permission checking.
                        # The default setting is false.
                        useMicroPermission: false

                        # The name of the plugin handling the micro-permission (if useMicroPermission is true)
                        microPermissionPluginName: Light_Kit_Admin
                        
                        # Describes which tables to generate the items from
                        generate:
                            prefix: lud

```



In a nutshell
----------

This generator generates some objects based on a table selection.
So the first step is to select the tables you want to generate the objects for.
Then generate the objects.


The generated objects are:

- an XXXObject (one per table)
- an XXXObjectInterface (one per table)
- an YYYObjectFactory (only one)



The configuration
------------

### Dir

The directory where all classes will be generated.


### Prefix

The prefix to strip from the table name, in order to compute the class name (the class name is guessed
from the table name).


### factoryClassName

The first part of the generated factory class name.
The complete factory class name is computed like this:

- $factoryClassName . $classSuffix . "Factory"


### namespace

The namespace to add at the top of the generated classes.


### classSuffix

By default, the generated XXXObjects class name is computed like this:

- $className . $classSuffix

$className is derived from the table name, and $classSuffix defaults to "Object" (but you can change it if you want).

If you change it, it will affect the name of all generated objects (XXXObject, XXXObjectInterface and YYYObjectFactory).

For instance if you set it to Item, the generated objects will be XXXItem, XXXItemInterface and YYYItemFactory.


### overwriteExisting

Whether to overwrite an existing file.

The default value is false.

If true, the generated objects will overwrite previously the generated objects (based on the configuration).


### useMicroPermission


Whether to use the micro-permission checking.
The default value is false.

This system uses the [micro-permission recommended notation for database](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction).





### generate

Array.

Defines the tables selection.

Two options are possible:

- prefix: string, use this to specify the prefix of the tables you want to select
- tables: array, specify the tables that you want manually


Note: the prefix is always separated from the rest of the table name by an underscore.
In other words, if your prefix is lud, then the **generate** option will select all the tables which name starts
with "lud_" (for instance lud_user, lud_permission, ...).




Example of generated code
===========

With the configuration above, and the following trigger line:

```php
az($container->get("breeze_generator")->generate("ling"));
```

The ling generator will produces one file per table.
Including:

- UserObject.php
- UserObjectInterface.php
- LightKitAdminObjectFactory.php



Content of generated UserObject.php
-------------

```php
<?php


namespace Ling\Test\Lud;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The UserObject class.
 */
class UserObject implements UserObjectInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the UserObject instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }




    /**
     * @implementation
     */
    public function insertUser(array $user, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_user", $user);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,
            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getUserById(int $id, bool $throwEx = true)
    {
        $ret = false;
        try {

            $ret = $this->pdoWrapper->fetch("select * from `lud_user` where id=:id", [
                "id" => $id,

            ]);
        } catch (\Exception $e) {
            if (true === $throwEx) {
                throw $e;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function updateUserById(int $id, array $user)
    {
        $this->pdoWrapper->update("lud_user", $user, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserById(int $id)
    {
        $this->pdoWrapper->delete("lud_user", [
            "id" => $id,

        ]);
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }
}

```




Content of generated UserObjectInterface.php
-------------

```php
<?php


namespace Ling\Test\Lud;


/**
 * The UserObjectInterface interface.
 */
interface UserObjectInterface
{

    /**
     * Returns the user row identified by the given id.
     *
     * If the row is not found, this method's return depends on the throwEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns false
     *
     *
     * @param int $id
     * @param bool $throwEx
     * @return mixed
     * @throws \Exception
     */
    public function getUserById(int $id, bool $throwEx = true);

    /**
     * Updates the user row identified by the given id.
     *
     * @param int $id
     * @param array $user
     * @return void
     * @throws \Exception
     */
    public function updateUserById(int $id, array $user);

    /**
     * Inserts the given user in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the method will return false
     * - if false, the error will not be caught
     *
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     *
     * @param array $user
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUser(array $user, bool $ignoreDuplicate = true, bool $returnRic = false);


    /**
     * Deletes the user identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteUserById(int $id);
}

```


Content of generated LightKitAdminObjectFactory.php
-------------


```php
<?php


namespace Ling\Test\Lud;


use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The LightKitAdminObjectFactory class.
 */
class LightKitAdminObjectFactory
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the LightKitAdminObjectFactory instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }


    /**
     * Returns a PermissionObjectInterface.
     *
     * @return PermissionObjectInterface
     */
    public function getPermissionObject(): PermissionObjectInterface
    {
        $o = new PermissionObject();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a PermissionGroupObjectInterface.
     *
     * @return PermissionGroupObjectInterface
     */
    public function getPermissionGroupObject(): PermissionGroupObjectInterface
    {
        $o = new PermissionGroupObject();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a PermissionGroupHasPermissionObjectInterface.
     *
     * @return PermissionGroupHasPermissionObjectInterface
     */
    public function getPermissionGroupHasPermissionObject(): PermissionGroupHasPermissionObjectInterface
    {
        $o = new PermissionGroupHasPermissionObject();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a UserObjectInterface.
     *
     * @return UserObjectInterface
     */
    public function getUserObject(): UserObjectInterface
    {
        $o = new UserObject();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }

    /**
     * Returns a UserHasPermissionGroupObjectInterface.
     *
     * @return UserHasPermissionGroupObjectInterface
     */
    public function getUserHasPermissionGroupObject(): UserHasPermissionGroupObjectInterface
    {
        $o = new UserHasPermissionGroupObject();
        $o->setPdoWrapper($this->pdoWrapper);
        return $o;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }


}


```

 
 
Adding custom methods
---------------------
2019-10-17


The generated code is a good start, but pretty soon a developer will want to add new methods.

At a semantic/organizational level, it makes sense that these developer "custom" methods are added to the api.

However, if we add them directly to the generated code, a problem occurs: what if we inadvertently make the 
generator overwrite the class? Well then we loose the custom code as well, that's not an option.

And so therefore let me introduce the concept of **Custom** methods.

The main idea is that the developer can add methods to the class, but without the risk to have his code overwritten.

For that, we choose a **custom** prefix, which defaults to "Custom", and can be changed from the configuration (customPrefix key).

Then in terms of organization we create a "Custom" (or whatever prefix you chose) directory where the class to are generated,
and inside this Custom directory we create our custom classes, which extend the class that we want to add methods to,
and which name is the custom prefix followed by the extended class name.


So for instance, let's say that we have the following generated structure:

```text
- app/universe/My/Path/Api/
----- DirectoryMapApi.php
----- DirectoryMapApiInterface.php
----- GeneratedApiFactory.php
```

To extend the DirectoryMapApi class, we transform the above structure into this:

```text
- app/universe/My/Path/Api/
----- DirectoryMapApi.php
----- DirectoryMapApiInterface.php
----- GeneratedApiFactory.php
----- Custom/
--------- CustomDirectoryMapApi.php
```

The generator will never overwrite whatever is in the "Custom" directory.

As a bonus, the generated factory will detect the custom classes and provide them if they exist.




 






  
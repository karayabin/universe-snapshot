<?php


namespace Ling\Light_UserDatabase\Bullsheet;


use Ling\Bat\FileSystemTool;
use Ling\Bat\RandomTool;
use Ling\Light_Bullsheet\Bullsheeter\LightAbstractBullsheeter;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_PasswordProtector\Service\LightPasswordProtector;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;
use Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface;
use Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase;
use Ling\TinyBullsheeter\TinyBullsheeterTool;


/**
 * The LightWebsiteUserDatabaseBullsheeter class.
 */
class LightWebsiteUserDatabaseBullsheeter extends LightAbstractBullsheeter
{

    /**
     * This property holds the path to the avatar image dir.
     * This image should be located under the web root of the application (the www directory of the app).
     *
     * @var string
     */
    protected $avatarImgDir;

    /**
     * This property holds the applicationDir for this instance.
     * @var string
     */
    protected $applicationDir;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->avatarImgDir = null;
        $this->applicationDir = null;
    }


    /**
     * @implementation
     */
    public function generateRows(int $nbRows)
    {
        if ($nbRows > 0) {

            /**
             * @var $db LightDatabasePdoWrapper
             */
            $db = $this->container->get("database");
            $userdb = $this->container->get("user_database");

            if ($userdb instanceof MysqlLightWebsiteUserDatabase) {

                $table = $userdb->getTable();

                $pass = "pass";
                if ($this->container->has("password_protector")) {
                    /**
                     * @var $passProtector LightPasswordProtector
                     */
                    $passProtector = $this->container->get("password_protector");
                    $pass = $passProtector->passwordHash($pass);
                }


                for ($i = 1; $i <= $nbRows; $i++) {

                    $sExtra = serialize([]);


                    $avatarUrl = RandomTool::pickRandomFile($this->avatarImgDir);
                    $relativeAvatarUrl = FileSystemTool::getRelativePath($avatarUrl, $this->applicationDir . "/www");
                    if (false === $relativeAvatarUrl) {
                        throw new LightUserDatabaseException("The avatar_url ($avatarUrl) must be inside the application directory ($this->applicationDir).");
                    }
                    $relativeAvatarUrl = '/' . $relativeAvatarUrl;


                    $identifier = TinyBullsheeterTool::getRandomPseudo();
                    $db->insert($table, [
                        "identifier" => $identifier,
                        "pseudo" => $identifier,
                        "password" => $pass,
                        "avatar_url" => $relativeAvatarUrl,
                        "extra" => $sExtra,
                    ]);
                }


            } else {
                throw new LightUserDatabaseException("Invalid user_database instance. A MysqlLightWebsiteUserDatabase instance is expected.");
            }
        }
    }

    /**
     * Sets the avatarImgDir.
     *
     * @param string $avatarImgDir
     */
    public function setAvatarImgDir(string $avatarImgDir)
    {
        $this->avatarImgDir = $avatarImgDir;
    }

    /**
     * Sets the applicationDir.
     *
     * @param string $applicationDir
     */
    public function setApplicationDir(string $applicationDir)
    {
        $this->applicationDir = $applicationDir;
    }
}
<?php


namespace Ling\Light_UserDatabase\Service;


use Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase;

/**
 * The LightUserDatabaseService class.
 *
 * Note: we extend the mysql version and not the babyYaml version which was just
 * used only by me when starting up this project.
 *
 */
class LightUserDatabaseService extends MysqlLightWebsiteUserDatabase
{

}
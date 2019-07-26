<?php


namespace Ling\Light_Database;

use Ling\Light_Database\Exception\LightDatabaseException;
use Ling\SimplePdoWrapper\SimplePdoWrapper;

/**
 * The LightDatabasePdoWrapper class.
 */
class LightDatabasePdoWrapper extends SimplePdoWrapper
{

    /**
     * This property holds the pdoException thrown during the connection,
     * or null if such exception was not thrown.
     *
     * @var \PDOException|null
     */
    protected $pdoException;


    /**
     * Builds the LightDatabasePdoWrapper instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pdoException = null;
    }


    /**
     * Creates the pdo instance and attaches it to this instance.
     * The settings array expects the following keys:
     *
     * - ?pdo_driver: the pdo driver to use (i.e. mysql, sqlite, ...). The default is mysql.
     *      See the pdo documentation for more details.
     * - pdo_database: the name of the (main) database.
     * - pdo_user: the name of the database user.
     * - pdo_pass: the password for the database user.
     * - ?pdo_host: the host of the pdo dsn if any. For instance: localhost, or 127.0.0.1.
     *          By default the value will be localhost.
     * - ?pdo_socket: the path to socket to use (this replaces the pdo_host setting).
     * - ?pdo_port: the number of the port to connect to.
     * - ?pdo_options: an array of options to pass to the pdo instance.
     *      Available options are the based on the php pdo options.
     *      The currently implemented options are the following:
     *      - persistent: bool
     *      - errmode: string (warning|exception|silent)
     *      - initCommand: string, example: SET NAMES 'UTF8'   (the initCommand option is specific to the mysql driver)
     *
     *
     *
     * Note: as for now, only the driver invocation technique is used to create the DSN (i.e. the
     * uri invocation and aliasing technique are not yet implemented).
     *
     *
     * If the pdo connection fails, a LightDatabaseException exception is thrown,
     * which doesn't reveal the pdo credentials, for security reason.
     * Note: if you want to get the error message of the original exception, you can access it using the
     * getConnectionException method.
     *
     *
     *
     * @param array $settings
     * @throws LightDatabaseException
     *
     */
    public function init(array $settings)
    {

        $driver = $settings['pdo_driver']??'mysql';

        //--------------------------------------------
        // DSN
        //--------------------------------------------
        $dsn = $driver . ":dbname=" . $settings['pdo_database'];
        if (array_key_exists('pdo_socket', $settings)) {
            $dsn .= ';unix_socket=' . $settings['pdo_socket'];
        } else {
            $host = $settings['pdo_host'] ?? "localhost";
            $dsn .= ';host=' . $host;
        }
        if (array_key_exists('pdo_port', $settings)) {
            $dsn .= ';port=' . $settings['pdo_port'];
        }


        //--------------------------------------------
        // CONNEXION
        //--------------------------------------------
        $options = [];
        if (array_key_exists("pdo_options", $settings)) {
            foreach ($settings['pdo_options'] as $k => $v) {
                switch ($k) {
                    case "errmode":
                        if ('warning' === $v) {
                            $v = \PDO::ERRMODE_WARNING;
                        } elseif ('exception' === $v) {
                            $v = \PDO::ERRMODE_EXCEPTION;
                        } elseif ('silent' === $v) {
                            $v = \PDO::ERRMODE_SILENT;
                        } else {
                            throw new LightDatabaseException("Unknown errmode: $v (possible values are warning, exception or silent.");
                        }
                        $options[\PDO::ATTR_ERRMODE] = $v;
                        break;
                    case "initCommand":
                        $options[\PDO::MYSQL_ATTR_INIT_COMMAND] = $v;
                        break;
                    case "persistent":
                        $options[\PDO::ATTR_PERSISTENT] = $v;
                        break;
                }
            }
        }


        try {
            $pdo = new \PDO($dsn, $settings['pdo_user'], $settings['pdo_pass'], $options);
            $this->setConnexion($pdo);
        } catch (\PDOException $e) {
            $this->pdoException = $e;
            throw new LightDatabaseException("A problem occurred while trying to connect to the database.");
        }
    }


    /**
     * Returns the error message of the original exception thrown if the pdo connection failed during call to the
     * init method.
     * Or an empty string by default, or if the connexion went ok.
     *
     * @return \PDOException|null
     */
    public function getConnectionException(): ?\PDOException
    {
        return $this->pdoException;
    }
}
<?php


namespace Ling\Light_PasswordProtector\Service;


use Ling\Bat\HashTool;

/**
 * The LightPasswordProtector class.
 *
 *
 * This service basically memorizes a hash algorithm and its options, so that you can use it consistently across your whole application.
 *
 * It uses the php technique based on the password_hash and password_verify methods.
 * For more information please refer to the php documentation:
 *
 * - @page(https://www.php.net/manual/en/function.password-hash.php)
 * - @page(https://www.php.net/manual/en/function.password-verify.php)
 *
 *
 * Note: it is recommended to store the password with 255 chars.
 * Note 2 : I recommend not to use the default algorithm, since this might change over time.
 *
 *
 *
 *
 * The available algorithms and options are the following (last update 2019-08-07):
 *
 *
 * - default
 *      options: the options of the concrete algorithm used.
 *
 * - bcrypt
 *      - options:
 *          - cost: int=10, the algorithmic cost that should be used.
 *
 * - argon2i (php7.2+)
 *      - options:
 *          - memory_cost: int=PASSWORD_ARGON2_DEFAULT_MEMORY_COST (the php constant), the maximum memory in bytes that may be used to compute the hash
 *          - time_cost: int=PASSWORD_ARGON2_DEFAULT_TIME_COST (the php constant), the maximum amount of time it may take to compute the hash
 *          - threads: int=PASSWORD_ARGON2_DEFAULT_THREADS (the php constant), the number of threads to use for computing the hash
 *
 *
 *
 * - argon2id (php7.3+)
 *      - options: same as argon2i
 *
 *
 *
 *
 */
class LightPasswordProtector
{

    /**
     * This property holds the algorithmName for this instance.
     * @var string = bcrypt
     */
    protected $algorithmName;


    /**
     * This property holds the algorithmOptions for this instance.
     * See the class description for the available options, depending on the chosen algorithm.
     * @var array
     */
    protected $algorithmOptions;


    /**
     * Builds the LightPasswordProtector instance.
     */
    public function __construct()
    {
        $this->algorithmName = "bcrypt";
        $this->algorithmOptions = [];
    }


    /**
     * Creates a password hash and returns it.
     *
     *
     * @param string $password
     * @return string
     * @throws \Exception
     */
    public function passwordHash(string $password): string
    {
        return password_hash($password, HashTool::getPasswordHashAlgorithm($this->algorithmName), $this->algorithmOptions);
    }


    /**
     * Verifies that the given password matches a hash.
     *
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function passwordVerify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the algorithmName.
     *
     * @param string $algorithmName
     */
    public function setAlgorithmName(string $algorithmName)
    {
        $this->algorithmName = $algorithmName;
    }

    /**
     * Sets the algorithmOptions.
     *
     * @param array $algorithmOptions
     */
    public function setAlgorithmOptions(array $algorithmOptions)
    {
        $this->algorithmOptions = $algorithmOptions;
    }


}
<?php


namespace Ling\Light_MiniTrustChallenger\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MiniTrustChallenger\Exception\LightMiniTrustChallengerException;


/**
 * The LightMiniTrustChallengerService class.
 */
class LightMiniTrustChallengerService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     *
     */
    /**
     * This property holds the options for this instance.
     *
     * @var array
     */
    protected array $contexts;

    /**
     * This property holds the defaultAlgo for this instance.
     * @var string
     */
    private string $defaultAlgo;

    /**
     * This property holds the maxTime in seconds for this instance.
     * @var int
     */
    private int $defaultMaxTime;


    /**
     * Builds the LightMiniTrustChallengerService instance.
     */
    public function __construct()
    {
        $this->contexts = [];
        $this->defaultAlgo = "md5";
        $this->defaultMaxTime = 5;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Returns a challenge string.
     * This should be executed by the client.
     *
     * See the @page(Light_MiniTrustChallenger conception notes) for more details.
     *
     * @param string $context
     * @return string
     * @throws \Exception
     */
    public function getChallengeString(string $context): string
    {
        if (true === array_key_exists($context, $this->contexts)) {
            $contextItem = $this->contexts[$context];
            if (true === array_key_exists("code", $contextItem)) {
                $secretCode = $contextItem['code'];
                $timestamp = time();
                $algo = $contextItem['algo'] ?? $this->defaultAlgo;
                $encryptedChallenge = $this->encode($algo, $timestamp . "-" . $secretCode);
                return "$timestamp-$context-$encryptedChallenge";
            } else {
                $this->error("Code entry not found in context: $context.");
            }
        }
        $this->error("Undefined context: $context.");
    }


    /**
     * Checks that the given challenge string is valid, and returns the result.
     *
     * If the challenge is not valid, the reason is available via the clientErrorReason parameter.
     *
     *
     * @param string $context
     * @param string $challengeString
     * @param string $clientErrorReason
     * @return bool
     * @throws \Exception
     */
    public function checkChallengeString(string $context, string $challengeString, string &$clientErrorReason): bool
    {
        if (true === array_key_exists($context, $this->contexts)) {
            $contextItem = $this->contexts[$context];
            if (true === array_key_exists("code", $contextItem)) {
                $secretCode = $contextItem['code'];

                $p = explode("-", $challengeString, 3);
                if (3 === count($p)) {
                    list($clientTimestamp, $clientContext, $clientEncryptedChallenge) = $p;
                    $clientTimestamp = (int)$clientTimestamp;
                    $maxTime = $contextItem['max_time'] ?? $this->defaultMaxTime;
                    $maxTime = (int)$maxTime;

                    $timestamp = time();
                    if ($timestamp < ($clientTimestamp + $maxTime)) {
                        $algo = $contextItem['algo'] ?? $this->defaultAlgo;
                        $encryptedChallenge = $this->encode($algo, $clientTimestamp . "-" . $secretCode);
                        if ($clientEncryptedChallenge === $encryptedChallenge) {
                            return true;
                        } else {
                            $clientErrorReason = "Encrypted challenge failed.";
                        }
                    } else {
                        $clientErrorReason = "Timestamp is too old.";
                    }

                } else {
                    $clientErrorReason = "Invalid context: $context.";
                }
            } else {
                $this->error("Code entry not found in context: $context."); // server error
            }
        } else {
            $this->error("Undefined context: $context."); // server error
        }
        return false;
    }


    /**
     * Sets the contexts.
     *
     * @param array $contexts
     */
    public function setContexts(array $contexts)
    {
        $this->contexts = $contexts;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightMiniTrustChallengerException($msg);
    }

    /**
     * Encodes the given string using the given algo identifier.
     *
     * @param string $algo
     * @param string $string
     * @return string
     * @throws \Exception
     */
    private function encode(string $algo, string $string): string
    {
        switch ($algo) {
            case "md5":
                return md5($string);
                break;
            default:
                $this->error("Unknown algorithm: $algo.");
                break;
        }
    }
}
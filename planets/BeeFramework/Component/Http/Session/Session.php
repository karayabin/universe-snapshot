<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\Session;
use BeeFramework\Bat\BdotTool;


/**
 * Session.
 *
 * @author Lingtalfi
 *
 *
 */
class Session implements SessionInterface
{

    // 2014-01-04
    // http://www.php.net/manual/en/session.configuration.php (only PHP_INI_ALL type)
    private static $runtimeOptions = array(
        'save_path',
        'name',
        'save_handler',
        'gc_probability',
        'gc_divisor',
        'gc_maxlifetime',
        'serialize_handler',
        'cookie_lifetime',
        'cookie_path',
        'cookie_domain',
        'cookie_secure',
        'cookie_httponly',
        'use_strict_mode',
        'use_cookies',
        'use_only_cookies',
        'referer_check',
        'entropy_file',
        'entropy_length',
        'cache_limiter',
        'cache_expire',
        'use_trans_sid',
        'bug_compat_42',
        'bug_compat_warn',
        'hash_function',
        'hash_bits_per_character',
        'url_rewriter.tags',
    );


    public function __construct(array $config = [])
    {
        $this->setConfig($config);
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS SessionInterface
    //------------------------------------------------------------------------------/
    public function setConfigValue($key, $value)
    {
        if (in_array($key, self::$runtimeOptions)) {
            if ($key !== 'url_rewriter.tags') {
                $key = 'session.' . $key;
            }
            ini_set($key, (string)$value);
        }
        else {
            trigger_error(sprintf("Invalid option: %s", $key), E_USER_WARNING);
        }
    }

    public function getConfigValue($key)
    {
        if (in_array($key, self::$runtimeOptions)) {
            return ini_get($key);
        }
        else {
            trigger_error(sprintf("Invalid option: %s", $key), E_USER_WARNING);
        }
    }

    public function setConfig(array $config)
    {
        foreach ($config as $k => $v) {
            $this->setConfigValue($k, $v);
        }
    }

    public function get($key, $default = null)
    {
        return BdotTool::getDotValue($key, $_SESSION, $default);
    }

    public function set($key, $value)
    {
        BdotTool::setDotValue($key, $value, $_SESSION);
    }

    public function unsetValue($key)
    {
        BdotTool::unsetDotValue($key, $_SESSION);
    }

    public function has($key)
    {
        return BdotTool::hasDotValue($key, $_SESSION);
    }

    public function all()
    {
        return $_SESSION;
    }

    public function cacheExpire($newCacheExpire = null)
    {
        if (null !== $newCacheExpire) {
            return session_cache_expire($newCacheExpire);
        }
        return session_cache_expire();
    }

    public function cacheLimiter($cacheLimiter = null)
    {
        if (null !== $cacheLimiter) {
            return session_cache_limiter($cacheLimiter);
        }
        return session_cache_limiter();
    }

    public function commit()
    {
        $this->writeClose();
    }

    public function decode($data)
    {
        return session_decode($data);
    }

    public function destroy()
    {
        return session_destroy();
    }

    public function encode()
    {
        return session_encode();
    }

    public function getCookieParams()
    {
        return session_get_cookie_params();
    }

    public function sessionId($id = null)
    {
        if (null !== $id) {
            return session_id($id);
        }
        return session_id();
    }


    public function moduleName($module = null)
    {
        if (null !== $module) {
            return session_module_name($module);
        }
        return session_module_name();
    }

    public function name($name = null)
    {
        if (null !== $name) {
            return session_name($name);
        }
        return session_name();
    }

    public function regenerateId($deleteOldSession = false)
    {
        return session_regenerate_id($deleteOldSession);
    }

    public function registerShutdown()
    {
        session_register_shutdown();
    }

    public function savePath($path = null)
    {
        if (null !== $path) {
            return session_save_path($path);
        }
        return session_save_path();
    }

    public function setCookieParams($lifetime, $path = null, $domain = null, $secure = false, $httpOnly = false)
    {
        if (null === $path || null === $domain) {
            $p = $this->getCookieParams();
            if (null === $path) {
                $path = $p['path'];
            }
            if (null === $domain) {
                $domain = $p['domain'];
            }
        }
        session_set_cookie_params((int)$lifetime, $path, $domain, (bool)$secure, (bool)$httpOnly);
    }

    public function setSaveHandler(\SessionHandlerInterface $handler, $registerShutdown = true)
    {
        return session_set_save_handler($handler, $registerShutdown);
    }

    public function setSaveHandlerCallback($fnOpen, $fnClose, $fnRead, $fnWrite, $fnDestroy, $fnGc)
    {
        return session_set_save_handler($fnOpen, $fnClose, $fnRead, $fnWrite, $fnDestroy, $fnGc);
    }

    public function start()
    {
        $s = $this->status();
        if (PHP_SESSION_NONE === $s) {
            session_start();
        }
        if (PHP_SESSION_DISABLED === $s) {
            trigger_error("Session support is not enabled on this machine", E_USER_WARNING);
        }
    }

    public function status()
    {
        return session_status();
    }

    public function writeClose()
    {
        session_write_close();
    }


}

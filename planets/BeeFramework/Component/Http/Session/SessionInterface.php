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


/**
 * SessionInterface
 * @author Lingtalfi
 *
 *
 */
interface SessionInterface
{

    //------------------------------------------------------------------------------/
    // CONFIG
    //------------------------------------------------------------------------------/
    public function setConfigValue($key, $value);

    public function getConfigValue($key);

    public function setConfig(array $config);



    //------------------------------------------------------------------------------/
    // DOT ACCESS
    //------------------------------------------------------------------------------/
    public function get($key, $default = null);

    public function set($key, $value);

    public function unsetValue($key);

    public function has($key);

    public function all();

    //------------------------------------------------------------------------------/
    // FROM PHP
    //------------------------------------------------------------------------------/
    public function cacheExpire($newCacheExpire = null);

    public function cacheLimiter($cacheLimiter = null);

    public function commit();

    public function decode($data);

    public function destroy();

    public function encode();

    public function getCookieParams();

    public function sessionId($id = null);

    public function moduleName($module = null);

    public function name($name = null);

    public function regenerateId($deleteOldSession = false);

    public function registerShutdown();

    public function savePath($path = null);

    public function setCookieParams($lifetime, $path = null, $domain = null, $secure = false, $httpOnly = false);

    public function setSaveHandler(\SessionHandlerInterface $handler, $registerShutdown = true);

    public function setSaveHandlerCallback($fnOpen, $fnClose, $fnRead, $fnWrite, $fnDestroy, $fnGc);

    public function start();

    public function status();

    public function writeClose();


}

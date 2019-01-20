<?php


namespace Authenticate\Grant;


use Authenticate\BadgeStore\BadgeStoreInterface;
use Authenticate\Grant\Exception\GrantException;
use Authenticate\SessionUser\SessionUser;

class Grantor implements GrantorInterface
{

    /**
     * @var BadgeStoreInterface
     */
    private $badgeStore;
    private $rootName;


    public function __construct()
    {
        $this->rootName = 'root';
    }

    public static function create()
    {
        return new static();
    }

    public function has($badge)
    {
        if (null !== $this->badgeStore) {

            if (null !== ($profile = SessionUser::getValue("profile"))) {
                if ($this->rootName === $profile) {
                    return true;
                }
                if (true === $this->badgeStore->hasBadge($badge, $profile)) {
                    $this->accessGranted($badge);
                    return true;
                }
                $this->accessDenied($badge);
                return false;
            }
            return false;
        }
        $this->error("badgeStore not set");
        return false;
    }


    public function setBadgeStore(BadgeStoreInterface $badgeStore)
    {
        $this->badgeStore = $badgeStore;
        return $this;
    }

    public function setRootName($rootName)
    {
        $this->rootName = $rootName;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        throw new GrantException($msg);
    }

    protected function accessGranted($badge)
    {
    }

    protected function accessDenied($badge)
    {
    }

}
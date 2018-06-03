<?php


namespace Notificator\Renderer;


class DefaultNotificatorRenderer extends BaseNotificatorRenderer
{



    public function display(array $notifications)
    {
        /**
         * Rendering by type
         */
        self::displayNotifications($notifications['success'], "success");
        self::displayNotifications($notifications['info'], "info");
        self::displayNotifications($notifications['warning'], "warning");
        self::displayNotifications($notifications['error'], "error");

    }


    protected function displayNotifications(array $notifications, string $type)
    {
        foreach ($notifications as $notification) {
            list($msg, $options) = $notification;
            self::displayNotification($msg, $options, $type);
        }
    }


    protected function displayNotification(string $msg, array $options, string $type)
    {
        $title = $options['title'] ?? null;
        ?>
        <div class="notificator-item notificator-<?php echo $type; ?>">
            <?php if ($title): ?>
                <h3 class="notificator-title"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php echo $msg; ?>
        </div>
        <?php
    }


}
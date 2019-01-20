<?php


namespace SokoForm\NotificationRenderer;


class SokoNotificationRenderer
{


    public static function create()
    {
        return new static();
    }


    public function render(array $notif)
    {
        ?>
        <div class="soko-notification soko-notification-<?php echo $notif['type']; ?>">
            <?php if (array_key_exists("title", $notif) && !empty($notif['title'])): ?>
                <div class="soko-notification-title"><?php echo $notif['title']; ?></div>
            <?php endif; ?>
            <div class="soko-notification-message"><?php echo $notif['msg']; ?></div>
        </div>
        <?php
    }

    public static function cssTheme()
    {
        ?>
        <style>
            .soko-notification {
                padding: 20px;
            }

            .soko-notification.soko-notification-success {
                background: #86d286;
                border: 1px solid #56b03a;
            }

            .soko-notification.soko-notification-warning {
                background: #e99231;
                border: 1px solid #b0743a;
                color: white;
            }

            .soko-notification.soko-notification-error {
                background: #c21313;
                border: 1px solid #900c0c;
                color: white;
            }

            .soko-notification.soko-notification-info {
                background: #1378c2;
                border: 1px solid #0c6690;
                color: white;
            }
        </style>
        <?php
    }
}
<?php


/**
 * @var $this ZeroAdminHeaderNewMessagesIconLinkWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderNewMessagesIconLinkWidget;


$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


$icon = $z['icon'];
$badge = $z['badge'] ?? "badge badge-pill";
$header_text_format = $z['header_text_format'];
$model = $z['model'];
$viewAllLink = $z['view_all_link'] ?? "";
$viewAllText = $z['view_all_text'] ?? "Read All";
$viewAllIcon = $z['view_all_icon'] ?? "";


$nbItems = $model['nbMessages'];
$messages = $model['list'];
$header_text = sprintf($header_text_format, $nbItems);


?>


<li class="kit-bwl-zeroadmin_new_messages nav-item dropdown d-none d-md-inline-block pb-1 <?php echo htmlspecialchars($this->getCssClass()); ?>" <?php echo $this->getAttributesHtml(); ?>>
    <a class="nav-link" data-toggle="dropdown" href="#navlink" role="button" aria-haspopup="true"
       aria-expanded="true">
        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
        <span class="<?php echo htmlspecialchars($badge); ?>"><?php echo $nbItems; ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center mb-1">
            <strong><?php echo $header_text; ?></strong>
        </div>

        <?php foreach ($messages as $message):
            $url = $reverseRouter->getUrl($message['route']);
            $date = date("h:s a - Y-m-d", strtotime($message['datetime']));
            ?>
            <div class="media px-2 py-1">
                <a href="<?php echo htmlspecialchars($url); ?>" class="align-self-start mr-3">
                    <img width="60" class="img-fluid rounded-circle"
                         src="<?php echo htmlspecialchars($message['thumb_src']); ?>"
                         alt="<?php echo htmlspecialchars($message['sender']); ?>">
                </a>
                <div class="media-body">
                    <p class="mb-1">
                        <small class="float-right">3 days ago</small>
                        <strong><?php echo $message['sender']; ?></strong> to
                        <strong><?php echo $message['recipient']; ?></strong>. <br>
                        <small class="text-muted"><?php echo $date; ?></small>
                    </p>
                    <p class="m-0">
                        <?php echo $message['text']; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="dropdown-divider"></div>


        <?php if ($viewAllLink): ?>
            <a class="dropdown-item text-center" href="<?php echo htmlspecialchars($viewAllLink); ?>">
                <?php if ($viewAllIcon): ?>
                    <i class="<?php echo htmlspecialchars($viewAllIcon); ?>"></i>
                <?php endif; ?>
                <strong><?php echo $viewAllText; ?></strong>
            </a>
        <?php endif; ?>

    </div>
</li>
<div class="thumbs d-flex flex-column me-3">
    <?php foreach ($screenshots as $index => $_item): ?>
        <?php if ("photo" === $_item['type']): ?>
            <img src="<?php echo htmlspecialchars($_item['thumb']); ?>"
                 alt="<?php echo htmlspecialchars($item['label']); ?>"

                 class="thumb-trigger"
                 data-index="<?php echo $index; ?>"
            >
        <?php elseif ('video/mp4' === $_item['type']): ?>
            <div class="d-flex justify-content-center align-items-center">
                <button class="video-player-trigger-btn no-button">
                    <i class="bi bi-play-circle"></i>
                </button>
                <img src="<?php echo htmlspecialchars($_item['thumb']); ?>"
                     alt="<?php echo htmlspecialchars($item['label']); ?>"
                     class="thumb-trigger video-html5-open-modal-trigger"
                     data-index="<?php echo $index; ?>"
                >
            </div>
        <?php elseif ('video/youtube' === $_item['type']): ?>
            <div class="d-flex justify-content-center align-items-center">
                <button class="video-player-trigger-btn no-button">
                    <i class="bi bi-play-circle"></i>
                </button>
                <img src="https://img.youtube.com/vi/<?php echo htmlspecialchars($_item['videoId']); ?>/default.jpg"
                     alt="<?php echo htmlspecialchars($item['label']); ?>"
                     class="video-img thumb-trigger video-yt-open-modal-trigger"
                     data-index="<?php echo $index; ?>"

                >
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

</div>
<div class="main-photo-container">

    <?php foreach ($screenshots as $index => $_item): ?>
        <div class="block"
            <?php if (0 !== $index): ?>
                style="display: none"
            <?php endif; ?>

             data-index="<?php echo $index; ?>">
            <div class="inner-block d-flex justify-content-center align-items-center">
                <?php if ("photo" === $_item['type']): ?>
                    <div class="jqzoom"><img
                                class="resp-img"
                                src="<?php echo $_item['url']; ?>"
                                alt="<?php echo htmlspecialchars($item['label']); ?>"
                                jqimg="<?php echo htmlspecialchars($_item['large']); ?>"></div>
                <?php elseif ('video/mp4' === $_item['type']): ?>
                    <div class="large-video-block video-html5-open-modal-trigger d-flex justify-content-center align-items-center h-100"
                         data-index="<?php echo $index; ?>">
                        <button class="video-player-trigger-btn no-button">
                            <i class="bi bi-play-circle"></i>
                        </button>
                        <img src="<?php echo htmlspecialchars($_item['poster']); ?>"
                             alt="<?php echo htmlspecialchars($item['label']); ?>"
                             class="resp-img"
                        >
                    </div>
                <?php elseif ('video/youtube' === $_item['type']): ?>
                    <div class="large-video-block video-yt-open-modal-trigger d-flex justify-content-center align-items-center h-100"
                         data-index="<?php echo $index; ?>">
                        <button class="video-player-trigger-btn no-button">
                            <i class="bi bi-play-circle"></i>
                        </button>
                        <img src="https://img.youtube.com/vi/<?php echo htmlspecialchars($_item['videoId']); ?>/hqdefault.jpg"
                             alt="<?php echo htmlspecialchars($item['label']); ?>"
                             class="resp-img"

                        >
                    </div>
                <?php endif; ?>


            </div>
        </div>
    <?php endforeach; ?>
</div>


<div class="swiper-container">
    <div class="swiper-wrapper">

        <?php foreach ($screenshots as $i => $_item): ?>
            <?php if ("photo" === $_item['type']): ?>
                <div class="swiper-slide">
                    <div class="inner-block d-flex justify-content-center align-items-center h-100" data-index="<?php echo $i; ?>">
                        <a class="pswp-link" href="<?php echo htmlspecialchars($_item['large']); ?>"
                           data-pswp-width="<?php echo $_item['largeWidth']; ?>"
                           data-pswp-height="<?php echo $_item['largeHeight']; ?>"
                           data-cropped="true"
                           target="_blank">
                            <img class="pswp-img"
                                 src="<?php echo htmlspecialchars($_item['url']); ?>"
                                 alt="<?php echo htmlspecialchars($item['label']); ?>: photo <?php echo $i; ?>"/>
                        </a>
                    </div>
                </div>
            <?php elseif ("video/mp4" === $_item['type']): ?>
                <div class="swiper-slide type-video position-relative video-html5-open-modal-trigger" data-index="<?php echo $i; ?>">
                    <div class="inner-block d-flex justify-content-center align-items-center h-100">
                        <button class="video-player-trigger-btn no-button">
                            <i class="bi bi-play-circle"></i>
                        </button>
                        <img src="<?php echo htmlspecialchars($_item['poster']); ?>"
                             alt="<?php echo htmlspecialchars($item['label']); ?>"
                             class="video-img"
                        >
                    </div>
                </div>
            <?php elseif ("video/youtube" === $_item['type']): ?>
                <div class="swiper-slide type-video position-relative video-yt-open-modal-trigger"  data-index="<?php echo $i; ?>">
                    <div class="inner-block d-flex justify-content-center align-items-center h-100">
                        <button class="video-player-trigger-btn no-button">
                            <i class="bi bi-play-circle"></i>
                        </button>
                        <img src="https://img.youtube.com/vi/<?php echo htmlspecialchars($_item['videoId']); ?>/hqdefault.jpg"
                             alt="<?php echo htmlspecialchars($item['label']); ?>"
                             class="video-img"
                        >
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


    </div>
    <div class="swiper-pagination"></div>


</div>
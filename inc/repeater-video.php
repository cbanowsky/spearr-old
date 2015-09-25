<li class="col-md-3 col-lg-3 col-sm-3 col-xs-12 nopadding block <?php echo $item_classes; ?>" data-type="<?php echo $item_classes; ?>" id="1">
    <div class="video-slide-wrap">
        <div class="videos-carousel-slide-title">
            <span class="videos-slide-category">
                <?php unpress_taxonomy_strip('video-categories'); ?>
            </span>
            <h4 class="videos-slide-sub-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        </div>
        <a href="<?php the_permalink(); ?>">
            <img class="videos-carousel-slide-image" src="<?php echo $video_img[0]; ?>" data-original="<?php echo $video_img[0]; ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
</li>
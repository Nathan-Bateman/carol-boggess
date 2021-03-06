<?php 
global $post, $virtue_premium, $kt_feat_width;
    $height = get_post_meta( $post->ID, '_kad_posthead_height', true ); 
    $swidth = get_post_meta( $post->ID, '_kad_posthead_width', true );
    if (!empty($height)) {
      $slideheight = $height;
      $imageheight = $height;
    } else {
      $slideheight = 400;
      $imageheight = apply_filters('kt_single_post_image_height', 400); 
    }
    if (!empty($swidth)) {
      $slidewidth = $swidth;
    } else {
      $slidewidth = $kt_feat_width;
    }
    $kt_headcontent = get_post_meta( $post->ID, '_kad_blog_head', true );
    if(empty($kt_headcontent) || $kt_headcontent == 'default') {
        if(!empty($virtue_premium['post_head_default'])) {
            $kt_headcontent = $virtue_premium['post_head_default'];
        } else {
            $kt_headcontent = 'none';
        }
    }

if ($kt_headcontent == 'flex') { ?>
              <section class="postfeat">
                <div class="flexslider kad-light-wp-gallery kt-flexslider loading" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                <ul class="slides">
                  <?php
                        $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                        if(!empty($image_gallery)) {
                            $attachments = array_filter( explode( ',', $image_gallery ) );
                        } else {
                            $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                            $attachments_posts = get_posts($attach_args);
                            $attachments = array();
                            foreach ($attachments_posts as $val) {
                                $attachments[] = $val->ID;
                            }
                        }
                        if ($attachments) {
                            foreach ($attachments as $attachment) {
                                $attachment_src = wp_get_attachment_image_src($attachment , 'full');
                                $attachment_url = $attachment_src[0];
                                  $caption = get_post($attachment)->post_excerpt;
                                  $image = aq_resize($attachment_url, $slidewidth, $slideheight, true, false, false, $attachment);
                                  if(empty($image)) {$image = array($attachment_url,$attachment_src[1],$attachment_src[2]);} 
                                  if( kad_lazy_load_filter() ) {
                                      $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($image[0]).'" '; 
                                   } else {
                                      $image_src_output = 'src="'.esc_url($image[0]).'"'; 
                                   }
                                  echo '<li>';
                                  echo '<a href="'.esc_url($attachment_url).'" data-rel="lightbox" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
                                  echo '<img '.$image_src_output.' width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr($caption).'" itemprop="contentUrl" '.kt_get_srcset_output($image[1], $image[2], $attachment_url, $attachment).'/>';
                                        echo '<meta itemprop="url" content="'.esc_url($image[0]).'">';
                                        echo '<meta itemprop="width" content="'.esc_attr($image[1]).'">';
                                        echo '<meta itemprop="height" content="'.esc_attr($image[2]).'">';
                                  echo '</a></li>';
                              }
                        }
                        ?>                            
                  </ul>
                </div> <!--Flex Slides-->
              </section>
        <?php } else if ($kt_headcontent == 'carouselslider') { ?>
        <section class="postfeat">
          <div id="imageslider" class="loading">
            <div class="carousel_slider_outer fredcarousel fadein-carousel" style="overflow:hidden; max-width:<?php echo esc_attr($slidewidth);?>px; height: <?php echo esc_attr($slideheight);?>px; margin-left: auto; margin-right:auto;">
                <div class="carousel_slider kad-light-wp-gallery initcarouselslider" data-carousel-container=".carousel_slider_outer" data-carousel-transition="600" data-carousel-height="<?php echo esc_attr($slideheight); ?>" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="carouselslider">
                    <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                            if(!empty($image_gallery)) {
                                $attachments = array_filter( explode( ',', $image_gallery ) );
                            } else {
                                $attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                                $attachments_posts = get_posts($attach_args);
                                $attachments = array();
                                foreach ($attachments_posts as $val) {
                                    $attachments[] = $val->ID;
                                }
                            }
                                if ($attachments) {
                                  foreach ($attachments as $attachment) {
                                        $attachment_src = wp_get_attachment_image_src($attachment , 'full');
                                        $attachment_url = $attachment_src[0];
                                        $image = aq_resize($attachment_url, null, $slideheight, false, false, false, $attachment);
                                        $caption = get_post($attachment)->post_excerpt;
                                        if(empty($image)) {$image = array($attachment_url,$attachment_src[1],$attachment_src[2]);} 
                                    if( kad_lazy_load_filter() ) {
                                        $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($image[0]).'" '; 
                                     } else {
                                        $image_src_output = 'src="'.esc_url($image[0]).'"'; 
                                     }
                                    echo '<div class="carousel_gallery_item" style="float:left; display: table; position: relative; text-align: center; margin: 0; width:auto; height:'.esc_attr($image[2]).'px;">';
                                    echo '<div class="carousel_gallery_item_inner" style="vertical-align: middle; display: table-cell;">';
                                    echo '<a href="'.esc_url($attachment_url).'" data-rel="lightbox" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
                                    echo '<img '.$image_src_output.' width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr($caption).'" itemprop="contentUrl" '.kt_get_srcset_output($image[1], $image[2], $attachment_url, $attachment).'/>';
                                      echo '<meta itemprop="url" content="'.esc_url($image[0]).'">';
                                      echo '<meta itemprop="width" content="'.esc_attr($image[1]).'">';
                                      echo '<meta itemprop="height" content="'.esc_attr($image[2]).'">';
                                    echo '</a>'; ?>
                                    </div>
                                  </div>
                          <?php } } ?>
                    </div>
                    <div class="clearfix"></div>
                      <a id="prevport-carouselslider" class="prev_carousel icon-arrow-left" href="#"></a>
                      <a id="nextport-carouselslider" class="next_carousel icon-arrow-right" href="#"></a>
                  </div> 
          </div>   
        </section>
        <?php } else if ($kt_headcontent == 'video') { ?>
            <section class="postfeat">
                <div class="videofit" style="max-width:<?php echo esc_attr($slidewidth);?>px; margin:0 auto;">
                    <?php $video = get_post_meta( $post->ID, '_kad_post_video', true ); echo do_shortcode($video); ?>
                </div>
                <?php if (has_post_thumbnail( $post->ID ) ) { 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="<?php echo esc_url($image[0]); ?>">
                        <meta itemprop="width" content="<?php echo esc_attr($image[1])?>">
                        <meta itemprop="height" content="<?php echo esc_attr($image[2])?>">
                    </div>
                    <?php } ?>
            </section>
        <?php } else if($kt_headcontent == 'carousel' || $kt_headcontent == 'shortcode') {
                if (has_post_thumbnail( $post->ID ) ) { 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="<?php echo esc_url($image[0]); ?>">
                        <meta itemprop="width" content="<?php echo esc_attr($image[1])?>">
                        <meta itemprop="height" content="<?php echo esc_attr($image[2])?>">
                    </div>
                <?php } 
        } else if ($kt_headcontent == 'image') {
                if (has_post_thumbnail( $post->ID ) ) {          
                  $image_id = get_post_thumbnail_id();
                  $image_url = wp_get_attachment_image_src( $image_id, 'full' ); 
                  $thumbnailURL = $image_url[0];
                  $image = aq_resize( $thumbnailURL, $slidewidth, $imageheight, true, false, false, $image_id);
                  if(empty($image[0])) {$image = array($thumbnailURL,$image_url[1],$image_url[2]);}
                  if( kad_lazy_load_filter() ) {
                      $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($image[0]).'" '; 
                   } else {
                      $image_src_output = 'src="'.esc_url($image[0]).'"'; 
                   }
                        if($image) : ?>
                          <div class="imghoverclass postfeat post-single-img" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <a href="<?php echo esc_url($thumbnailURL); ?>" rel-data="lightbox" class="">
                              <img <?php echo $image_src_output; ?> itemprop="contentUrl" alt="<?php the_title(); ?>" width="<?php echo $image[1];?>" height="<?php echo $image[1];?>" <?php echo kt_get_srcset_output($image[1], $image[2], $thumbnailURL, $image_id);?> />
                              <meta itemprop="url" content="<?php echo esc_url($image[0]); ?>">
                              <meta itemprop="width" content="<?php echo esc_attr($image[1])?>px">
                              <meta itemprop="height" content="<?php echo esc_attr($image[2])?>px">
                            </a>
                          </div>
                        <?php endif; 
                } 
              }
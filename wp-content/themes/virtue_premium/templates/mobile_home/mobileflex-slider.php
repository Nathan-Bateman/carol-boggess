<?php 
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
  global $virtue_premium; 


        if(isset($virtue_premium['mobile_slider_size'])) {$slideheight = $virtue_premium['mobile_slider_size'];} else { $slideheight = 300; }
        if(isset($virtue_premium['mobile_slider_size_width'])) {$slidewidth = $virtue_premium['mobile_slider_size_width'];} else { $slidewidth = 480; }
        if(isset($virtue_premium['mobile_slider_captions'])) { $captions = $virtue_premium['mobile_slider_captions']; } else {$captions = '';}
        if(isset($virtue_premium['home_mobile_slider'])) {$slides = $virtue_premium['home_mobile_slider']; } else {$slides = '';}
        $transtype = $virtue_premium['mobile_trans_type']; if ($transtype == '') $transtype = 'slide';
        $transtime = $virtue_premium['mobile_slider_transtime']; if ($transtime == '') $transtime = '300'; 
        $autoplay = $virtue_premium['mobile_slider_autoplay']; if ($autoplay == '') $autoplay = 'true'; 
        $pausetime = $virtue_premium['mobile_slider_pausetime']; if ($pausetime == '') $pausetime = '7000'; 
        ?>
<div class="sliderclass">
    <div id="imageslider" class="container">
        <div class="flexslider kt-flexslider loading" style="max-width:<?php echo esc_attr($slidewidth);?>px; margin-left: auto; margin-right:auto;" data-flex-speed="<?php echo esc_attr($pausetime);?>" data-flex-initdelay="0" data-flex-anim-speed="<?php echo esc_attr($transtime);?>" data-flex-animation="<?php echo esc_attr($transtype); ?>" data-flex-auto="<?php echo esc_attr($autoplay);?>">
            <ul class="slides">
                <?php foreach ($slides as $slide) : 
                        if(!empty($slide['target']) && $slide['target'] == 1) {$target = '_blank';} else {$target = '_self';} 
                        $image = aq_resize($slide['url'], $slidewidth, $slideheight, true, false, false, $slide['attachment_id']);
                        if(empty($image[0])) {$image = array($slide['url'],$slidewidth,$slideheight);} 
                        $img_srcset_output = kt_get_srcset_output( $image[1], $image[2], $slide['url'], $slide['attachment_id']);
                        ?>
                            <li> 
                            <?php if(!empty($slide['link'])) {
                                echo '<a href="'.esc_url($slide['link']).'" target="'.esc_attr($target).'">';
                            } ?>
                              <img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]);?>" height="<?php echo esc_attr($image[2]);?>" <?php echo $img_srcset_output;?> alt="<?php echo esc_attr($slide['description'])?>" title="<?php echo esc_attr($slide['title']); ?>" />
                                  <?php if ($captions == '1') { ?> 
                                    <div class="flex-caption">
                                    <?php if ($slide['title'] != '') echo '<div class="captiontitle headerfont">'.$slide['title'].'</div>'; ?>
                                    <?php if ($slide['description'] != '') echo '<div><div class="captiontext headerfont"><p>'.$slide['description'].'</p></div></div>';?>
                                    </div> 
                              <?php } ?>
                            <?php if(!empty($slide['link'])) {
                                echo '</a>';
                            } ?>
                         </li>
                <?php endforeach; ?>
            </ul>
        </div> <!--Flex Slides-->
    </div><!--Container-->
</div><!--feat-->
              
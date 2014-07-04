<?php
/**
 * @package pinterest-pin-display-widget
*/
/*
Plugin Name: Pinterest Pin Display Widget
Plugin URI: http://www.screenwave.net
Description: Pinterest Pin Display Widget - Displays the latest Pinterest Pins Images in a Grid Layout on your website.
Version: 0.0.1
Author: Michael Wilkinson
Author URI: http://www.screenwave.net
*/

class PinterestPinDisplayWidget extends WP_Widget{
    public function __construct() {
        $params = array(
            'description' => 'Pinterest Pin Display Widget - Displays the latest Pinterest Pins Images in a Grid Layout on your website.',
            'name' => 'Pinterest Pin Display Widget'
        );
        parent::__construct('PinterestPinDisplayWidget','',$params);
    }
    
    public function form($instance){
        extract($instance);
        ?>
<!-- Wordpress Color Chooser Script Start Here -->
    <script type="text/javascript">
    //<![CDATA[
        jQuery(document).ready(function()
        {
            // colorpicker field
            jQuery('.cw-color-picker').each(function(){
            var $this = jQuery(this),
            id = $this.attr('rel');
            $this.farbtastic('#' + id);
        });
    });		
    //]]>   
    </script>
<!-- Wordpress Color Chooser Script End Here -->
<!-- Starting the Mightly Fields in HTML -->
    <p>
        <label for="<?php echo $this->get_field_id('title');?>">Title</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('title');?>"
            name="<?php echo $this->get_field_name('title');?>"
            value="<?php echo !empty($title) ? $title : "Pinterest Pin Display Widget"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'display' ); ?>">Display Profile/Board</label> 
        <select id="<?php echo $this->get_field_id( 'display' ); ?>"
            name="<?php echo $this->get_field_name( 'display' ); ?>"
            class="widefat" style="width:100%;">
                <option value="Profile" <?php if ($display == 'Profile') echo 'selected="Profile"'; ?> >Profile</option>
                <option value="Board" <?php if ($display == 'Board') echo 'selected="Board"'; ?> >Board</option>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('pin_account');?>">Pinterest Account (Required)</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('pin_account');?>"
            name="<?php echo $this->get_field_name('pin_account');?>"
            value="<?php echo !empty($pin_account) ? $pin_account : "britneyspears"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'display_title' ); ?>">Display Title</label> 
        <select id="<?php echo $this->get_field_id( 'display_title' ); ?>"
            name="<?php echo $this->get_field_name( 'display_title' ); ?>"
            class="widefat" style="width:100%;">
                <option value="yes" <?php if ($display_title == 'yes') echo 'selected="yes"'; ?> >YES</option>
                <option value="no" <?php if ($display_title == 'no') echo 'selected="no"'; ?> >NO</option>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'display_description' ); ?>">Display Description</label> 
        <select id="<?php echo $this->get_field_id( 'display_description' ); ?>"
            name="<?php echo $this->get_field_name( 'display_description' ); ?>"
            class="widefat" style="width:100%;">
                <option value="yes" <?php if ($display_description == 'yes') echo 'selected="yes"'; ?> >YES</option>
                <option value="no" <?php if ($display_description == 'no') echo 'selected="no"'; ?> >NO</option>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('img_show');?>">No. of Image/ Pins to Display</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('img_show');?>"
            name="<?php echo $this->get_field_name('img_show');?>"
            value="<?php echo !empty($img_show) ? $img_show : "20"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('img_width');?>">Image Width</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('img_width');?>"
            name="<?php echo $this->get_field_name('img_width');?>"
            value="<?php echo !empty($img_width) ? $img_width : "60"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('img_height');?>">Image Height</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('img_height');?>"
            name="<?php echo $this->get_field_name('img_height');?>"
            value="<?php echo !empty($img_height) ? $img_height : "60"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('img_distance');?>">Image Spacing</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('img_distance');?>"
            name="<?php echo $this->get_field_name('img_distance');?>"
            value="<?php echo !empty($img_distance) ? $img_distance : "3"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('box_width');?>">Width</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('box_width');?>"
            name="<?php echo $this->get_field_name('box_width');?>"
            value="<?php echo !empty($box_width) ? $box_width : "280"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('box_height');?>">Height</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('box_height');?>"
            name="<?php echo $this->get_field_name('box_height');?>"
            value="<?php echo !empty($box_height) ? $box_height : "350"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('border_color'); ?>">Border Color :</label> 
        <input
            class="widefat borderColor"
            id="<?php echo $this->get_field_id('border_color'); ?>"
            name="<?php echo $this->get_field_name('border_color'); ?>"
            value="<?php if($border_color) { echo $border_color; } else { echo '#000000';} ?>" />
    </p>
    <div class="cw-color-picker borderColorHide" rel="<?php echo $this->get_field_id('border_color'); ?>"></div>
    <p>
        <label for="<?php echo $this->get_field_id('border_size');?>">Border Size</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('border_size');?>"
            name="<?php echo $this->get_field_name('border_size');?>"
            value="<?php echo !empty($border_size) ? $border_size : "3"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('border_radius');?>">Border Radius</label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('border_radius');?>"
            name="<?php echo $this->get_field_name('border_radius');?>"
            value="<?php echo !empty($border_radius) ? $border_radius : "5"; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('bg_color'); ?>">Background Color :</label> 
        <input
            class="widefat bgColor"
            id="<?php echo $this->get_field_id('bg_color'); ?>"
            name="<?php echo $this->get_field_name('bg_color'); ?>"
            value="<?php if($bg_color) { echo $bg_color; } else { echo '#DEDEDE';} ?>" />
    </p>
    <div class="cw-color-picker bgColor" rel="<?php echo $this->get_field_id('bg_color'); ?>"></div>
    <p>
        <label for="<?php echo $this->get_field_id( 'follow' ); ?>">Display Follow Button</label> 
        <select id="<?php echo $this->get_field_id( 'follow' ); ?>"
            name="<?php echo $this->get_field_name( 'follow' ); ?>"
            class="widefat" style="width:100%;">
                <option value="yes" <?php if ($follow == 'yes') echo 'selected="yes"'; ?> >YES</option>
                <option value="no" <?php if ($follow == 'no') echo 'selected="no"'; ?> >NO</option>
        </select>
    </p>
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
	if(empty($display)) $display = "Profile";
        if(empty($pin_account)) $id = "britneyspears";
        if(empty($display_title)) $display_title = "yes";
        if(empty($display_description)) $display_description = "yes";
        if(empty($img_show)) $img_show = "20";
        if(empty($img_width)) $img_width = "60";
        if(empty($img_height)) $img_height = "60";
        if(empty($img_distance)) $img_distance = "3";
        if(empty($box_width)) $box_width = "280";
        if(empty($box_height)) $box_height = "350";
        if(empty($border_color)) $$border_color = "#000000";
        if(empty($border_size)) $border_size = "3";
        if(empty($border_radius)) $border_radius = "5";
        if(empty($bg_color)) $bg_color = "#DEDEDE";
        if(empty($follow)) $follow = "yes";
        echo $before_widget;
        echo $before_title . $title . $after_title;
        
        /*
         * Starting Action
         */
        
        // Profile or Board
        if($display == 'Board'){
	$xml_url = "http://pinterest.com/$pin_account/rss";
	}
        else{
	$xml_url = "http://pinterest.com/$pin_account/feed.rss";
	}
        
        $xml = simplexml_load_file($xml_url);
        
	$image_show  = $img_show+1;
        
        ?>
<!-- Internal Stylesheets of the Plugin -->  
<style>
  .pin{ width:<?php echo $box_width;?>px; height:<?php echo $box_height;?>px; border:<?php echo $border_size;?>px solid <?php echo $border_color;?>; margin:0 auto; border-radius:<?php echo $border_radius;?>px; background:<?php echo $bg_color;?>; padding:5px}
  .pin img{ height:<?php echo $img_height;?>px; width:<?php echo $img_width;?>px; float:left; border:1px solid #333; margin:<?php echo $img_distance;?>px; padding:1px }
  .pin p {margin: 0;}
  .pin img:hover{ -ms-transform: scale(3,3); /* IE 9 */
    -webkit-transform: scale(3,3); /* Chrome, Safari, Opera */
    transform: scale(3,3); z-index:1000 !important}
	.follow {padding-bottom: 10px;}	 
	.title h4 { margin: 0; text-align: center;}
   .title p { margin: 0; padding-bottom: 10px;}
</style>
<div class="pinterest_pin_display_widget">
<?php
    $pin = $xml->channel;
    $tiles = "";
    $descriptions = "";
    ?>
    <div class="title">
        <h1> <?php if ($display_title=='yes') {?><a href=<?php echo "$pin->link";?> target="_blank"><?php echo $pin->title;?></a>
    <?php } else { echo $tiles; } ?></h1>
             <?php if ($display_description=='yes') {?> <p> <?php  echo $pin->description;?></p><?php } else { echo $descriptions; }?>
         </div>
	<!-- follow button start here -->
	<div class="follow">	
         <?php  $follows='';?>
         
         <?php if($follow == 'yes'){?> 
            <a data-pin-do="buttonFollow" href="http://www.pinterest.com/<?php echo $account;?>/">Pinterest</a>
            <!-- Please call pinit.js only once per page -->
            <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
         <?php } else{ echo $follows; } ?>
    </div>
	<!-- follow button end here -->
   <div class="pin">
	
       <?php 
	$l = $image_show;
        $c = 0 ;
        foreach($xml->channel->item as $pinterest){
                   $c++;
	if($c == $l)
                    break;
                 $pin_desc = $pinterest->description ;
                 $link     = $pinterest->link ;
                 $doc = new DOMDocument();
                 $doc->loadHTML($pin_desc);
                 $imageTags = $doc->getElementsByTagName('img');
                 $pin_print = "";
             
        foreach($imageTags as $tag)    {
               echo "<a href='" . $link . "' target='_blank'>" . "<img src='" . $tag->getAttribute('src') . "'/></a>";
             }
          } /*<!--end first foreach bracket-->*/
?>
   </div>
</div>
<?php
            //print_r($instance);
        echo $after_widget;
    }
}
/*
 * Color Picker from Wordpress
 */
function pinterest_pin_display_load_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function pinterest_pin_display_load_color_picker_style() {
	wp_enqueue_style('farbtastic');
}
add_action('admin_print_scripts-widgets.php', 'pinterest_pin_display_load_color_picker_script');
add_action('admin_print_styles-widgets.php', 'pinterest_pin_display_load_color_picker_style');
//start registering the extension
add_action('widgets_init','register_PinterestPinDisplayWidget');
function register_PinterestPinDisplayWidget(){
    register_widget('PinterestPinDisplayWidget');
}
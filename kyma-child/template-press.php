<?php
/**
 * Template Name:Press Page
 */
get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<?php if(has_post_thumbnail($current_page_id, 'full')){
 $image_id = get_post_thumbnail_id($current_page_id);
 $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
 $nit_subtitle = get_post_meta(get_the_ID(),"nit_subtitle",true);
?>
<div class="page-caption-featured page-caption" style="background-image:url(<?php echo $image_thumb[0];?>);">
<div class="container">
<h1><?php echo the_title();?></h1>
<?php if($nit_subtitle != ''){?>
<h6><?php echo $nit_subtitle;?></h6>
<?php } ?>
</div>
</div>
<?php } ?>


<div id="main-content">
       
       <div class="press-list-main">
       <div class="container">
  <?php
        $args = array(
            'post_type' => 'pres',
            'showposts' => -1,
            'post_status' => 'publish',
            'orderby' => 'Id',
            'order' => 'DESC');

        $the_query = new wp_query($args);

        // The Loop

        if ($the_query->have_posts()) {

            while ($the_query->have_posts()) {

                $the_query->the_post();
                
				$nit_link = get_post_meta(get_the_ID(),"nit_link",true);
                ?>
                <div class="oral-press-list clearfix">
                        <?php
                        if (has_post_thumbnail(get_the_ID(), 'press-img')) {
                            $image_id = get_post_thumbnail_id(get_the_ID());
                            $image_url = wp_get_attachment_image_src($image_id, 'press-img', true);
                            ?>
                            <div class="press-list-image-left"><img src="<?php echo $image_url[0]; ?>" alt="" /></div>
                        <?php } ?>
                        <div class="press-list-content-right">
                        <h6><?php echo the_time('d M Y');?></h6>
                        <?php if($nit_link != ''){?>
                   <h4><a href="<?php echo $nit_link;?>" target="_blank"><?php echo the_title();?></a></h4>
                   <?php }
				   else{ ?>
                   <h4><?php echo the_title();?></h4>
                   <?php } ?>
                   </div>
                </div>

                <?php
            }
        }

        wp_reset_query();
        ?>
       </div>
       </div>

		
</div> <!-- #main-content -->

<?php

get_footer();
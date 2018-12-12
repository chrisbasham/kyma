<?php
/**
 * Template Name:Featured Image Page
 */
get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<?php if(has_post_thumbnail($current_page_id, 'full')){
 $image_id = get_post_thumbnail_id($current_page_id);
 $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
?>
<div class="page-caption-featured page-caption" style="background-image:url(<?php echo $image_thumb[0];?>);">
<div class="container">
<h1><?php echo the_title();?></h1>
</div>
</div>
<?php } ?>


<div id="main-content">


		<div id="content-area" class="clearfix">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<h1 class="entry-title main_title"><?php the_title(); ?></h1>
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>

					<div class="entry-content">
					<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->

				<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
				?>

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>


		</div> <!-- #content-area -->

</div> <!-- #main-content -->

<?php

get_footer();
<?php get_header(); ?>
<div id="wrapper">

<div id="topcover">
<?php include (TEMPLATEPATH . '/top.php'); ?>
</div>

<div id="casing">
<div class="searchtitle">
	<p>	<?php
			$mySearch =& new WP_Query("s=$s & showposts=-1");
			$num = $mySearch->post_count;
			echo $num.' search results for '; the_search_query();
		?> in <?php  get_num_queries(); ?> <?php timer_stop(1); ?> seconds.
	</p>
</div>

<div id="content" >
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">
<?php
if ( has_post_thumbnail() ) { ?>
	<img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=150&amp;w=200&amp;zc=1" alt="" />
<?php } else { ?>
	<img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/dummy.jpg&amp;h=150&amp;w=200&amp;zc=1" alt="" />
<?php } ?>

<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
<div class="clear"></div>
</div>


</div>
<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

<div class="post">
<div class="title">
		<h2>Your search - <?php the_search_query();?> - did not match any entries.</h2>
</div>


<div class="entry">
<p>Suggestions:</p>
<ul>
   <li>  Make sure all words are spelled correctly.</li>
   <li>  Try different keywords.</li>
   <li>  Try more general keywords.</li>
</ul>
</div></div>


<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
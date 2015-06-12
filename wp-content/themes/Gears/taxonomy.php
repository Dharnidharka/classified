<?php get_header(); ?>

<div id="wrapper">

<div id="topcover">
<?php include (TEMPLATEPATH . '/top.php'); ?>

</div>
<div id="filter">
<?php include (TEMPLATEPATH . '/lib/listing.php'); ?>
</div>
<div id="casing">

<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="carbox clearfix" id="post-<?php the_ID(); ?>">

<div class="arc-condition">
<?php  if( has_term( 'used', 'condition', $post->ID ) ) { ?>
<span>Used</span>
<?php } else if ( has_term( 'new', 'condition', $post->ID ) ){ ?>
<span>New</span>
<?php } ?>
</div>

<div class="archimg">

<div class="arc-title">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<?php
	if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="propimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=250&amp;w=350&amp;zc=1" alt=""/></a>
		<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="propimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/dummy.jpg&amp;h=250&amp;w=350&amp;zc=1" alt="" /></a>
<?php } ?>

</div>

<div class="cover">

	<div class="propmeta">
		<div class="proplist"><span>Year</span> <span class="propval"> - <?php echo get_the_term_list( $post->ID, 'model_year', '', ' ', '' ); ?></span></div>
		<div class="proplist"><span>Make</span> <span class="propval"> -  <?php echo get_the_term_list( $post->ID, 'make', '', ' ', '' ); ?></span></div>
		<div class="proplist"><span>Body type</span> <span class="propval"> - <?php echo get_the_term_list( $post->ID, 'body', '', ' ', '' ); ?></span></div>
	</div>
	
	<div class="boxentry">
			<?php wpe_excerpt('wpe_excerptlength_box', ''); ?>
		<div class="clear"></div>
	</div>
	
</div>

<div class="car-price">
<?php $car_price=get_post_meta($post->ID, 'wtf_car-price', true); echo $car_price; ?>
</div>

</div>

<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
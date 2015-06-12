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

<div class="post" id="post-<?php the_ID(); ?>">

<?php
if ( has_post_thumbnail() ) { ?>
	<a rel="prettyPhoto" href="<?php get_image_url(); ?> " title="<?php the_title(); ?>" ><img class="singimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=350&amp;w=660&amp;zc=1" alt="" /></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="singimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" /></a>
<?php } ?>


<div class="cardetails clearfix">
<span><strong>Year :</strong> <?php echo get_the_term_list( $post->ID, 'model_year', '', ' ', '' ); ?></span>
<span><strong>Body type :</strong> <?php echo get_the_term_list( $post->ID, 'body', '', ' ', '' ); ?></span>
<span><strong>Make :</strong> <?php echo get_the_term_list( $post->ID, 'make', '', ' ', '' ); ?></span>
<span><strong>Model :</strong> <?php $car_model=get_post_meta($post->ID, 'wtf_car-model', true); echo $car_model; ?></span>
<span><strong>Color : </strong><?php $car_color=get_post_meta($post->ID, 'wtf_car-color', true); echo $car_color; ?></span>
<span><strong>Transmission : </strong><?php $car_trans=get_post_meta($post->ID, 'wtf_car-transmission', true); echo $car_trans; ?></span>
<span><strong>Fuel type :</strong> <?php $car_fuel=get_post_meta($post->ID, 'wtf_car-fuel', true); echo $car_fuel; ?></span>
<span><strong>Price :</strong> <?php $car_price=get_post_meta($post->ID, 'wtf_car-price', true); echo $car_price; ?></span>
</div>
<div class="title">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">
<?php the_content('Read the rest of this entry &raquo;'); ?>

<div class="clear"></div>
</div>

</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

   
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
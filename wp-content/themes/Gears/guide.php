<?php
add_action('admin_menu', 't_guide');

function t_guide() {
	add_theme_page('How to use the theme', 'Theme user guide', 8, 'user_guide', 't_guide_options');
	
}

function t_guide_options() {
?>
<div class="wrap">

<h2>Theme user guide</h2>

<div class="opwrap">

<div id="wrapr" class="postbox-container" style="width: 70%; ">



<div class="postbox guidebox">

<?php echo file_get_contents(dirname(__FILE__) . '/FT/license-html.php') ?>
  
  
<div class="postbox guidebox">  <!-- Thumbnails --------------------->
  <h3>How to add featured thumbnail to posts?</h3>
  
	<div class="inside">  
	<p>Check the video below to see how to add featured images to posts. Theme uses timthumb script to generate thumbnail images. Make sure your host has PHP5 and GD library enabled. You will also need to set the CHMOD value for the "cache" folder <strong>within the theme</strong> to "777" or "755" </p>
	<div class="midcenter"><iframe src="http://www.screenr.com/embed/0IR" width="650" height="396" frameborder="0"></iframe></div>
	</div>
</div>	 						<!-- Thumbnails End ----------------->
	
<div class="postbox guidebox">  
	<h3> A walkthrough of Gears theme options</h3>

<div class="inside">	
	<h4>1. Homepage content</h4>
		<p> The theme has 2 options for the homepage. 1- Blog and 2 - Car . </p>
	<ul>
		<li> Blog - If you select the "Blog" option then the homepage will display blog entries.</li>
		<li> Car - If you select the "car" option then the homepage will display latest car listings. </li>
	</ul>
	
	<h4>2. Featured slider</h4>
		<p> You have the option to select few entries from your car listings to display on the homepage slider. You can do it by checking the "feature" metabox while creating the entry.  From the options page you can set the number of items on the slider. </p>
	
	<h4>3. Contact details</h4>
		<p> Set your contact details like Name, Phone, Email, Twitter etc  </p>
		
</div>
	
	
	
</div>


<div class="postbox guidebox">  
	<h3> How to make a car listing post</h3>

	<div class="inside">	
	<p>The following video shows steps involved in creating a car listing post.</p>
	<div class="midcenter"> <iframe src="http://www.screenr.com/embed/hDDs" width="650" height="396" frameborder="0"></iframe> </div>
	</div>
	
</div>



</div>

</div>

<?php }; ?>

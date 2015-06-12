<div id="masthead">
	<div id="head">
		<div id="top" class="clearfix"> 
			<div id="blogname">
				<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
			</div>
	
			<div id="contactlist">
				<ul>
					<li>Name : <span><?php $my_name =get_option('gear_my_name'); echo $my_name ?></span></li>
					<li>Email :<span><?php $my_email =get_option('gear_my_email'); echo $my_email ?></span></li>
					<li>Phone : <span><?php $my_phone =get_option('gear_my_phone'); echo $my_phone ?></span></li>
					<li>Twitter : <span><?php $my_twit =get_option('gear_my_twit'); echo $my_twit ?></span></li>
				</ul>
			</div>
		</div>
	
		<div id="botmenu">
			<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
		</div><!-- END botmenu -->
	</div>
</div><!--end masthead-->
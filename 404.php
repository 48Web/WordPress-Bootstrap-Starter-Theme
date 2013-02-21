<?php /* --[ 404 ] -- */ ?>
<?php get_header(); ?>
<div class="row<?php if (IS_FLUID) echo '-fluid' ?>">
	<div id="content" class="span12">
	    <h1>Error: 404 ... Nothing here!</h1>
	    <p>These aren't the droids you're looking for... Can we help you find something?</p>
	    <div class="well">
	    	<h2>Find Something!</h2>
	    	<?php get_search_form(); ?> 
	    </div>
	    <h2>Recent Posts</h2>
	    <ul>
			<?php
				$args = array( 'numberposts' => '5' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
				}
			?>
		</ul>
	</div><!--#end content -->
</div>
<?php get_footer(); ?>
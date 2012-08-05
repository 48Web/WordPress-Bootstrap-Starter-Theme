<?php /* -- [ Sidebar ] -- */ ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
	<!--Default sidebar info goes here-->
	<h2>Recent Posts</h2>
    <ul>
	    <?php
	      $recent_posts = wp_get_recent_posts();
	      foreach($recent_posts as $post){
	        echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
	      } ?>
    </ul>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php if (have_posts()): while (have_posts()): the_post(); echo strip_tags(get_the_excerpt()); endwhile; endif; ?>" />
	<meta name="author" content="Andy Brudtkuhl @abrudtkuhl">

	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed (<?php bloginfo('language'); ?>)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--Stylesheets-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/wp.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css">
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	<?php // load up facebook scripts/apps ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header id="header">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container<?php if (IS_FLUID) echo '-fluid' ?>">
				  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				  </a>
				  <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				  <div class="nav-collapse">
				  	<?php if (has_nav_menu('primary-menu')): 
							wp_nav_menu( array( 'container' => false, 'menu_class' => 'nav', 'theme_location' => 'primary-menu', 'fallback_cb' => 'display_home' ) );
					else: ?>
						<ul class="nav">
							<li><a href="<?php echo home_url(); ?>/">Home</a></li>
							<?php wp_list_pages('title_li=' ); ?>
					    </ul><!-- end .menu -->
 					<?php endif;	?>
				  </div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	</header>
	<div id="container" class="container<?php if (IS_FLUID) echo '-fluid' ?>">
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } ?></title>
	
	<meta name="description" content="<?php if (have_posts()): while (have_posts()): the_post(); echo strip_tags(get_the_excerpt()); endwhile; endif; ?>" />
	
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed (<?php bloginfo('language'); ?>)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--Stylesheets-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/theme.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/wp.css" type="text/css" media="screen" charset="utf-8" />
	
    <!-- Javascript -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src=""></script>

	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	<header id="header">
		<h1>Header</h1>
	</header>
	<div id="container" class="container-fluid">
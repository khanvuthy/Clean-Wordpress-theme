<?php global $wp_locale;
if (isset($wp_locale)) {
	$wp_locale->text_direction = 'ltr';
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset') ?>" />
<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
<!-- Created by Cleantheme  -->
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
remove_action('wp_head', 'wp_generator');
if (is_singular() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>

<div id="cleantheme-main">

<?php if(theme_has_layout_part("header")) : ?>
<header class="cleantheme-header<?php echo (theme_get_option('theme_header_clickable') ? ' clickable' : ''); ?>"><?php get_sidebar('header'); ?></header>
<?php endif; ?>

<nav class="cleantheme-nav">
    <?php
	echo theme_get_menu(array(
			'source' => theme_get_option('theme_menu_source'),
			'depth' => theme_get_option('theme_menu_depth'),
			'menu' => 'primary-menu',
			'class' => 'cleantheme-hmenu'
		)
	);
	get_sidebar('nav'); 
?> 
    </nav>
<div class="cleantheme-sheet clearfix">
            <div class="cleantheme-layout-wrapper">
                <div class="cleantheme-content-layout">
                    <div class="cleantheme-content-layout-row">
                        <?php get_sidebar(); ?>
                        <div class="cleantheme-layout-cell cleantheme-content">

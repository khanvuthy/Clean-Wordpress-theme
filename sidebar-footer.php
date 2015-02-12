<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="cleantheme-center-wrapper"><div class="cleantheme-center-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="cleantheme-content-layout">
    <div class="cleantheme-content-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="cleantheme-layout-cell cleantheme-layout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('cleantheme-footer-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="cleantheme-footer-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="cleantheme-footer-text">

<p>Copyright © 2011, Clean Restaurant. All Rights Reserved.</p>
    
  
<?php } ?>
<p class="cleantheme-page-footer">
        <span id="cleantheme-footnote-links">Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> and WordPress Theme created  by Vuthy.</span>
        <span id="cleantheme-licence-links">Images by Flickr/winkyintheuk</span>
    </p>
</div>

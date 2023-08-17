<?php

//contact form7 submit button tag or style replace and customize function -----------------------------------


/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');

/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'twentysixteen_child_cf7_button');

/*adding out submit button tag*/
if (!function_exists('twentysixteen_child_cf7_button')) {
function twentysixteen_child_cf7_button() {
wpcf7_add_form_tag('submit', 'twentysixteen_child_cf7_button_handler');
}
}

/*out button markup inside handler*/
if (!function_exists('twentysixteen_child_cf7_button_handler')) {
function twentysixteen_child_cf7_button_handler($tag) {
$tag = new WPCF7_FormTag($tag);
$class = wpcf7_form_controls_class($tag->type);
$atts = array();
$atts['class'] = $tag->get_class_option($class);
$atts['class'] .= 'site-btn';
$atts['id'] = $tag->get_id_option();
$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
$value = isset($tag->values[0]) ? $tag->values[0] : '';
if (empty($value)) {
$value = esc_html__('GET FREE QUOTE', 'twentysixteen');
}
$atts['type'] = 'submit';
$atts = wpcf7_format_atts($atts);
$html = sprintf('<button type="submit" class="site-btn">%s<i class="fal fa-angle-right"></i></button>',$value,$atts);
return $html;
}
}


?>

<?php 


if (get_page_template_slug() === 'plugin-name-page-template.php') {

    if ($theme_file = locate_template(array('plugin-name-page-template.php'))) {
        $template = $theme_file;
    } else {
        $template = WP_PLUGIN_DIR . '/' . $this->plugin_name . '/' . $templates_dir . '/plugin-name-page-template.php';
    }
}
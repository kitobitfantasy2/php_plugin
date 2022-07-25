<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wpdev.loc
 * @since             1.0.0
 * @package           New_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       New_plugin
 * Plugin URI:        wpdev.loc
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            dem
 * Author URI:        wpdev.loc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       new_plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NEW_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-new_plugin-activator.php
 */
function activate_new_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-new_plugin-activator.php';
	New_plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-new_plugin-deactivator.php
 */
function deactivate_new_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-new_plugin-deactivator.php';
	New_plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_new_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_new_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-new_plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_new_plugin() {

	$plugin = new New_plugin();
	$plugin->run();

	add_action('wp_ajax_hello','say_hello');
    add_action('wp_ajax_nopriv_hello','say_hello');
	

}
// run_new_plugin();
add_shortcode('tags','show_post_tags');

add_action('init','run_new_plugin');


function say_hello() {
    $name = esc_attr($_GET['name']);

	 $post_array = array('post');
	 $my_post = get_page_by_title($name,'OBJECT',$post_array);

     if ($my_post == null) {
	 echo "Такой статьи нет в базе";	
      }
     else {	
	 $my_post_id = $my_post->ID;
	 echo "Такая статья уже есть в базе, ID $my_post_id";

	    }
		   wp_die();
}

function show_post_tags() {

	$url = admin_url() . "admin-ajax.php?action=hello&name=";	

	$html .= '<form method="post" action="" novalidate="novalidate">';
	$html .= '<input type="hidden" name ="action" value="import">';
	$html .= '<br>';
	$html .= '<br>';
	$html .= '<input type="text" name ="title" value="Заголовок статьи" onchange="myFunction(value)">';
	$html .= '<br>';
	$html .= '<br>';
	$html .= '<input type="text" name ="tab" id ="tab">';
	$html .= '<br>';
	$html .= '<br>';	
	$html .= '<textarea name="text" rows="10" cols="30">';	
	$html .= 'Кошка играла в саду.';	
	$html .= '</textarea>';		
	$html .= '</form>';	

	$html .= '<script>';	
	$html .= 'function myFunction(val) {';	

	

	$html .= 'document.getElementById("tab").value = "Ждем ответ ...";';	
	
	$html .= 'const request = new XMLHttpRequest();';
	$html .= 'const url = "' . $url .'"+val;';
	// $html .= 'const url = "http://wpdev/wp-admin/admin-ajax.php?action=hello&name="+val;';
	$html .= 'request.open("GET", url);';
	$html .= 'request.setRequestHeader("Content-Type", "application/x-www-form-url");';
	$html .= 'request.addEventListener("readystatechange", () => {';

	$html .= 'if (request.readyState === 4 && request.status === 200) {';
	$html .= 'document.getElementById("tab").value = request.responseText;';
	$html .= '}';

	$html .= '});';
	$html .= 'request.send();';

	$html .= '}';	
	$html .= '</script>';	

	return $html;
}
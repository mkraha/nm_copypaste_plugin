<?php
/*
  Plugin Name: Nomore Copypaste Plugin
  Plugin URI: http://www.drizzlethemes.com/
  Description: This plugin will protect copy/paste contents from spammers.
  Version: 1.0.1
  Author: DrizzleThemes
  Author URI: http://www.drizzlethemes.com/
  Short Name: nm_copypaste_plugin
  Plugin update URI: nomore-copypaste-plugin
 */

function nm_copypaste_plugin_call_after_install() {
  osc_set_preference('nm_id', '#titleen_US, #descriptionen_US, #message, #yourEmail, #comment_form textarea', 'nm_copypaste_plugin', 'STRING');
  
}

function nm_copypaste_plugin_call_after_uninstall() {
  osc_delete_preference('nm_id', 'nm_copypaste_plugin');
  
}

function nm_copypaste_plugin_actions() {
  $dao_preference = new Preference();
  $option = Params::getParam('nomoreoption');

  if (Params::getParam('file') != 'nm_copypaste_plugin/admin/settings.php') {
    return '';
  }

  if ($option == 'nomoresettings') {
    osc_set_preference('nm_id', Params::getParam("nm_id") ? Params::getParam("nm_id") : '0', 'nm_copypaste_plugin', 'STRING');
    
    osc_add_flash_ok_message(__('Nomore copy/paste settings has been updated', 'nm_copypaste_plugin'), 'admin');
    osc_redirect_to(osc_admin_render_plugin_url('nm_copypaste_plugin/admin/settings.php'));
  }
}

// HELPER
function dd_nm_id() {
  return(osc_get_preference('nm_id', 'nm_copypaste_plugin'));
}

function nm_copypaste_plugin_admin() {
  osc_admin_render_plugin('nm_copypaste_plugin/admin/settings.php');
}

/**
 * Create a menu on the admin panel
 */
function nm_copypaste_plugin_admin_menu() {
  
    osc_add_admin_submenu_divider('plugins', 'Nomore Copy/Paste', 'nm_copypaste_plugin', 'administrator');
    osc_add_admin_submenu_page('plugins', __('Settings', 'nm_copypaste_plugin'), osc_route_admin_url('nm-copypaste-plugin-admin-conf'), 'nm_copypaste_plugin_settings', 'administrator');
}


function nm_script() {?>
<script type="text/javascript">
	$(function () {
		$('<?php echo dd_nm_id();?>').bind('cut copy paste', function (e) {
			e.preventDefault();
			//$(this).addClass('error');
			$(this).attr('placeholder', '<?php _e('Paste is not allowed', 'nm_copypaste_plugin'); ?>');
		});
	});
</script>
<style type="text/css">
	.error {
		border:1px solid #ff0000!important;
	}
</style>
<?php }


osc_add_route('nm-copypaste-plugin-admin-conf', 'nm_copypaste_plugin', 'nm_copypaste_plugin', osc_plugin_folder(__FILE__).'admin/settings.php'); 

osc_add_hook('footer', 'nm_script');
osc_add_hook('init_admin', 'nm_copypaste_plugin_actions');

// show menu items
osc_add_hook('admin_menu_init', 'nm_copypaste_plugin_admin_menu');

// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__) . "_uninstall", 'nm_copypaste_plugin_call_after_uninstall');
osc_add_hook(osc_plugin_path(__FILE__) . "_configure", 'nm_copypaste_plugin_admin');


// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'nm_copypaste_plugin_call_after_install');
?>

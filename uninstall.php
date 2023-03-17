<?php
/**
 * Perform Uninstall Actions.
 *
 * If uninstall not called from WordPress,
 * If no uninstall action,
 * If not this plugin,
 * If no caps,
 * then exit.
 *
 * @since 1.0.0
 */
function bbuster_uninstall() {

	if ( ! defined( 'WP_UNINSTALL_PLUGIN' )
		|| empty( $_REQUEST )
		|| ! isset( $_REQUEST['plugin'] )
		|| ! isset( $_REQUEST['action'] )
		|| 'bloat-buster/bloat-buster.php' !== $_REQUEST['plugin']
		|| 'delete-plugin' !== $_REQUEST['action']
		|| ! check_ajax_referer( 'updates', '_ajax_nonce' )
		|| ! current_user_can( 'activate_plugins' )
	) {

		exit;

	}

	/**
	 * It is now safe to perform uninstall actions here.
	 *
	 * @see https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/#method-2-uninstall-php
	 */

	$options = \Bloatbuster\Pages\Settings\Register::settings_name();
	
	foreach ( $options as $option ) {
		delete_option('_bbuster_' . $option );
	}
}

bbuster_uninstall();
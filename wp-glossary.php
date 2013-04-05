<?php
/**
 * Plugin Name: WP Glossary
 * Plugin URI: http://wordpress.org/extend/plugins/wp-glossary/
 * Description: Build a glossary of terms and link your post content to it.
 * Author: TCBarrett
 * Version: 2.beta-2
 * Author URI: http://www.tcbarrett.com/
 * Text Domain: wp-glossary
 * Domain Path: /lang/
 */
define( 'WPG_TEXTDOMAIN', 'wp-glossary' );

require_once( dirname(__FILE__) . '/class/wpg.class.php' );
require_once( dirname(__FILE__) . '/class/wpg-admin.class.php' );
require_once( dirname(__FILE__) . '/fn-lib.php' );

new WPG( dirname(__FILE__) );
new WPG_Admin();

add_action( 'admin_init', 'tcb_wpg_test' );
function tcb_wpg_test(){
	if( $prefix = $_GET['populate'] ):
		for( $i = 1; $i < 30; $i++ ):
			wp_insert_post( array('post_type'=>'glossary', 'post_title'=>$prefix . '-' . $i, 'post_status'=>'publish') );
		endfor;
	endif;
}

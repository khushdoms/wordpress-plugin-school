<?php
/*
Plugin Name:School
Description:CRUD plugin for schools
Version:1.0
Author:Kaushik
*/	

function create_table()
{
	global $wpdb;
	
	$tablename			= $wpdb->prefix.'school';
	$charset_collate	= $wpdb->get_charset_collate();
	$sql="CREATE TABLE $tablename (
			id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			principal VARCHAR(30) NOT NULL,
			contact VARCHAR(50)
		)";
	$wpdb->query($sql);
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
}

//run on activation
register_activation_hook(__FILE__,'create_table');

//menu items
add_action('admin_menu','school_modifying_menu');

function school_modifying_menu()
{
	//main menu
	add_menu_page('Schools'/*page title*/,'Schools'/*menu title*/,'manage_options'/*capabilities*/,'schools_list'/*menu slug*/,'schools_lists'/*function*/);
	
	//submenu
	add_submenu_page('schools_list'/*parent menu slug*/,'Add new'/*page title*/,'Add new'/*menu title*/,'manage_options'/*capabilities*/,'add_school'/*menu slug*/,'add_school'/*function*/);
	
	//hidden submenu, imp to create 
	add_submenu_page(null/*parent slug*/,'Update School'/*page title*/,'Update School'/*menu title*/,'manage_options'/*capabilities*/,'school_update'/*slug*/,'school_update'/*function*/);
	
	//hidden submenu, imp to create 
	add_submenu_page(null/*parent slug*/,'Delete School'/*page title*/,'Delete School'/*menu title*/,'manage_options'/*capabilities*/,'school_delete'/*slug*/,'school_delete'/*function*/);
}

define('ROOTDIR',plugin_dir_path(__FILE__));

 function enqueue_my_styles_scripts_in_admin() {
    wp_enqueue_style( 'custom-admin-css', plugin_dir_url( __FILE__ ) . '/css/bootstrap.min.css');
    wp_enqueue_style( 'style-admin-css', plugin_dir_url( __FILE__ ) . '/style-admin.css');
    wp_enqueue_script( 'custom-admin-script', plugin_dir_url( __FILE__ ) . '/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', 'enqueue_my_styles_scripts_in_admin' );
require_once(ROOTDIR.'schools-list.php');
require_once(ROOTDIR.'schools-create.php');
require_once(ROOTDIR.'schools-update.php');
require_once(ROOTDIR.'schools-delete.php');
?>
<?php

global $wpcom_api_key, $Scheduler_api_host, $Scheduler_api_port;

$wpcom_api_key    = defined( 'WPCOM_API_KEY' ) ? constant( 'WPCOM_API_KEY' ) : '';
$Scheduler_api_host = Scheduler::get_api_key() . '.rest.Scheduler.com';
$Scheduler_api_port = 80;

function Scheduler_test_mode() {
	return Scheduler::is_test_mode();
}

function Scheduler_http_post( $request, $host, $path, $port = 80, $ip = null ) {
	$path = str_replace( '/1.1/', '', $path );

	return Scheduler::http_post( $request, $path, $ip ); 
}

function Scheduler_microtime() {
	return Scheduler::_get_microtime();
}

function Scheduler_delete_old() {
	return Scheduler::delete_old_comments();
}

function Scheduler_delete_old_metadata() { 
	return Scheduler::delete_old_comments_meta();
}

function Scheduler_check_db_comment( $id, $recheck_reason = 'recheck_queue' ) {
   	return Scheduler::check_db_comment( $id, $recheck_reason );
}

function Scheduler_rightnow() {
	if ( !class_exists( 'Scheduler_Admin' ) )
		return false;
   
   	return Scheduler_Admin::rightnow_stats();
}

function Scheduler_admin_init() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_version_warning() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_load_js_and_css() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_nonce_field( $action = -1 ) {
	return wp_nonce_field( $action );
}
function Scheduler_plugin_action_links( $links, $file ) {
	return Scheduler_Admin::plugin_action_links( $links, $file );
}
function Scheduler_conf() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_stats_display() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_stats() {
	return Scheduler_Admin::dashboard_stats();
}
function Scheduler_admin_warnings() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_comment_row_action( $a, $comment ) {
	return Scheduler_Admin::comment_row_actions( $a, $comment );
}
function Scheduler_comment_status_meta_box( $comment ) {
	return Scheduler_Admin::comment_status_meta_box( $comment );
}
function Scheduler_comments_columns( $columns ) {
	_deprecated_function( __FUNCTION__, '3.0' );

	return $columns;
}
function Scheduler_comment_column_row( $column, $comment_id ) {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_text_add_link_callback( $m ) {
	return Scheduler_Admin::text_add_link_callback( $m );
}
function Scheduler_text_add_link_class( $comment_text ) {
	return Scheduler_Admin::text_add_link_class( $comment_text );
}
function Scheduler_check_for_spam_button( $comment_status ) {
	return Scheduler_Admin::check_for_spam_button( $comment_status );
}
function Scheduler_submit_nonspam_comment( $comment_id ) {
	return Scheduler::submit_nonspam_comment( $comment_id );
}
function Scheduler_submit_spam_comment( $comment_id ) {
	return Scheduler::submit_spam_comment( $comment_id );
}
function Scheduler_transition_comment_status( $new_status, $old_status, $comment ) {
	return Scheduler::transition_comment_status( $new_status, $old_status, $comment );
}
function Scheduler_spam_count( $type = false ) {
	return Scheduler_Admin::get_spam_count( $type );
}
function Scheduler_recheck_queue() {
	return Scheduler_Admin::recheck_queue();
}
function Scheduler_remove_comment_author_url() {
	return Scheduler_Admin::remove_comment_author_url();
}
function Scheduler_add_comment_author_url() {
	return Scheduler_Admin::add_comment_author_url();
}
function Scheduler_check_server_connectivity() {
	return Scheduler_Admin::check_server_connectivity();
}
function Scheduler_get_server_connectivity( $cache_timeout = 86400 ) {
	return Scheduler_Admin::get_server_connectivity( $cache_timeout );
}
function Scheduler_server_connectivity_ok() {
	_deprecated_function( __FUNCTION__, '3.0' );

	return true;
}
function Scheduler_admin_menu() {
	return Scheduler_Admin::admin_menu();
}
function Scheduler_load_menu() {
	return Scheduler_Admin::load_menu();
}
function Scheduler_init() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_get_key() {
	return Scheduler::get_api_key();
}
function Scheduler_check_key_status( $key, $ip = null ) {
	return Scheduler::check_key_status( $key, $ip );
}
function Scheduler_update_alert( $response ) {
	return Scheduler::update_alert( $response );
}
function Scheduler_verify_key( $key, $ip = null ) {
	return Scheduler::verify_key( $key, $ip );
}
function Scheduler_get_user_roles( $user_id ) {
	return Scheduler::get_user_roles( $user_id );
}
function Scheduler_result_spam( $approved ) {
	return Scheduler::comment_is_spam( $approved );
}
function Scheduler_result_hold( $approved ) {
	return Scheduler::comment_needs_moderation( $approved );
}
function Scheduler_get_user_comments_approved( $user_id, $comment_author_email, $comment_author, $comment_author_url ) {
	return Scheduler::get_user_comments_approved( $user_id, $comment_author_email, $comment_author, $comment_author_url );
}
function Scheduler_update_comment_history( $comment_id, $message, $event = null ) {
	return Scheduler::update_comment_history( $comment_id, $message, $event );
}
function Scheduler_get_comment_history( $comment_id ) {
	return Scheduler::get_comment_history( $comment_id );
}
function Scheduler_cmp_time( $a, $b ) {
	return Scheduler::_cmp_time( $a, $b );
}
function Scheduler_auto_check_update_meta( $id, $comment ) {
	return Scheduler::auto_check_update_meta( $id, $comment );
}
function Scheduler_auto_check_comment( $commentdata ) {
	return Scheduler::auto_check_comment( $commentdata );
}
function Scheduler_get_ip_address() {
	return Scheduler::get_ip_address();
}
function Scheduler_cron_recheck() {
	return Scheduler::cron_recheck();
}
function Scheduler_add_comment_nonce( $post_id ) {
	return Scheduler::add_comment_nonce( $post_id );
}
function Scheduler_fix_scheduled_recheck() {
	return Scheduler::fix_scheduled_recheck();
}
function Scheduler_spam_comments() {
	_deprecated_function( __FUNCTION__, '3.0' );

	return array();
}
function Scheduler_spam_totals() {
	_deprecated_function( __FUNCTION__, '3.0' );

	return array();
}
function Scheduler_manage_page() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_caught() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function redirect_old_Scheduler_urls() {
	_deprecated_function( __FUNCTION__, '3.0' );
}
function Scheduler_kill_proxy_check( $option ) {
	_deprecated_function( __FUNCTION__, '3.0' );

	return 0;
}
function Scheduler_pingback_forwarded_for( $r, $url ) {
	// This functionality is now in core.
	return false;
}
function Scheduler_pre_check_pingback( $method ) {
	return Scheduler::pre_check_pingback( $method );
}
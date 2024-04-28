<?php
/**
 * Plugin Name: TheRentalsHub Request Transfer
 * Plugin URI: https://www.therentalshub.com
 * Description: Capture transfer requests
 * Version: 1.0.0
 * Requires PHP: 8.0
 * Author: The Rentals Hub
 * License: MIT
 * Text Domain: therentalshub-request-transfer
 * Domain Path: /languages
 */

 /**
  * Globals.
  */
const TRHTR_ENVIRONMENT = 'prod';
const TRHTR_PLUGIN_NAME = 'therentalshub-request-transfer';
const TRHTR_NONCE_CONTEXT = 'mcEwPctRkT';
const TRHTR_API_ENDPOINT_DEV = 'http://fleet-haproxy-public:9015/requests/transfers';
const TRHTR_API_ENDPOINT_PROD = 'https://web-api.therentalshub.com/requests/transfers';

/**
 * Settings.
 */
function trhrt_settings_init()
{
   register_setting('trhrt', 'trhrt_options');

   add_settings_section(
      'trhrt_section_req_form_settings',
      __('TheRentalsHub Transfer Request Form Options', 'trhrt'),
      'trhrt_section_req_form_settings_callback',
      'trhrt'
   );

   add_settings_field(
		'trhrt_send_email',
      __('Send confirmation email', 'trhrt'),
		'trhrt_send_email_cb',
		'trhrt',
		'trhrt_section_req_form_settings',
		[
         'label_for' => 'trhrt_send_email',
			'class' => 'trhrt_row'
      ]
	);

   add_settings_field(
		'trhrt_notify_email',
      __('Send confirmation email to', 'trhrt'),
		'trhrt_notify_email_cb',
		'trhrt',
		'trhrt_section_req_form_settings',
		[
         'label_for' => 'trhrt_notify_email',
			'class' => 'trhrt_row'
      ]
	);

   add_settings_field(
		'trhrt_api_key',
      __('API key', 'trhrt'),
		'trhrt_api_key_cb',
		'trhrt',
		'trhrt_section_req_form_settings',
		[
         'label_for' => 'trhrt_api_key',
			'class' => 'trhrt_row'
      ]
	);
}

add_action('admin_init', 'trhrt_settings_init');

function trhrt_section_req_form_settings_callback($args)
{
   echo '<p id="'.esc_attr($args['id']).'">'.esc_html_e('Setup request form options and connection to your fleet management account.', 'trhrt').'</p>';
}

function trhrt_send_email_cb($args)
{
	$options = get_option('trhrt_options');
   ?>
	<select
			id="<?php echo esc_attr( $args['label_for'] ); ?>" 
			name="trhrt_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
		<option value="yes" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'yes', false ) ) : ( '' ); ?>>
			<?php esc_html_e('Yes', 'trhrt'); ?>
		</option>
 		<option value="no" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'no', false ) ) : ( '' ); ?>>
			<?php esc_html_e('No', 'trhrt'); ?>
		</option>
	</select>
	<p class="description">
		<?php esc_html_e('Send a confirmation email with the request details.', 'trhrt'); ?>
	</p>
	<?php
}

function trhrt_notify_email_cb($args)
{
   $options = get_option('trhrt_options');
   ?>
	<input type="text" 
			id="<?php echo esc_attr( $args['label_for'] ); ?>" 
			name="trhrt_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
         value="<?=(isset($options[$args['label_for']]) ? $options[$args['label_for']] : '');?>" style="width:350px"/>
	<p class="description">
		<?php esc_html_e('You will be notified to this email when a requests is submitted.', 'trhrt' ); ?>
	</p>
	<?php
}

function trhrt_api_key_cb($args)
{
	$options = get_option('trhrt_options');
   ?>
	<input type="text" 
			id="<?php echo esc_attr( $args['label_for'] ); ?>" 
			name="trhrt_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
         value="<?=(isset($options[$args['label_for']]) ? $options[$args['label_for']] : '');?>" style="width:350px"/>
	<p class="description">
		<?php esc_html_e('Your fleet management account API key.', 'trhrt' ); ?>
	</p>
	<?php
}

function trhrt_options_page()
{
   add_menu_page(
      'TheRentalsHub',
      'TRH Transfers',
      'manage_options',
      'trhrt-request-form-options',
      'trhrt_options_page_html'
   );
}

add_action('admin_menu', 'trhrt_options_page');

function trhrt_options_page_html()
{
   if (!current_user_can('manage_options')) {
		return;
	}

   if (isset($_GET['settings-updated'])) {
		add_settings_error('trhrt_messages', 'trhrt_message', __('Settings Saved', 'trhrt'), 'updated');
	}

   settings_errors('trhrt_messages');
   ?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			settings_fields('trhrt');
			do_settings_sections('trhrt');
			submit_button('Save Settings');
			?>
		</form>
	</div>
	<?php
}

/**
 * CSS and Javascript for request form.
 */
function trhrt_register_plugin_scripts()
{
   // css
   wp_enqueue_style('therentalshub-request-transfer', plugins_url(TRHTR_PLUGIN_NAME.'/css/request-transfer-form.css'));

   wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap-grid.min.css');

   wp_enqueue_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css');

   // js
   wp_enqueue_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js', ['jquery'], false, ['in_footer' => true]);

   $requestJs = 'request-transfer-form';

   if (TRHTR_ENVIRONMENT != 'dev') {
      $requestJs = 'request-form-vRewkNwP';
   }

   wp_enqueue_script('therentalshub-request-transfer', plugins_url(TRHTR_PLUGIN_NAME.'/js/'.$requestJs.'.js'), ['jquery', 'flatpickr'], false, ['strategy' => 'defer', 'in_footer' => true]);

   $nonce = wp_create_nonce(TRHTR_NONCE_CONTEXT);

   wp_localize_script(
      'therentalshub-request-transfer',
      'trhrt_ajax_obj',
      [
         'ajax_url' => admin_url('admin-ajax.php'),
         'nonce' => $nonce,
      ]
   );
}

add_action('wp_enqueue_scripts', 'trhrt_register_plugin_scripts');

/**
 * The request form.
*/
function trhrt_request_form_shortcode()
{
   ob_start();
   require 'request-transfer-form.php';
   $html = ob_get_contents();
   ob_end_clean();

   return $html;
}

add_shortcode('trhrt_request_form', 'trhrt_request_form_shortcode');

/**
 * AJAX handler for submitted form.
 */
function ajax_trhtr_submit_form()
{
   // generic error
   $error = __('Request registration is currently not available', 'trhrt');

   header('Content-Type: application/json', true);

   if (check_ajax_referer(TRHTR_NONCE_CONTEXT) === false) {

      echo '{"error":"'.$error.'"}';
      
      wp_die();
   }

   if(($result = trhtrProcessRequest((object) $_POST)) != '') {

      echo '{"error":"'.$result.'"}';

      wp_die();
   }

   echo '{"msg":"OK"}';

   wp_die();
}

if ( is_admin() ) {

   add_action('wp_ajax_nopriv_trhtr_submit_transfer_form', 'ajax_trhtr_submit_form');
   add_action('wp_ajax_trhtr_submit_transfer_form', 'ajax_trhtr_submit_form');
}

/** 
 * Processes the request.
 */
function trhtrProcessRequest($vars)
{
   // check for missing vars
   if (!isset($vars->type) || !isset($vars->arvd) || !isset($vars->arvt) || !isset($vars->arvp) 
      || !isset($vars->arvfl) || !isset($vars->arvtl) || !isset($vars->arvf) || !isset($vars->dptd) 
         || !isset($vars->dptt) || !isset($vars->dptp) || !isset($vars->dptfl) 
            || !isset($vars->dpttl) || !isset($vars->dptf) || !isset($vars->fname) 
               || !isset($vars->lname) || !isset($vars->email) || !isset($vars->phone)|| !isset($vars->notes)) {

      return __('Missing vars, cannot continue', 'trhrt');
   }

   // validate email at least
   if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i', $vars->email)) {
      
      return __('Invalid email address provided.', 'trhrt');
   }

   // get needed options
   $options = get_option('trhrt_options');
   $apiKey = $options['trhrt_api_key'];
   $notifyUser = $options['trhrt_send_email'];
   $notifyEmail = $options['trhrt_notify_email'];
   $options = null;

   // vars to json
   $json = json_encode($vars, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

   // send to api
   $response = wp_remote_post((TRHTR_ENVIRONMENT == 'dev' ? TRHTR_API_ENDPOINT_DEV : TRHTR_API_ENDPOINT_PROD), [
      'headers' => [
         'Content-Type' => 'application/json',
         'X-Api-Key' => $apiKey
      ],
      'body' => $json
   ]);

   if ((int) $response['response']['code'] != 201) {

      $resultJson = json_decode($response['body'], false);
      return $resultJson !== null ? $resultJson->error : __('An error occured, please try again.', 'trhrt');
   }

   // send email to user
   if ($notifyUser == 'yes') {

      wp_mail($vars->email, __('Your booking request confirmation', 'trhrt'), trhtrEmailTemplate($vars), [
         'Content-Type: text/html; charset=UTF-8'
      ]);
   }

   // send email to admin
   if ($notifyEmail != '') {

      if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i', $notifyEmail)) {

         wp_mail($notifyEmail, __('New booking request', 'trhrt'), trhtrEmailTemplateAdmin($vars), [
            'Content-Type: text/html; charset=UTF-8'
         ]);
      }
   }

   // done
   return '';
}

/**
 * Creates email templates.
 */
function trhtrEmailTemplate($vars)
{
   ob_start();
   require 'email-template.php';
   $html = ob_get_contents();
   ob_end_clean();

   return $html;
}

function trhtrEmailTemplateAdmin($vars)
{
   ob_start();
   require 'email-template-admin.php';
   $html = ob_get_contents();
   ob_end_clean();

   return $html;
}
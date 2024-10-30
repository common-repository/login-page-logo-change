<?php
/*
Plugin Name: Login Page Logo Change
description: Allow you to add a custom logo to your WordPress login page instead of the default WordPress logo and also allows you to customize the height, width, margin, and padding of the logo.
Version: 1.0.0
Author: Softices
Author URI: https://softices.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
*/ 

add_action('admin_menu', 'lplc_wordpress_login_logo_menu');
function lplc_wordpress_login_logo_menu() {
	add_menu_page('Login Page Logo Change', 'Login Page Logo Change', 'administrator', __FILE__, 'lplc_wordpress_login_logo_menu_page','dashicons-format-image',99999);
	add_action( 'admin_init', 'lplc_register_wordpress_login_logo_menu_settings' );
}

function lplc_register_wordpress_login_logo_menu_settings() {
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'uploaded-logo-img-url' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'logo-image-url' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_width_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_height_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_margin_top_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_margin_right_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_margin_bottom_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_margin_left_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_padding_top_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_padding_right_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_padding_bottom_px' );
	register_setting( 'lplc_register_wordpress_login_logo_menu_settings_group', 'login_logo_padding_left_px' );
}

function lplc_wordpress_login_logo_menu_page() {
	wp_enqueue_script('jquery');
	wp_enqueue_media();
	?>
	<div class="wrap">
	<h1>Admin Login Page Logo Change</h1>
		<form id='admin-logo-form' method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'lplc_register_wordpress_login_logo_menu_settings_group' ); ?>
			<?php do_settings_sections( 'lplc_register_wordpress_login_logo_menu_settings_group' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Upload Logo</th>
					<td>
						<input type='text' id='logo-image-url' value='<?php echo esc_attr( get_option('uploaded-logo-img-url')); ?>' name='logo-image-url'>
						<input type='button' value='Upload Image' id='upload-image-logo-btn' class='button-secondary'>
						<input type='hidden' id='uploaded-logo-img-url' value='<?php echo esc_attr( get_option('uploaded-logo-img-url')); ?>' name='uploaded-logo-img-url'>
						
					</td>	
				</tr>
				<tr valign="top">
					<th scope="row">Height (px.)</th>
					<td>
						<input type='number' value='<?php echo esc_attr( get_option('login_logo_height_px')); ?>' name='login_logo_height_px'>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Width (px.)</th>
					<td>
						<input type='number' value='<?php echo esc_attr( get_option('login_logo_width_px')); ?>' name='login_logo_width_px'>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Margin (px.)</th>
					<td>
						<div class='wrapper_field' style='display:flex;'>
							<div class='wrap_field'>
								<input type='number' class='number_field' style="width:100px" placeholder='Top' value='<?php echo esc_attr( get_option('login_logo_margin_top_px')); ?>' name='login_logo_margin_top_px'>
								<p><i>Top</i></p>
							</div>
							<div class='wrap_field'>
								<input type='number' class='number_field' placeholder='Right' style="width:100px"value='<?php echo esc_attr( get_option('login_logo_margin_right_px')); ?>' name='login_logo_margin_right_px'>
								<p><i>Right</i></p>
							</div>
							<div class='wrap_field'>
								<input type='number' class='number_field' placeholder='Bottom' style="width:100px" value='<?php echo esc_attr( get_option('login_logo_margin_bottom_px')); ?>' name='login_logo_margin_bottom_px'>
								<p><i>Bottom</i></p>
							</div>
							<div class='wrap_field'>
								<input type='number' class='number_field' placeholder='Left' style="width:100px" value='<?php echo esc_attr( get_option('login_logo_margin_left_px')); ?>' name='login_logo_margin_left_px'>
								<p><i>Left</i></p>
							</div>
						</div>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Padding (px.)</th>
					<td>
						<div class='wrapper_field' style='display:flex;'>
							<div class='wrap_field'>
								<input type='number' class='number_field' style="width:100px" placeholder='Top' value='<?php echo esc_attr( get_option('login_logo_padding_top_px')); ?>' name='login_logo_padding_top_px'>
								<p><i>Top</i></p>
							</div>
							<div class='wrap_field'>
								<input type='number' class='number_field' placeholder='Right' style="width:100px"value='<?php echo esc_attr( get_option('login_logo_padding_right_px')); ?>' name='login_logo_padding_right_px'>
								<p><i>Right</i></p>
							</div>
							<div class='wrap_field'>
								<input type='number' class='number_field' placeholder='Bottom' style="width:100px" value='<?php echo esc_attr( get_option('login_logo_padding_bottom_px')); ?>' name='login_logo_padding_bottom_px'>
								<p><i>Bottom</i></p>
							</div>
							<div class='wrap_field'>
								<input type='number' class='number_field' placeholder='Left' style="width:100px" value='<?php echo esc_attr( get_option('login_logo_padding_left_px')); ?>' name='login_logo_padding_left_px'>
								<p><i>Left</i></p>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<?php submit_button(); ?>
					</th>
					<td></td>
				</tr>
			</table>
		</form>
	<script type='text/javascript'>
		jQuery(document).ready( function($){
		var mediaUploader;
		$('#upload-image-logo-btn').on('click',function(e) {
			e.preventDefault();
			if( mediaUploader ){
				mediaUploader.open();
				return;
			}
			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'Select a Image',
				button: {
					text: 'Select Image'
				},
				multiple: false
			});
			
			mediaUploader.on('select', function(){
				logo = mediaUploader.state().get('selection').first().toJSON();
				$('#uploaded-logo-img-url').val(logo.url);
			});
			
			mediaUploader.open();
			
		});
		
	});
	</script>
	<style>

	</style>
	</div>
<?php }


function lplc_wordpress_login_logo()
{ 
	if(get_option('uploaded-logo-img-url')!='' && get_option('uploaded-logo-img-url')!=null)
	{
		$logo_url=get_option('uploaded-logo-img-url');
		if(get_option('login_logo_width_px')!='' && get_option('login_logo_width_px')!=null)
		{
			$logo_width=get_option('login_logo_width_px').'px';
		}
		else
		{
			$logo_width='100%';
		}
		if(get_option('login_logo_height_px')!='' && get_option('login_logo_height_px')!=null)
		{
			$logo_height=get_option('login_logo_height_px').'px';
		}
		else
		{
			$logo_height='100px';
		}
		
		if(get_option('login_logo_margin_top_px')!='' && get_option('login_logo_margin_top_px')!=null)
		{
			$mt=get_option('login_logo_margin_top_px').'px';
		}
		else
		{
			$mt='0';
		}
		if(get_option('login_logo_margin_right_px')!='' && get_option('login_logo_margin_right_px')!=null)
		{
			$mr=get_option('login_logo_margin_right_px').'px';
		}
		else
		{
			$mr='0';
		}
		if(get_option('login_logo_margin_bottom_px')!='' && get_option('login_logo_margin_bottom_px')!=null)
		{
			$mb=get_option('login_logo_margin_bottom_px').'px';
		}
		else
		{
			$mb='0';
		}
		if(get_option('login_logo_margin_left_px')!='' && get_option('login_logo_margin_left_px')!=null)
		{
			$ml=get_option('login_logo_margin_left_px').'px';
		}
		else
		{
			$ml='0';
		}
		
		if(get_option('login_logo_padding_top_px')!='' && get_option('login_logo_padding_top_px')!=null)
		{
			$pt=get_option('login_logo_padding_top_px').'px';
		}
		else
		{
			$pt='0';
		}
		if(get_option('login_logo_padding_right_px')!='' && get_option('login_logo_padding_right_px')!=null)
		{
			$pr=get_option('login_logo_padding_right_px').'px';
		}
		else
		{
			$pr='0';
		}
		if(get_option('login_logo_padding_bottom_px')!='' && get_option('login_logo_padding_bottom_px')!=null)
		{
			$pb=get_option('login_logo_padding_bottom_px').'px';
		}
		else
		{
			$pb='0';
		}
		if(get_option('login_logo_padding_left_px')!='' && get_option('login_logo_padding_left_px')!=null)
		{
			$pl=get_option('login_logo_padding_left_px').'px';
		}
		else
		{
			$pl='0';
		}
		
		$padding=$pt.' '.$pr.' '.$pb.' '.$pl;
		$margin=$mt.' '.$mr.' '.$mb.' '.$ml;
		if($margin=='0 0 0 0')
		{
			$margin='0 auto 25px';
		}
		?>
		<style type='text/css'>
		#login h1 a, .login h1 a {
		background-image: url(<?php echo esc_attr($logo_url); ?>) !important;
		height:<?php echo esc_attr($logo_height);?> !important;
		width:<?php echo esc_attr($logo_width);?> !important;
		background-size:100% !important;
		background-position: center !important;
		margin:<?php echo esc_attr($margin);?> !important;
		padding:<?php echo esc_attr($padding);?> !important;
		}
		</style>
	<?php 
	}
	
}
add_action( 'login_enqueue_scripts', 'lplc_wordpress_login_logo',9999999999999 );

function lplc_wordpress_admin_login_logo_url() { 
	 return home_url(); 
	 }
add_filter( 'login_headerurl', 'lplc_wordpress_admin_login_logo_url' );

?>
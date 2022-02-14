<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<form method="post" class="woocommerce-ResetPassword lost_reset_password reset_password_form">

	<p class="lost_password_form_title"><?php echo apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" placeholder="<?php esc_html_e( 'New password', 'woocommerce' ); ?>" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" placeholder="<?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?>" />
	</p>

	<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
	<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

	<div class="clear"></div>

	<?php do_action( 'woocommerce_resetpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>
	</p>

	<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>

</form>
<style>
    form.reset_password_form {
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    form.reset_password_form p.woocommerce-form-row {
        width: 100%;
    }
    form.reset_password_form p.woocommerce-form-row input {
        border: 1px solid #e5e5e5;
        padding: 13px 15px;
        color: #bdbdbd;
        font-size: 14px;
        background: #fff;
        border-radius: 10px;
        line-height: 1.6;
    }
    form.reset_password_form p.woocommerce-form-row input::placeholder,
    form.reset_password_form .show-password-input::after {
        color: #bdbdbd;
    }
    form.reset_password_form p.woocommerce-form-row input:focus::placeholder {
        color: #fff;
    }
    form.reset_password_form .lost_password_form_title {
        text-align: center;
        margin-bottom: 32px;
    }
    form.reset_password_form .button{
        padding: 12px 18px;
    }
    form.reset_password_form {
        text-align: center;
    }
    form.reset_password_form .form-row {
        padding: 0;
        margin: 0;
    }
    form.reset_password_form .form-row input.input-text {
        margin-bottom: 12px;
    }
    form.reset_password_form .form-row .button{
        margin-top: 24px;
    }
</style>
<?php
do_action( 'woocommerce_after_reset_password_form' );


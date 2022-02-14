<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="login__register_forms_wrapper">

<?php
do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-6">

<?php endif; ?>


		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>
	    	<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
    
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row login_form_buttons_wrapper">
                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			</p>
			

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 col-6">


		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>
            <h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?>" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Email address', 'woocommerce' ); ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>
<style>
    #customer_login {
        display: flex;
        padding-top: 30px;
        padding-bottom: 120px;
    }
    #customer_login h2{
        color: #4285f4;
        margin-bottom: 32px;
        font-size: 24px;
        text-align: center;
        line-height: 1.8;
    }
    #customer_login input[type="text"],
    #customer_login input[type="email"],
    #customer_login input[type="password"] {
        padding: 13px 15px;
        border: 1px solid #e5e5e5;
        color: #bdbdbd;
        font-size: 14px;
        margin-bottom: 15px;
        background: #fff;
        border-radius: 10px;
        width: 100%;
        line-height: 1.6;
    }
    #customer_login input[type="text"]::placeholder,
    #customer_login input[type="email"]::placeholder,
    #customer_login input[type="password"]::placeholder {
        color: #bdbdbd;
    }
    #customer_login input[type="text"]:focus::placeholder,
    #customer_login input[type="email"]:focus::placeholder,
    #customer_login input[type="password"]:focus::placeholder {
        color: #fff;
    }
    #customer_login .woocommerce-form-login__submit,
    #customer_login .woocommerce-form-register__submit {
        padding: 11px 65.5px;
    }
    #customer_login .login_form_buttons_wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        height: 100%;
    }
    #customer_login .login_form_buttons_wrapper > a {
        line-height: 1.2;
        color: 
    }
    #customer_login .form-row {
        padding: 0;
        margin: 0;
    }
    #customer_login .woocommerce-form-login__submit {
        margin-top: auto;
    }
    #customer_login .woocommerce-form-login {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .login__register_forms_wrapper .woocommerce-notices-wrapper {
        padding-left: 15px;
        padding-right: 15px;
    }
    @media(max-width: 768px){
        #customer_login .col-6 {
            width: 100%;
            max-width: 100%;
            flex: 0 0 100%;
            padding: 0;
        }
        #customer_login {
            flex-wrap: wrap;
        }
        #customer_login .col-6:first-child{
            margin-bottom: 48px;
        }
        #customer_login .col-6:first-child .button {
            margin-top: 15px;
        }
        .login__register_forms_wrapper{
            padding-top: 30px;
        }
        .login__register_forms_wrapper .woocommerce-notices-wrapper {
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
</div>
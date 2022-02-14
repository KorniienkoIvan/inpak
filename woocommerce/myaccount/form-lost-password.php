<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<form method="post" class="woocommerce-ResetPassword lost_reset_password">
    <?php 
        if(get_locale() == "uk"){
            $title = "Забули пароль?";
            $text = "Будь ласка, введіть ваш логін або адресу електронної пошти. Ви отримаєте електронною поштою посилання для створення нового паролю.";
        }
        elseif( get_locale() == "ru_RU") {
            $title = "Забыли пароль?";
            $text = "Введите ваш логин или адрес электронной почты. Вы получите ссылку по электронной почте для создания нового пароля.";
        }
    ?>
    <p class="lost_password_form_title"><?php echo $title; ?></p>
	<p class="lost_password_form_text"><?php echo $text; ?></p>
    <div class="lost_password_form_wrapper">
        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="<?php esc_html_e( 'Username or email', 'woocommerce' ) ?>" />
        </p>

        <div class="clear"></div>

        <?php do_action( 'woocommerce_lostpassword_form' ); ?>

        <p class="woocommerce-form-row form-row">
            <input type="hidden" name="wc_reset_password" value="true" />
            <button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
        </p>
    </div>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
<?php
do_action( 'woocommerce_after_lost_password_form' );

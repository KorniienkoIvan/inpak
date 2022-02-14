	</div>

	<?php if(!is_checkout()): ?>
		<footer id="footer" class="footer">
			<div class="left-col">
				<?php $footer_logo = get_field('footer_logo', 'option'); ?>
				<?php $under_logo_text = get_field('under_logo_text', 'option'); ?>
				<div class="container">
					<?php if($footer_logo) : ?>
						<div class="logo">
							<img src="<?php echo $footer_logo; ?>" alt="" width="385" height="130">
						</div>
					<?php endif; ?>
					<?php if($under_logo_text) : ?>
						<div class="developed_by"><a href="<?php echo $under_logo_text['url'] ?>"><?php echo $under_logo_text['title'] ?></a></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="right-col">
				<div class="container">
					<div class="footer-data-wrapper">
						<div class="footer-menu">
							<?php 		
								wp_nav_menu( [
								'theme_location'  => 'footer-menu',
								'menu'            => '',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => '',
								] );
							?>
						</div>
						<div class="row footer-data">
							<?php $phone_numbers = get_field('footer_phone_number', 'option'); ?>
							<?php $emails = get_field('footer_emails', 'option'); ?>
							<?php $address = get_field('footer_address', 'option'); ?>
							<?php $social_media = get_field('social_media', 'option'); ?>
							<?php $under_footer_text = get_field('under_footer_text', 'option'); ?>
							<?php if($phone_numbers) : ?>
								<div class="col-md-6 col-12 phone-numbers data-col-wrapper">
									<div class="icon">
										<img src="<?php echo get_template_directory_uri() ?>/assets/img/footer_phone.svg" alt="">
									</div>
									<div class="data-col">
										<?php echo $phone_numbers; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if($emails) : ?>
							<div class="col-md-6 col-6 email data-col-wrapper">
								<div class="icon">
									<img src="<?php echo get_template_directory_uri() ?>/assets/img/footer_mail.svg" width="30" height="20" alt="">
								</div>
								<div class="data-col">
									<?php echo $emails; ?>
								</div>
								
							</div>
							<?php endif; ?>
							<?php if($address) :  ?>
								<div class="col-md-9 col-12 address data-col-wrapper">
									<div class="icon">
										<img src="<?php echo get_template_directory_uri() ?>/assets/img/footer_place.svg" alt="" width="25" height="30">
									</div>
									<div class="data-col">
										<?php echo $address; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if(have_rows('social_media', 'option')): ?>
								<div class="col-md-3 col-6 icons">
									<?php while(have_rows('social_media', 'option')): the_row(); ?>
										<?php $link = get_sub_field('link'); ?>
										<?php $icon = get_sub_field('icon'); ?>
										<a href="<?php echo $link ?>"><img src="<?php echo $icon; ?>" width="30" height="30" alt=""></a>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<?php if($under_footer_text): ?>
								<div class="col-12 copyright">
									<?php echo $under_footer_text; ?>
								</div>
							<?php endif; ?>
						</div>
						
					</div>
				</div>
				<?php $under_footer_text = get_field('under_footer_text', 'option'); ?>
				<div class="tablet under_footer_text">
					<?php echo $under_footer_text; ?>
				</div>
			</div>
			<div class="developed_by mobile">
				<a href="<?php echo $under_logo_text['url'] ?>"><?php echo $under_logo_text['title'] ?></a>
			</div>
		</footer>
	<?php else: ?>
		<footer class="checkout_footer">
			<div class="container">
				<?php $checkout_footer_text = get_field('checkout_footer_text', 'option'); ?>
				<?php if($checkout_footer_text): ?>
					<div class="footer_text">
						<?php echo $checkout_footer_text; ?>
					</div>
				<?php endif; ?>
			</div>
		</footer>
	<?php endif; ?>
	<?php wp_footer(); ?>
</body>
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<?php 
global $current_user;
get_currentuserinfo();
?>
<script>
	jQuery(document).ready(function(){
		var pageLink = window.location.href;
		console.log(pageLink);
		console.log("<?php echo get_home_url() ?>/#lost-password-list");
		if(pageLink == "<?php echo get_home_url() ?>/#lost-password-list"){
			jQuery('.woocommerce_message').addClass('lost-password-list');
			jQuery('.woocommerce_message').html('<?php if(get_locale() == "uk"){echo 'Лист для відновлення паролю надіслано.';}elseif(get_locale() == "ru_RU"){echo 'Письмо для восстановления пароля отправлено.';} ?>')
		}
	});

	jQuery(document).ready(function(){
		jQuery('.contact_form_wrapper input[type="email"]').attr('value', '<?php echo $current_user->user_email; ?>');
		jQuery('.contact_form_wrapper input[type="text"]').attr('value', '<?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>');
	});
</script>
</html>




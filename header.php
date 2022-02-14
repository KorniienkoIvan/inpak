<!DOCTYPE html>
<html <?php //language_attributes(); ?> lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
<!-- 	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" /> -->
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WHSDS5Z');</script>
<!-- End Google Tag Manager -->

</head>
<?php global $woocommerce; ?>
<style>
	.error404 header,
	.error404 footer {
		display: none;
	}
</style> 

<?php if(is_404()): ?>
 <?php $classes = 'hide-footer hide-header'; ?>
<?php else: ?>
 <?php $classes = ""; ?>
<?php endif;

 if(isset($_GET['orderby'])) :
  $orderby = $_GET['orderby'];
 
  if ($orderby == 'title') : 
   $orderClass = 'order-by-title';
  elseif ($orderby == 'price') : 
   $orderClass = 'order-by-price';
  elseif ($orderby == 'price-desc') : 
   $orderClass = 'order-by-price-desc';
  endif;
 else : 
	$orderClass = "";
 endif;
 
 $classes = $classes . " " . $orderClass;
 ?>
<body <?php body_class($classes); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHSDS5Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
	<?php if(!is_checkout()): ?>
	<header id="header" class="header">
		<div class="top-header">
			<div class="container">
				<div class="left-column">
					<?php $city = get_field( 'city', 'option' ); ?>
					<?php if($city): ?>
						<div class="place-wrapper">
							<div class="chosen-place text-m"><?php echo $city; ?></div>
						</div>
					<?php endif; ?>
				</div>
				<?php $logo = get_field('header_logo', 'option') ?>
				<?php if($logo) : ?>
					<div class="logo-wrapper">
                        <a href="<?php echo get_home_url() ?>">
                            <svg width="160" height="54" viewBox="0 0 160 54" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="160" height="54" fill="url(#pattern0)"/>
                                <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_3004_2941" transform="translate(-0.00286145) scale(0.00135542 0.00401606)"/>
                                </pattern>
                                <image id="image0_3004_2941" width="742" height="249" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuYAAAD5CAYAAABrhvA0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAFjdJREFUeNrs3W9SG0fCwOFxNuWvy1t8dq18AssnsDiB8QksTgA+AXAC7BMgnwB8AssnMD5BlPJn17JfXeXk7baaWCH8MULq7pl5nqopkewGST0D/DTqaTUNAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADA3Txo04P9/HBzGG5GYXsStkHY4j9v2I2s2FnYztPtp7BNH339MjMsAECvwzzE+Ha4eR62bRFOQTHMT8P2RqQDAL0J8xDjMcD3wvaymZ8Zh5pMw/Y2BPrEUAAAnQzzhSDfbZwdp36zsO2EQJ8aCgCgM2EeonwUbo4bZ8hpn2kK9JmhAABaG+bpLPl+Mz9TDm0VLxZ9ZXoLANDKMA9RPgg3J818dRXogkmI8x3DAAC0JszT0ofvG3PJ6Z5p2F6EQD83FABA1WEuyumBuAb6ljgHAKoNc1GOOAcA+KdfMkf5hiinR+KL0CPDAABUF+ainB4ahxekVhwCAOoJ8xAnB43VV+inozSFCwDgWlnmmKco+Wi46bGzR1+/PDUMAMB1cp0xN8+Wvhumd40AAK609jPmIUbG4ebYUMP3Twd9bJUWAOAqOc6Y7xtm+C5e+OxCUAAgf5ins+UDwwx/2U3LhgIA5Avz4KUhhr+JUb5tGACAbGH++eHmINyMDDH8w64hAACyhXnjrCBcZ5heuAIAZAnz54YXvHAFAMqH+cjwwrWeGQIAYO1h/vnhpiiHmw0NAQCw9jAXHXCrgWUTAYBFv67p+woO+LkXsNO2Pej0guLixfcgbWfN/JNNzx99/XJm1wJAPWH+xNBCd4QYjxerxgu6R80tHxoW/r9NCvX4ouOtUAeAsmHujDncbtRUfMY8nRnfa+brrt/1Z3qYtr3wfWbh9jAE+sQuB4Dr/WIIgMtBHraD8OVvYdtfwQvtQdiOw/f8LZ15BwCEOXBLlMez3B9XFORXBfpJuI8TF74CgDAHro/ycYrywZrvKp41/5heBAAAwhxYiPKjcHOc8S5j/L8X5wAgzIEfUX7QzC/yzG1DnAOAMAeav6av7Bd8CBdxPrA3ABDmQF+jPJ6pPqrgocQ4P7FHABDmQF8dN/V85sAwTakBAGEO9EeawlLb3O59U1oAEOZAn6I8niU/qvTh7dtDAAhzoC/iOuK1fsDP2FlzAIQ50Be7lT++sV0EgDAHOi2dja593fCX9hQAwhzouu0WPMaB6SwACHOg65615HGO7CoAhDnQZcOWPM4ndhUAffOrIYCszsN2GrZ3j75+OS1w/wMvIABAmEOfXcT4pNQDSOuXAwDCHPoZ4/E2BPl5BY/HWWgAEOYgxgEAhDms11nY3oZtUnmMe6EAAMIcOhvj8cz4rA0PODzOs88PN+05ABDmIMYrEM+at+Ei0JnDDQBhDlwOxDhv/E2LY/zyi4tRCx7nJ4ceAMIcuIjxt3H6R8ee24eWhPnUYQiAMAcxftbh5xmf437lj/G84/sAAIQ5XA7AhRif9uEJpwtA44uQQeUvHgBAmENPYjx+CmdfAzBewFrzWfM3DlMAhDmI8T6YVBzmU9NYABDm0D0XMT4xFD/E1WU+P9x8Hb7cq/DhHdpDAAhz6FCMN/O1xn3S5c0BPG7qWtP8tC9z/QFAmCPG+S6O0+eHmzvhy5NKHlLcbzv2DADCHNrn4lM4J2J86Tg/rWhKywv7EQBhDu2L8dOOfApnDXH+KsT5IHy5XfBh7JjCAgDCHDHOfApJjPNhoSif2AUAIMypUwzwPnwKZxXSFJKnnx9uHjfzC0JFOQAIc8S4GC8Y6Dshzj+FL48y7GvTVwBAmCPGuSHOX4c4n6Y4H63hLuLFpocu9AQAYU55PoWz/jiPL5K2QqDHC0J3VxTokxTkMyMMAFd7sI5vGv6gv2/Wc7YNMU5m4ec5XhT6spmv3DK4w3/qwl0AEOaIcdb0sx3DfNj8WMHlSTP/9NAY3r+nfzeNUW66CgAIc8ryKZwAAEswxxwxDgAgzBHjAAAIc+7KxXwAAMIcMQ5AH/3yr3+N0pejhX/9bMm/af9b+Dq+43v2x7dv3vlFmCPGAWAhwAcpvuOKTxcrQG2s8C5G19xvvJk28xWmPqVYn9ojCHNKib+MfAonADlDPEZ3/IyEZ+l2o+DDGV0T69+vpwqhPrPHWDfLJYpxMc7iH6JcP7uH4Y/cwYof+585xig87geV7bNWPu+Mx1pfbdV6xnchxp+n27b4693kGiM9jGv8nbrfh9+B4bmOw81xobufhDHYWdc3d8a8f+I8uokYByBzTA1SOJY+M76si6k1R+G5xL+jb0Kg+Tua/zj6vg+6GOXCvF8x7lM4ASgZ5OMOPa34XMbhucW/qa9Mc8ka5e8LvbBbe5QLczEOAOuKqBhPRx0L8svi2f/t8FwPw+1rq7uIcmGOGAegtoiKwXrctHPKyjLiOwLPw/PeMb1lbS/yOh/lwrw7ps18zvjEUABQOKC6fpb8Ot/P6IYxiFNb/D0W5cK8h+Kr8lchyKeGAoBKAmrY42GIY3Acl1oU560/prJHuTBvt8MQ5AeGAYAKAqrk/N8aifPV6FWUC/N2ivPItyx1CIAoF+cdPq6O+xbl35+3Xd8qMcYfi3IAKomnkvN/2+AovXDh7lE+7luUC/P2RXk8U24pJgBqIcpv9n3OuWEQ5cK8W2KMvxDl3fH54eY4bCMjAbQ4oOLqK84G324YxurAMPzUMbXX5ygX5u0Ro3xmGFof49thOw7bf5v5GRRhDrQ1oOLvrz0j8dP20yegcv0xFYP8qM9RHrn4s36vLYfY6hiPZ5NepjMA3u4FusL0jCXiPGw7huHaKC9xTFUV5cK8frOwHRqG1sX4IIV4DPKBEQE6FlEHlf1ui9dgXTXVM54MqWmqzTh9+JBpqX8/nkaiXJi3xaF55a2J8Y2FGDfnEuhqRMXfdbuF7j7+PTwN24ewzUJUTe8Yf/HFxLOwbTfl3sGMfydeO5L+2i/x7+WJKBfmbTALUT4xDNXHePwF/zzdAnTduEDUxgB/E0LqdNlvsBDx8e/qTgjC7fQCY5T5ubwU5n+L8hKr+lQb5cK8bm8NQbVBfhHjY6MB9EzOs+XxDPnOfYL8hlCP3/M0BfpxxjiMK7QMwv3PRLkov3Js/I6p1sQQVBXjw4UVVU5EOdDDmBo1+eaWx3njT9cR5VcE+uN0f7ls9/w42sj8Yqg1UR45Y16nM8sj1hHjzfxtx+3GRZwALzPdTzxTvpXrIsl4PyEWt8KXHzP9ro/z3Hs5nWXhk2JzX4vViigX5vWaGoJiMT5IIe4iTuiGrbtcJJghTGKUjFo6lrnO9L7IvXJJivOdFI3r1su/LaJcmLfZJ0OQNcY3FmJ8ZEQA/hFVMaZyTD2YlHohFe83PM9phr8Dg54eRieiXJi31cwQZAnycWNFFYCfMcp0P6U/u+NNjuca5+vX9E5Ohudb4tOuWxflwrxe1i5fX4wvLm/okzgBfs6zTCE1K/kk48WgISLt7dVH+ViUC/PWevT1y5lRWGmMu4gT4H5y/O58V8lznTbrP7s7bHpwPVmI8iNRLszh4iLOcQpyMQ5w/5Bcp/N1L414B7MM99H5d2xDlMe/wXuiXJh3Iiotl7jUuG0sxLgVVQBWE1g5fp9OK3rKv9vrK4nyY1EuzLti0LgA9C4xvjhvHIDVynF294NhFuV9j3JhXneYc3OQu4gToDthXtO1Vf+xy5eO8qEoF+Zd9MQQXBnj8Qd+V4wDZBWjeatHYW4q5PJR/j7z3XYqyoV5vUaG4K8YHyzE+MCIAOSVljCc9SQuB8L8XlGe86RZ56JcmNdr2OcLQFOMX3wSp1+QAOSybwjuHOUbolyY90EM09c9ivGNhRgf2f0AZA7McZN/zW1RLsqFeUvs9iHM00WcFx/+AwAlAjOut31kJJaK8pzvbHc6yoV53QYhWsePvn6ZdDTGrahCW/8Y/WkUoDM/z/Hv0H5j2qQoF+b8hPjLohNhnlZUuTgzPrBrASgUlaPmx8khf4+WcyTKhXkfxbPmB4++fjloaYwP0i++Xb/8ACgQ4RspIGOMP0tfe6f2fmMa1ykfZ7zLs75EuTBvh90QuKchzs/a8GDTRZzxB9aKKgDkisWL4I4B/u/090eEr8c48/0N45SjEOenwpwaxF8qxyF4t0Kcn1cc44vzxgFgleG9sRDaw4X4HjTeke2D43AMTEOcn3f9iQrzdvi+cH9tce4iTgBWHOCjhdh+0vw4C06/xePgpFn/J9AKc9oV5+kizl0xDsAKIjz+TXmWQtz0R24yista/vHtW6eXkhbm7YzzFzk/FTRdxHkR4wO7AYAlQ3yUQnxkRFjCUZrSctbVJyjM2xnnH0Ms74Q4X9uFEAsrqriIE4BlY9yUR1btJBxXT7s631yYt9P3uVZxtZZw+2pVZ89dxAnACmJ80Mw/h0OMsw7x+IrrqHdyCcVf7N9Wi7/0fgtBfZzmfi8b5NthixdV/Ddsx6IcgCWCPM4Bjp8G+VszX1JPlLMu4/RuTOc4Y96RAzRuIa7jnKt3YZs++vplekuMj5ofn8TplycAywZ5PDEUz2COjAYZxSUU44cPzYQ5tbr4QIX9EN7xn2dpu+r/J8YBuE+Qx78jccrKntGggIslFJ8Kc9pi0FhFBYDVR/kwRZG/MZQUPxX04I9v3w4687NlnwIAd4jycbh539EoP08b7bGfluIU5gBA76I8LhLQtemQMcbjB9c8DtuZPd06x2lqlTAHAHoV5V0SIzwuu/f4j2/fXnV1beweGHTl2DTHHAC4Lcq3OxI+s7BNw/Yh3nZtRY+e2w7H6V7Yp6+FOQDQ1SgftDDK45nvsxTiv6cYP3NGvPPifPP4gqu105GEOQBwk5rnlM/S9mHhawHeXxvpeG3tEorCHOBuppU9npFdwrqkKSy1HGOz9PP3KcX31B6qWjxrfdjMl9XMKS6heBSvGRDmAB0XftlvVRZOf9orrNFRBXH3Nmyn5oO3Lsq34jsX4XdUnPOd+0Oo9sL9vmvjizersgAAV73oGzfl1iqfhO1pCKu4vRbl7Yzy9M/xrHmJ/XfSxiUUhTkAcJWXBe5zlqJup80X8InyH3P809c7BR5LjPKTtg2gMAcA/h4H85VYRgWi7qm5492J8oU4j/u0xDKGo7iEojAHANpsu5aoo91RvqDUlJajEOdDYQ4AtNWzjPcVY+6FKO90lJec0hIdt2W+uTAHAC4bZbyvN5Vd3Llh9682yhfifNqUmdISz5gftWFAhTkA8CMM5vPLc8bppLIhGDoKVh/lCw7Tf5vbOK3LL8wBgNYY5Iy7ms6WpxclrC/Ka5jSUvU+FuYAQKkwn1b23Ed2//qifCHOLz4VNLf4TtCxMAcAhPk//a+y5/7M7r/VSi7UDd/joCkzpSUuoXggzAEA/m5a2ePZtktuDerZCr9dqSkt+yHOR8IcAKDGIJpfGGhFlryRX2pKS1TlEorCHAAopaYw2rU7isT5QVNmSsugqXC+uTAHAEqpYmnCNK1hZHcUU2pKy3bY92NhDgDQNP+p5HEc2RXlFJ7SchTivJq164U5AFDKqHgIzVfo8KFC5eM87ocSU1qqWkJRmAMAi3LG0aDk6hhpGsO+XV6NUlNahuFYqOJdE2EOACw6z3x/RcI4TV8whaUihae07NWwhKIwBwAW5Z5OMEpLFeaM8nG4ed9YHrHGOD9oykxpiU5KL6EozAGAxTCKZ8xnme/2ONcFeGnKwrEor1qpKS3F55sLcwDgsmmBIHq/zjiP0xTC9lv4cs/urf7FYckpLXEJxWLHiDAHAC77UOA+Y5x/TKukrDLIY2jFaStxG1Qyvv92iN0a5/E4KDWlpdgSisIcALjstOB978cz2/Gs5bLzfdPZ8aN0hvykqe/DgyzP+HN2Ct73cYn55r/a5wDAojjPPETJJHw5LvQQBs18xZQY1/Gs6TRsn5qr575vpND9d7od2YOdOQ7Pwv6PU1pKrNwzTPf7SpgDAKW9LRjmlwPJGeb+xvlBiPPnhY6B+K7Nh/AYsr2DZCoLAHBVEE2b/BeB9oUVYe7mRZN/ff0LcUrLQJgDAKUdGoK18A7A3V4kzgoei1mXUBTmAMB1QTRtyl4IChfH4uum3Ds4o1WvFiTMAYBlxIvfzg3DigOsgo9/b6Gdgsfifo4lFIU5AHCtNI1gp0dPOdfa2QNH11LHYsnpVSfrXkJRmAMAtwVRnM7yugdPNb4AeSfMqz4WS05piftsrfPNhTkA8DNBFKe0TDr69OL0iKfhOU4yRt8zR9W9XkCVmtISP0l2LMwBgNJxvtPBOD9LUZ77499Hjqilj8NZU3ZKy9G6llAU5gDAXeO8K8soHobn8zSF3sXzm+a6cxeA3us4LDmlJc4zPxHmAEANUXTQlP3Ql/u6OEt+cM3/Psv0OJ47mu6l5JSWYXhhdSTMAYAa4jxeEPq4adc65zHidtJZ8pumrkwzPZ6RI+lex2B8AVXy3Zu9Vb/rIcwBgGXD6Dxs8cz5VpPvLPOyQR4D7nG6wPM2HzI9rmGOtbE7fgyWnNISrXQJRWEOANw3jqZhi2fPdwpH0mXxrHg8Q/5/cdpKfCHxk//daZNvisSuI+jeSk5piVG+siUUf7UvgQWv0i+ZdZut4Xtu9XSfbTnWbg0zzztfoE/CzSSdBX4ZtnGm53v590sM67fLrrQSAz48h61Mj31VQTmp7EVRzuNulnF/rdWDdXzTzw833zfmTcFtDh99/XJgGIAuS5G+3czX7V5HG5ynII3TT6YFlj2ElXHGHABYmxTKZ5dCPW6DsD1p5mc5N9K/u8lZivBZ2H5P/3y2uNQhCHMAgCVDHfjBxZ8AACDModemhgAAWHeYfzC0AABQPszPDS3cyhxLAGDtYS444JYXr4++fvECFgBYb5iH4JgaWriRnxEAYP1hnjhrDtdzHQYAkC3M3xpeuNbUEAAAucL81PDClWaPvn7xjhIAkCfMQ3jMGtNZ4CpvDAEAkC3MBQhca2IIAICsYf7o65cYIDPDDD+i3DKJAED2ME8ODTP4eQAACoe5s+bwI8rTtRcAAPnDPNkx1PRcDPLXhgEAKBrm6ZNARQl9tmNuOQBQPMyTOLfW8on00ev04hQA4FoPct7Z54ebw3DzPmwbhp6eOAtR/tQwAAC3yXnGvEmfdvjCsNOXKA/blmEAAKoL8xTn08bFoPQkys0rBwB+1oNSd/z54eZ2uDluTGtBlAMAlAvzFOfmnNM107C9EOUAwF39UvLO05zzxylmoO3iBwg5Uw4ALOVBLQ/k88PNvXCz3zh7TvvEF5g76YUmAEC7wzzFeYzyo7CN7RpaIJ4Zj2fJfXgWANCtMF8I9EEzP3su0KnRLGxvm/kHB5m2AgB0N8wXAn0jxfnLsA3tLgqKAX4atnchxk8NBwDQqzC/ItJHYXuWIj1u5qOzLrO0fQjbNK2/DwAgzG8I9kG4GdiVrMiZ6SkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALX7fwEGANe6N83qQWlyAAAAAElFTkSuQmCC"/>
                                </defs>
                            </svg>
                        </a>
					</div>
				<?php endif; ?>
				<div class="right-column">	
					<?php 
					$first_col = get_field('phone_numbers_first_col', 'option');
					$second_col = get_field('phone_numbers_second_col', 'option');
					?>	
					<div class="phone_numbers_wrapper">
						<?php if($first_col): ?>
							<div class="phone_numbers">
								<?php echo $first_col; ?>
							</div>
						<?php endif; ?>
						<?php if($second_col) : ?>
							<div class="phone_numbers">
								<?php echo $second_col; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="lang-wrapper">
						<?php 	
							wp_nav_menu( [
								'theme_location'  => 'lang-switcher',
								'menu'            => '',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="menu-header-menu" class="%2$s">%3$s</ul>',
							] );
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
				<?php 	
					wp_nav_menu( [
						'theme_location'  => 'header-menu',
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
						'items_wrap'      => '<ul id="menu-header-menu" class="%2$s">%3$s</ul>',
					] );
				?>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<?php 
				if(get_locale() == "uk"){
					$catalogButtonLabel = 'Каталог';
					$accountButtonLabel = 'Особистий кабінет';
					$mobileCatalogButton = 'Каталог товарів';
				}
				elseif(get_locale() == "ru_RU"){
					$catalogButtonLabel = 'Каталог';
					$accountButtonLabel = 'Личный кабинет';
					$mobileCatalogButton = 'Каталог товаров';
				}
				else {
					$catalogButtonLabel = 'Каталог';
					$accountButtonLabel = 'Особистий кабінет';
					$mobileCatalogButton = 'Каталог товарів';
				}
				?>
				<div class="katalog"><?php echo $catalogButtonLabel ?></div>
				<div class="mobile_menu_open_button">
					<img src="<?php echo get_template_directory_uri(  ) ?>/assets/img/open_menu_button.svg" alt="">
				</div>
				<div class="search-form">
					<div class="search-arrow">
					</div>
					<?php echo do_shortcode('[ivory-search id="391" title="Default Search Form"]'); ?>
					<div class="clear-search-field">
					</div>
				</div>
				<?php if(is_user_logged_in()): ?>
				<?php $link = get_home_url() . '/my-account'; ?>
				<?php else: ?>
				<?php $link = "#"; ?>
				<?php endif; ?>
				<a class="kabinet" href="<?php echo $link ?>">
					<?php echo $accountButtonLabel; ?>
				</a>
				
				<div class="icons-wrapper">
					<ul class="icons">
						<li class="icon list"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/list.svg" alt="" width="28" height="20"></a></li>
						<li class="icon heart"><a href="<?php echo get_home_url() ?>/wishlist"><img src="<?php echo get_template_directory_uri() ?>/assets/img/heart.svg" width="26" height="22" alt=""></a></li>
						<li class="icon cart"><a href="<?php echo get_home_url() ?>/shop/cart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/cart.svg" alt="" width="28" height="24"></a>
							<div class="header-cart-count">
								<?php echo $woocommerce->cart->cart_contents_count; ?>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="katalog-menu-wrapper">
			<div class="katalog-menu">

				<?php
				// echo '87';

				wp_reset_postdata();

				if( have_rows('menu_cat_list','option') ): ?>

					<ul class="katalog-categories-list">
		
						<?php while( have_rows('menu_cat_list','option') ) : the_row();

								// Load sub field value.
								$icon = get_sub_field('icon');
								$term = get_sub_field('category');
								$label = get_sub_field('custom_label');



								if( $term ): ?>

									<li	li class="katalog-category">
										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="">
											<?php if(!empty($icon)): ?>
												<div class="category-image">
													<?php echo file_get_contents(wp_get_original_image_path($icon)); ?>
												</div>
											<?php else: ?>
												<div class="category-image">
													<img src="<?php echo get_home_url() . '/wp-content/uploads/woocommerce-placeholder.png' ?>" alt="">
												</div>
											<?php endif; ?>
											<div class="category-name"><?php echo esc_html( $term->name ); ?></div>
										</a>
									</li>

								<?php endif; ?>

						<?php endwhile; ?>
					</ul>

				<?php endif;  ?>

				<div class="katalog-menu-button-wrapper">
					<a href="<?php echo get_home_url() ?>/categories-page/" class="button">Всі товари</a>
				</div>
				<div class="close-menu-icon">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/close_header_icon.svg" alt="">
				</div>
			</div>
			
		</div>
		<a class="mobile_katalog_button" href="<?php echo get_home_url() ?>/categories-page">
			<?php echo $mobileCatalogButton; ?>
		</a>
		<div class="mobile_menu">
			<div class="mobile_menu_close_button">
			</div>
			<?php $logo = get_field('header_logo', 'option') ?>
			<?php if($logo) : ?>
				<div class="mobile_menu_logo">
					<img src="<?php echo $logo['url']; ?>" alt="" width="140" height="47">
				</div>
			<?php endif; ?>
			<div class="menu">
				<div class="account_menu_item">
					<?php if(!is_user_logged_in(  )){
						$link = "#";
					}
					else{
						$link = get_home_url() . '/my-account/';
					} 
					?>
					<a href="<?php echo $link; ?>" class="kabinet"><?php echo $accountButtonLabel; ?></a>
				</div>
				<?php 	
					wp_nav_menu( [
						'theme_location'  => 'header-menu',
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
						'items_wrap'      => '<ul id="menu-header-menu" class="%2$s">%3$s</ul>',
					] );
				?>
				<a href="<?php echo get_home_url(  ) ?>/wishlist" class="wishlist_menu_link"><?php _e('Список бажань'); ?></a>
			</div>
			<div class="languages_wrapper">
				<div class="language_title">
					<?php if(get_locale() == 'uk'){ echo 'Мова'; }elseif(get_locale() == 'ru_RU'){ echo 'Язык'; } else {echo 'Мова';} ?>
				</div>
				<?php 	
					wp_nav_menu( [
						'theme_location'  => 'lang-switcher',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="menu-header-menu" class="%2$s">%3$s</ul>',
					] );
				?>
			</div>
			<?php if(have_rows('mobile_menu_social_media', 'option')): ?>
			<div class="mobile_social_network_list">
				<?php while(have_rows('mobile_menu_social_media', 'option')): the_row(); ?>
					<?php $link = get_sub_field('link'); ?>
					<?php $icon = get_sub_field('icon'); ?>
					<a href="<?php echo $link; ?>" class="mobile_social_network_list_item"><img src="<?php echo $icon; ?>" alt=""></a>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</header>
	<?php if(is_shop() || is_front_page() || is_woocommerce() ){
		if(!is_product()){
			get_template_part('/template-parts/add_to_cart_message');
		}
	}; ?>
	<div class="overlay"></div>
	<div class="wrong_account_data woocommerce_message"><?php do_action( 'woocommerce_before_customer_login_form' ); ?></div>
	<div class="contact_form_wrapper">
		<?php 
		if(get_locale() == "uk"){echo do_shortcode('[contact-form-7 id="472" title="Contact header form"]');}
		elseif(get_locale() == 'ru_RU'){echo do_shortcode('[contact-form-7 id="607" title="Contact header form(ru)"]'); }
		?>
		<div class="close_popup_cross">
			<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 1.93376L13.0481 0L7.49963 5.50193L1.95094 0L0 1.93469L5.54813 7.43662L0 12.9389L1.95094 14.8732L7.49963 9.37187L13.0481 14.8732L15 12.9389L9.45094 7.43662L15 1.93376Z" fill="white"/>
			</svg>
		</div>
	</div>
	<?php if(!is_user_logged_in()): ?>
		<?php 
		if(get_locale() == 'uk'){
			$formTitle = 'Вхід';
			$notRegisteredLabel = 'Не зареєстровані?';
			$notRegisteredButton = 'Зареєструватися';
			$registerFormTitle = 'Реєстрація';
		}
		if(get_locale() == 'ru_RU'){
			$formTitle = 'Вход';
			$notRegisteredLabel = 'Не зарегистрированы?';
			$notRegisteredButton = 'Зарегистрироваться';
			$registerFormTitle = 'Регистрация';
		}
		else {
			$formTitle = 'Вхід';
			$notRegisteredLabel = 'Не зареєстровані?';
			$notRegisteredButton = 'Зареєструватися';
			$registerFormTitle = 'Реєстрація';
		}
		?>
		<div class="log-in_popup-wrapper">
			<div class="log-in_popup">
				<div class="popup-title"><?php echo $formTitle; ?></div>
				<div class="close-icon"></div>
				<form class="woocommerce-form woocommerce-form-login login" method="post">

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" placeholder="Email" value="" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide password_field">
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="Пароль" />
					</p>

					<div class="not-registered">
						<?php echo $notRegisteredLabel; ?>
						<a href="#"><?php echo $notRegisteredButton; ?></a>
					</div>

					<p class="form-row submit-button-wrapper">
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
						</label>
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php if(get_locale() == 'uk'){ echo 'Вхід'; }elseif(get_locale() == 'ru_RU'){ echo 'Войти'; } else {echo 'Вхід';} ?></button>
					</p>

				</form>
			</div>
		</div>
		<div class="register_popup-wrapper">
			<div class="register_popup">
				<div class="popup-title"><?php echo $registerFormTitle; ?></div>
				<div class="close-icon"></div>
				
				<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

				

				<div class="u-column2 col-12">


					<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

						<?php do_action( 'woocommerce_register_form_start' ); ?>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="" /><?php // @codingStandardsIgnoreLine ?>
							</p>

						<?php endif; ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" placeholder="Email" value="" /><?php // @codingStandardsIgnoreLine ?>
						</p>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" placeholder="Пароль" autocomplete="new-password" />
							</p>

						<?php else : ?>

							<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_register_form' ); ?>

						<div class="form-checkbox">
							<input type="checkbox" id="rules">
							<label for="rules">
								<?php if(get_locale() == 'uk'){ echo 'Я приймаю умови <a href="">Угоди користувача</a> та згоден на обрабку персональних даних'; }elseif(get_locale() == 'ru_RU'){ echo 'Я принимаю условия <a href=""> Пользовательского соглашения </a> и согласен на обрабку персональных данных'; } else {
									echo 'Я приймаю умови <a href="">Угоди користувача</a> та згоден на обрабку персональних даних';
								} ?>
							</label>
						</div>

						<div class="registered">
							<?php if(get_locale() == 'uk'){ echo 'Вже зареєстровані? '; }elseif(get_locale() == 'ru_RU'){ echo 'Уже зарегистрированы?'; } else {echo 'Вже зареєстровані? ';}?>
							<a href="#"><?php if(get_locale() == 'uk'){ echo 'Увійти'; }elseif(get_locale() == 'ru_RU'){ echo 'Войти'; } else { echo 'Увійти'; } ?></a>
						</div>
						<p class="woocommerce-form-row form-row submit-button-wrapper">
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
							<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" disabled><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
						</p>

						<?php do_action( 'woocommerce_register_form_end' ); ?>

					</form>

				</div>

				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<?php else: ?>
		<header class="checkout_header">
			<div class="container">
				<div class="checkout_header_content">
					<?php $logo = get_field('header_logo', 'option'); ?>
					<?php if($logo): ?>
						<div class="logo">
							<a href="<?php echo get_home_url() ?>">
								<img src="<?php echo $logo['url'] ?>" alt="">
							</a>
						</div>
					<?php endif; ?>
					<?php 
					$first_col = get_field('phone_numbers_first_col', 'option');
					$second_col = get_field('phone_numbers_second_col', 'option');
					?>	
					<div class="phone_numbers row">
						<?php if($first_col): ?>
							<div class="col-6 phone_numbers_col">
								<?php echo $first_col; ?>
							</div>
						<?php endif; ?>
						<?php if($second_col) : ?>
							<div class="col-6 phone_numbers_col">
								<?php echo $second_col; ?>
							</div>
						<?php endif; ?>
					</div>
					
				</div>
			</div>
			
		</header>
	<?php endif; ?>
	<?php if(get_locale() == 'ru_RU'): ?>
		<script>
			jQuery(document).ready(function(){
				jQuery('.header .is-search-form input[type="search"]').attr('placeholder', 'Я ищу...');
				jQuery('.header .is-search-form input[type="submit"]').attr('value', 'Поиск');
			});
			console.log('123');
		</script>
	<?php endif; ?>
	<div id="main">

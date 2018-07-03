<?php
/**
 * Checkout Form V1
 *
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$porto_woo_version = porto_get_woo_version_number();
$checkout = WC()->checkout();

// filter hook for include new pages inside the payment method
$get_checkout_url = version_compare($porto_woo_version, '2.5', '<') ? apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ) : wc_get_checkout_url(); ?>
			
		<div class="row">
			
			<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
			
			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
			
			<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
			
			<div class="col-lg-4" id="customer_details">
			
				<div class="featured-box align-left">
				
					<div class="box-content">
					
							
							<h3><?php _e( 'Returning Customer', 'porto' ); ?></h3>
							
							<form class="woocommerce-form woocommerce-form-login login" method="post">

								<?php do_action( 'woocommerce_login_form_start' ); ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>
								
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
								</p>

								<?php do_action( 'woocommerce_login_form' ); ?>

								<p class="form-row">
									<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
									<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
									
								</p>
								<p class="woocommerce-LostPassword lost_password">
									<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
								</p>

								<?php do_action( 'woocommerce_login_form_end' ); ?>

							</form>
		
						<?php endif; ?>

					</div>
					
				</div>
								
			</div>
			
			<?php endif; ?>
			
			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>			
			
			
			<?php if (is_user_logged_in()) : ?>
			
			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
				
				<div class="row">
				
					<div class="col-lg-4">
						<div class="featured-box align-left">
							<div class="box-content">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
						</div>
					</div>
				
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-6">
								<div class="featured-box align-left">
									<div class="box-content">
										<?php do_action( 'woocommerce_checkout_billing' ); ?>
									</div>
								</div>
							</div>
										
							<div class="checkout-order-review featured-box align-left col-lg-6">
								<div class="box-content">
									<h3 id="order_review_heading"><?php _e( 'Your order', 'porto' ); ?></h3>
									<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
									<div id="order_review" class="woocommerce-checkout-review-order">
										<?php do_action( 'woocommerce_checkout_order_review' ); ?>
									</div>
									<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				
			</form>
			
			<?php else : ?>
			
			<div class="col-lg-8">
				<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6">
							<div class="featured-box align-left">
								<div class="box-content">
									<?php do_action( 'woocommerce_checkout_billing' ); ?>
								</div>
							</div>
						</div>
						<div class="checkout-order-review featured-box align-left col-lg-6">
							<div class="box-content">
								<h3 id="order_review_heading"><?php _e( 'Your order', 'porto' ); ?></h3>
								<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
								<div id="order_review" class="woocommerce-checkout-review-order">
									<?php do_action( 'woocommerce_checkout_order_review' ); ?>
								</div>
								<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
			
			<?php endif; ?>
			
		</div>
			
			
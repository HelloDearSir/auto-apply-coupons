<?php
/* 
Plugin name: Auto apply coupons
Version: 0.0.1
Description: Auto apply coupon
Text Domain: woocommerce
Requires at least: 6.0
Requires PHP: 8.4
WC requires at least: 7.0
WC tested up to: 7.0
  
  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class AutoapplyingCoupons {
 private string $applycoupons = "20off";
  public function __construct() {
    add_action('woocommerce_cart_calculate_fees', [$this, 'auto_applying_coupons'], 20);
  }
  public function auto_applying_coupons() {
    $cart = WC()->cart;
    $coupon_code_applied = $this->applycoupons;
    if(empty($coupon_code_applied) {
      return;
    }
    if(!$cart->has_discount($coupon_code_applied)) {
      $cart->apply_coupon($this->$coupon_code_applied);
    }
  }  
}
 new AutoapplyingCoupons();
?>

<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
<script type="text/javascript" src="https://checkout.razorpay.com/v1/razorpay.js"></script>
<?if($cleanse_program==1){$action='/checkout/cleanse_payment_update';}else{$action='/checkout/payment_update';}?>
<form action="<?php echo $action;?>" method="POST">
   <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="<?php echo $displayCurrency?>"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name'];?>"
    data-prefill.email="<?php echo $data['prefill']['email'];?>"
    data-prefill.contact="<?php echo $data['prefill']['contact'];?>"
    data-notes.shopping_order_id="<?php echo $data['notes']['merchant_order_id']?>"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay-->
  <input type="hidden" name="payment_id" value="<?php echo $data['notes']['merchant_order_id']?>">
  <input type="hidden" name="amount" value="<?php echo $data['amount'];?>">
  <input type="hidden" name="currency_type" value="<?php echo $displayCurrency;?>">
  <input type="hidden" name="program_id" value="<?php echo $program_id;?>">
  <input type="hidden" name="wallet_amount" value="<?php echo $actual_wallet_available;?>">
  <input type="hidden" name="wallet_update_amount" value="<?php echo $wallet_update_amount;?>">
  <input type="hidden" name="coupon_code" value="<?php echo $coupon_code!=''?$coupon_code:'0';?>">
  <input type="hidden" name="part_pay" value="<?php echo $check_balance;?>">
  <input type="hidden" name="discount" value="<?php echo $discount;?>">
  <input type="hidden" name="program_session_id" value="<?php echo $program_session_id;?>">
  <input type="hidden" name="cleanse_program" value="<?php echo $page_title;?>">
  <input type="hidden" name="sub_title" value="<?php echo $sub_title;?>">
  <input type="hidden" name="cleanse_program_email" value="<?php echo $data['prefill']['email']?>">
  <input type="hidden" name="cleanse_program_phone" value="<?php echo $data['prefill']['contact']?>">
  <input type="hidden" name="cleanse_program_username" value="<?php echo $data['prefill']['name']?>">
  <input type="hidden" name="page_link" value="<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); echo end($uriSegments); ?>">
  <input type="hidden" name="diet_link" value="<?php echo $diet_link; ?>">
</form>
<style>
.razorpay-payment-button{
    display:none;
}
</style>
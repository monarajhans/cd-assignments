<?php $bill = $this->session->userdata('bill'); var_dump($bill);  ?>

<div id="payment" style="width: 500px; border: 2px solid blue; text-align: center">
<h1>Welcome to the payment portal</h1>
<form action="" method="POST">

  <script type="text/javascript"
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_NaagdnWduin4tQPrZACSBq2o"
    data-amount= '<?php echo $bill * 100 ?>'
    data-name="Shoppers Stop"
    data-description="" 
    data-image="/assets/logo.gif">
  </script>
</form>
</div>
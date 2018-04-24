<?php
session_start();
if ($_SESSION["pay"]=="") {
	header("Location:shop.php");
}
$_SESSION["paypalphp"]="yes";
?>
<h1>Please wait we are transferring you in Paypal....</h1>
<?php
$paypal_url= 'https://www.sandbox.paypal.com';
$pay= $_SESSION["pay"];
$order_id= $_SESSION["order_id"];

?>

<form action="<?php echo $paypal_url; ?>/cgi-bin/webscr" method="post" name="buyCredits" id="buyCredits">
	<input type="hidden" name="cmd" value="-xclick">
	<input type="hidden" name="business" value="jahed_010101010_per@gmail.com">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="item_name" value="payment for testing">
	<input type="hidden" name="item_number" value="1212">
	<input type="hidden" name="amount" value="<?= $pay?>">
	<input type="hidden" name="return" value="https://localhost/Project_Eshopper/user/payment_success.php?id=<?php echo $order_id;?>">
</form>

<script>
	document.getElementById('buyCredits').submit();
</script>








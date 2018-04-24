
<?php
session_start();
if ($_SESSION['admin']=='') {
	header('Location:admin_login.php');
} else {
}
    include 'header.php';
    include "menu.php";
$link = mysqli_connect('localhost', 'root', '');
mysqli_select_db($link,"eshoper_project");
?>


<div class="grid_10">
	<div class="box round first">
		<h2>Add product</h2>
		<div class="block">
			<form name="form1" action="" method="post" enctype="multipart/form-data">
				<table \rootborder="1">
					<tr>
						<td>Product Name</td>
						<td><input type="text" name="product_name"></td>
					</tr>
					<tr>
						<td>Product Price</td>
						<td><input type="text" name="product_price"></td>
					</tr>
					<tr>
						<td>Product Quantity</td>
						<td><input type="text" name="product_quantity"></td>
					</tr>
					<tr>
						<td>Product Image</td>
						<td><input type="file" name="product_image"></td>
					</tr>
					<tr>
						<td>Product Category</td>
						<td>
							<select name="product_category">
								<option value="Gents_clothes">Gents Clothes</option>
								<option value="Ladies_clothes">Ladies Clothes</option>
								<option value="Gents_shoses">Gents Shoses</option>
								<option value="Ladies_shoses">Ladies Shoses</option>
							</select>	
						</td>
					</tr>
					<tr>
						<td>Product Description</td>
						<td><textarea cols="15" rows="10" name="product_description"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit1" value="Upload"></td>
					</tr>

				</table>
			</form>
<?php
if (isset($_POST["submit1"])) {
	// $v1= rand(1111,9999);
	// $v2= rand(1111,9999);
	// $v3= $v1.$v2;
	// $v3= md5($v3);
	$fnm= $_FILES["product_image"]["name"];
	$fdst = "./product_image/".time()."."."jpg";
	//$fdst1 = "product_image/".$v3.$fnm;
	move_uploaded_file($_FILES["product_image"]["tmp_name"], $fdst);

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['product_description'];

    mysqli_query($link,"INSERT INTO product VAlUES('','$product_name', $product_price, $product_quantity,'$fdst', '$product_category', '$product_description')");


}

?>



		</div>
	</div>

</div>

<?php
 include 'footer.php';
?>
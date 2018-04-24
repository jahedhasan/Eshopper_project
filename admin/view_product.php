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



if (isset($_GET['status'])) {
			$id= $_GET['id'];
		$res= mysqli_query($link,"SELECT * FROM product WHERE id=$id");
		while ($row=mysqli_fetch_array($res)) {
			$img= $row["product_image"];
		}
		unlink($img); //unlink() using delete img from folder
//for delete product
				$sql="DELETE FROM product WHERE id='$id'";
				mysqli_query($link, $sql);
}


$message="";
	if (isset($_SESSION['message'])) {
		$message =$_SESSION['message'];
		unset($_SESSION['message']);
	}



?>


<div class="grid_10">
	<div class="box round first">
		<h2>View Product</h2>
		<div class="block">
			<div class="">
				<div class="row">
					<h3><?php echo  $message;?></h3>
					<div class="col-lg-12">
						<div class="well">
							<table class="table table-bordered table-hover">
								<tr>
									<th>Serial no</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Quantity</th>
									<th>Product Image</th>
									<th>Product Category</th>
									<th>Product Description</th>
									<th>Action</th>
								</tr>

								<?php 
									$res=mysqli_query($link,"SELECT * FROM product");
									$i=1;
									while ($row=mysqli_fetch_array($res)) 
									{ ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row['product_name']; ?></td>
									<td><?php echo $row['product_price']; ?></td>
									<td><?php echo $row['product_quantity']; ?></td>
									<td><img style="height:90px;width:100px;" src="<?php echo $row['product_image']; ?>"></td>
									<td><?php echo $row['product_category']; ?></td>
									<td><?php echo $row['product_description']; ?></td>
									<td>
										<a href="edit_product.php?id=<?php echo $row['id']; ?> " class="btn btn-success" title="Edit">Edit
										</a>
										<a href="?status=delete&&id=<?php echo $row['id']; ?>" class="btn btn-danger" title="Delete" onclick="confirm('Are You sure to DELETE!!!??')">Delete
										</a>
									</td>
								</tr>
								<?php $i++; } ?>
							</table>
						</div>
					</div>
					
				</div>	
			</div>
		</div>
	</div>

</div>

<?php
 include 'footer.php';
?>
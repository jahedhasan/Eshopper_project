<?php
    include 'header.php';
    include "menu.php";
$link = mysqli_connect('localhost', 'root', '');
mysqli_select_db($link,"eshoper_project");
?>

        
        <div class="grid_10">

            <div class="box round first">

                <h2>Display Order</h2>
                
                

                <div class="block">
                    <table class="table table-bordered" border="1">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>Contact No.</th>
                            <th>View Order</th>
                        </tr>
                        <?php
                        $res= mysqli_query($link, "select * from confirm_order_address order by id desc");

                        $row=mysqli_fetch_array($res);
                         while($row) {
                          ?>
                        <tr>
                            <td><?php echo $row["firstname"] ;?></td>
                            <td><?php echo $row["lastname"] ;?></td>
                            <td><?php echo $row["email"] ; ?></td>
                            <td><?php echo $row["address"] ;?></td>
                            <td><?php echo $row["city"] ;?></td>
                            <td><?php echo $row["pincode"] ;?></td>
                            <td><?php echo $row["contactno"] ;?></td>
                            <td><?php echo $row["contactno"];?></td>
                            <td><a href="display_
                                order_1.php?id<?php echo $row["id"] ; ?>"></a></td>
>
                        </tr>
                        <?php } ?>
                    </table>

                </div>

            </div>

<?php
    include 'footer.php';
?>          


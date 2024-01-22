<?php
session_start();
include 'includes/header.php';

if (isset($_POST['update_product_quantity'])) {
   $update_value=$_POST['update_quantity'];
//    echo $update_value;

$update_id=$_POST['update_quantity_id'];
// echo $update_id;
$update_quantiry_query=mysqli_query($conn, "UPDATE cart SET quantity=$update_value WHERE id =$update_id");
echo "<script>alert('Quantity Updated Successfully!');</script>";
}

if (isset($_GET['remove'])) {
   $remove_id=$_GET['remove'];
   mysqli_query($conn, "DELETE FROM cart WHERE id=$remove_id");
}
?>

<div class="container" style="margin-top:150px;margin-bottom:600px;background:#06396c40;padding:30px;border-radius:6px;">
    <h2>MY CART</h2>
    <table class="table table-hover mt-5">
        <?php
        $select_cart_products=mysqli_query($conn, "SELECT * FROM cart");
        $num=1;
        $grand_total=0;
        if (mysqli_num_rows($select_cart_products)>0) {
           echo '<thead class="bg-light">
           <tr>
             <th scope="col">#</th>
             <th scope="col">Product Image</th>
             <th scope="col">Product Name</th>
             <th scope="col">Product Price</th>
             <th scope="col">Product Quantity</th>
             <th scope="col">Total Price</th>
             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>';
         while($fetch_cart_product=mysqli_fetch_assoc($select_cart_products)){
            ?>
 <tr>
      <th scope="row"><?php echo $num?></th>
      <td><img style="height:80px;" src="admin/uploads/<?php echo $fetch_cart_product['image']?>" alt=""></td>
      <td><?php echo $fetch_cart_product['name']?></td>
      <td>৳ <?php echo $fetch_cart_product['price']?>/-</td>
      <td>
        <form action="" method=POST>
            <input type="hidden" Value="<?php echo $fetch_cart_product['id']?>" name="update_quantity_id">
        <div class="quantity_box">
            <input type="number" min="1" value="<?php echo $fetch_cart_product['quantity']?>" name="update_quantity">
            <input class="btn btn-primary" type="submit" Value="Update" name="update_product_quantity">
        </div>
        </form>
      </td>
      <td>৳ <?php echo $subtotal= ($fetch_cart_product['price']*$fetch_cart_product['quantity'])?>/-</td>
      <td>
        <a class="btn btn-danger" href="cart.php?remove=<?php echo $fetch_cart_product['id']?>"><i class="fas fa-trash"></i>Remove</a>
      </td>
    </tr>
        <?php
        $grand_total=$grand_total+($fetch_cart_product['price']*$fetch_cart_product['quantity']);
         $num++;
         }
        }else{
            echo "No Products";
        }
        
        ?>
  
   
  </tbody>
</table>

<div class="bottom_area">
<div class="row">
    <div class="col-md-4">
        <div class="grandtotal_btn d-flex justify-content-center">
          
        </div>
    </div> 
    <div class="col-md-4">
        <div class="checkout_btn d-flex justify-content-center">
        <h3 class="btn btn-info">Grand Total :<span><?php echo $grand_total?>/</span></h3>
        </div>
    </div>
    <div class="col-md-4">
    <div class="checkout_btn d-flex justify-content-center">
        <?php
        if ($grand_total > 0) {
            echo '<a href="checkout.php" class="btn btn-success">Proceed to checkout</a>';
        } 
        ?>
    </div>
</div>
</div>
</div>
</div>

<?php
include 'includes/footer.php';
include 'includes/modal.php';

?>

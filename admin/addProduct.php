<?php
include 'inc/header.php';
?>
            
            <!------------content-body------------>
            <div class="card" style="width: 50%;margin: 0 auto;">
  <div class="card-body" style="background-color:#4dd9c52ec;">
            <div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <form action="addproductAction.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price (৳):</label>
                    <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                <label for="category">Category:</label>
                   <select name="category" id="category" class="form-control">
                  <option value="1">Grocery</option>
                  <option value="2">Medicine</option>
                   </select>
                </div>
                <input type="submit" class="btn btn-primary w-100" value="Add Product">`
            </form>
        </div>
    </div>
</div>
</div>
</div>     
<?php
include 'inc/footer.php';
?>
     
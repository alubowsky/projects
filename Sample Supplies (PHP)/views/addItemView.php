<?php 
    include 'top.php';
?>

<form class="form-horizontal" method= "post">
  <div class="form-group">
    <label for="itemName" class="col-sm-2 control-label">Item Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="itemName" name = "itemName" placeholder="Item Name">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" name = "description" placeholder="Description">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="number" min= '0' step=".01" class="form-control" id="price" name = "price" placeholder="Price">
    </div>
  </div>
  <div class="form-group">
    <label for="url" class="col-sm-2 control-label">URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="url" name = "url" placeholder="url">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add Item</button>
    </div>
  </div>
</form>

<?php if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($errors)) :
    foreach($errors as $error): ?>
        <h2 class="alert alert-danger"> <?= $error?></h2>
<?php endforeach; 
elseif(isset($_SESSION["success"])) : ?>
        <h2 class="alert alert-success"> <?= $_SESSION["success"] ?></h2>
        
<?php unset($_SESSION['success']);
    endif;    
    include 'bottom.php';
?>
<?php include "top.php";

if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif
?>

<form method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input class="form-control" id="username" name="username" placeholder="Enter username" value="<?= $username ?>">
</div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $password ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<span>Not already a user? <a href="?action=register" class="btn btn-secondary">Register</a></span>

<?php include "bottom.php" ?>
    


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School and Office Supplies</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>
        body {
            padding-top: 70px;
        }
        .row.extra-bottom-padding{
            margin-bottom: 32px;
        }
        <?php if (!empty($styles)) echo $styles ?>
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">S&O</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?action=home">Home</a></li>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <li><a href="index.php?action=addItem">Add Item</a></li>
                    <?php endif ?>
                </ul>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?action=viewCart">View Cart</a></li>
                    
                    <?php if (!empty($_SESSION['username'])) : ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logged in as <?= $_SESSION['username'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="btn btn-success btn-sm" href="index.php?action=logout" role="button">Logout</a></li>
                            </ul>
                        </li>
                        <?php else : ?>
                            <li><a class="btn btn-success btn-sm" href="index.php?action=login" role="button">Login</a></li>
                        <?php endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        </nav>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>School and Office Supplies</h1>
            <h2>Best Prices on School and Office Supplies</h2>
        </div>
    </div>
    <div class="container">
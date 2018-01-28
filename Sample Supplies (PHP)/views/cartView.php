<?php

    $i = 0;
    $cart = Cart::getInstance();
    $styles = "
    .well hr{
        border-color: darkgray;
    }
    img{
        width: 75px;
        height: 75px;
    }
    .extra-padding{
        margin-bottom: 60px
    }
    ";
    include 'top.php'
?>
    <div class = "well">
        <h3>Your Cart</h3>
        <hr/>
    </div>
    <div class="col-sm-12">
        <table class="table">
            <tbody>
                <tr>
                    <th> Item </th>
                    <th> Name </th>
                    <th> Description </th>
                    <th> Price </th>
                    <th> Quantity </th>
                    <th> Remove </th>
                    
                </tr>
    <?php
    if(!empty($itemsToView)) {
        foreach($itemsToView as $item) {
    ?>              
                    <tr> 
                        <td>
                            <img src="<?=  $item[0]->getItemPart('url') ?>" alt="picture of the <?=  $item[0]->getItemPart('name') ?>"/>
                        </td>
                        <td><h5><?= $item[0]->getItemPart('name') ?></h3></td>
                        <td><h5><?=  $item[0]->getItemPart('description')  ?></h3></td>
                        <td><h5><?= number_format($item[0]->getItemPart('price') , 2) ?></h3></td>
                        <td><h5><?= number_format($itemsToView[$i++][1])?></h3></td>
                        <td><a class="btn btn-danger" href="index.php?action=remove&item=<?=$item[0]->getItemPart('id')?>">Remove</a></td>
                    </tr>
                
        
    <?php
        }
    } else {
        echo "You have no items in your cart<br>";
    }
    ?>
    
    </tbody>
            </table>
    <div>
    <div class = "row extra-padding">
        <a href="index.php?action=home">Back to shopping</a>
        <a href="index.php?action=clear">Empty Cart</a>
    </div>


<?php include 'bottom.php' ?>
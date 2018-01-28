<?php
    $styles = "
    .item img {
        display: inline-block;
        height: 150px;
    } 
    .item {
        width: 189px;
        margin-bottom: 60px;
    }
    
    .item h5 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 15px;
    }
    
    .item figcaption {
        height: 124px;
    }
    
    .row.bottom-margin {
        margin-bottom: 18px;
    }   
    
    .row.top-margin {
        margin-top: 18px;
    }  

    ";

    include 'top.php';
?>
    <div class="row">
        <div class = "row bottom-margin"><?php include "pager.php"?></div>
            
        <div class="row">
            <?php include 'filter.php'; ?>
            <div class="col-sm-9">
                <?php 
                $i = 0;
                if(isset($items)):
                    foreach($items as $item) : ?>
                            <div class="col-md-3 col-sm-4 item">
                                <figure class = 'img-responsive text-center'>
                                    <img src="<?=  $item->getItemPart('url') ?>" alt="picture of the <?=  $item->getItemPart('name') ?>"/>
                                </figure>
                                <figcaption class="text-center">
                                    <h3 ><?= $item->getItemPart('name') ?></h3>
                                    <h5><?=  $item->getItemPart('description')  ?></h5>
                                    <h4><?= number_format($item->getItemPart('price') , 2) ?></h4>
                                    <form class="form-inline" action="index.php?action=addCart" method="post">
                                        <input type = 'hidden' name="item" value="<?= $item->getItemPart('id') ?>"/>
                                        <input type="hidden" name="quantity" value= 1 />
                                        <input type="hidden" name="page" value= <?= $page ?> />
                                        <button type="submit" class="btn btn-default">add to cart</button>
                                    </form>
                                </figcaption>
                            </div>
                        <?php
                            if (++$i % 3 === 0) {
                                echo '<div class="clearfix visible-sm-block"></div>';
                            }
                            if ($i % 4 === 0) {
                                    echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
                            }
                        ?>
                    <?php endforeach;
                        else : echo "page " . $page . " not found"; 
                         endif;?>
            </div>
        </div>
        <div class = "row top-margin"><?php include "pager.php"?></div>
    </div>
<?php
include 'bottom.php';
?>
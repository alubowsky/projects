<?php


if(!isset($page)) {
    $page = 0;
}
?>

<div class="col-sm-1 col-sm-offset-3">
    <?php if ($page === 0) { ?>
        <a class="btn btn-primary" disabled>prev</a> 
    <?php } elseif ($page > 0) { ?>
        <a class="btn btn-primary" href="<?= getLink(["page" => $page - 1])?>">prev</a>
    <?php } ?>
</div>
<div class="col-sm-1 col-sm-offset-6">
    <?php if (($totalItems / $numPerPage) <= ($page + 1)) { ?>
        <a class="btn btn-primary" disabled>next</a> 
    <?php } else{ ?>
        <a class="btn btn-primary" href="<?= getLink(["page" => $page + 1])?>">next</a>
    <?php } ?>
</div>

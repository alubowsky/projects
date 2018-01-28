<div class="col-sm-3">
    <div class="well">Refine By</div>
    <form action="index.php">
        <div class="well">
            <div class="form-group">
                <label for="min">Min Price</label>
                <input class="form-control" id="min" name="min"
                <?php if (!empty($min)) echo "value=\"$min\"" ?>
                />
            </div>
            <div class="form-group">
                <label for="max">Max Price</label>
                <input class="form-control" id="max" name="max"
                <?php if (!empty($max)) echo "value=\"$max\"" ?>
                />
            </div> 
            <input type="hidden" name="action" value="<?= $action ?>">
            <input type="submit" value="filter"/>
        </div>
       
    </form>
</div>
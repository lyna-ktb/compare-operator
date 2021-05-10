<?php
require_once '../process/db_connect.php';
include '../process/autoload.php';

$reviewManag = new ReviewManager($bdd);
$tourop = new Tour_operators(['id'=> intval($_POST['idTO'])]);

$reviews = $reviewManag->getList($tourop);

?>
<div class='box-review' id="<?=$tourop->getId()?>">
<?php foreach ($reviews as $review){ ?>
    <div>
        <h4><?=$review->getAuthor()?></h4>
        <p><?=$review->getMessage()?></p>
    </div>
<?php } ?>
</div>



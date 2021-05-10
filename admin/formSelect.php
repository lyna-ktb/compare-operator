
<?php

include '../include/header.php';
require_once '../process/db_connect.php';
include '../process/autoload.php';

$destination = new DestinationManager($bdd);
$allDestinations = $destination->getListGroupByName();
$tourop = new Tour_operatorsManager($bdd);
$allTourop = $tourop->getList();

if (isset($_POST['price'])){

    $newDestination = new Destinations(['location'=>$_POST['location']]);
    $destination->getOneByLoc($newDestination);

    $newDestination->setId_tour_operator($_POST['TO']);
    $newDestination->setPrice($_POST['price']);

    $operator = new Tour_operators(['id'=>$_POST['TO']]);
    $destination->add($newDestination, $operator);

}

?>

<main class="height-xxl space">

</main>


<div class="admin">
    <div class="col-3 width-100%"></div>
    <form class="sign-up-form col-6" method="post" action="formSelect.php">
        <div class="text-component text-center margin-bottom-sm">
            <h1>Ajouter une destination</h1>
            <div class="text-center">
                <p class="text-sm"> <a href="inscription.php"> <a href="admin.php" style="text-decoration: none; font-size:20px; color:cornflowerblue">Créer un Tour-Operateur</a></a></p>
            </div>
        </div>

        <div class="margin-bottom-sm">
            <label class="form-label margin-bottom-xxxs" for="price">Prix</label>
            <input class="form-control width-100%" type="text" name="price" id="price" placeholder="prix €">
        </div>

        <br>

        <div class="margin-bottom-sm">
            <div class="grid gap-xs">
                <div class="col-3">
                    <label class="select">Location
                        <br>
                        <select name="location" class="location">
                            <option>Destination</option>
                            <?php foreach ($allDestinations as $lineDestination){  ?>
                            <option value="<?=$lineDestination->getLocation()?>"><?=$lineDestination->getLocation()?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>
            </div>
            <br>
                <div class="col-3">
                    <label class="select">Tour Opérateur
                        <br>
                        <select class="select-admin" name="TO">
                            <option>T-O</option>
                            <?php foreach ($allTourop as $lineTourop){ ?>
                                <option value="<?=$lineTourop->getId()?>"><?=$lineTourop->getName()?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>
            </div>
            <div class="admin-link col-5">

            </div>


        <div class="margin-bottom-sm">
            <button class="btn btn--primary btn--md width-100%">ENVOYER</button>
        </div>


    </form>
</div>



<?php
include '../include/footer.php'
?>
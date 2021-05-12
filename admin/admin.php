<?php
include '../include/header.php';
require_once '../process/db_connect.php';
include '../process/autoload.php';

$destination = new DestinationManager($bdd);
$allDestinations = $destination->getListGroupByName();
$tourop = new Tour_operatorsManager($bdd);
$allTourop = $tourop->getList();




if (isset($_POST['link'])){

    $newTourop = new Tour_operators(['name'=>$_POST['name'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['premium']]);
    $tourop->add($newTourop);
}

if (isset($_POST['TO'])){

    $newDestination = new Destinations(['location'=>$_POST['location'], 'id_tour_operator'=>$_POST['TO'], 'price'=>$_POST['price'], 'img'=>$_POST['img'], 'descri'=>$_POST['descri']]);
    $operator = new Tour_operators(['id'=>$_POST['TO']]);
    $destination->add($newDestination, $operator);

}

?>

    <main class="height-xxxl space">

    </main>

    <!--
      CREER UN TOUR-OP
    -->

    <section>
  <div class="container ">

    <div class="grid gap-sm " >
      <div class="bg-contrast-lower radius-md padding-md text-center flex@md flex-column@md col-6@md">
        <div class="rating rating--read-only js-rating js-rating--read-only margin-bottom-sm">
          <p class="sr-only">The rating of this product is <span class="rating__value js-rating__value">3.5</span> out of 5</p>

          <div class="rating__control rating__control--is-hidden js-rating__control">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <polygon points="12 1.489 15.09 7.751 22 8.755 17 13.629 18.18 20.511 12 17.261 5.82 20.511 7 13.629 2 8.755 8.91 7.751 12 1.489" fill="currentColor" />
            </svg>
          </div>
        </div>

        <div class="col-3 width-100%"></div>
        <form class="sign-up-form col-12" method="post" action="admin.php">
          <div class="text-component  margin-bottom-sm">
            <h1 class="text-center">Créer un Tour-OP</h1>
            <div class="text-center">
              <p class="text-sm"><a href="formSelect.php" style="text-decoration: none; font-size:20px; color:cornflowerblue">Ajouter une destination</a></a></p>
            </div>
            <div class="margin-bottom-sm">
              <div class="grid gap-xs">
                <div class="col-12">
                  <label class="form-label margin-bottom-xxxs" for="input-first-name">Tour opérateur</label>
                  <input class="form-control width-100%" type="text" name="name" id="input-first-name">
                </div>
              </div>
            </div>

            <div class="margin-bottom-sm">
              <div class="grid gap-xs">
                <div class="col-6">
                  <label class="form-label margin-bottom-xxxs" for="input-first-name">Link</label>
                  <input class="form-control width-100%" type="text" name="link" id="input-first-name">
                </div>

                <div class="col-6">
                  <label class="form-label margin-bottom-xxxs" for="input-last-name">Premium</label>
                  <input class="form-control width-100%" type="text" name="premium" id="input-last-name">
                </div>
              </div>
            </div>

            <div class="margin-bottom-sm">
              <button class="btn btn--primary btn--md width-100%">Envoyer</button>
            </div>
        </form>
      </div>
    </div>

    <!--
      CREER UNE DESTINATION
    -->

    <div class="bg-contrast-lower radius-md padding-md text-center flex@md flex-column@md col-6@md">
      <div class="rating rating--read-only js-rating js-rating--read-only margin-bottom-sm">
        <p class="sr-only">The rating of this product is <span class="rating__value js-rating__value">4.5</span> out of 5</p>

        <div class="rating__control rating__control--is-hidden js-rating__control">
          <svg width="24" height="24" viewBox="0 0 24 24">
            <polygon points="12 1.489 15.09 7.751 22 8.755 17 13.629 18.18 20.511 12 17.261 5.82 20.511 7 13.629 2 8.755 8.91 7.751 12 1.489" fill="currentColor" />
          </svg>
        </div>
      </div>

      <div class="col-6 width-100%"></div>
    <form class="sign-up-form col-12" method="post" action="admin.php">
        <div class="text-component  margin-bottom-sm">
            <h1 class="text-center">Créer une destination</h1>
            <div class="text-center">
              <p class="text-sm"><a href="formSelect.php" style="text-decoration: none; font-size:20px; color:cornflowerblue">Ajouter une destination</a></a></p>
            </div>
            <div class="margin-bottom-sm">
                <div class="grid gap-xs">
                    <br>
                    <div class="col-4">
                        <label class="form-label margin-bottom-xxxs" for="img">Image</label>
                        <input class="form-control width-100%" type="text" name="img" id="input-last-name">
                    </div>

                    <div class="col-4">
                        <label class="form-label margin-bottom-xxxs" for="img">Description</label>
                        <input class="form-control width-100%" type="text" name="descri" id="input-last-name">
                    </div>

                    <div class="col-4">
                        <label class="form-label margin-bottom-xxxs" for="price">price</label>
                        <input class="form-control width-100%" type="text" name="price" id="input-last-name">
                    </div>


                    <div class="col-8">
                        <label class="form-label margin-bottom-xxxs" for="location">Destination</label>
                        <input class="form-control width-100%" type="text" name="location" id="input-first-name">
                    </div>

                    <div class="col-4">
                        <br>
                        <label class="select">T-O
                            <select class="select-admin" name="TO">
                                <option>T-O </option>
                                <?php foreach ($allTourop as $lineTourop){ ?>
                                <option value="<?=$lineTourop->getId()?>"><?=$lineTourop->getName()?></option>
                                <?php } ?>
                            </select>
                        </label>
                    </div>
                </div>
<br>
            <div class="margin-bottom-sm">
              <button class="btn btn--primary btn--md width-100%">Envoyer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>

<?php
include '../include/footer.php';
?>
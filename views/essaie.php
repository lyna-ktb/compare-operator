<?php include '../include/header.php' ?>


<main class="height-xxl space">

</main>

<div class="col-3 width-100%"></div>
<form class="sign-up-form col-12" action="../process/process_form_admin.php" method="post">

  <div class="grid gap-sm ">
    <div class="bg-contrast-lower radius-md padding-md text-center flex@md flex-column@md col-6@md" style="margin: 0 auto !important;">
      <div class="rating rating--read-only js-rating js-rating--read-only margin-bottom-sm">
        <p class="sr-only">The rating of this product is <span class="rating__value js-rating__value">3.5</span> out of 5</p>

        <div class="rating__control rating__control--is-hidden js-rating__control">
          <svg width="24" height="24" viewBox="0 0 24 24">
            <polygon points="12 1.489 15.09 7.751 22 8.755 17 13.629 18.18 20.511 12 17.261 5.82 20.511 7 13.629 2 8.755 8.91 7.751 12 1.489" fill="currentColor" />
          </svg>
        </div>
      </div>

      <div class="admin">
        <div class="col-3 width-100%"></div>
        <form class="sign-up-form col-6" method="post" action="formSelect.php">
          <div class="text-component text-center margin-bottom-sm">
            <h1>Ajouter une destination</h1>
            <div class="text-center">
              <p class="text-sm"> <a href="inscription.php"> <a href="admin.php" style="text-decoration: none; font-size:20px; color:cornflowerblue">Créer un Tour-Operateur</a></a></p>
            </div>
          </div>

          <div class="margin-bottom-sm col-12">
            <label class="form-label margin-bottom-xxxs" for="price">Prix</label>
            <input class="form-control width-100%" type="text" name="price" id="price" placeholder="prix €">
          </div>

          <br>

          <div class="margin-bottom-sm">
            <div class="grid gap-xs">
              <div class="col-12">
                <label class="select">Location
                  <br>
                  <select name="location" class="location">
                    <option>Destination</option>
                    <?php foreach ($allDestinations as $lineDestination) {  ?>
                      <option value="<?= $lineDestination->getLocation() ?>"><?= $lineDestination->getLocation() ?></option>
                    <?php } ?>
                  </select>
                </label>
              </div>
            </div>
            <br>
            <div class="col-12">
              <label class="select">Tour Opérateur
                <br>
                <select class="select-admin" name="TO">
                  <option>T-O</option>
                  <?php foreach ($allTourop as $lineTourop) { ?>
                    <option value="<?= $lineTourop->getId() ?>"><?= $lineTourop->getName() ?></option>
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

          <?php include '../include/footer.php' ?>
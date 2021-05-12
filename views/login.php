<?php include '../include/header.php' ?>


<main class="height-xxxl space"></main>


    <div class="col-6 width-100%"></div>
    <form class="sign-up-form col-12" action="../process/process_form_admin.php" method="post">
        <div class="grid gap-sm ">
            <div class="bg-contrast-lower radius-md padding-md text-center flex@md flex-column@md col-6@md" style="margin: 0 auto !important;">
                <div class="rating rating--read-only js-rating js-rating--read-only margin-bottom-sm">
                    <p class="sr-only">The rating of this product is <span class="rating__value js-rating__value">3.5</span> out of 5</p>
                    <div class="text-component text-center margin-bottom-sm">
            <h1>Get started</h1>
        </div>
                    <div class="rating__control rating__control--is-hidden js-rating__control">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <polygon points="12 1.489 15.09 7.751 22 8.755 17 13.629 18.18 20.511 12 17.261 5.82 20.511 7 13.629 2 8.755 8.91 7.751 12 1.489" fill="currentColor" />
                        </svg>
                    </div>
                </div>

                <div class="margin-bottom-sm">
                    <div class="grid gap-xs">
                        <div class="">
                            <label class="form-label margin-bottom-xxxs" for="pseudo">First name</label>
                            <input class="form-control width-100%" type="text" name="pseudo" id="pseudo">
                        </div>

                        <div class="margin-bottom-md ">
                            <label class="form-label margin-bottom-xxxs" for="pass">Password</label>
                            <input class="form-control width-100%" type="password" name="pass" id="pass">
                            <p class="text-xs color-contrast-medium margin-top-xxs">Minimum 6 characters</p>
                        </div>


                        <div class="margin-bottom-sm">
                            <button class="btn btn--primary btn--md width-100%">Connexion</button>
                        </div>

                        <div class="text-center">
                            <p class="text-xs color-contrast-medium">By joining, you agree to our <a href="#0">Terms</a> and <a href="#0">Privacy Policy</a>.</p>
                        </div>
    </form>
    <div class="col-3 width-100%"></div>
</div>
</div>



<?php include '../include/footer.php'  ?>
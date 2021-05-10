<?php include '../include/header.php' ?>


<main class="height-xxxl space">

</main>
<div>
    <div class="col-3 width-100%"></div>
    <form class="sign-up-form col-6" action="../process/process_form_admin.php" method="post">
        <div class="text-component text-center margin-bottom-sm">
            <h1>Get started</h1>

        </div>

        <div class="margin-bottom-sm">
            <div class="grid gap-xs">
                <div class="col-12">
                    <label class="form-label margin-bottom-xxxs" for="pseudo">First name</label>
                    <input class="form-control width-100%" type="text" name="pseudo" id="pseudo">
                </div>

                <div class="margin-bottom-md">
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



<?php include '../include/footer.php'  ?>
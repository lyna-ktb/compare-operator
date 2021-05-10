<?php
include '../include/header.php';
require_once '../process/db_connect.php';
include '../process/autoload.php';
?>
<header class="video-header">

    <video src="../assets/img/video2.mp4" autoplay loop playsinline muted></video>
    <div class="viewport-header">
        <div class="text-component text-center line-height-lg v-space-md margin-bottom-md">
            <h1 class="background-h1" >Tout ce que vous avez à faire, c'est de décider de partir</h1>
            <p class="color-medium text-md" style="color: white;">et le plus dur est fait.</p>
        </div>
    </div>
</header>


<main class="background-video">
    <main class="height-xxl space">

    </main>
<div class="container max-width-adaptive-md " id="operator">

<?php
if (isset($_GET['destination'])){

    $test = new DestinationManager($bdd);

    if (isset($_GET['destination'])) {
        $arrayDestination = $test->getDestinationByLocation($_GET['destination']);
        echo "<h1>".$_GET['destination']."</h1><br>";
        foreach ($arrayDestination as $destination){
            $to =  $test->getDestibyTo($destination);
            ?>
            <div class="card-v10 card-v10--state-2 height-33%">
                <a class="card-v10__img-link radius-lg shadow-lg" href="#0">
                    <img src="../<?=$destination->getImg()?>" alt="Image description">
                </a>

                <div class="card-v10__content-wrapper">
                    <div class="card-v10__content bg shadow-xs radius-lg">
                        <div class="card-v10__body">
                            <p class="card-v10__label text-uppercase color-primary letter-spacing-md">Tour-Opérateur</p>

                            <div class="text-component">
                                <h1 class="card-v10__title"><a class="color-contrast-higher" href="<?=$to->getLink()?>" target="_blank"><?=$to->getName()?></a></h1>
                                <h4><?=$destination->getPrice()?> €</h4>
                                <p class="card-v10__excerpt color-contrast-medium">note : <?=$to->getGrade().'/5'?></p>
                            </div>
                        </div>

                        <footer class="card-v10__footer">
                            <ul class="card-v10__social-list">
                                <li class="card-v10__social-item">
                                    <button class="reset card-v10__social-btn radius-md js-tab-focus " aria-label="Like this content along with 120 other people">
                                        <svg class="icon" viewBox="0 0 12 12">
                                            <g>
                                                <path d="M11.045,2.011a3.345,3.345,0,0,0-4.792,0c-.075.075-.15.225-.225.3-.075-.074-.15-.224-.225-.3a3.345,3.345,0,0,0-4.792,0,3.345,3.345,0,0,0,0,4.792l5.017,4.718L11.045,6.8A3.484,3.484,0,0,0,11.045,2.011Z"></path>
                                            </g>
                                        </svg>

                                        <span>120</span>
                                    </button>
                                </li>

                                <li class="card-v10__social-item">
                                    <button class="reset card-v10__social-btn radius-md js-tab-focus btn-comment" aria-controls="modal-name-4" aria-label="comments" data-idTour="<?=$to->getId()?>">
                                        <svg class="icon pointer-events-none"  viewBox="0 0 12 12">
                                            <g>
                                                <path class="pointer-events-none"
                                                      d="M6,0C2.691,0,0,2.362,0,5.267s2.691,5.266,6,5.266a6.8,6.8,0,0,0,1.036-.079l2.725,1.485A.505.505,0,0,0,10,12a.5.5,0,0,0,.5-.5V8.711A4.893,4.893,0,0,0,12,5.267C12,2.362,9.309,0,6,0Z"></path>
                                            </g>
                                        </svg>

                                        <span class="pointer-events-none">Comment</span>
                                    </button>
                                </li>

                                <!--<li class="card-v10__social-item">
                                    <button class="reset card-v10__social-btn radius-md js-tab-focus" aria-label="Share">
                                        <svg class="icon" viewBox="0 0 12 12">
                                            <g>
                                                <path d="M6,4C2.975,4,0,5.8,0,11,1.575,8.45,3.6,8,6,8v3l6-5L6,1Z"></path>
                                            </g>
                                        </svg>

                                        <span>Share</span>
                                    </button>
                                </li>-->
                            </ul>
                        </footer>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <?php
        }
    }
?>
</div>

    <div class="modal modal--animate-translate-down flex flex-center bg-contrast-higher bg-opacity-100% padding-md js-modal" id="modal-name-4">
        <div class="modal__content width-100% max-width-md max-height-100% overflow-auto bg radius-md shadow-md flex flex-column" role="alertdialog" aria-labelledby="modal-title-4" aria-describedby="modal-description-4">
            <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between flex-shrink-0">
                <h4 class="text-truncate" id="modal-title-4">Commentaire</h4>

                <button class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus">
                    <svg class="icon" viewBox="0 0 20 20">
                        <title>Close modal window</title>
                        <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="3" x2="17" y2="17" />
                            <line x1="17" y1="3" x2="3" y2="17" />
                        </g>
                    </svg>
                </button>
            </header>

            <div class="padding-y-sm padding-x-md flex-grow overflow-auto momentum-scrolling">
                <div class="text-component">
                    <div class="col-4@md">
                        <label class="form-label margin-bottom-xxs" for="input-name" style="font-weight: 700;">Name</label>
                        <p class="commentaire"></p>
                    </div>
                </div>
            </div>

            <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0 col-12">
                <form>

                    <div class="grid gap-sm">
                        <div class="col-4@md">
                            <label class="form-label margin-bottom-xxs" for="input-name">Name</label>
                            <input class="form-control width-100%" type="text" name="input-name" id="input-name" required>
                        </div>

                        <div class="col-4@md">
                            <label class="form-label margin-bottom-xxs" for="input-message">Commentaire</label>
                            <input class="form-control width-100%" type="text" name="input-message" id="input-message" placeholder="Your Message">
                        </div>

                        <div class="col-4@md">
                            <label class="form-label margin-bottom-xxs" for="input-note">Note</label>
                            <input class="form-control width-100%" type="number" min="0" max="5" name="input-note" id="input-note" placeholder="Your grade">
                        </div>

                        <div>
                            <button class="btn btn--primary btn-form-review">ENVOYER</button>
                        </div>
                </form>
        </div>
        </footer>
    </div>

<?php }






?>

</main>

<br>
<div class="flex flex-column border-top padding-y-xs margin-top-lg flex-row@md justify-between@md items-center@md">
    <div class="margin-bottom-sm margin-bottom-0@md">
    </div>
</div>

<footer class="main-footer position-relative z-index-1 padding-top-md ">
    <div class="container max-width-lg">
        <div class="grid gap-lg">
            <div class="col-3@lg order-2@lg text-right@lg">
                <a class="main-footer__logo" href="#0">
                    <svg width="104" height="30" viewBox="0 0 104 30">
                        <title>Go to homepage</title>
                        <path d="M37.54 24.08V3.72h4.92v16.37h8.47v4zM60.47 24.37a7.82 7.82 0 01-5.73-2.25 8.36 8.36 0 01-2-5.62 8.32 8.32 0 012.08-5.71 8 8 0 015.64-2.18 8.07 8.07 0 015.68 2.2 8.49 8.49 0 012 5.69 8.63 8.63 0 01-1.78 5.38 7.6 7.6 0 01-5.89 2.49zm0-3.67c2.42 0 2.73-3 2.73-4.23s-.31-4.26-2.73-4.26-2.79 3-2.79 4.26.32 4.23 2.82 4.23zM95.49 24.37a7.82 7.82 0 01-5.73-2.25 8.36 8.36 0 01-2-5.62 8.32 8.32 0 012.08-5.71 8.4 8.4 0 0111.31 0 8.43 8.43 0 012 5.69 8.6 8.6 0 01-1.77 5.38 7.6 7.6 0 01-5.89 2.51zm0-3.67c2.42 0 2.73-3 2.73-4.23s-.31-4.26-2.73-4.26-2.8 3-2.8 4.26.31 4.23 2.83 4.23zM77.66 30c-5.74 0-7-3.25-7.23-4.52l4.6-.26c.41.91 1.17 1.41 2.76 1.41a2.45 2.45 0 002.82-2.53v-2.68a7 7 0 01-1.7 1.75 6.12 6.12 0 01-5.85-.08c-2.41-1.37-3-4.25-3-6.66 0-.89.12-3.67 1.45-5.42a5.67 5.67 0 014.64-2.4c1.2 0 3 .25 4.46 2.82V8.81h4.85v15.33a5.2 5.2 0 01-2.12 4.32A9.92 9.92 0 0177.66 30zm.15-9.66c2.53 0 2.81-2.69 2.81-3.91s-.31-4-2.81-4-2.81 2.8-2.81 4 .27 3.91 2.81 3.91zM55.56 3.72h9.81v2.41h-9.81z" fill="var(--color-contrast-higher)" />
                        <circle cx="15" cy="15" r="15" fill="var(--color-primary)" />
                    </svg>
                </a>
            </div>

            <nav class="col-9@lg order-1@lg">
                <ul class="grid gap-lg">
                    <li class="col-6@xs col-3@md">
                        <h4 class="margin-bottom-sm text-base@md">Product</h4>
                        <ul class="grid gap-xs text-sm@md">
                            <li><a href="#0" class="main-footer__link">Pricing</a></li>
                            <li><a href="#0" class="main-footer__link">Teams</a></li>
                            <li><a href="#0" class="main-footer__link">Updates</a></li>
                            <li><a href="#0" class="main-footer__link">Features</a></li>
                            <li><a href="#0" class="main-footer__link">Integrations</a></li>
                            <li><a href="#0" class="main-footer__link">Support</a></li>
                        </ul>
                    </li>

                    <li class="col-6@xs col-3@md">
                        <h4 class="margin-bottom-sm text-base@md">Developers</h4>
                        <ul class="grid gap-xs text-sm@md">
                            <li><a href="#0" class="main-footer__link">Documentation</a></li>
                            <li><a href="#0" class="main-footer__link">API reference</a></li>
                            <li><a href="#0" class="main-footer__link">API status</a></li>
                            <li><a href="#0" class="main-footer__link">Open source</a></li>
                        </ul>
                    </li>

                    <li class="col-6@xs col-3@md">
                        <h4 class="margin-bottom-sm text-base@md">Resources</h4>
                        <ul class="grid gap-xs text-sm@md">
                            <li><a href="#0" class="main-footer__link">Tutorials</a></li>
                            <li><a href="#0" class="main-footer__link">Docs</a></li>
                            <li><a href="#0" class="main-footer__link">Community</a></li>
                            <li><a href="#0" class="main-footer__link">Case studies</a></li>
                            <li><a href="#0" class="main-footer__link">Help center</a></li>
                        </ul>
                    </li>

                    <li class="col-6@xs col-3@md">
                        <h4 class="margin-bottom-sm text-base@md">About</h4>
                        <ul class="grid gap-xs text-sm@md">
                            <li><a href="#0" class="main-footer__link">Company</a></li>
                            <li><a href="#0" class="main-footer__link">Customers</a></li>
                            <li><a href="#0" class="main-footer__link">Careers</a></li>
                            <li><a href="#0" class="main-footer__link">Education</a></li>
                            <li><a href="#0" class="main-footer__link">Our story</a></li>
                            <li><a href="#0" class="main-footer__link">Press kit</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="flex flex-column border-top padding-y-xs margin-top-lg flex-row@md justify-between@md items-center@md">
            <div class="margin-bottom-sm margin-bottom-0@md">
                <div class="text-sm text-xs@md color-contrast-medium flex flex-wrap gap-xs">
                    <span>&copy; myWebsite</span>
                    <a href="#0" class="color-contrast-high">Terms</a>
                    <a href="#0" class="color-contrast-high">Privacy</a>
                </div>
            </div>

            <div class="flex items-center gap-xs">
                <a href="#0" class="main-footer__social">
                    <svg class="icon block" viewBox="0 0 16 16">
                        <title>Follow us on Twitter</title>
                        <g>
                            <path d="M16,3c-0.6,0.3-1.2,0.4-1.9,0.5c0.7-0.4,1.2-1,1.4-1.8c-0.6,0.4-1.3,0.6-2.1,0.8c-0.6-0.6-1.5-1-2.4-1 C9.3,1.5,7.8,3,7.8,4.8c0,0.3,0,0.5,0.1,0.7C5.2,5.4,2.7,4.1,1.1,2.1c-0.3,0.5-0.4,1-0.4,1.7c0,1.1,0.6,2.1,1.5,2.7 c-0.5,0-1-0.2-1.5-0.4c0,0,0,0,0,0c0,1.6,1.1,2.9,2.6,3.2C3,9.4,2.7,9.4,2.4,9.4c-0.2,0-0.4,0-0.6-0.1c0.4,1.3,1.6,2.3,3.1,2.3 c-1.1,0.9-2.5,1.4-4.1,1.4c-0.3,0-0.5,0-0.8,0c1.5,0.9,3.2,1.5,5,1.5c6,0,9.3-5,9.3-9.3c0-0.1,0-0.3,0-0.4C15,4.3,15.6,3.7,16,3z"></path>
                        </g>
                    </svg>
                </a>

                <a href="#0" class="main-footer__social">
                    <svg class="icon block" viewBox="0 0 16 16">
                        <title>Follow us on Youtube</title>
                        <g>
                            <path d="M15.8,4.8c-0.2-1.3-0.8-2.2-2.2-2.4C11.4,2,8,2,8,2S4.6,2,2.4,2.4C1,2.6,0.3,3.5,0.2,4.8C0,6.1,0,8,0,8 s0,1.9,0.2,3.2c0.2,1.3,0.8,2.2,2.2,2.4C4.6,14,8,14,8,14s3.4,0,5.6-0.4c1.4-0.3,2-1.1,2.2-2.4C16,9.9,16,8,16,8S16,6.1,15.8,4.8z M6,11V5l5,3L6,11z"></path>
                        </g>
                    </svg>
                </a>

                <a href="#0" class="main-footer__social">
                    <svg class="icon block" viewBox="0 0 16 16">
                        <title>Follow us on Github</title>
                        <g>
                            <path d="M8,0.2c-4.4,0-8,3.6-8,8c0,3.5,2.3,6.5,5.5,7.6 C5.9,15.9,6,15.6,6,15.4c0-0.2,0-0.7,0-1.4C3.8,14.5,3.3,13,3.3,13c-0.4-0.9-0.9-1.2-0.9-1.2c-0.7-0.5,0.1-0.5,0.1-0.5 c0.8,0.1,1.2,0.8,1.2,0.8C4.4,13.4,5.6,13,6,12.8c0.1-0.5,0.3-0.9,0.5-1.1c-1.8-0.2-3.6-0.9-3.6-4c0-0.9,0.3-1.6,0.8-2.1 c-0.1-0.2-0.4-1,0.1-2.1c0,0,0.7-0.2,2.2,0.8c0.6-0.2,1.3-0.3,2-0.3c0.7,0,1.4,0.1,2,0.3c1.5-1,2.2-0.8,2.2-0.8 c0.4,1.1,0.2,1.9,0.1,2.1c0.5,0.6,0.8,1.3,0.8,2.1c0,3.1-1.9,3.7-3.7,3.9C9.7,12,10,12.5,10,13.2c0,1.1,0,1.9,0,2.2 c0,0.2,0.1,0.5,0.6,0.4c3.2-1.1,5.5-4.1,5.5-7.6C16,3.8,12.4,0.2,8,0.2z"></path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
<?php
include '../include/footer.php';
?>

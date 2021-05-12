<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="shortcut icon" href="http://assets.stickpng.com/images/586ae70bb6fc1117b60b278d.png" type="image/x-icon">
    <link rel="stylesheet" href="/tourop/assets/scss/style.css">
    <title>Compar Operator</title>
</head>

<body>
<header class="dr-nav-header">
    <div class="container position-relative height-100% flex items-center">
        <a class="dr-nav-header__logo" href="/tourop/index.php">
            <svg viewBox="0 0 64 64">
                <title>Go to homepage</title>
                <path fill="currentColor" d="M32 1a31 31 0 1031 31A31 31 0 0032 1zm15.189 17.262a5.693 5.693 0 00-2.169 1.686 11.279 11.279 0 00-1.891 3.552l-9.281 25.119q-.495-.043-1.547-.043-1.011 0-1.483.043L19.582 21.076a5.357 5.357 0 00-1.3-2.116 2.47 2.47 0 00-1.471-.7v-.881q2.642.129 6.7.129 4.49 0 6.681-.129v.881a6.764 6.764 0 00-2.374.4 1.236 1.236 0 00-.718 1.24 6.34 6.34 0 00.537 2.062l7.756 19.7 5.416-14.592a17.5 17.5 0 001.224-5.37 3.216 3.216 0 00-.934-2.567 4.374 4.374 0 00-2.761-.87v-.881q2.964.129 5.5.129 2.019 0 3.351-.129z" />
            </svg>
        </a>
    </div>
</header>

<div class="drawer js-drawer bg	" id="dr-nav-id">
    <div class="drawer__content" role="alertdialog" aria-labelledby="dr-nav-title">
        <div class="drawer__body flex flex-column js-drawer__body">
            <header class="dr-nav-drawer-header padding-x-md">
                <h4 id="dr-nav-title">Menu</h4>
            </header>

            <div class="search-input search-input--icon-right">
                <input class="search-input__input form-control" type="search" placeholder="Search..." aria-label="Search">
                <button class="search-input__btn">
                    <svg class="icon" viewBox="0 0 24 24">
                        <title>Submit</title>
                        <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none" stroke-miterlimit="10">
                            <line x1="22" y1="22" x2="15.656" y2="15.656"></line>
                            <circle cx="10" cy="10" r="8"></circle>
                        </g>
                    </svg>
                </button>
            </div>

            <nav class="dr-nav padding-md" aria-label="Main">
                <ul>
                    <li>
                        <a class="dr-nav__link" href="/tourop/views/all_tour.php">
                            <span><i class="fas fa-home"></i> Tour opérateur</span>

                        </a>
                    </li>

                    <li>
                        <a class="dr-nav__link" href="#0">
                            <span><i class="fas fa-plane"></i> Voyages</span>

                        </a>
                    </li>

                </ul>
            </nav>

            <footer class="padding-md margin-top-auto">
                <a href="/tourop/views/login.php" class="menu-sign" style="color: black; font-weight:600;"> ADMIN  &nbsp; <i class="fal fa-sign-in-alt" style="font-size: 1.8rem; font-weight:350;"></i> </a>

            </footer>
        </div>
    </div>
</div>

<div class="dr-nav-control-wrapper">
    <div class="container height-100% flex items-center">
        <button class="reset margin-left-auto dr-nav-control anim-menu-btn js-anim-menu-btn js-dr-nav-control js-tab-focus" aria-label="Toggle navigation" aria-controls="dr-nav-id">
            <svg class="dr-nav-control__bg" aria-hidden="true" viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="22" stroke-miterlimit="10" />
            </svg>
            <i class="anim-menu-btn__icon anim-menu-btn__icon--arrow-right" aria-hidden="true"></i>
        </button>
    </div>
</div>


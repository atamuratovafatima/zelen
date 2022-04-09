<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/swiper/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/swiper/slick-theme.css" />
    <script src="https://kit.fontawesome.com/67e895b2e2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./assets/js/slick-slider/jquery-1.11.0.min.js" defer async></script>
    <script type="text/javascript" src="./assets/js/slick-slider/jquery-migrate-1.2.1.min.js" defer async></script>
    <script type="text/javascript" src="./assets/js/slick-slider/slick.min.js" defer async></script>
    <script type="text/javascript" src="./assets/js/slick-slider/slick-styles__example.js" defer async></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" defer async></script>
    <script type="text/javascript" src="./assets/js/chart.styles.js" defer async> </script>
    <title>UK and RU</title>
</head>

<body>
    <ul class="lang__container">
        <li class="lang__item">
            <a href="ru" class="lang">Ru</a>
        </li>
        <li class="lang__item">
            <a href="en" class="lang">En</a>
        </li>
        <li class="lang__item">
            <a href="donate" class="lang">Donate</a>
        </li>
    </ul>
    <nav class="nav">
        <div class="container">
            <input type="checkbox" name="burger" id="burger">
            <label for="burger" class="burger-icon">
                <i class="fa-solid fa-bars fa-2x"></i>
            </label>
            <div class="nav__container">
                <ul class="nav__list-container">
                    <li class="nav__list-item">
                        <a href="#home">Home</a>
                    </li>
                    <li class="nav__list-item">
                        <a href="#about">About</a>
                    </li>
                    <li class="nav__list-item">
                        <a href="#russia">Russia</a>
                    </li>
                    <li class="nav__list-item">
                        <a href="#ukraine">Ukraine</a>
                    </li>
                    <li class="nav__list-item">
                        <a href="#lorem">Lorem</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="header__flex-container">
            <div class="header__flex-item">
                <!-- <div class="banner__container">
                    <img src="./assets/img/banner/1.jpg" class="banner" alt="banner">
                </div> -->
            </div>
            <div class="header__flex-item">
                <main class="currency">
                    <table class="main__table-container">
                        <tr>
                            <th class="main__table-list">Currency</th>
                            <th class="main__table-list">23 feb</th>
                            <th class="main__table-list">today</th>
                            <th class="main__table-list">diff</th>
                            <th class="main__table-list">diff%</th>
                        </tr>
                        <?php
                        require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Currency.php');
                        $curr = new Currency;
                        $curr_list = $curr->get();
                        $curr->close();
                        for ($i = 0; $i < count($curr_list); $i++) {
                        ?>
                            <tr>
                                <td class="main__table-list">
                                    <div class="list__flex-container">
                                        <div class="list__img">
                                            <img src="./assets/img/currency/USD.png" alt="usd">
                                        </div>
                                        <p class="list__name"><?php echo $curr_list[$i]['currency'] ?></p>
                                    </div>
                                </td>
                                <td class="main__table-list"><?php echo round($curr_list[$i]['feb23'], 2) ?></td>
                                <td class="main__table-list"><?php echo round($curr_list[$i]['today'], 2) ?></td>
                                <td class="main__table-list"><?php echo round($curr_list[$i]['diff'], 2) ?></td>
                                <td class="main__table-list"><?php echo round($curr_list[$i]['diff_percentage'] * 100, 1) ?> %</td>
                            </tr>
                        <?php } ?>
                    </table>
                </main>
            </div>

        </div>
    </div>
    <main class="main">
        <div class="container">
            <div class="main__btn-container">
                <h1 class="main__btn-title">Kartochki</h1>
                <input type="radio" name="logo" id="logo-card">
                <label for="logo-card" class="main__radio-btn card">Logotipi</label>
                <input type="radio" name="logo" id="logo-list">
                <label for="logo-list" class="main__radio-btn list">Spisok</label>

                <ul class="flex__list-container">
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/class/CompaniesLeaved.php');
                    $companiesLeaved = new CompaniesLeaved;
                    $companiesLeaved_list = $companiesLeaved->get();
                    for ($i = 0; $i < count($companiesLeaved_list); $i++) {

                    ?>
                        <li class="flex__list">
                            <div class="flex__img-container">
                                <img src="<?php echo $companiesLeaved_list[$i]['Logo']  ?>" alt="">
                            </div>
                            <div class="flex__hover-container">
                                <p class="flex-hover"><?php echo $companiesLeaved_list[$i]['CompanyName']  ?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="main__logo-container">
                    <?php for ($i = 0; $i < count($companiesLeaved_list); $i++) { ?>
                        <li class="main__logo-list"><?php echo $companiesLeaved_list[$i]['CompanyName']  ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>

    <div class="container">
        <section class="main__losses">
            <h1 class="main__title">Losses</h1>
            <table class="main__table-container">
                <tr>
                    <th class="main__table-list" rowspan="2">AU</th>

                    <th class="main__table-list" rowspan="2">Total Ukraine forces</th>
                    <th class="main__table-list" colspan="2">Ukraine losses</th>
                    <th class="main__table-list" rowspan="2">Total Russian forces</th>
                    <th class="main__table-list" colspan="2">Russia losses</th>
                </tr>
                <tr>
                    <th class="main__table-list">by Ukraine news</th>
                    <th class="main__table-list">by Russia news</th>
                    <th class="main__table-list">by Ukraine news</th>
                    <th class="main__table-list">by Russia news</th>
                </tr>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/class/Losses.php');
                $losses = new Losses;
                $losses_list = $losses->get();
                for ($i = 0; $i < count($losses_list); $i++) {
                ?>
                    <tr>
                        <td class="main__table-list"><?php echo $losses_list[$i]['type'] ?></td>
                        <td class="main__table-list"><?php echo $losses_list[$i]['total_ukr_forces'] ?></td>
                        <td class="main__table-list"><?php echo $losses_list[$i]['ukr_losses_by_ukr_news'] ?></td>
                        <td class="main__table-list"><?php echo $losses_list[$i]['ukr_losses_by_ru_news'] ?></td>
                        <td class="main__table-list"><?php echo $losses_list[$i]['total_ru_forces'] ?></td>
                        <td class="main__table-list"><?php echo $losses_list[$i]['ru_losses_by_ukr_news'] ?></td>
                        <td class="main__table-list"><?php echo $losses_list[$i]['ru_losses_by_ru_news'] ?></td>


                    </tr>
                <?php } ?>
            </table>
        </section>
        <section class="map">
            <div class="map__container">
                <h1 class="map__title">Map</h1>

                <input type="radio" checked="checked" name="map" id="airspace">
                <label for="airspace" class="map__btn">Air space</label>

                <input type="radio" name="map" id="rusanction">
                <label for="rusanction" class="map__btn">Spisok</label>

                <input type="radio" name="map" id="novisa">
                <label for="novisa" class="map__btn">No entry visa</label>

                <input type="radio" name="map" id="ruposition">
                <label for="ruposition" class="map__btn">Position to RU</label>

                <div class="map__airspace-container">
                    <div class="map__airspace">
                        <h1 class="map__airspace-title">Air space</h1>
                        <img src="./assets/img/map/world.svg" alt="world map">
                    </div>
                </div>

                <div class="map__rusanction-container">
                    <div class="map__rusanction">
                        <h1 class="map__rusanction-title">Sunction to RU</h1>
                        <img src="./assets/img/map/world.svg" alt="world map">
                    </div>
                </div>

                <div class="map__novisa-container">
                    <div class="map__novisa">
                        <h1 class="map__novisa-title">No enter visa</h1>
                        <img src="./assets/img/map/world.svg" alt="world map">
                    </div>
                </div>

                <div class="map__ruposition-container">
                    <div class="map__ruposition">
                        <h1 class="map__ruposition-title">Position to RU</h1>
                        <img src="./assets/img/map/world.svg" alt="world map">
                    </div>
                </div>
            </div>
        </section>
        <div class="canvas">
            <canvas id="myChart"></canvas>
        </div>
        <main class="people">
            <h1 class="people__title">Persons under sanction</h1>
            <ul class="people__list-container">
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/class/personsNonGrata.php');

                $personsNG = new PersonsNonGrata;
                $personsNG_list = $personsNG->get();

                for ($i = 0; $i < count($personsNG_list); $i++) {
                ?>
                    <li class="people__list">
                        <a href="#" class="people__list-item">
                            <div class="people__avatar-container">
                                <img src="./assets/img/ava/putin.jpg" class="people__avatar" alt="">
                            </div>
                            <div class="people__description-container">
                                <p class="people__description"><?php echo $personsNG_list[$i]['Name'] ?></p>
                                <p class="people__description-text"><?php echo $personsNG_list[$i]['Description'] ?></p>
                            </div>
                        </a>
                    </li>
                <?php } ?>

            </ul>
        </main>
        <main class="main">
            <h1 class="main__title margin-top">lorem ipsum</h1>
            <table class="main__table-container">
                <tr>
                    <th class="main__table-list">Company stock</th>
                    <th class="main__table-list">23 feb</th>
                    <th class="main__table-list">today</th>
                    <th class="main__table-list">diff</th>
                    <th class="main__table-list">diff%</th>
                </tr>
                <tr>
                    <td class="main__table-list">lorem1</td>
                    <td class="main__table-list">lorem2</td>
                    <td class="main__table-list">lorem3</td>
                    <td class="main__table-list">lorem4</td>
                    <td class="main__table-list">lorem5</td>
                </tr>
                <tr>
                    <td class="main__table-list">lorem1</td>
                    <td class="main__table-list">lorem2</td>
                    <td class="main__table-list">lorem3</td>
                    <td class="main__table-list">lorem4</td>
                    <td class="main__table-list">lorem5</td>
                </tr>
                <tr>
                    <td class="main__table-list">lorem1</td>
                    <td class="main__table-list">lorem2</td>
                    <td class="main__table-list">lorem3</td>
                    <td class="main__table-list">lorem4</td>
                    <td class="main__table-list">lorem5</td>
                </tr>
                <tr>
                    <td class="main__table-list">lorem1</td>
                    <td class="main__table-list">lorem2</td>
                    <td class="main__table-list">lorem3</td>
                    <td class="main__table-list">lorem4</td>
                    <td class="main__table-list">lorem5</td>
                </tr>
            </table>
        </main>

    </div>


</body>

</html>
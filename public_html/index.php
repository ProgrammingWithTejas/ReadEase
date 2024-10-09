<?php
include_once '../private/_dbconnect.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <div class="container">
            <div class="navigation active">
                <ul>
                    <li>
                        <img src="img/ReadEase Logo.png" width="96px" height="96px" alt="" />
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title">Lorem</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title">Lorem</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title">Lorem</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- main -->
            <div class="main active">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
        </div>
    </header>

    <section class="home active" id="home">
        <div class="row">
            <div class="content">
                <h3>TITLE</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti, facere. Ab exercitationem quas, voluptate maxime veniam rerum beatae ipsa id ex doloribus. Hic, sint saepe voluptatem maiores quidem quaerat consequuntur.</p>
                <a href="#" class="btn">View now</a>
            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"><img src="img/Bhagavad Gita.jpg" alt="Shreemad Bhagavad Gita"></a>
                    <a href="#" class="swiper-slide"><img src="img/Harry Potter.jpg" alt="Harry Potter"></a>
                    <a href="#" class="swiper-slide"><img src="img/A tale of two cities.jpeg" alt="A tale of two cities"></a>
                    <a href="#" class="swiper-slide"><img src="img/Atomic Habits.jpg" alt="Atomic Habits"></a>
                    <a href="#" class="swiper-slide"><img src="img/Rich Dad poor dad.jpg" alt="Rich Dad Poor Dad"></a>
                    <a href="#" class="swiper-slide"><img src="img/The Alchemist.jpg" alt="The Alchemist"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="featured" id="featured">
        <h1 class="heading"><span>Featured Books</span></h1>
        <div class="featured-slider">
            <div class="wrapper">
                <div class="box">
                    <div class="icons">
                        <ion-icon name="heart-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    <div class="image">
                        <img src="img/A tale of two cities.jpeg" alt="">
                    </div>
                    <div class="content">
                        <h3>A tale of two cities</h3>
                        <a href="#" class="btn">View Now</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                        <ion-icon name="heart-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    <div class="image">
                        <img src="img/Atomic Habits.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Atomic Habits</h3>
                        <a href="#" class="btn">View Now</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                        <ion-icon name="heart-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    <div class="image">
                        <img src="img/Bhagavad Gita.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Bhagavat Gita</h3>
                        <a href="#" class="btn">View Now</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                        <ion-icon name="heart-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    <div class="image">
                        <img src="img/Harry Potter.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Harry Potter</h3>
                        <a href="#" class="btn">View Now</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                        <ion-icon name="heart-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    <div class="image">
                        <img src="img/Rich Dad poor dad.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Rich Dad Poor Dad</h3>
                        <a href="#" class="btn">View Now</a>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                        <ion-icon name="heart-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    <div class="image">
                        <img src="img/The Alchemist.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>The Alchemist</h3>
                        <a href="#" class="btn">View Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="index.js"></script>
</body>

</html>
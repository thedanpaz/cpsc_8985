<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Directory | Better Reviews</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <nav class="main-menu mobile-menu">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="how-it-works.html">Explore</a></li>
                <li><a href="listings.html">More Cities</a></li>
                <li><a href="blog.html">News</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="user-access">
                <a href="#">Register/</a>
                <a href="#">Login</a>
            </div>
            <a href="#" class="primary-btn">Add Listing</a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

<!-- Hero Section Begin -->
<section class="hero-section set-bg" data-setbg="img/hero-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-text">
                    <img src="img/placeholder.png" alt="">
                    <h1>New York</h1>
                    <form action="#" class="filter-search">
                        <div class="category-search">
                            <h5>Search Category</h5>
                            <select class="ca-search">
                                <option>Restaurants</option>
                                <option>Hotels</option>
                                <option>Food & Drinks</option>
                                <option>Home Delievery</option>
                                <option>Commercial Shops</option>
                            </select>
                        </div>
                        <div class="location-search">
                            <h5>Your Location</h5>
                            <select class="lo-search">
                                <option>New York</option>
                            </select>
                        </div>
                        <button type="submit">Search Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Trending Restaurant Section Begin -->
<section class="trending-restaurant spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Top trending for your city</h2>
                    <p>Explore some of the best places in the world</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="trend-item">
                    <div class="trend-pic">
                        <img src="img/trending/trending-1.jpg" alt="">
                        <div class="rating">4.9</div>
                    </div>
                    <div class="trend-text">
                        <h4>New Place Restaurant</h4>
                        <span>Main Road , No 25/11</span>
                        <p>Fusce urna quam, euismod sit amet mollis quis.</p>
                        <div class="closed">Closed Now</div>
                        <div class="open">Opens Tomorow at 10am</div>
                    </div>
                    <div class="tic-text">Restaurants</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="trend-item nightlife">
                    <div class="trend-pic">
                        <img src="img/trending/trending-2.jpg" alt="">
                        <div class="rating">4.9</div>
                    </div>
                    <div class="trend-text">
                        <h4>Palace Club</h4>
                        <span>Parker Street, No 234/40</span>
                        <p>Fusce urna quam, euismod sit amet mollis quis.</p>
                        <div class="open">Open Until 3am</div>
                    </div>
                    <div class="tic-text">Nightlife</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="trend-item hotels">
                    <div class="trend-pic">
                        <img src="img/trending/trending-3.jpg" alt="">
                        <div class="rating">4.6</div>
                    </div>
                    <div class="trend-text">
                        <h4>Grand Hotel</h4>
                        <span>Main Road , No 25/11</span>
                        <p>Morbi id dictum quam, ut commodo lorem.</p>
                        <div class="closed">Closed Now</div>
                        <div class="open">Opens Tomorow at 10am</div>
                    </div>
                    <div class="tic-text">Hotels</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="trend-item events">
                    <div class="trend-pic">
                        <img src="img/trending/trending-4.jpg" alt="">
                        <div class="rating">5.0</div>
                    </div>
                    <div class="trend-text">
                        <h4>Opera Concert</h4>
                        <span>Parker Street, No 234/40</span>
                        <p>Aliquam erat volutpat. Morbi id dictum.</p>
                        <div class="open">Open Until 3am</div>
                    </div>
                    <div class="tic-text">Events</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trending Restaurant Section End -->

<!-- Categories Section Begin -->
<section class="categories-section spad">
    <div class="container-fluid">
        <div class="categories-left">
            <div class="categories-item set-bg large-img" data-setbg="img/categories/cat-1.jpg">
                <a href="img/categories/cat-1.jpg" class="img-hover pop-up"><img src="img/zoom.png" alt=""></a>
                <div class="categories-text">
                    <h4>Restaurants</h4>
                    <p>2373 Listings</p>
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
        <div class="categories-right">
            <div class="row">
                <div class="col-md-6">
                    <div class="categories-item set-bg" data-setbg="img/categories/cat-2.jpg">
                        <a href="img/categories/cat-2.jpg" class="img-hover pop-up"><img src="img/zoom.png" alt=""></a>
                        <div class="categories-text">
                            <h4>Nightlife & Clubs</h4>
                            <p>2373 Listings</p>
                            <a href="#">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="categories-item set-bg" data-setbg="img/categories/cat-3.jpg">
                        <a href="img/categories/cat-3.jpg" class="img-hover pop-up"><img src="img/zoom.png" alt=""></a>
                        <div class="categories-text">
                            <h4>Spa & Resorts</h4>
                            <p>2373 Listings</p>
                            <a href="#">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="categories-item set-bg" data-setbg="img/categories/cat-4.jpg">
                        <a href="img/categories/cat-4.jpg" class="img-hover pop-up"><img src="img/zoom.png" alt=""></a>
                        <div class="categories-text">
                            <h4>Hotels</h4>
                            <p>2373 Listings</p>
                            <a href="#">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="categories-item set-bg" data-setbg="img/categories/cat-5.jpg">
                        <a href="img/categories/cat-5.jpg" class="img-hover pop-up"><img src="img/zoom.png" alt=""></a>
                        <div class="categories-text">
                            <h4>Clubs & Pubs</h4>
                            <p>2373 Listings</p>
                            <a href="#">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="testimonial-item owl-carousel">
                    <div class="single-testimonial-item">
                        <img src="img/testimonial-1.png" alt="">
                        <p>Fusce urna quam, euismod sit amet mollis quis. Fusce urna quam, euismod sit amet mollis
                            quis, vestibulum quis velit. Vestibulum malesuada aliquet libero viverra cursus. Aliquam
                            erat volutpat. Morbi id dictum quam, ut commodo lorem. In at nisi nec arcu porttitor
                            aliquet vitae at dui. Sed sollicitudin nulla non leo viverra.</p>
                        <h4>Michael Smith</h4>
                        <span>CEO Company</span>
                    </div>
                    <div class="single-testimonial-item">
                        <img src="img/testimonial-1.png" alt="">
                        <p>Fusce urna quam, euismod sit amet mollis quis. Fusce urna quam, euismod sit amet mollis
                            quis, vestibulum quis velit. Vestibulum malesuada aliquet libero viverra cursus. Aliquam
                            erat volutpat. Morbi id dictum quam, ut commodo lorem. In at nisi nec arcu porttitor
                            aliquet vitae at dui. Sed sollicitudin nulla non leo viverra.</p>
                        <h4>Michael Smith</h4>
                        <span>CEO Company</span>
                    </div>
                    <div class="single-testimonial-item">
                        <img src="img/testimonial-1.png" alt="">
                        <p>Fusce urna quam, euismod sit amet mollis quis. Fusce urna quam, euismod sit amet mollis
                            quis, vestibulum quis velit. Vestibulum malesuada aliquet libero viverra cursus. Aliquam
                            erat volutpat. Morbi id dictum quam, ut commodo lorem. In at nisi nec arcu porttitor
                            aliquet vitae at dui. Sed sollicitudin nulla non leo viverra.</p>
                        <h4>Michael Smith</h4>
                        <span>CEO Company</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="bg-img">
            <img src="img/testimonial-bg.png" alt="">
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- How It Works Section Begin -->
<section class="work-section set-bg" data-setbg="img/line-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>How it works</h2>
                    <p>Explore some of the best places in the world</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-work-item">
                    <div class="number">01.</div>
                    <div class="work-text">
                        <h4>Search the portal</h4>
                        <p>Fusce urna quam, euismod sit amet mollis quis.Aliquam erat volutpat. Morbi id dictum quam,
                            ut.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-work-item">
                    <div class="number">02.</div>
                    <div class="work-text">
                        <h4>Choose the one 4u</h4>
                        <p>Euismod sit amet mollis quis. Ali-quam erat volutpat. Morbi id dictum quam, ut commodo
                            lorem. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-work-item">
                    <div class="number">03.</div>
                    <div class="work-text">
                        <h4>Book it!</h4>
                        <p>Euismod sit amet mollis quis. Ali-quam erat volutpat. Morbi id dictum quam, ut commodo
                            lorem. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How It Works Section End -->

<!-- App Section Begin -->
<section class="app-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="img/phone.png" alt="">
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="app-text">
                    <div class="section-title">
                        <h2>Get the App now!</h2>
                        <p>Explore some of the best places in the world</p>
                    </div>
                    <p>Morbi id dictum quam, ut commodo lorem. Donec bibendum, enim ut luctus dictum, nisl turpis
                        scelerisque sem, in dapibus neque odio eu sapien. Morbi ac aliquet erat. Sed dapibus, augue
                        et malesuada maximus.</p>
                    <ul>
                        <li><img src="img/check-icon.png" alt="">Fusce urna quam, euismod sit amet mollis quis,
                            vestibulum
                            quis veli
                        </li>
                        <li><img src="img/check-icon.png" alt="">Vestibulum malesuada aliquet libero viverra cursus</li>
                        <li><img src="img/check-icon.png" alt="">Urna quam, euismod sit amet mollis quis, vestibulum
                            quis veli
                        </li>
                    </ul>
                    <a href="#"><img src="img/apple-store.jpg" alt=""></a>
                    <a href="#"><img src="img/google-store.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- App Section End -->


<!-- Footer Section Begin -->
<footer class="footer-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="#" class="newslatter-form">
                    <input type="text" placeholder="Your email address">
                    <button type="submit">Subscribe to our Newsletter</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h4>Usefull Links</h4>
                    <ul>
                        <li>About us</li>
                        <li>Testimonials</li>
                        <li>How it works</li>
                        <li>Create an account</li>
                        <li>Our Services</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h4>Categories</h4>
                    <ul>
                        <li>Hotels</li>
                        <li>Restaurant</li>
                        <li>Spa & resorts</li>
                        <li>Concert & Events</li>
                        <li>Bars & Pubs</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h4>Usefull Links</h4>
                    <ul>
                        <li>About us</li>
                        <li>Testimonials</li>
                        <li>How it works</li>
                        <li>Create an account</li>
                        <li>Our Services</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h4>From the Blog</h4>
                    <div class="single-blog">
                        <div class="blog-pic">
                            <img src="img/f-blog-1.jpg" alt="">
                        </div>
                        <div class="blog-text">
                            <h6>10 Best clubs in town</h6>
                            <span>March 27, 2019</span>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="blog-pic">
                            <img src="img/f-blog-2.jpg" alt="">
                        </div>
                        <div class="blog-text">
                            <h6>10 Best clubs in town</h6>
                            <span>March 27, 2019</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col-lg-5 order-2 order-lg-1">
                <div class="copyright">
                    <p class="text-white">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i>
                        by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
            <div class="col-lg-7 text-center text-lg-right order-1 order-lg-2">
                <div class="footer-menu">
                    <a href="#">Home</a>
                    <a href="#">Explore</a>
                    <a href="#">More Cities</a>
                    <a href="#">News</a>
                    <a href="#">Contact</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>

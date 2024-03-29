
<?php $__env->startSection('content'); ?>
    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="<?php echo e(asset('fashi/img/products/women-large.jpg')); ?>">
                        <h2>Femmes</h2>
                        <a href="#">Découvrir plus</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Pommade</li>
                            <li>Savon</li>
                            <li>Thé</li>
                            <li>Huile de corp</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <!-- Récupération des produits depuis la base de données -->
                        <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo e(asset('fashi/img/products/women-2.jpg')); ?>" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Aperçu</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <!-- Désignation du produti -->
                                <a href="#">
                                    <h5><?php echo e($produit->designation); ?></h5>
                                </a>
                                <!-- Prix du produti -->
                                <div class="product-price">
                                    <?php echo e($produit->prix_prod); ?> FCFA
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="<?php echo e(asset('fashi/img/time-bg.jpg')); ?>">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Promo de la semaine</h2>
                    <p>
                        Ne manquez pas notre promotion de la semaine ! Elle se termine bientôt.
                    </p>
                    <div class="product-price">
                        15 000 FCFA
                        <span>/ Sac de voyage</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>100</span>
                        <p>Jours</p>
                    </div>
                    <div class="cd-item">
                        <span>24</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>00</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>00</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <!-- Récupération des produits depuis la base de données -->
                        <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?php echo e(asset('fashi/img/products/women-2.jpg')); ?>" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Aperçu</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <!-- Désignation du produti -->
                                <a href="#">
                                    <h5><?php echo e($produit->designation); ?></h5>
                                </a>
                                <!-- Prix du produti -->
                                <div class="product-price">
                                    <?php echo e($produit->prix_prod); ?> FCFA
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="<?php echo e(asset('fashi/img/products/man-large.jpg')); ?>">
                        <h2>Hommes</h2>
                        <a href="#">Decouvrir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="<?php echo e(asset('fashi/img/insta-1.jpg')); ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo e(asset('fashi/img/insta-2.jpg')); ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo e(asset('fashi/img/insta-3.jpg')); ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo e(asset('fashi/img/insta-4.jpg')); ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo e(asset('fashi/img/insta-5.jpg')); ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="<?php echo e(asset('fashi/img/insta-6.jpg')); ?>">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo e(asset('fashi/img/latest-1.jpg')); ?>" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo e(asset('fashi/img/latest-2.jpg')); ?>" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?php echo e(asset('fashi/img/latest-3.jpg')); ?>" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo e(asset('fashi/img/icon-1.png')); ?>" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo e(asset('fashi/img/icon-2.png')); ?>" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?php echo e(asset('fashi/img/icon-1.png')); ?>" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo e(asset('fashi/img/logo-carousel/logo-1.png')); ?>" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo e(asset('fashi/img/logo-carousel/logo-2.png')); ?>" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo e(asset('fashi/img/logo-carousel/logo-3.png')); ?>" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo e(asset('fashi/img/logo-carousel/logo-4.png')); ?>" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?php echo e(asset('fashi/img/logo-carousel/logo-5.png')); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\bouad\Documents\GitHub\shopmetics\resources\views/home.blade.php ENDPATH**/ ?>
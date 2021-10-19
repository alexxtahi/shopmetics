<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Metas -->
    <?php echo $__env->make('includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Css Styles -->
    <?php echo $__env->make('includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header Section End -->


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a>
                        <span>Boutique</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Catégories</h4>
                        <ul class="filter-catagories">
                            <!-- Récupération des catégories depuis la base de données -->
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($_GET['categorie']) && !empty($_GET['categorie']) && $_GET['categorie'] == $categorie->id): ?>
                                    <li><a href="<?php echo e(url('/boutique/filtre-categories?id_cat=' . $categorie->id)); ?>" class="active-filter"><?php echo e($categorie->lib_cat); ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(url('/boutique/filtre-categories?id_cat=' . $categorie->id)); ?>"><?php echo e($categorie->lib_cat); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!--
                    <div class="filter-widget">
                        <h4 class="fw-title">Marque</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    -->
                    <form action="<?php echo e(route('boutique.filtre-prix')); ?>" method="GET" class="filter-widget">
                        <h4 class="fw-title">Prix</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <!-- Si le filtre de prix min a été appliqué -->
                                    <?php if(isset($priceFilterMin) && !empty($priceFilterMin)): ?>
                                        <input type="text" id="minamount" name="minamount" value="<?php echo e($priceFilterMin); ?>">
                                    <?php else: ?>
                                        <input type="text" id="minamount" name="minamount">
                                    <?php endif; ?>
                                    <!-- Si le filtre de prix max a été appliqué -->
                                    <?php if(isset($priceFilterMax) && !empty($priceFilterMax)): ?>
                                        <input type="text" id="maxamount" name="maxamount" value="<?php echo e($priceFilterMax); ?>">
                                    <?php else: ?>
                                        <input type="text" id="maxamount" name="maxamount">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if((isset($priceFilterMin) &&isset($priceFilterMax)) &&
                                (!empty($priceFilterMin) && !empty($priceFilterMax))): ?>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="<?php echo e($priceFilterMin); ?>" data-max="<?php echo e($priceFilterMax); ?>" id="price-filter">
                            <?php else: ?>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="100000" id="price-filter">
                            <?php endif; ?>
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <button type="submit" class="filter-btn">Filtrer</button>
                        <a href="<?php echo e(route("boutique")); ?>" class="filter-btn">Réinitialiser</a>
                    </form>
                    <!--
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($selectedTag) && !empty($selectedTag) && $selectedTag == $tag->lib_tag): ?>
                                    <a href="<?php echo e(url('/boutique/filtre-tags?tag=' . $tag->lib_tag)); ?>" class="active-tag"><?php echo e($tag->lib_tag); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/boutique/filtre-tags?tag=' . $tag->lib_tag)); ?>"><?php echo e($tag->lib_tag); ?></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting" id="sorting" name="sorting">
                                        <option value="">Tri par défaut</option>
                                        <option value="tri-par-nom">Tri par nom</option>
                                        <option value="tri-par-prix">Tri par prix</option>
                                    </select>
                                    <!--<select class="p-show">
                                        <option value="">Afficher:</option>
                                        <option value="9">Afficher: 9 Produits</option>
                                        <option value="12">Afficher: 12 Produits</option>
                                    </select>-->
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p><strong><?php echo e($produits->count()); ?></strong> Produits</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            <!-- Récupération des produits depuis la base de données -->
                            <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src= "<?php echo e(asset($produit->img_prod)); ?>"  alt="">
                                        <!-- Afficher la bannière promo si le produit est en promotion -->
                                        <?php if($produit->en_promo == true): ?>
                                        <div class="sale pp-sale">Sale</div>
                                        <?php endif; ?>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <!-- Rajouter les accolades pour que ça marche -->
                                            <form action="{ route('cart.store') }" method="POST">
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Ajouter au panier</a></li>
                                            </form>

                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><!-- {$produit->lib_cat }--></div>
                                        <a href="#">
                                            <h5><?php echo e($produit->designation); ?></h5>
                                        </a>
                                        <div class="product-price">
                                            <!-- Prix actuel -->
                                            <?php echo e(number_format($produit->prix_prod, 0, ',', ' ')); ?> FCFA
                                            <!-- Ancien prix -->
                                            <?php if($produit->ancien_prix != $produit->prix_prod): ?>
                                            <span><?php echo e(number_format($produit->ancien_prix, 0, ',', ' ')); ?> FCFA</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

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

    <!-- Footer Section -->
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Js Plugins -->
    <?php echo $__env->make('includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\bouad\Documents\GitHub\shopmetics\resources\views/boutique.blade.php ENDPATH**/ ?>
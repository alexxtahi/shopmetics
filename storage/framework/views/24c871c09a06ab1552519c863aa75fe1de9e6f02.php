<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Metas -->
    <?php echo $__env->make('includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Css Styles -->
    <?php echo $__env->make('includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a>
                        <span>Inscription</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Inscription</h2>
                        <!-- Validation Errors -->
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <!-- Affichage d'un message en fonction du résultat de l'inscription -->
                        <?php if(isset($register_state)): ?>
                            <?php switch($register_state):
                                case ('success'): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e($register_message); ?>

                                        <a href="<?php echo e(route('login')); ?>">Cliquez ici</a> pour vous connecter.
                                    </div>
                                    <?php break; ?>
                                <?php case ('warning'): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?php echo e($register_message); ?>

                                    </div>
                                    <?php break; ?>
                                <?php case ('error'): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo e($register_message); ?>

                                    </div>
                                    <?php break; ?>
                                <?php default: ?>
                            <?php endswitch; ?>
                        <?php endif; ?>
                        <!-- Formulaire d'inscription -->
                        <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>
                            <!-- Nom -->
                            <div class="group-input">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" required>
                            </div>
                            <!-- Prénom -->
                            <div class="group-input">
                                <label for="prenom">Prénom</label>
                                <input type="text" id="prenom" name="prenom" required>
                            </div>
                            <!-- Adresse mail -->
                            <div class="group-input">
                                <label for="email">Adresse Mail</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <!-- Contact -->
                            <div class="group-input">
                                <label for="contact">Contact</label>
                                <input type="tel" id="contact" name="contact">
                            </div>
                            <!-- Ville -->
                            <div class="group-input">
                                <label for="ville">Ville</label>
                                <input type="text" id="ville" name="ville" required>
                            </div>
                            <!-- Commune -->
                            <div class="group-input">
                                <label for="commune">Commune</label>
                                <input type="text" id="commune" name="commune" required>
                            </div>
                            <!-- Mot de passe -->
                            <div class="group-input">
                                <label for="password">Mot de passe</label>
                                <input type="password" id="password" name="password" autocomplete="new-password" required>
                            </div>
                            <!-- Confirmer le mot de passe -->
                            <div class="group-input">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <!-- Rôle -->
                            <div class="group-input">
                                <input type="hidden" id="role" name="role" value="Client" required>
                            </div>
                            <!-- Valider -->
                            <button type="submit" class="site-btn register-btn">S'INSCRIRE</button>
                        </form>
                        <!-- Se connecter -->
                        <div class="switch-login">
                            <a href="<?php echo e(route('login')); ?>" class="or-login">Ou Se Connecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section -->
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Js Plugins -->
    <?php echo $__env->make('includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\bouad\Documents\GitHub\shopmetics\resources\views/auth/register.blade.php ENDPATH**/ ?>
<meta charset="UTF-8">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="description" content="Shopmetics">
<meta name="keywords" content="e-commerce, soin, beauté, pommade, huile, boutique">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Affichage du titre -->
<?php switch($view_name):
    case ('home'): ?>
        <title>Shopmetics | Accueil</title>
        <?php break; ?>
    <?php case ('boutique'): ?>
        <title>Shopmetics | Boutique</title>
        <?php break; ?>
    <?php case ('contact'): ?>
        <title>Shopmetics | Contact</title>
        <?php break; ?>
    <?php case ('blog'): ?>
        <title>Shopmetics | Blog</title>
        <?php break; ?>
    <?php case ('login'): ?>
        <title>Shopmetics | Connexion</title>
        <?php break; ?>
    <?php case ('inscription'): ?>
        <title>Shopmetics | Inscription</title>
        <?php break; ?>
    <?php case ('faq'): ?>
        <title>Shopmetics | F.A.Q</title>
        <?php break; ?>
    <?php case ('panier'): ?>
        <title>Shopmetics | Panier</title>
        <?php break; ?>
    <?php default: ?>
        <title>Shopmetics</title>
        <?php break; ?>
<?php endswitch; ?>
<?php /**PATH C:\Users\bouad\Documents\GitHub\shopmetics\resources\views/includes/meta.blade.php ENDPATH**/ ?>
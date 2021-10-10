<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="Shopmetics">
<meta name="keywords" content="e-commerce, soin, beauté, pommade, huile, boutique">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Affichage du titre -->
@switch($view_name)
    @case('home')
        <title>Shopmetics | Accueil</title>
        @break
    @case('boutique')
        <title>Shopmetics | Boutique</title>
        @break
    @case('contact')
        <title>Shopmetics | Contact</title>
        @break
    @case('blog')
        <title>Shopmetics | Blog</title>
        @break
    @case('login')
        <title>Shopmetics | Connexion</title>
        @break
    @case('inscription')
        <title>Shopmetics | Inscription</title>
        @break
    @case('faq')
        <title>Shopmetics | F.A.Q</title>
        @break
    @case('panier')
        <title>Shopmetics | Panier</title>
        @break
    @default
        <title>Shopmetics</title>
        @break
@endswitch

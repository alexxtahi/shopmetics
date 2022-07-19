<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopmetics</title>
    <link rel="stylesheet" href="{{ asset('assets/custom-style.css') }}">
</head>

<body>
    <div class="email-header">
        {{-- <img src="{{ asset('assets/img/folo-splash-logo-white.png') }}" alt="Logo FOLO Education"> --}}
        <h2>Votre commande a bien été enregistrée !</h2>
    </div>
    <div class="email-content">
        <p>Vos infos</p>
        <p><strong>Nom:</strong> {{ $client->nom . ' ' . $client->prenom }}</p>
    </div>
    <div class="email-footer">
        {{-- <a href="mailto:{{ $customer_email }}">Cliquez ici pour répondre</a> --}}
    </div>

</body>

</html>

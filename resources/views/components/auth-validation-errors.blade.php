@props(['errors'])

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <!-- Affichage d'un message en fonction du résultat de l'inscription -->
        @if ($error == 'These credentials do not match our records.')
            <div class="alert alert-warning" role="alert">
                Vos identifiants sont incorrects
            </div>
        @elseif ($error == 'The password confirmation does not match.')
            <div class="alert alert-warning" role="alert">
                Les mots de passes saisis sont différents
            </div>
        @elseif ($error == 'The password must be at least 8 characters.')
            <div class="alert alert-warning" role="alert">
                Le mot de passe doit comporter au minimum 8 caractères
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endif
    @endforeach
@endif

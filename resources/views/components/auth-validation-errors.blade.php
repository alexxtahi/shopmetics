@props(['errors'])

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <!-- Affichage d'un message en fonction du résultat de l'inscription -->
        @if ($error == "These credentials do not match our records.")
            <div class="alert alert-warning" role="alert">
                Vos identifiants sont incorrects
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                {{ $errors }}
            </div>
        @endif
    @endforeach
@endif

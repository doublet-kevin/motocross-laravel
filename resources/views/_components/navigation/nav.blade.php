<div class="flex-col items-center hidden py-4 mx-12 text-center lg:flex lg:text-start lg:flex-row lg:justify-between">
    <div class="flex px-4 text-xl text-light">
        <ul class="flex font-bold gap-x-8 ">
            <x-navigation.nav-item name="Accueil" route="{{ route('home') }}" />
            <x-navigation.nav-item name="Notre circuit" route="{{ route('circuit.index') }}" />
            <x-navigation.nav-item name="Nos entraînements" route="{{ route('training.index') }}" />
        </ul>
    </div>
    <div class="flex px-4 text-xl text-light ">
        <ul class="flex items-center font-bold gap-x-8">
            @guest
                <x-navigation.nav-item name="Connexion" route="{{ route('login') }}" />
                <x-navigation.nav-item name="Créer un compte" route="{{ route('register') }}" />
            @endguest
            @auth
                @if (Auth::user()->isAdmin())
                    <x-navigation.nav-item name="Administration" route="{{ route('user.board') }}" />
                @endif
                <x-navigation.nav-item name="Déconnexion" route="{{ route('logout') }}" method="POST" />
            @endauth
        </ul>
    </div>
</div>

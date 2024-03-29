<div x-data="{ open: false }">
    <div class ="flex items-center justify-between gap-4 px-6 py-4 shrink-0 bg-dark lg:hidden">
        <img src="{{ Vite::asset('resources/images/icons/wheel.svg') }}" alt="" class="w-10">
        <h1 class="text-xl font-bold text-center whitespace-nowrap">Motocross - Auribail</h1>


        <div class="flex relative w-[32px] h-[32px] shrink-0">
            <button x-cloak x-show="!open" class="absolute" @click.inside="open = !open" x-transition:enter.duration.300ms>
                <img src="{{ Vite::asset('resources/images/icons/mobile-nav.svg') }}" alt=""
                    class="w-[32px] h-[32px]" />
            </button>
            <button x-cloak x-show="open" class="absolute" @click.inside="open = !open"
                x-transition:enter.duration.300ms>
                <img src="{{ Vite::asset('resources/images/icons/exit.svg') }}" alt=""
                    class="flex w-[32px] h-[32px]" />
            </button>
        </div>
    </div>

    <div>

    </div>
    <ul class="text-center lg:hidden bg-dark" x-show="open" x-collapse>
        <x-navigation.nav-item name="Accueil" route="{{ route('home') }}" />
        <x-navigation.nav-item name="Notre circuit" route="{{ route('circuit.index') }}" />
        <x-navigation.nav-item name="Nos entraînements" route="{{ route('training.index') }}" />
        @guest
            <x-navigation.nav-item name="Connexion" route="{{ route('login') }}" />
            <x-navigation.nav-item name="Créer un compte" route="{{ route('register') }}" />
        @endguest
        @auth
            @if (Auth::user()->isAdmin())
                <x-navigation.nav-item name="Administration" route="{{ route('user.board') }}" />
            @else
                <x-navigation.nav-item name="Mon profil" route="{{ route('user.show', Auth::id()) }}" />
            @endif
            <x-navigation.nav-item name="Déconnexion" route="{{ route('logout') }}" method="POST" />
        @endauth

    </ul>
</div>

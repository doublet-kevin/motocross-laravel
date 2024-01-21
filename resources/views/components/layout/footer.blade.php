<footer class="flex-col mt-16 border-t-2 shadow bg-dark border-primary">
    @yield('footer-items')
    <div>
        <div class="container p-8 mx-auto lg:grid lg:grid-cols-3 gap-x-28 lg:mt-3">
            {{ $slot }}
        </div>
    </div>
</footer>

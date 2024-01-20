<footer style="height: 300px;"
    class="bg-black text-white flex justify-center flex-col rounded-lg shadow dark:bg-gray-900">
    <div class="lg:grid lg:grid-cols-4 container mx-auto mt-48 lg:mt-3 p-6">
        <div class="col-span-1 grid gap-y-4 mt-6 lg:mt-0">
            <span class="text-yellow-400 text-4xl font-bold">Motocross</span>
            Most of our events have hard and easy route choices as we are always keen to encourage new riders.
            <div class="flex gap-x-6">
                <x-social.icon url="https://www.facebook.com/"
                    src="{{ Vite::asset('resources/images/icons/twitter.svg') }}" />
                <x-social.icon url="https://www.facebook.com/"
                    src="{{ Vite::asset('resources/images/icons/linkedin.svg') }}" />
                <x-social.icon url="https://www.facebook.com/"
                    src="{{ Vite::asset('resources/images/icons/instagram.svg') }}" />
            </div>
        </div>
        <div class="col-span-1">
            <span class="">Recent News</span>
            <br />
            Most of our events have hard and easy route choices as we are always keen to encourage new riders.
            <img
                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgY2xhc3M9Imx1Y2lkZSBsdWNpZGUtZmFjZWJvb2siPjxwYXRoIGQ9Ik0xOCAyaC0zYTUgNSAwIDAgMC01IDV2M0g3djRoM3Y4aDR2LThoM2wxLTRoLTRWN2ExIDEgMCAwIDEgMS0xaDN6Ii8+PC9zdmc+"></img>
        </div>
        <div class="col-span-1">
            <span class="text-white text-xl font-bold">Newsletter</span>
            <input type="text" id="first_name"
                class="bg-gray-50 border mt-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="John" required>
        </div>
        <div class="col-span-1">
            <span class="">Motocross</span>
            <br />
            Most of our events have hard and easy route choices as we are always keen to encourage new riders.
            <img
                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgY2xhc3M9Imx1Y2lkZSBsdWNpZGUtZmFjZWJvb2siPjxwYXRoIGQ9Ik0xOCAyaC0zYTUgNSAwIDAgMC01IDV2M0g3djRoM3Y4aDR2LThoM2wxLTRoLTRWN2ExIDEgMCAwIDEgMS0xaDN6Ii8+PC9zdmc+"></img>
        </div>
    </div>
</footer>

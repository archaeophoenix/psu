<!DOCTYPE html>
<html lang="en">
    <head>

        <x-head>{{ $title }}</x-head>
        <x-css></x-css>

    </head>

    <body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>

        <x-navbar></x-navbar>

        @if (Request::is('/'))
            <x-header></x-header>
        @else
            <x-header-admin></x-header-admin>
        @endif

        <main class="pc-container">
            <div class="pc-content">
                {{ $slot }}
            </div>
        </main>

        <x-footer></x-footer>

        <x-js></x-js>

    </body>
</html>

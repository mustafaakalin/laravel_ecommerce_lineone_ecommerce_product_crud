<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} @isset($title)
        - {{ $title }}
        @endisset
    </title>

    <!-- CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>

    @isset($head)
    {{ $head }}
    @endisset

</head>

<body x-data x-bind="$store.global.documentBody"
    class="@isset($isSidebarOpen) {{ $isSidebarOpen === 'true' ? 'is-sidebar-open' : '' }} @endisset @isset($isHeaderBlur) {{ $isHeaderBlur === 'true' ? 'is-header-blur' : '' }} @endisset @isset($hasMinSidebar) {{ $hasMinSidebar === 'true' ? 'has-min-sidebar' : '' }} @endisset  @isset($headerSticky) {{ $headerSticky === 'false' ? 'is-header-not-sticky' : '' }} @endisset">


    @if (session('modal'))

    <!-- Backdrop Blur -->
    <div class="card px-4 pb-4 sm:px-5">
        <div class="my-3 flex h-8 items-center justify-between">
            <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Backdrop Blur
            </h2>
            <label class="inline-flex items-center space-x-2">
                <span class="text-xs text-slate-400 dark:text-navy-300">Code</span>
                <input @change="helpers.toggleCode"
                    class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                    type="checkbox" />
            </label>
        </div>
        <div>
            <div class="mt-5" x-data="{ showModal: true }">
                <template x-teleport="#x-teleport-target">
                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                        x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
                            @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"></div>
                        <div class="relative max-w-lg flex flex-col overflow-y-auto rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                            x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="ease-in"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="inline h-28 w-28 text-success shrink-0 mx-auto" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <div class="mt-4">
                                <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                    Success Message
                                </h2>
                                <p class="mt-2">
                                    {{ session('modal') }}
                                </p>
                                <button @click="showModal = false"
                                    class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <div class="code-wrapper hidden pt-4">
            <pre class="is-scrollbar-hidden max-h-96 overflow-auto rounded-lg" x-init="hljs.highlightElement($el)">
                <code class="language-html" x-ignore>  
  &lt;div x-data=&quot;{showModal:false}&quot;&gt;&#13;&#10;    &lt;button&#13;&#10;      @click=&quot;showModal = true&quot;&#13;&#10;      class=&quot;btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90&quot;&#13;&#10;    &gt;&#13;&#10;      Backdrop Blur&#13;&#10;    &lt;/button&gt;&#13;&#10;    &lt;template x-teleport=&quot;#x-teleport-target&quot;&gt;&#13;&#10;      &lt;div&#13;&#10;        class=&quot;fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5&quot;&#13;&#10;        x-show=&quot;showModal&quot;&#13;&#10;        role=&quot;dialog&quot;&#13;&#10;        @keydown.window.escape=&quot;showModal = false&quot;&#13;&#10;      &gt;&#13;&#10;        &lt;div&#13;&#10;          class=&quot;absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300&quot;&#13;&#10;          @click=&quot;showModal = false&quot;&#13;&#10;          x-show=&quot;showModal&quot;&#13;&#10;          x-transition:enter=&quot;ease-out&quot;&#13;&#10;          x-transition:enter-start=&quot;opacity-0&quot;&#13;&#10;          x-transition:enter-end=&quot;opacity-100&quot;&#13;&#10;          x-transition:leave=&quot;ease-in&quot;&#13;&#10;          x-transition:leave-start=&quot;opacity-100&quot;&#13;&#10;          x-transition:leave-end=&quot;opacity-0&quot;&#13;&#10;        &gt;&lt;/div&gt;&#13;&#10;        &lt;div&#13;&#10;          class=&quot;relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5&quot;&#13;&#10;          x-show=&quot;showModal&quot;&#13;&#10;          x-transition:enter=&quot;ease-out&quot;&#13;&#10;          x-transition:enter-start=&quot;opacity-0&quot;&#13;&#10;          x-transition:enter-end=&quot;opacity-100&quot;&#13;&#10;          x-transition:leave=&quot;ease-in&quot;&#13;&#10;          x-transition:leave-start=&quot;opacity-100&quot;&#13;&#10;          x-transition:leave-end=&quot;opacity-0&quot;&#13;&#10;        &gt;&#13;&#10;          &lt;svg&#13;&#10;            xmlns=&quot;http://www.w3.org/2000/svg&quot;&#13;&#10;            class=&quot;inline h-28 w-28 text-success&quot;&#13;&#10;            fill=&quot;none&quot;&#13;&#10;            viewBox=&quot;0 0 24 24&quot;&#13;&#10;            stroke=&quot;currentColor&quot;&#13;&#10;          &gt;&#13;&#10;            &lt;path&#13;&#10;              stroke-linecap=&quot;round&quot;&#13;&#10;              stroke-linejoin=&quot;round&quot;&#13;&#10;              stroke-width=&quot;2&quot;&#13;&#10;              d=&quot;M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z&quot;&#13;&#10;            &gt;&lt;/path&gt;&#13;&#10;          &lt;/svg&gt;&#13;&#10;&#13;&#10;          &lt;div class=&quot;mt-4&quot;&gt;&#13;&#10;            &lt;h2 class=&quot;text-2xl text-slate-700 dark:text-navy-100&quot;&gt;&#13;&#10;              Success Message&#13;&#10;            &lt;/h2&gt;&#13;&#10;            &lt;p class=&quot;mt-2&quot;&gt;&#13;&#10;              Lorem ipsum dolor sit amet, consectetur adipisicing elit.&#13;&#10;              Consequuntur dignissimos soluta totam?&#13;&#10;            &lt;/p&gt;&#13;&#10;            &lt;button&#13;&#10;              @click=&quot;showModal = false&quot;&#13;&#10;              class=&quot;btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90&quot;&#13;&#10;            &gt;&#13;&#10;              Close&#13;&#10;            &lt;/button&gt;&#13;&#10;          &lt;/div&gt;&#13;&#10;        &lt;/div&gt;&#13;&#10;      &lt;/div&gt;&#13;&#10;    &lt;/template&gt;&#13;&#10;  &lt;/div&gt;
                </code>
              </pre>
        </div>
    </div>


    @endif





    <!-- App preloader-->
    <x-app-preloader></x-app-preloader>

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->
        <div class="sidebar print:hidden">
            <!-- Main Sidebar -->
            <x-app-partials.main-sidebar></x-app-partials.main-sidebar>

            <!-- Sidebar Panel -->
            <x-app-partials.sidebar-panel></x-app-partials.sidebar-panel>
        </div>

        <!-- App Header -->
        <x-app-partials.header></x-app-partials.header>

        <!-- Mobile Searchbar -->
        <x-app-partials.mobile-searchbar></x-app-partials.mobile-searchbar>

        <!-- Right Sidebar -->
        <x-app-partials.right-sidebar></x-app-partials.right-sidebar>

        {{ $slot }}

    </div>

    <!--
  This is a place for Alpine.js Teleport feature
  @see https://alpinejs.dev/directives/teleport
-->
    <div id="x-teleport-target"></div>

    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>

    @isset($script)
    {{ $script }}
    @endisset

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.auth.meta')
    <title>@yield('title') | TemuDokter</title>
    @stack('before-style')
    @include('includes.auth.style')
    @stack('after-style')
</head>

<body>
    @yield('content')

    @stack('before-script')
    @include('includes.auth.script')
    @stack('after-script')

    {{-- modals --}}
    {{-- if you have a modal create here --}}
</body>

</html>

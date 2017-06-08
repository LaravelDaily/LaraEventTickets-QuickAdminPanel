<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials.guest.head')



</head>

<body class="skin-blue">
        @yield('content')

        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
</body>
</html>
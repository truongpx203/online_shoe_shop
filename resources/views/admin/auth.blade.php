<!DOCTYPE html>
<html>
    @include('admin.head')

    <body class="auth-page">
        <header>&nbsp;</header>

        @yield ('styles')

        @yield('content')

        <footer>©XXXXX Co., Ltd.</footer>

        @include('admin.javascript')
        @yield('javascript')
    </body>
</html>
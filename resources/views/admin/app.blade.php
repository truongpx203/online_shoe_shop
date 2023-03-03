<!DOCTYPE html>
<html lang="en">
@include('admin.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="content-wrapper">
            @yield('header')

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

        </div>

        @include('admin.footer')
    </div>

    @include('admin.javascript')

    @yield('javascript')

</body>

</html>

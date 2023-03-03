@extends('admin.auth')

@section('title', 'Login-Admin')

@section('content')
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body p-5">
                <div class="login-logo mb-4">
                  Login Admin
                </div>
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
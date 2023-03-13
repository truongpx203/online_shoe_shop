<h2>Đặt lại mật khẩu đi</h2>
<form class="row " action="{{route('resetPassword.reset.password.post')}}" method="post">
    @csrf
    @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                </div>
            </div>
    @endif

    <div class="col-md-12 form-group">PassWord
        <input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
    </div>
    <br>
    <div class="col-md-12 form-group">Password Confirmation
        <input type="password" class="form-control" id="name" name="password_confirmation" placeholder="Password Confirmation" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Confirmation'">
    </div>
    <br>
    <div class="col-md-12 form-group">
        <button type="submit" value="submit" class="primary-btn">Đặt lại mật khẩu</button>
    </div>
</form>
<h2>Xin chào thằng: {{$name}}  </h2>

<h2>Forget Password Email</h2>
   
You can reset password from bellow link:

<a href="{{ route('resetPassword.resetPassword' , ['token' => $forgot_token ] ) }}">Reset Password</a> 
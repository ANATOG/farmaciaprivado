@extends('auth.contenido')

@section('login')


    <div class="login-form">
    <form class="form-horizontal was-validated" method="POST" action="{{route('login')}}">
          {{ csrf_field() }}
        <h2 class="text-center">AMEDIC S.A.</h2>       
        <div class="form-group  mb-3{{$errors->has('name' ? 'is-invalid' : '')}}">
            <input  type="text" value="{{old('name')}}" name="name" id="name" class="form-control" placeholder="Usuario" required="required">
            {!!$errors->first('name','<span class="invalid-feedback">:message</span>')!!}
        </div>
        <div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
            {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!} 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>

        <style type="text/css">


	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
@endsection

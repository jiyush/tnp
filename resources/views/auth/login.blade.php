@extends('regheader')

@section('content')
<h3 align="center">Student Login</h3>

<div class="row" style="margin-left: 230px;margin-top: 50px;">
    <form class="col s12" method="POST" action="{{ route('login') }}">
    	{{ csrf_field() }}
      <div class="row">
        <div class="input-field col s8">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="enrollment" value="{{ old('enrollment') }}" required autofocus>
          	@if ($errors->has('enrollment'))
	            <span class="help-block">
	                <strong>{{ $errors->first('enrollment') }}</strong>
	            </span>
	        @endif
          <label for="icon_prefix">Enrollment</label>
        </div>
      </div>
      <div class="row">
      	<div class="input-field col s8">
          <i class="material-icons prefix">lock</i>
          <input type="Password" for="icon_telephone" name="password" class="validate {{ $errors->has('password') ? ' has-error' : '' }}" required autofocus>
          	@if ($errors->has('password'))
	            <span class="help-block">
	                <strong>{{ $errors->first('password') }}</strong>
	            </span>
	        @endif
          <label for="icon_telephone">Password</label>
        </div>
      	
      </div>

      <button class="btn waves-effect waves-light " type="submit" name="action">Login
		   <i class="material-icons right">send</i>
	  </button>
    <a class="btn btn-link waves-light" href="{{ route('password.request') }}">
                                    Forgot Your Password ?
                                </a>
	  
    </form>
  </div>


@endsection
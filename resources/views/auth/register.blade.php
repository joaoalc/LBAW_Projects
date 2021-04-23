@extends('layouts.app')


@section('content')
@include('partials.sidebarItem',["categories" => $categories])
<!-- Form -->
<form method="POST" action="{{ route('register') }}">
  {{ csrf_field() }}

  <div class="p-0" style="background-color:#f2f2f2;">
      <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
          <div class="w-75 m-auto pt-3">
              <div class="text-center pt-3 fs-3">
                  <b>Account info</b>
              </div>
              <div class="pt-3">
                  <label style="padding-bottom: 1%;" for="email"  class="form-label"><b>E-Mail Address</b></label>
                  <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="E-mail, I.e: email@hotmail.com">
                  @if ($errors->has('email'))
                    <span class="error">
                        {{ $errors->first('email') }}
                    </span>
                  @endif
              </div>
              <div class="row pt-3">
                  <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="firstName" class="form-label"><b>First Name</b></label>
                    <input id="firstName" type="text" name="firstName" value="{{ old('firstName') }}" required autofocus class="form-control" placeholder="First Name, I.e: John">
                    @if ($errors->has('firstName'))
                      <span class="error">
                          {{ $errors->first('firstName') }}
                      </span>
                    @endif
                  </div>

                  <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="lastName" class="form-label"><b>Last Name</b></label>
                    <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required autofocus class="form-control" placeholder="First Name, I.e: John">
                    @if ($errors->has('error'))
                      <span class="error">
                          {{ $errors->first('lastName') }}
                      </span>
                    @endif
                  </div>
              </div>
              <div class="pt-3">
                <label style="padding-bottom: 1%;" for="Username"  class="form-label"><b>Username</b></label>
                <input id="Username" type="text" name="Username" value="{{ old('Username') }}" required class="form-control" placeholder="Username, I.e: JonDoe2">
                @if ($errors->has('Username'))
                  <span class="error">
                      {{ $errors->first('Username') }}
                  </span>
                @endif
            </div>
              <div class="pt-3">
                <label style="padding-bottom: 1%;" for="password"  class="form-label"><b>Password</b></label>
                  <input id="password" type="password" name="password" value="{{ old('password') }}" required class="form-control" placeholder="Password">
                  @if ($errors->has('password'))
                    <span class="error">
                        {{ $errors->first('password') }}
                    </span>
                  @endif
                </div>
              <div class="pt-3">
                <label style="padding-bottom: 1%;" for="confirmPassword"  class="form-label"><b>confirmPassword</b></label>
                <input id="confirmPassword" type="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}" required class="form-control" placeholder="confirmPassword">
                @if ($errors->has('confirmPassword'))
                  <span class="error">
                      {{ $errors->first('confirmPassword') }}
                  </span>
                @endif
              </div>
              </div>

              <div class="d-flex mt-3 flex-column justify-content-center h-50 align-items-center">
                  <button type="button" class="btn btn-success w-50" >
                      Register
                  </button>
              </div>              
          </div>
      </div>
  </div>
</form>
@endsection

@extends('layout')

@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
                    @if (session()->has('error'))

                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('error')}}
                    </div>

                    @endif

                    @if($errors->any())
                        <p>
                        <strong class="text-danger">Errors</strong>
                      </p>
                        <ul style="margin-bottom: 2em">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                      <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data" class="form">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}" required>

                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="email" id="email" value="{{old('email')}}" class="form-control" name="email" required >
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">User type</label>
                            <select id="usertype" name="user_type" class="form-control col-md-6" required>
                                <option value="none" selected="" disabled="">Choose type</option>
                                <option value="facilitator" {{ old('user_type') == "facilitator" ? 'selected' : '' }}>Facilitator</option>
                                <option value="student" {{ old('user_type') == "student" ? 'selected' : '' }}>Student</option>
                                <option value="teamlead" {{ old('user_type') == "teamlead" ? 'selected' : '' }}>Team lead</option>
                              </select>
                        </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <span id="capacity"></span>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control password" name="password" onKeyup="checkPass()" required>
                                  <ul class="mt-3" id="validation">
                                    <div class="text-success" id="text-letter"><span class="fas fa-check pr-2 pt-1" id="text-leticon"></span>At least one letter</div>
                                    <div class="text-success" id="text-capital"><span class="fas fa-times pr-2 pt-1" id="text-capicon"></span>At least one capital letter</div>
                                    <div class="text-success" id="text-number"><span class="fas fa-check pr-2 pt-1" id="text-numicon"></span>At least one number</div>
                                    <div class="text-success" id="text-min"><span class="fas fa-check pr-2 pt-1" id="text-minicon"></span>Be atleast 8 characters</div>
                                  </ul>
                              </div>
                          </div>



                          <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password-conf" class="form-control pass-conf" name="password_confirmation" onKeyup="checkPassConf()" required>
                                <ul class="mt-3" id="validationconf">
                                    <div class="text-success" id="text-conf"><span class="fas fa-times pr-2 pt-1" id="text-conficon"></span>Password doesn't match</div>
                                  </ul>
                            </div>
                        </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection

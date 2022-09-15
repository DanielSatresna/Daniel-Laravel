@extends('.layouts.master')

@section('children')
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="/addReg">
                  @csrf
                  @if ($message = Session::get('sukses'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert" >x</button>
                      <strong>{{  $message }}</strong>
                  </div>
                  @endif
                  @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="name" autofocus>
                      @if ($errors->has('name'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    </div>
                    {{-- <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                    </div> --}}
                  </div>
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    @if ($errors->has('email'))
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('nama') }}
                    </div>
                     @endif
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      @if ($errors->has('email'))
                      <div class="invalid-feedback d-block">
                          {{ $errors->first('nama') }}
                      </div>
                     @endif
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    {{-- <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div> --}}
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>


  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>



  <script src="../assets/js/page/auth-register.js"></script>


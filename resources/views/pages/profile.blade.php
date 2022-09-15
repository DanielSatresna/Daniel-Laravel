@extends('.layouts.master')

@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
      <div class="section-body">
        <h2 class="section-title pt-5">Hi, {{Auth()->User()->name}}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>
    
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Posts</div>
                    <div class="profile-widget-item-value">187</div>
                    </div>
                    <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Followers</div>
                    <div class="profile-widget-item-value">6,8K</div>
                    </div>
                    <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Following</div>
                    <div class="profile-widget-item-value">2,1K</div>
                    </div>
                </div>
                </div>
                <div class="profile-widget-description">
                <div class="profile-widget-name">{{Auth()->User()->name}}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                {{Auth()->User()->desc}}
                </div>
            </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Data</h4>
                            </div>
                            <form class="card-body" method="POST" action="/ubahData/{{$biodata -> id}}">
                                @method('put')
                                @csrf
                                @if ($message = Session::get('sukses'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert" >x</button>
                                    <strong>{{  $message }}</strong>
                                </div>
                                @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama" value="{{old('nama',$biodata['nama'])}}">
                                        @if ($errors->has('nama'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('nama') }}
                                        </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control inputtags" name="NIS" value="{{old('NIS',$biodata['NIS'])}}">
                                        @if ($errors->has('NIS'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('NIS') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control inputtags" name="email" value="{{old('email',$biodata['email'])}}">
                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="kelas" class="form-control selectric" value="{{old('kelas',$biodata['kelas'])}}">
                                            <option value="" selected disabled hidden>Choose here</option>
                                            <option>XI-RPL 1</option>
                                            <option>XI-RPL 2</option>
                                            <option>XII-RPL 1</option>
                                            <option>XII-RPL 2</option>
                                        </select>
                                        @if ($errors->has('kelas'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('kelas') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat
                                        lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control inputtags" name="tempat_lahir" value="{{old('tempat_lahir',$biodata['tempat_lahir'])}}">
                                        @if ($errors->has('tempat_lahir'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('tempat_lahir') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                        lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control inputtags" name="tanggal_lahir" value="{{old('tanggal_lahir',$biodata['tanggal_lahir'])}}">
                                        @if ($errors->has('tanggal_lahir'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('tanggal_lahir') }}
                                        </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Save</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@include('.layouts.footer')
@include('.layouts.sidebar')

@stop

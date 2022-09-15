@extends(".layouts.master")
@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Register</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Register</div>
            </div>
        </div>
        <div class="body-section">
            <h2 class="section-title">Register</h2>
            @csrf
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" >x</button>
            <strong>{{  $message }}</strong>
        </div>
        @endif
            <p class="section-lead">
                You can manage all Register data, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Register</h4>
                        </div>
                        <div class="card-body">
                            <div class="m-auto justify-content-center w-50">
                                <form action="/searchReg">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control mr-2" placeholder="Search"  name="search">
                                            <input class="btn btn-primary" type="submit" value="seacrh">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                    </tr>
                                    @foreach($register as $RegisterData)
                                    <tr>
                                        <td>{{$RegisterData["name"]}}
                                            <div class="table-links">
                                                <form action="/deleteReg/{{ $RegisterData->id }}" method="POST" >
                                                    @csrf
                                                    @method('delete')
                                                    <div class="bullet table-links"></div>
                                                    <a href="/showReg/{{ $RegisterData -> id}}">Edit</a>
                                                    <div class="bullet table-links"></div>
                                                    <button type="submit" class="btn text-danger table-links">Trash</button>
                                                </form>
                                                
                                            </div>
                                        </td>
                                        <td>{{$RegisterData["email"]}}</td>
                                        <td>{{$RegisterData["password"]}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('.layouts.footer')
@include('.layouts.sidebar')
@stop

@extends(".layouts.master")
@section('children')
@include('.layouts.appbar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Biodata</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">biodata</div>
            </div>
        </div>
        <div class="body-section">
            <h2 class="section-title">Biodata</h2>
            @csrf
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" >x</button>
            <strong>{{  $message }}</strong>
        </div>
        @endif
            <p class="section-lead">
                You can manage all Biodata, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Biodata</h4>
                        </div>
                        <div class="card-body">
                            <div class="m-auto justify-content-center w-50">
                                <form action="/search" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control mr-2" placeholder="Search"  name="search">
                                        <input class="btn btn-primary" type="submit" value="seacrh">
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Email</th>
                                        <th>Tempat lahir</th>
                                        <th>Tanggal lahir</th>
                                    </tr>
                                    @foreach($biodata as $biodataData)
                                    <tr>
                                        <td>{{$biodataData["nama"]}}
                                            <div class="table-links">
                                                <form action="/deletethis/{{ $biodataData->id }}" method="POST" >
                                                    @csrf
                                                    @method('delete')
                                                    <div class="bullet table-links"></div>
                                                    <a href="/ubahView/{{ $biodataData -> id}}">Edit</a>
                                                    <div class="bullet table-links"></div>
                                                    <button type="submit" class="btn text-danger table-links">Trash</button>
                                                </form>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#">{{ $biodataData['kelas'] }}</a>
                                        </td>
                                        <td>{{$biodataData["NIS"]}}</td>
                                        <td>{{$biodataData["email"]}}</td>
                                        <td>{{$biodataData["tempat_lahir"]}}</td>
                                        <td>{{$biodataData["tanggal_lahir"]}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                <a href="/createpost" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
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

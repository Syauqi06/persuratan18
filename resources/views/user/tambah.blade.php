@extends('layout.layouts')
@section('title','Tambah User ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah data User Perusahaan
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                        <p>
                            <hr>
                        </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Kode User</label>
                                <input type="text" class="form-control" name="kode_user" />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" />
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" name="role" />
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
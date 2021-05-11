@extends('templates.plantilla')
@section('title', 'Laravel App - Users admin')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <h1 class="text-start text-dark fw-light fs-4">Page \ <span class="text-danger">Users Admin</span></h1>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card mb-3 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title text-muted">Add Users</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" class="form-inline" method="POST">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                                    <div class="form-group">
                                        <label for="name">Name : </label>
                                        <input type="text" id="name" class="form-control form-control-sm" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                                    <div class="form-group">
                                        <label for="email">Email : </label>
                                        <input type="email" id="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                                    <div class="form-group">
                                        <label for="passwd">Password : </label>
                                        <input type="password" id="passwd" class="form-control form-control-sm" name="password">
                                    </div>
                                </div>    
                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                                    <div class="form-group">
                                        @csrf
                                        <label for="send">&nbsp;</label><br>
                                        <input type="submit" id="send" class="btn btn-block btn-outline-dark btn-sm">
                                    </div>                                    
                                </div>                                
                            </div> 
                            @if($errors->any())
                            <div class="row mt-2">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="alert alert-danger">
                                        <ul>                                        
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 table-responsive">
                <table class="table table-sm table-bordered table-hover shadow-sm">
                    <thead class="table-light text-center">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Deseas eliminar este usuario?')">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
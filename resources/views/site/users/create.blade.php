@extends('site.layouts.app')

@section('title')
    Users Create
@endsection

@section('page-title')
    User Management Create
@endsection

@section('content-page')
<br>
<div class="card border-primary">
		<div class="card-header text-white bg-primary mb-3">
            <div class="card-title pull-left">
                <div class="float-left">
                    Create New User
                </div>
                <div class="float-right">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-warning"><span class="oi oi-home"></span> Home</a>
                </div>
			</div>        
        </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong> Name </strong></label>
                        <input type="text" value="{{ old('name') }}" class="form-control {{ $errors->first('name') ? "is-invalid": "" }}" name="name" placeholder="Full Name">
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"><strong> Email </strong></label>
                        <input type="text" value="{{ old('email') }}" class="form-control {{ $errors->first('email') ? "is-invalid": "" }}" name="email" placeholder="Email">
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password"><strong>Password</strong></label>
                        <input type="password" value="{{ old('password') }}" class="form-control {{ $errors->first('password') ? "is-invalid": "" }}" name="password" placeholder="Password">
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation"><strong> Password Confirmation </strong></label>       
                        
                        <input class="form-control" placeholder="Password Confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
                    </div>

                    <div class="form-group">
                        <label for="address"><strong> Address </strong></label>
                        <textarea class="form-control {{ $errors->first('address') ? "is-invalid": "" }}" name="address" placeholder="Address">{{ old('address') }}</textarea>
                    
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->first('level') ? 'is-invalid' : '' }}">
                        <label for="level"><strong> Level </strong></label>
                        <select name="level" id="level" class="form-control">
                            <option value="">Choose Level</option>
                            <option value="ADMIN">Super Admin</option>
                            <option value="ADMIN_BERITA">Admin Berita</option>
                            <option value="ADMIN_PROFILE">Admin Profile</option>
                        </select>

                        <div class="invalid-feedback">
                            {{ $errors->first('level') }}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('status') ? 'is-invalid' : '' }}">
                        <label for="status"><strong> Status </strong></label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Choose Status</option>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="INACTIVE">INACTIVE</option>
                        </select>

                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone"><strong> Phone </strong></label>
                        <input type="number" value="{{ old('phone') }}" class="form-control {{ $errors->first('phone') ? "is-invalid": "" }}" name="phone" placeholder="+62">
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image"><strong> Image </strong></label>
                        
                        <input type="file" class="form-control" name="image">
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-outline-primary float-right">Create User</button>
        </form>
    </div>
</div>
@endsection
@extends('site.layouts.app')

@section('title')
    Users Create
@endsection

@section('page-title')
    User Management Create
@endsection

@section('content-page')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Home</a>
        </div>
    </div>
<br>
    <form class="bg-white shadow-sm p-3" action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <label for="name"><strong> Name </strong></label>
        <input type="text" value="{{ old('name') }}" class="form-control {{ $errors->first('name') ? "is-invalid": "" }}" name="name" placeholder="Full Name">
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
        <br>

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
        
        <label for="address"><strong> Address </strong></label>
        <input type="text" value="{{ old('address') }}" class="form-control {{ $errors->first('address') ? "is-invalid": "" }}" name="address" placeholder="Address">
        <div class="invalid-feedback">
            {{ $errors->first('address') }}
        </div>
        <br>

        <label for="phone"><strong> Phone </strong></label>
        <input type="number" value="{{ old('phone') }}" class="form-control {{ $errors->first('phone') ? "is-invalid": "" }}" name="phone" placeholder="+62">
        <div class="invalid-feedback">
            {{ $errors->first('phone') }}
        </div>
        <br>

        <label for="image"><strong> Image </strong></label>
            <input type="file" class="form-control" name="image">
        <br>

        <label for="email"><strong> Email </strong></label>
        <input type="text" value="{{ old('email') }}" class="form-control {{ $errors->first('email') ? "is-invalid": "" }}" name="email" placeholder="Email">
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        <br>

        <label for="password"><strong>Password</strong></label>
        <input type="password" value="{{ old('password') }}" class="form-control {{ $errors->first('password') ? "is-invalid": "" }}" name="password" placeholder="Password">
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        <br>

        <label for="password_confirmation"><strong> Password Confirmation </strong></label>       
        <input class="form-control" placeholder="Password Confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
        <br> 
   
        <button class="btn btn-success"><span class="oi oi-plus"></span> Save</button>
    </form>
@endsection
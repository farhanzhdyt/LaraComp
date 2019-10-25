@extends('site.layouts.app')

@section('title')
    Category
@endsection

@section('page-title')
    Create Category
@endsection

@section('content-page')
<br>
<div class="card border-primary">
		<div class="card-header text-white bg-primary mb-3">
            <div class="card-title pull-left">
                <div class="float-left">
                    Create Category
                </div>
                <div class="float-right">
                    <a href="{{ route('category.index') }}" class="btn btn-outline-warning"><span class="oi oi-home"></span> Home</a>
                </div>
			</div>        
        </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name_category"><strong> Name Category </strong></label>
                        <input type="text" value="{{ old('name_category') }}" class="form-control {{ $errors->first('name_category') ? "is-invalid": "" }}" name="name_category" placeholder="Input Category">
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('name_category') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-outline-primary float-right">Create Category</button>
        </form>
    </div>
</div>
@endsection
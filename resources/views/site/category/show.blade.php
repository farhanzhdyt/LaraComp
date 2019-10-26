@extends('site.layouts.app')

@section('title')
    Category
@endsection

@section('page-title')
    Show Category Management
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label><strong> Name Category </strong></label>
                <input type="text" value="{{ $category->name_category }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label><strong> Created By </strong></label>
                <input type="text" value="{{ $category->getUser->name }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label><strong> Created At </strong></label>
                <input type="text" value="{{ $category->created_at }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label><strong> Updated At </strong></label>
                <input type="text" value="{{ $category->updated_at }}" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>
    <div class="card-footer"></div>
</div>
@endsection
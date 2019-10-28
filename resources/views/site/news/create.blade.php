@extends('site.layouts.app')

@section('title')
    News Create
@endsection

@section('page-title')
    News Management Create
@endsection

@section('content-page')
<br>
<div class="card border-primary">
		<div class="card-header text-white bg-primary mb-3">
            <div class="card-title pull-left">
                <div class="float-left">
                    Create News
                </div>
                <div class="float-right">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-warning"><span class="oi oi-home"></span> Home</a>
                </div>
			</div>        
        </div>
    <div class="card-body">
        <form action="{{ route('news.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title"><strong> Title </strong></label>
                        <input type="text" value="{{ old('title') }}" class="form-control {{ $errors->first('title') ? "is-invalid": "" }}" name="title" placeholder="Input Title">
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"><strong> Description </strong></label>
                        <textarea class="form-control {{ $errors->first('description') ? "is-invalid": "" }}" name="description" placeholder="description">{{ old('description') }}</textarea>
                        
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('') ? 'is-invalid' : '' }}">
						<label for="categories"><strong> Content </strong></label>
						<select name="categories[]" id="categories" class="form-control" style="width:100%" multiple>

						</select>
					</div>

                    <div class="form-group">
                        <label for="image"><strong> Image </strong></label>
                        
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-outline-primary float-right">Create News</button>
        </form>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

    $(function() {
        $('#categories').select2({
			placeholder: 'Choose Categories',
			ajax : {
				url : '{{ route("categories.get-all") }}',
				processResults : function(data){
					return {
						results : data.map(function(category){
							return {id:category.id, text:category.name_category}
						})
					}
				}
			}
		});
    });
</script>
@endpush
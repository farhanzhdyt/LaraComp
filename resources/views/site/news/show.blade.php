@extends('site.layouts.app')

@section('title')
    News Update
@endsection

@section('page-title')
    News Management Update
@endsection

@section('content-page')
<br>
<div class="card border-primary">
		<div class="card-header text-white bg-primary mb-3">
            <div class="card-title pull-left">
                <div class="float-left">
                    Show News
                </div>
                <div class="float-right">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-warning"><span class="oi oi-home"></span> Home</a>
                </div>
			</div>        
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title"><strong> Title </strong></label>
                    <input type="text" value="{{ $news->title }}" class="form-control" name="title" placeholder="Input Title" readonly>
                </div>

                <div class="form-group">
                    <label for="description"><strong> Description </strong></label>
                    <textarea class="form-control" name="description" placeholder="description" readonly>{{ $news->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="categories"><strong> Content </strong></label>
                    <select name="categories[]" id="categories" class="form-control" style="width:100%" multiple disabled>

                    </select>
                </div>

                <div class="form-group">
                    <label for="image"><strong> Image </strong></label>
                    <img src="{{ asset('images/news_images/' .$news->image) }}" class="form-control" style="width:150px;">
                </div>
            </div>
        </div>
    </div>
        <div class="card-footer">
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

        var categories = {!! $news->category_news !!}
        categories.forEach(function(category){
            var option = new Option(category.name_category, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });
    })
</script>
@endpush
@extends('site.layouts.app')

@section('title')
    Product
@endsection

@section('page-title')
    Edit Product
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <section class="product card-body">
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="" style="display: block;">Image : </label>
                <img src="{{ asset('images/products/' . $product->image) }}" width="100" alt="" srcset="">

                <input type="file" name="image" id="" class="form-control mt-2">
            </div>

            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" name="name"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">
                            {{ $product->description }}
                        </textarea>
                    </td>
                </tr>
            </table>

            <div class="button-bottom mt-3">
                <button type="submit" class="btn btn-outline-primary">Edit Data</button>    
            </div>
        </form>
    </section>
</div>
@endsection

@push('style')
    <style type="text/css">
        .form-control:focus {
            border: 1px solid;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
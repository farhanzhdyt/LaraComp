@extends('site.layouts.app')

@section('title')
    Products
@endsection

@section('page-title')
    Products
@endsection

@section('content-page')

<div class="row">
    <div class="col-md-6 my-3">
        <a href="#" class="btn btn-primary"><i class="oi oi-plus"></i> Tambah Produk</a>
    </div>
    <div class="col-md-6 my-3">
        <form action="" method="post">
            <input type="search" name="keyword" class="form-control" id="" placeholder="@lang('Cari Berdasarkan Nama Lalu Tekan Enter')" autocomplet="off" autofocus>
        </form>
    </div>
</div>

<section class="products">
    <table id="datatabled" class="table table-hover">
        <thead class="border-0">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @php $i = 1; @endphp
        @foreach($products as $product)
        <tbody>
            <tr>
                <td>{{ $i }}</td>
                <td><img src="{{ asset('images/' . $product->image) }}" width="50"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->created_at->toDateString() }}</td>
                <td>
                    <a href="{{ route('products.detail', $product->id) }}" class="btn btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                    <a href="" class="btn btn-success" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                </td>
            </tr>
        </tbody>
        @php $i++; @endphp
        @endforeach

        <tfoot>
            {{-- Pagination --}}
            {{ $products->links() }}
        </tfoot>

    </table>
</section>
@endsection
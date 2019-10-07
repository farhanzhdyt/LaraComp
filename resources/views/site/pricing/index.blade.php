@extends('site.layouts.app')

@section('title')
    Pricing
@endsection

@section('page-title')
    Pricing
@endsection

@section('content-page')

<div class="row">
    <div class="col-md-6 my-3">
        <a href="#" class="btn btn-primary"><i class="oi oi-plus"></i> Tambah Harga</a>
    </div>
    <div class="col-md-6 my-3">
        <form action="" method="post">
            <input type="search" name="keyword" class="form-control" id="" placeholder="@lang('Cari Berdasarkan Nama Lalu Tekan Enter')" autocomplet="off" autofocus>
        </form>
    </div>
</div>

<section class="pricing">
    @if ($pricing->isEmpty())
        <h4 class="text-danger text-center mt-5">Data kosong!</h4>
    @else    
    <table id="datatabled" class="table table-hover">
        <thead class="border-0">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Opsional Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @php $i = 1; @endphp
        @foreach($pricing as $price)
        <tbody>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $price->title }}</td>
                <td>{{ $price->optional_description }}</td>
                <td>{{ $price->price}}</td>
                <td>{{ $price->description }}</td>
                <td>
                    <a href="{{ route('products.detail', $price->id) }}" class="btn btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                    <a href="" class="btn btn-success" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                </td>
            </tr>
        </tbody>
        @php $i++; @endphp
        @endforeach

        <tfoot>
            {{-- Pagination --}}
            {{ $pricing->links() }}
        </tfoot>

    </table>
    @endif
</section>
@endsection
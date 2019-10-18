@extends('site.layouts.app')

@section('title')
    Harga Layanan
@endsection

@section('page-title')
    Harga Layanan
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="row">
    <div class="col-md-6 my-3">
        <a href="{{ route('pricing.create') }}" class="btn btn-primary"><i class="oi oi-plus"></i> Tambah Harga</a>
    </div>
    <div class="col-md-6 my-3">
        <form action="{{ url()->current() }}">
            <input type="search" name="keyword" class="form-control" id="" placeholder="@lang('Cari Berdasarkan Nama Lalu Tekan Enter')" autocomplet="off" autofocus>
        </form>
    </div>
</div>

<section class="pricing">
    @if ($pricing->isEmpty())
    <div class="card" style="padding: 15px;">
        <h4>Data Kosong!</h4>
    </div>
    @else    
    <table id="datatabled" class="table table-hover">
        <thead class="border-0">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Layanan</th>
                <th scope="col">Opsional Deskripsi</th>
                <th scope="col">Harga</th>
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
                <td>Rp. {{ number_format($price->price, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('pricing.show', $price->id) }}" class="btn btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                    <a href="{{ route('pricing.edit', $price->id) }}" class="btn btn-success" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                    <form action="{{ route('pricing.destroy', $price->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Hapus Data ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="oi oi-trash"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>
        @php $i++; @endphp
        @endforeach

        <tfoot>
            {{ $pricing->links() }}
        </tfoot>

    </table>
    @endif
</section>

@endsection
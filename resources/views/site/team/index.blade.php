@extends('site.layouts.app')

@section('title')
    Team
@endsection

@section('page-title')
    Our Team
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="row">
    <div class="col-md-6 my-3">
        <a href="{{ route('pricing.create') }}" class="btn btn-primary"><i class="oi oi-plus"></i> Tambah Data Karyawan</a>
    </div>
    <div class="col-md-6 my-3">
        <form action="{{ url()->current() }}">
            <input type="search" name="keyword" class="form-control" id="" placeholder="@lang('Cari Berdasarkan Nama Lalu Tekan Enter')" autocomplet="off" autofocus>
        </form>
    </div>
</div>

<section class="pricing">
    @if ($teams->isEmpty())
    <div class="card" style="padding: 15px;">
        <h4>Data Kosong!</h4>
    </div>
    @else    
    <table id="datatabled" class="table table-hover">
        <thead class="border-0">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">Email</th>
                <th scope="col">Position</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @php $i = 1; @endphp
        @foreach($teams as $team)
        <tbody>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $team->nik }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->address }}</td>
                <td>{{ $team->phone_num }}</td>
                <td>{{ $team->email }}</td>
                <td>{{ $team->position }}</td>
                <td>
                </td>
            </tr>
        </tbody>
        @php $i++; @endphp
        @endforeach

        <tfoot>
            {{ $teams->links() }}
        </tfoot>

    </table>
    @endif
</section>

@endsection
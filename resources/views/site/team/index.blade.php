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

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 my-3">
                <a href="{{ route('team.create') }}" class="btn btn-primary"><i class="oi oi-plus"></i> Tambah Data Karyawan</a>
            </div>
            <div class="col-md-6 my-3">
                <form action="{{ url()->current() }}">
                    <input type="search" name="keyword" class="form-control" id="" placeholder="@lang('Cari Berdasarkan Nama Lalu Tekan Enter')" autocomplet="off" autofocus>
                </form>
            </div>
        </div>
    </div>

    <section class="pricing card-body">
        <table id="datatabled" class="table table-hover">
            <thead class="border-0 text-center">
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
            <tbody class="text-center">
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $team->nik }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->address }}</td>
                    <td>{{ $team->phone_num }}</td>
                    <td>{{ $team->email }}</td>
                    <td>{{ $team->position }}</td>
                    <td>
                        <a href="{{ route('team.show', $team->id) }}" class="btn btn-info"><i class="oi oi-eye"></i></a>
                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-success"><i class="oi oi-pencil"></i></a>
                        <form action="{{ route('team.destroy', $team->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete Data ?')">
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
                {{ $teams->links() }}
            </tfoot>

        </table>
    </section>
</div>
@endsection
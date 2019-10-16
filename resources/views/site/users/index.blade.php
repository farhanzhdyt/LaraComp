@extends('site.layouts.app')

@section('title')
    Users
@endsection

@section('page-title')
    User Management
@endsection

@section('content-page')

@if ( session('success') )
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div> 
@elseif ( session('delete') )
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        </div>
    </div> 
@endif

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('users.create')}}" class="btn btn-success"><i class="oi oi-plus"></i> Create User</a>
    </div>
</div>
<br>
<div class="table table-responsive">
    <table class="table table-striped" id="datatable">
        <thead>
            <tr>
                <th><b>#</b></th>
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Avatar</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>

        <tbody>
            @php $no = 1 @endphp
            @foreach ($users as $user)
                <tr>
                    <td>{{ $no }}.</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img src="{{ asset('images/users_images/' . $user->image) }}" width="48px">
                    </td>
                    <td>
                        @if ($user->status == "ACTIVE")
                            <span class="badge badge-success">
                                {{$user->status}}
                            </span>
                        @else
                            <span class="badge badge-danger">
                                {{$user->status}}
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Hapus Data ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="oi oi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @php $no++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
        
@endpush
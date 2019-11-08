@extends('site.layouts.app')

@section('title')
    Users
@endsection

@section('page-title')
    User Management
@endsection

@section('content-page')
<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>
<br>
<div class="card border-primary">
    <div class="card-header text-white bg-primary mb-3">
        <div class="card-title pull-left">
            <div class="float-left">
                List User
            </div>
            <div class="float-right">
                <a href="{{ route('users.create') }}" class="btn btn-outline-success text-white"><span class="oi oi-plus"></span> Create New User</a>
            </div>
        </div>        
    </div>
<div class="card-body">
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
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete Data ?')">
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
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable').DataTable();
	});
</script>
@endpush
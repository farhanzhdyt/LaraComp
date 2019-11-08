@extends('site.layouts.app')

@section('title')
    Categories
@endsection

@section('page-title')
    Category Management
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
                List Category
            </div>
            <div class="float-right">
                <a href="{{ route('categories.create') }}" class="btn btn-outline-success text-white"><span class="oi oi-plus"></span> Create Category</a>
            </div>
        </div>        
    </div>
<div class="card-body">
        <div class="table table-responsive">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Name Category</b></th>
                        <th><b>Create By</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
        
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $no }}.</td>
                            <td>{{ $category->name_category }}</td>
                            <td>{{ $category->getUser->name }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete Data ?')">
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
<div class="card-footer">
        <a href="{{ route('categories.trashed') }}" class="btn btn-outline-danger float-right">Trashed News</a>
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
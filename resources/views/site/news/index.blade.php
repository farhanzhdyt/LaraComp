@extends('site.layouts.app')

@section('title')
    News
@endsection

@section('page-title')
    News Management
@endsection

@section('content-page')

@if ( session('success') )
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('success') }}
    </div>
@elseif ( session('edit') )
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('edit') }}
    </div>
@elseif ( session('delete') )
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('delete') }}
    </div>
@endif

<br>
<div class="card border-primary">
    <div class="card-header text-white bg-primary mb-3">
        <div class="card-title pull-left">
            <div class="float-left">
                List News
            </div>
            <div class="float-right">
                <a href="{{ route('news.create') }}" class="btn btn-outline-success text-white"><span class="oi oi-plus"></span> Create News</a>
            </div>
        </div>        
    </div>
<div class="card-body">
        <div class="table table-responsive">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Title</b></th>
                        <th><b>Created At</b></th>
                        <th><b>image</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
        
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($news as $item)
                        <tr>
                            <td>{{ $no }}.</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                            <td>
                                <img src="{{ asset('images/news_images/' . $item->image) }}" width="48px">
                            </td>
                            <td>
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-warning" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete Data ?')">
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
    <a href="{{ route('news.trashed') }}" class="btn btn-outline-danger float-right">Trashed News</a>
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
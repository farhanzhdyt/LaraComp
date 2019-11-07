@extends('site.layouts.app')

@section('title')
    Service
@endsection

@section('page-title')
    Company Service
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="float-left">
            <a href="{{ route('service.create') }}" class="btn btn-primary"><i class="oi oi-plus mr-1"></i> Create New Service</a>
        </div>
        <div class="float-right">
            <form action="{{ url()->current() }}">
                <input type="search" name="keyword" style="width: 20rem;" class="form-control" id="" placeholder="@lang('Search based on name')" autocomplet="off" autofocus>
            </form>
        </div>
    </div>

    <section class="pricing card-body">
        @if ($service->isEmpty())
        <div style="padding: 15px;">
            <p class="text-center text-danger">Data is empty!</p>
        </div>
        @else    
        <table id="datatabled" class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name of Service</th>
                    <th scope="col">Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php $i = 1; @endphp
            @foreach($service as $s)
            <tbody>
                <tr>
                    <td>{{ $i }}</td>
                    <td><img src="{{ asset('images/service/' .$s->image) }}" width="60" alt="" srcset=""></td>
                    <td>{{ $s->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->created_at)->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('service.show', $s->id) }}" class="btn btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                        <a href="{{ route('service.edit', $s->id) }}" class="btn btn-success" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                        <form action="{{ route('service.destroy', $s->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Hapus Data ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="oi oi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @php $i++; @endphp
            @endforeach
        </table>
        @endif

        {{-- Pagination --}}
        {{ $service->links() }}
    </section>
</div>
@endsection
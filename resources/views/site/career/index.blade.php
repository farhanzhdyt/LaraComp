@extends('site.layouts.app')

@section('title')
    Career
@endsection

@section('page-title')
    List of Job Openings
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="float-left">
            <a href="{{ route('career.create') }}" class="btn btn-primary"><i class="oi oi-plus mr-1"></i> Create New Career</a>
        </div>
        <div class="float-right">
            <form action="{{ url()->current() }}">
                <input type="search" name="keyword" style="width: 20rem;" class="form-control" id="" placeholder="@lang('Search based on name')" autocomplet="off" autofocus>
            </form>
        </div>
    </div>

    <section class="pricing card-body border-0">
        @if ($careers->isEmpty())
        <div style="padding: 15px;">
            <p class="text-center text-danger">Data is empty!</p>
        </div>
        @else    
        <table id="datatabled" class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            @php $i = 1; @endphp
            @foreach($careers as $c)
            <tbody>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $c->job_title }}</td>
                    <td>
                        <a href="{{ route('career.show', $c->id) }}" class="btn btn-info" style="border: transparent;"><i class="oi oi-eye"></i></a>
                        <a href="{{ route('career.edit', $c->id) }}" class="btn btn-success" style="border: transparent;"><i class="oi oi-pencil"></i></a>
                        <form action="{{ route('career.destroy', $c->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete data ?')">
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
        {{ $careers->links() }}
    </section>
</div>
@endsection
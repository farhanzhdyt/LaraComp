@extends('site.layouts.app')

@section('title')
    Testimonial
@endsection

@section('page-title')
    Testimonial Table
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')
</div>

<div class="card">
    <div class="card-header">
        <div class="float-left">
            <a href="{{ route('testimonial.create') }}" class="btn btn-primary"><i class="oi oi-plus mr-1"></i> Create New Testimonials</a>
        </div>

        <div class="float-right">
            <form action="{{ url()->current() }}">
                <input type="search" style="width: 20rem;" name="keyword" class="form-control" placeholder="@lang('Search based on name')" autocomplete="off" autofocus>
            </form>
        </div>
    </div>

    <section class="card-body">
        @if($testimonials->isEmpty())
        <div style="padding: 15px;">
            <p class="text-center text-danger">Data is empty!</p>
        </div>
        @else
        <div class="table table-responsive">
            <table class="table table-hovered">
                <thead class="border-0">
                    <tr>
                        <th>#</th>
                        <th>Client Name</th>
                        <th>Review</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @php $no = 1; @endphp
                @foreach ($testimonials as $testimonial)
                    <tbody>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $testimonial->client_name }}</td>
                            <td>{!! $testimonial->review !!}</td>
                            <td>
                                <a href="{{ route('testimonial.show', $testimonial->id) }}" class="btn btn-info"><i class="oi oi-eye"></i></a>
                                <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-success"><i class="oi oi-pencil"></i></a>

                                {{-- Delete Data --}}
                                <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete data {{ $testimonial->client_name }} ?')">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" class="btn btn-danger"><i class="oi oi-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    </tbody>
                @php $no++; @endphp
                @endforeach
            </table>
        </div>
        @endif
    </section>
</div>
@endsection

{{-- @push('script')
    <script type="text/javascript">
        $(document).ready(function (){
            $('#datatable').DataTable();
        });
    </script>
@endpush --}}
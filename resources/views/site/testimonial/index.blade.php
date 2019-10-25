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
        <div class="table table-responsive">
            <table class="table table-hovered">
                <thead class="border-0 text-center">
                    <tr>
                        <th>#</th>
                        <th>Client Name</th>
                        <th>Review</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
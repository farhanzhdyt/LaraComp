@extends('site.layouts.app')

@section('title')
    Company
@endsection

@section('page-title')
    Create New Profile
@endsection

@section('content-page')

<div style="margin-top: 20px; margin-bottom: 20px;">
    @include('message.flash-message')
</div>

<div class="form-company-input card">
    <div class="card-header">
        <a href="{{ route('company.index') }}">
            <button class="btn btn-primary"><i class="oi oi-chevron-left"></i></button>
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('company.store') }}" method="post">
            @csrf

            <table class="table">
                <tr>
                    <td>Company Name</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="company_name" class="form-control" id="">
                    </td>
                </tr>
                <tr>
                    <td>Company History</td>
                    <td>:</td>
                    <td>
                        <textarea name="company_history" class="form-control" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Vission</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="vission" class="form-control" id="">
                    </td>
                </tr>
                <tr>
                    <td>Mission</td>
                    <td>:</td>
                    <td>
                        <textarea name="mission" class="form-control" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Type Of Product</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="type_of_products" class="form-control" id="">
                    </td>
                </tr>
                <tr>
                    <td>Owner</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="owner" class="form-control" id="">
                    </td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="country" class="form-control" id="">
                    </td>
                </tr>

                <tr>
                    <td>Launched</td>
                    <td>:</td>
                    <td>
                        <input type="date" name="launched" class="form-control" id="">
                    </td>
                </tr>

                <tr>
                    <td>Company Address</td>
                    <td>:</td>
                    <td>
                        <textarea name="company_address" class="form-control" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-outline-primary">Create Data</button>
        </form>
    </div>
</div>

@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mission');
        CKEDITOR.replace('company_history');
        CKEDITOR.replace('company_address');
    </script>
@endpush
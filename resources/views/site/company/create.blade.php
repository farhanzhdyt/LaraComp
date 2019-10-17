@extends('site.layouts.app')

@section('title')
    Company
@endsection

@section('page-title')
    Tambah Data Profil Perusahaan
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

            <div class="form-group">
                <label for="company_name">Nama Perusahaan : </label>
                <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror ">
            
                @error('company_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company_history">Sejarah Perusahaan : </label>
                <textarea id="company_history" class="form-control @error('company_history') is-invalid @enderror" name="company_history" rows="10" cols="50"></textarea>
            
                @error('company_history')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="vision">Visi : </label>
                <input type="text" name="vission" class="form-control @error('vission') is-invalid @enderror" id="vision">
            
                @error('vission')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="mission">Misi : </label>
                <input type="text" name="mission" class="form-control @error('mission') is-invalid @enderror" id="mission">
                
                @error('mission')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type_of_products">Jenis Produk : </label>
                <input type="text" name="type_of_products" class="form-control @error('type_of_products') is-invalid @enderror" id="type_of_products">

                @error('type_of_products')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner">Pemilik : </label>
                <input type="text" name="owner" id="owner" class="form-control @error('owner') is-invalid @enderror">

                @error('owner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="country">Negara : </label>
                <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                
                @error('country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="launched">Diluncurkan : </label>
                <input type="date" name="launched" id="launched" class="form-control @error('launched') is-invalid @enderror">

                @error('launched')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company_address">Alamat : </label>
                <textarea name="company_address" class="form-control @error('company_address') is-invalid @enderror" id="company_address" cols="30" rows="10">

                </textarea>

                @error('company_address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-success">Tambah Data</button>
                <button type="submit" class="btn btn-secondary">Kosongkan</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('style')
    <style>
        label {
            display: inline-block;
            margin: 10px auto;
        }

        input {
            margin: 10px auto;
        }

        textarea {
            height: 80px;
        }

        .btn-success {
            width: 150px;
            padding-top: 9px;
            padding-bottom: 9px;
        }
        
        .btn-secondary {
            width: 150px;
            padding-top: 9px;
            padding-bottom: 9px;
        }
    </style>
@endpush
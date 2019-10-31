@extends('site.layouts.app')

@section('title')
    Company
@endsection

@section('page-title')
    Company Profile
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="row" id="the-button">
    <div class="col-md-6">
        <a href="{{ route('company.create') }}" class="btn btn-primary"><i class="oi oi-plus"></i> Create New Profile</a>
    </div>
</div>

<div class="container mt-4">
	@foreach($comp as $c)
		<div class="card">
			<div class="card-header border-0 text-center">
				<h2 class="card-title">{{ \Illuminate\Support\Str::title($c->company_name) }}</h2>
				<img src="{{ asset('images/company/' . $c->image) }}" style="width: 18rem;">
			</div>
			<div class="card-body">
				<table class="table">
					<tr>
						<td>Company Name</td>
						<td>:</td>
						<td>
							{{ $c->company_name }}
						</td>
					</tr>

					<tr>
						<td>Company History</td>
						<td>:</td>
						<td>
							{!! $c->company_history !!}
						</td>
					</tr>

					<tr>
						<td>Vission</td>
						<td>:</td>
						<td>
							{{ $c->vission }}
						</td>
					</tr>

					<tr>
						<td>Mission</td>
						<td>:</td>
						<td>
							{!! $c->mission !!}
						</td>
					</tr>

					<tr>
						<td>Type Of Product</td>
						<td>:</td>
						<td>
							{{ $c->type_of_products }}
						</td>
					</tr>

					<tr>
						<td>Owner</td>
						<td>:</td>
						<td>
							{{ $c->owner }}
						</td>
					</tr>

					<tr>
						<td>Country</td>
						<td>:</td>
						<td>
							{{ $c->country }}
						</td>
					</tr>

					<tr>
						<td>Launched</td>
						<td>:</td>
						<td>
							{{ $c->launched }}
						</td>
					</tr>

					<tr>
						<td>Company Address</td>
						<td>:</td>
						<td>
							{!! $c->company_address !!}
						</td>
					</tr>
				</table>
			</div>

			<div class="card-footer border-0 m-auto">
				<a href="{{ route('company.edit', $c->id) }}" class="btn btn-success"><i class="oi oi-pencil"></i> Edit Data</a>

				<form action="{{ route('company.destroy', $c->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Delete data ?');">
					@csrf
					@method("DELETE")

					<button type="submit" class="btn btn-danger"><i class="oi oi-trash"></i> Delete Data</button>
				</form>
			</div>
		</div>
	@endforeach
</div>

@endsection

@push('script')
	<script>
		let getButton = document.getElementById('the-button');

		if ({!! $comp !!} == 0) {
			getButton.style.display="block";
		} else {
			getButton.style.display="none";
		}
	</script>
@endpush
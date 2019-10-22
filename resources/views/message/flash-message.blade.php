@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('success') }}
    </div>
@endif


@if ($message = Session::get('error'))
	<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('success') }}
    </div>
@endif


@if ($errors->any())
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>	
	    Data gagal ditambah!
	</div>
@endif
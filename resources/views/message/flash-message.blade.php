@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('success') }}
    </div>
@endif


@if ($message = Session::get('error'))
	<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-close"></i> Error!</h4>
        {{ session('error') }}
    </div>
@endif

@if ($message = Session::get('delete'))
	<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-close"></i> Deleted!</h4>
        {{ session('delete') }}
    </div>
@endif

<style>
    .alert {
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        border: transparent;
        color: #fff;
        padding: 20px;
    }

    .alert .close {
        outline: none;
        transition: .3s;
    }

    .alert.alert-success {
        background-color: #1dd1a1;
    }
    
    .alert.alert-danger {
        background-color: #ff6b6b;
    }
</style>
@extends('layouts.main')

@section('content')

<div class="card-header" id="add-contact"><strong>Add Contacts</strong></div>


{!! Form::open([
    'route' => 'contacts.store'
]) !!}

<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Name</label>
                <div class="col-md-8">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="company" class="col-md-3 col-form-label">Company</label>
                <div class="col-md-8">
                    {!! Form::text('company', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-8">
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-3 col-form-label">Phone</label>
                <div class="col-md-8">
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Address</label>
                <div class="col-md-8">
                    {!! Form::textarea('name', null, ['class' => 'form-control', 'rows' => 2]) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="group" class="col-md-3 col-form-label">Group</label>
                <div class="col-md-5">
                    {!! Form::select('group_id', App\Group::pluck('name', 'id'), null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                    <a href="#" id="add-group-btn" class="btn btn-outline-secondary btn-block">Add Group</a>
                </div>
            </div>
            <div class="form-group row" id="add-new-group" style="display: none;">
                <div class="offset-md-3 col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="group_id" placeholder="Enter group name" aria-label="Enter group name" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                    <img src="http://via.placeholder.com/150x150" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                <div class="mt-2">
                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="#" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection

@section('js')
<script>
    $("#all-contact").hide();
</script>
@stop


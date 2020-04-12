<div class="alert alert-success" id="add-new-alert" style="display: none;"></div>


{!! Form::model($todolist, ['route' => 'todolists.store']) !!}
    <div class="form-group">
        <label for="" class="control-label">List Name</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Descriptions</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 2]) !!}
    </div>
{!! Form::close() !!}
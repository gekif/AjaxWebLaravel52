<div class="alert alert-success" id="add-new-alert" style="display: none;"></div>


{!! Form::model($todolist, [
    'route' => $todolist->exists ? ['todolists.update', $todolist->id] : 'todolists.store',
    'method' => $todolist->exists ? 'PUT' : 'POST'
    ])
!!}
    <div class="form-group">
        <label for="" class="control-label">List Name</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
        {!! Form::hidden('id') !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Descriptions</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 2]) !!}
    </div>
{!! Form::close() !!}
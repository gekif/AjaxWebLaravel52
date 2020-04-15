@php $count = $todolist->tasks->count() @endphp
<li class="list-group-item" id="todo-list-{{ $todolist->id }}">
    <h4 class="list-group-item-heading">{{ $todolist->title }} <span class="badge">{{ $count }} {{ $count > 1 ? 'tasks' : 'task' }}</span></h4>
    <p class="list-group-item-text">{{ $todolist->description }}</p>
    <div class="buttons">
        <a href="{{ route('todolists.show', $todolist->id) }}" data-action="{{ route('todolists.tasks.store', $todolist->id) }}" class="btn btn-info show-task-modal btn-xs" data-title="{{ $todolist->title }}" title="Manage Tasks">
            <i class="glyphicon glyphicon-ok"></i>
        </a>
        <a href="{{ route('todolists.edit', $todolist->id) }}" class="btn btn-default show-todolist-modal btn-xs edit" title="Edit {{ $todolist->title }}">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('todolists.destroy', $todolist->id) }}" class="btn btn-danger btn-xs show-confirm-modal" data-title="{{ $todolist->title }}" title="Delete">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </div>
</li>
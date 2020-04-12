<li class="list-group-item" id="todo-list-{{ $todolist->id }}">
    <h4 class="list-group-item-heading">{{ $todolist->title }} <span class="badge">0 tasks</span></h4>
    <p class="list-group-item-text">{{ $todolist->description }}</p>
    <div class="buttons">
        <a href="#" class="btn btn-info show-task-modal btn-xs" title="Manage Tasks">
            <i class="glyphicon glyphicon-ok"></i>
        </a>
        <a href="#" class="btn btn-default show-todolist-modal btn-xs" title="Edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="#" class="btn btn-danger btn-xs" title="Delete">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </div>
</li>
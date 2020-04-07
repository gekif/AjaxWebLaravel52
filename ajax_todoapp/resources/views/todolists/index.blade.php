@extends('layouts.main')

@section('title', 'AJAX Todo App')

@section('content')
<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="clearfix">
                    <div class="pull-left">
                        <h1 class="header-title">
                            Todo List
                        </h1>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-success show-todolist-modal">
                            Create New List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Container -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-panel-default">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">List Group Item Heading <span class="badge">10 tasks</span></h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto corporis ex ipsum iste magni nesciunt odio officiis optio perferendis quasi recusandae, repellendus vel velit veniam voluptatem voluptatum. Eligendi, porro?</p>
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
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">List Group Item Heading <span class="badge">10 tasks</span></h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto corporis ex ipsum iste magni nesciunt odio officiis optio perferendis quasi recusandae, repellendus vel velit veniam voluptatem voluptatum. Eligendi, porro?</p>
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
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">List Group Item Heading <span class="badge">10 tasks</span></h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto corporis ex ipsum iste magni nesciunt odio officiis optio perferendis quasi recusandae, repellendus vel velit veniam voluptatem voluptatum. Eligendi, porro?</p>
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
                </ul>
                <div class="panel-footer">
                    <small>3 list items</small>
                </div>
            </div>
        </div>

        <div class="modal fade" id="todolist-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create New List</h4>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="" class="control-label">List Name</label>
                                <input type="text" class="form-control input-lg">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Descriptions</label>
                                <textarea rows="2" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="task-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Todo List</h4>
                        <p>of <strong>To do List 1</strong></p>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <table class="table">
                                <thead>
                                <td width="50" style="vertical-align: middle;">
                                    <input type="checkbox" name="check_all" id="check-all">
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter New Task" class="task-input">
                                </td>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="task-item done">
                                        The first task
                                        <div class="row-buttons">
                                            <a href="" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="task-item">
                                        The second task
                                        <div class="row-buttons">
                                            <a href="" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="task-item">
                                        The third task
                                        <div class="row-buttons">
                                            <a href="" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <div class="pull-left">
                            <a href="" class="btn btn-xs btn-default active">All</a>
                            <a href="" class="btn btn-xs btn-default">Active</a>
                            <a href="" class="btn btn-xs btn-default">Completed</a>
                        </div>
                        <div class="pull-right">
                            <small>3 items left</small>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</div>
@stop
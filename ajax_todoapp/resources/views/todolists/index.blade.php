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
                        <a href="{{ route('todolists.create') }}" class="btn btn-success show-todolist-modal" title="Create New List">
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

            @php $count = $todolists->count() @endphp
            <div class="alert alert-warning {{ $count ? 'hidden' : '' }}" id="no-record-alert">
                No Records found.
            </div>

            <div class="alert alert-success" id="update-alert" style="display: none;"></div>

            <div class="panel-panel-default {{ !$count ? 'hidden' : '' }}">
                <ul class="list-group" id="todo-list">

                    @foreach ($todolists as $todolist)
                        @include('todolists.item', compact('todolist'))
                    @endforeach

                </ul>
                <div class="panel-footer">
                    <small><span id="todo-list-counter">{{ $count }}</span> <span>{{ $count > 1 ? 'records' : 'record' }}</span></small>
                </div>
            </div>
        </div>

        @include('todolists.todolistmodal')

        @include('todolists.taskmodal')

    </div>
</div>
@stop
@extends('layouts.main')

@section('content')

    @if (count($contacts) > 0)
    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            <div class="pull-left">
                <h4>All Contacts</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('contacts.create') }}" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add Contact
                </a>
            </div>
        </div>

        <table class="table">

            @foreach ($contacts as $contact)
                <tr>
                <td class="middle">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">

                                @php $photo = !is_null($contact->photo) ? $contact->photo : 'default.png' @endphp
                                {!! Html::image('uploads/' . $photo, $contact->name, ['class' => 'media-object', 'width' => 100, 'height' => 100]) !!}

                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $contact->name }}</h4>
                            <address>
                                <strong>{{ $contact->company }}</strong><br>
                                {{ $contact->email }}
                            </address>
                        </div>
                    </div>
                </td>
                <td width="100" class="middle">
                    <div>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $contact->id]]) !!}
                        <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="btn btn-circle btn-default btn-xs" title="Edit">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-circle btn-danger btn-xs" title="Delete">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="text-center">
        <nav>
            {!! $contacts->appends(Request::query())->render() !!}
        </nav>
    </div>

    @else
        <h1>No Contact On The Group</h1>
        <hr>
    @endif

@endsection


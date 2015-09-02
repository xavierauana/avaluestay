@inject('message', 'avaluestay\Contracts\MessageInterface')

@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Messages @if($message->totalUnreadMessages->count() > 0) <span class="badge">{{$message->totalUnreadMessages->count()}}</span> @endif</h3>
        </div>
        <div class="panel-body">
            @if($messages->count() >0)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Sender</th>
                    <th>Message</th>
                    <th>Unread Message</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($messages as $messageGroup)
                    <tr>
                        <td>{{$messageGroup->first()->sender->name}}</td>
                        <td>{{substr( $messageGroup->first()->message, 0, 20)."..."}}</td>
                        <td>
                            {{$messageGroup->first()->unreadMessagesFromTheSender->count()}}
                        </td>
                        <td>
                            {{$messageGroup->first()->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="/messages/{{$messageGroup->first()->id}}" type="button" class="btn btn-default btn-sm">Open</a>
                                {{--<a type="button" class="btn btn-default btn-sm">Archive</a>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @else
                <h3 class="text-center">You don't have any message yet</h3>
            @endif
        </div>
    </div>


@endsection
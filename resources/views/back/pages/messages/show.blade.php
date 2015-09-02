@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default conversations">
    	  <div class="panel-heading">
    			<h3 class="panel-title">Messages </h3>
    	  </div>
    	  <div class="panel-body">
    			<div class="row">
                    <div class="col-sm-6 col-sm-offset-3 messageBox">
                        @foreach($conversations as $message)
                            @if($message->sender_id == Auth::user()->id)
                                <div class="col-xs-7 pull-right mine">
                                    <p class="text-success text-right">
                                        {{$message->message}}
                                    </p>
                                    <small><p class="text-right">{{$message->created_at}}</p></small>

                                </div>
                            @else
                                <div class="col-xs-7 pull-left sender">
                                    <p class="text-info">
                                        {{$message->message}}
                                    </p>
                                    <small><p class="">{{$message->created_at}}</p></small>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
    	  </div>
        <div class="panel-footer">
            <form action="/messages/sender/{{Auth::user()->id}}/receiver/{{$conversations->first()->sender_id == Auth::user()->id ? $conversations->first()->receiver_id : $conversations->first()->sender_id}}" method="post" v-on="submit: newMessage">
                <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                <input type="submit" class="btn btn-default dtn-block form-control" value="Send">
            </form>
        </div>
    </div>
    <div class="col-xs-7 pull-right mine hidden">
        <p class="text-success text-right">
        </p>
        <small><p class="text-right"></p></small>
    </div>

    <div class="col-xs-7 pull-left sender hidden">
        <p class="text-info">
        </p>
        <small><p class=""></p></small>
    </div>
@endsection

@section('scripts')
    <script>
        setTimeOut()
        var messageStreamVue = new Vue({

        })
        setInterval(function(){

        },60*1000)
    </script>
@endsection
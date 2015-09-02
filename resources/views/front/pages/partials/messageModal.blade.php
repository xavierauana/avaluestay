{{-- front end booking form--}}
<div class="modal fade center-screen" id="messageBox">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Message Owner</h4>
            </div>
            <form action="/messages/sender/{{Auth::user()->id}}/receiver/{{$property->owner->id}}" method="post" v-on="submit: newMessage">
                <div class="modal-body">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-success btn-sm btn-block" value="Send">
            </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
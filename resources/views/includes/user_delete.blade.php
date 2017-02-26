@if(Session::has('user_deleted'))

    <div class="alert alert-danger">
        <p>{{session('user_deleted')}}</p>
    </div>

@endif

@if(session('info'))
    <div class="alert alert-info" style="width: 100% !important;">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Info alert:</b> {!! session('info') !!}
        </div>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success" style="width: 100% !important;">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Success Alert:</b> {!! session('success') !!}
        </div>
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning" style="width: 100% !important;">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Warning Alert:</b> {!! session('warning') !!}
        </div>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" style="width: 100% !important;">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Error Alert:</b> {!! session('error') !!}
        </div>
    </div>
@endif
@if(session('request-success'))
    <div class="alert alert-success m-auto" style="width: 90% !important; padding-left: 5%; padding-right: 5%; padding-top: 5%;">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Success Alert:</b> {!! session('request-success') !!}
        </div>
    </div>
@endif
@if(session('request-error'))
    <div class="alert alert-danger m-auto" style="width: 90% !important; padding-left: 5%; padding-right: 5%; padding-top: 5%;">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Error Alert:</b> {!! session('request-error') !!}
        </div>
    </div>
@endif

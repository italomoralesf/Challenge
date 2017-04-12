@if(Session::has('info'))
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ Session::get('info') }}
            </div>
        </div>
    </div>
</div>
@endif
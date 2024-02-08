@if (Session::has('message-success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">{{ Session::get('message-success') }}</div>
                    </div>
                </div>
                <div class="flash-message"></div>
            @endif

            @if (Session::has('message-danger'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">{{ Session::get('message-danger') }}</div>
                    </div>
                </div>
                <div class="flash-message"></div>
            @endif
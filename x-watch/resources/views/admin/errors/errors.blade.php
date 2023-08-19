@if(session('list-fail'))
    <div class="alert alert-danger alert-notification">
        @foreach (session('list-fail') as $element)
            {{ $element }}<br>
        @endforeach
    </div>
@endif
@if(count($errors))
    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation-1"></i>
            <span></span>
        </div>
        <div class="m-alert__text">
            <strong>
                Có lỗi xảy ra!
            </strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

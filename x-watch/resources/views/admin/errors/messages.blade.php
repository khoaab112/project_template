@if (session('message'))
    <div class="alert alert-success alert-notification">
        {!! session('message') !!}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-notification">
        {{ session('error') }}
    </div>
@endif
<script type="text/javascript">
    $('.alert-notification').delay(15000).fadeOut('slow');
</script>

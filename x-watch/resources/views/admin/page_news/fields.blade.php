<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url Link:') !!}
    {!! Form::text('url', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
<!-- File upload img -->

<div class="form-group col-sm-6">
    {!! Form::label('default_img', 'Default Img:') !!}
    <input type="file" multiple name="default_img" class="form-control">
</div>


<!-- Slost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slost', 'Position:') !!}
    {!! Form::text('slost', 0 , ['class' => 'form-control']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1' => 'Yes','0' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['0' => 'Image','1' => 'Video'], null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', 'null', ['class' => 'form-control']) !!}
</div>

<!-- age News Image -->
@if(isset($pageNews->name))
<div class="form-group col-sm-6">
    <div><label>Page News Image:</label></div>
    <img width="150px"
        src="{{route("showImageFoder", ['foder' => 'page_news',"fileName" => $pageNews->name])}}">
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pageNews.index') }}" class="btn btn-default">Cancel</a>
</div>

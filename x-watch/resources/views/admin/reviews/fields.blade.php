<div class="form-group col-sm-6">
    {!! Form::label('entity_id', 'Entity Id:') !!}
    {!! Form::number('entity_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('entity_type', 'Entity Type:') !!}
    <select class="form-control" name="entity_type">
        @foreach(\App\Models\Review::$aryReviewEntity as $key => $val)
            <option @if(isset($review) && $review->entity_type == $key) selected @endif value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <select class="form-control" name="status">
        @foreach(\App\Models\Review::$aryReviewStatus as $key => $val)
            <option @if(isset($review) && $review->status == $key) selected @endif value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <textarea class="form-control" name="content">@if(isset($review->content)){{$review->content}}@endif</textarea>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reviews.index') }}" class="btn btn-default">Cancel</a>
</div>

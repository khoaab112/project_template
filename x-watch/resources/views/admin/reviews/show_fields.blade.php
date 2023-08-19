<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $review->user_id }}</p>
</div>

<!-- Entity Id Field -->
<div class="form-group">
    {!! Form::label('entity_id', 'Entity Id:') !!}
    <p>{{ $review->entity_id }}</p>
</div>

<!-- Entity Type Field -->
<div class="form-group">
    {!! Form::label('entity_type', 'Entity Type:') !!}
    <p>{{ $review->entity_type }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $review->status }}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $review->content }}</p>
</div>


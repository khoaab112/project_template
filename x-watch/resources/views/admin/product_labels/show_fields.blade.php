<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $productLabel->product_id }}</p>
</div>

<!-- Label Id Field -->
<div class="form-group">
    {!! Form::label('label_id', 'Label Id:') !!}
    <p>{{ $productLabel->label_id }}</p>
</div>

<!-- Time Start Field -->
<div class="form-group">
    {!! Form::label('time_start', 'Time Start:') !!}
    <p>{{ $productLabel->time_start }}</p>
</div>

<!-- Time End Field -->
<div class="form-group">
    {!! Form::label('time_end', 'Time End:') !!}
    <p>{{ $productLabel->time_end }}</p>
</div>


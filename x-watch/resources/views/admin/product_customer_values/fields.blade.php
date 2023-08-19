<!-- Product Column Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_column_id', 'Product Column Id:') !!}
    {!! Form::number('product_column_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Column Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_column_value', 'Product Column Value:') !!}
    {!! Form::text('product_column_value', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productCustomerValues.index') }}" class="btn btn-default">Cancel</a>
</div>

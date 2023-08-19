<!-- Product Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_type', 'Product Type:') !!}
        {!! Form::select('product_type', \App\Models\ProductCustomerColumn::$aryProductType, null, ['class' => 'form-control']) !!}
</div>
<!-- Cloumn Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cloumn_name', 'Cloumn Name:') !!}
    {!! Form::text('cloumn_name', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productCustomerColumns.index') }}" class="btn btn-default">Cancel</a>
</div>

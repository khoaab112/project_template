<!-- Product Sku Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_sku', 'Product Sku:') !!}
    {!! Form::text('product_sku', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Bonus Product Sku Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bonus_product_sku', 'Product Sku Bonus:') !!}
    {!! Form::text('product_bonus_sku', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Bonus Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bonus_qty', 'Bonus Qty:') !!}
    {!! Form::number('bonus_qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Bonus Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_start', 'Time start:') !!}
    {!! Form::text('time_start', null, ['class' => 'form-control']) !!}
</div>

<!-- Bonus Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_end', 'Time End:') !!}
    {!! Form::text('time_end', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productBonuses.index') }}" class="btn btn-default">Cancel</a>
</div>

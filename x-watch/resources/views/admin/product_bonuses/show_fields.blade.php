<!-- Product Sku Field -->
<div class="form-group">
    {!! Form::label('product_sku', 'Product Sku:') !!}
    <p>{{ $productBonus->product_sku }}</p>
</div>

<!-- Bonus Product Sku Field -->
<div class="form-group">
    {!! Form::label('bonus_product_sku', 'Bonus Product Sku:') !!}
    <p>{{ $productBonus->bonus_product_sku }}</p>
</div>

<!-- Bonus Qty Field -->
<div class="form-group">
    {!! Form::label('bonus_qty', 'Bonus Qty:') !!}
    <p>{{ $productBonus->bonus_qty }}</p>
</div>


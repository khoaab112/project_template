<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $productPromotion->product_id }}</p>
</div>

<!-- Product Variant Id Field -->
<div class="form-group">
    {!! Form::label('product_variant_id', 'Product Variant Id:') !!}
    <p>{{ $productPromotion->product_variant_id }}</p>
</div>

<!-- Product Variant Sku Field -->
<div class="form-group">
    {!! Form::label('product_variant_sku', 'Product Variant Sku:') !!}
    <p>{{ $productPromotion->product_variant_sku }}</p>
</div>

<!-- Discount Percent Field -->
<div class="form-group">
    {!! Form::label('discount_percent', 'Discount Percent:') !!}
    <p>{{ $productPromotion->discount_percent }}</p>
</div>

<!-- Discount Amount Field -->
<div class="form-group">
    {!! Form::label('discount_amount', 'Discount Amount:') !!}
    <p>{{ $productPromotion->discount_amount }}</p>
</div>

<!-- Base Price Field -->
<div class="form-group">
    {!! Form::label('base_price', 'Base Price:') !!}
    <p>{{ $productPromotion->base_price }}</p>
</div>

<!-- Promotion Price Field -->
<div class="form-group">
    {!! Form::label('promotion_price', 'Promotion Price:') !!}
    <p>{{ $productPromotion->promotion_price }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $productPromotion->status }}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $productPromotion->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $productPromotion->end_date }}</p>
</div>


<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $productAttributeValue->product_id }}</p>
</div>

<!-- Product Variant Id Field -->
<div class="form-group">
    {!! Form::label('product_variant_id', 'Product Variant Id:') !!}
    <p>{{ $productAttributeValue->product_variant_id }}</p>
</div>

<!-- Attribute Value Id Field -->
<div class="form-group">
    {!! Form::label('attribute_value_id', 'Attribute Value Id:') !!}
    <p>{{ $productAttributeValue->attribute_value_id }}</p>
</div>


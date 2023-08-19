{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('product_id', 'Product Id:') !!}--}}
{{--{!! Form::number('product_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('product_variant_id', 'Product Variant Id:') !!}--}}
{{--{!! Form::number('product_variant_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('product_variant_sku', 'Product Variant Sku:') !!}--}}
{{--{!! Form::number('product_variant_sku', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('discount_percent', 'Discount Percent:') !!}--}}
{{--{!! Form::number('discount_percent', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('discount_amount', 'Discount Amount:') !!}--}}
{{--{!! Form::number('discount_amount', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('base_price', 'Base Price:') !!}--}}
{{--{!! Form::number('base_price', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('promotion_price', 'Promotion Price:') !!}--}}
{{--{!! Form::number('promotion_price', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <select class="form-control" name="status">
        <option @if(isset($productPromotion->status) && $productPromotion->status == \App\Models\ProductPromotion::PRODUCT_PROMOTION_STATUS_IS_ACTIVE) selected
                @endif
                value="{{\App\Models\ProductPromotion::PRODUCT_PROMOTION_STATUS_IS_ACTIVE}}">Hoạt động
        </option>
        <option @if(isset($productPromotion->status) && $productPromotion->status == \App\Models\ProductPromotion::PRODUCT_PROMOTION_STATUS_IS_NOT_ACTIVE) selected
                @endif
                value="{{\App\Models\ProductPromotion::PRODUCT_PROMOTION_STATUS_IS_NOT_ACTIVE}}">Không Hoạt động
        </option>
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productPromotions.index') }}" class="btn btn-default">Cancel</a>
</div>

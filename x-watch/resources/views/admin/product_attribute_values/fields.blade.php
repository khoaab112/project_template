<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Variant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_variant_id', 'Attribute:') !!}
    <select class="form-control" id="attribute_1" name="attribute">
        <option value="0">No Select</option>
        @foreach($attributes as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
    </select>
</div>

<!-- Attribute Value Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attribute_value_id', 'Attribute Value:') !!}
    <select class="form-control" id="attribute_1_value" name="attribute_value_id">
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productAttributeValues.index') }}" class="btn btn-default">Cancel</a>
</div>


@push('scripts')
    <script>
        $(document).ready(function () {
            $("#attribute_1").on("change", function (e) {
                $.ajax({
                    url: '{{route("ajaxGetAttributeValue")}}?attribute_id=' + $(this).val(),
                }).done(function (data) {
                    $("#attribute_1_value").html(data)
                });
            })

            $("#attribute_2").on("change", function (e) {
                $.ajax({
                    url: '{{route("ajaxGetAttributeValue")}}?attribute_id=' + $(this).val(),
                }).done(function (data) {
                    $("#attribute_2_value").html(data)
                });
            })
        });
    </script>
@endpush
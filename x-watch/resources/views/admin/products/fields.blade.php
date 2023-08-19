<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    <select class="form-control" name="category_id">
        @foreach($categories as $val)
            <option @if(isset($product->category_id) && $product->category_id == $val["id"])
                        {{"selected"}}
                    @endif value="{{$val["id"]}}">
                @if($val["level"] == 1)
                    {{"----"}}
                @endif
                @if($val["level"] == 2)
                    {{"------"}}
                @endif
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('sku', 'Sku:') !!}
    {!! Form::text('sku', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    <input class="form-control" name="price" type="text" onkeyup="onlyNumberAmount(this)">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('video_url', 'Video Link:') !!}
    {!! Form::text('video_url', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('Link 3D', 'Link 3D:') !!}
    {!! Form::text('link_iframe', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <select name="brand_id" class="form-control">
        @foreach($brands as $brand)
            <option @if(isset($product) && $product->brand_id == $brand->id) selected
                    @endif value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
    </label>
    <select name="status" class="form-control">
        @foreach(\App\Models\Product::$status as $key => $status)
            <option @if(isset($product) && $product->status == $key) selected
                    @endif value="{{$key}}">{{$status}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('default_img', 'Default Img:') !!}
    <input type="file" multiple name="default_img[]" class="form-control">
</div>


<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <textarea class="form-control" id="ckeditor" name="description">@if(isset($product->description->description))
            {{$product->description->description}}
        @endif</textarea>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
    <script src="{{ url('libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('libs/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace('ckeditor_short', {
                height: 300,
            });
            CKEDITOR.replace('ckeditor', {
                height: 300,

            });
        });

        function onlyNumberAmount(input) {
            let v = input.value.replace(/\D+/g, '');
            if (v.length > 14) v = v.slice(0, 14);
            input.value =
                v.replace(/(\d)(\d\d)$/, "$1,$2")
                    .replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
        }
    </script>
@endpush

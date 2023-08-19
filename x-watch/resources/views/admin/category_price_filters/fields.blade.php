<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    <select class="form-control" name="category_id">
        @foreach($categories as $val)
            <option @if(Request()->get("category_id") == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('from_price', 'From Price:') !!}
    {!! Form::number('from_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('to_price', 'To Price:') !!}
    {!! Form::number('to_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categoryPriceFilters.index') }}" class="btn btn-default">Cancel</a>
</div>

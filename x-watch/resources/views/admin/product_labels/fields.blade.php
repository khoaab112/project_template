<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('File', 'File:') !!}
    <input type="file" id="avatar" name="file">
</div>

<!-- Label Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label_id', 'Label Id:') !!}
    <select name="label_id" class="form-control">
        @foreach($labels as $label)
            <option value="{{$label->id}}">{{$label->name}}</option>
        @endforeach
    </select>
</div>

<!-- Time Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_start', 'Time Start:') !!}
    <input name="time_start" type="text" class="form-control datetimepicker"
           value="@if(isset($voucher->end_date)) {{date("Y/m/d H:i:s", $voucher->end_date)}}@endif">

    {{--{!! Form::number('time_start', null, ['class' => 'form-control datetimepicker']) !!}--}}
</div>

<!-- Time End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_end', 'Time End:') !!}
    <input name="time_end" type="text" class="form-control datetimepicker"
           value="@if(isset($voucher->end_date)) {{date("Y/m/d H:i:s", $voucher->end_date)}}@endif">

    {{--{!! Form::number('time_end', null, ['class' => 'form-control datetimepicker']) !!}--}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productLabels.index') }}" class="btn btn-default">Cancel</a>
</div>

<div class="table-responsive">
    <table class="table" id="productBonuses-table">
        <thead>
        <tr>
            <th>Product Sku</th>
            <th>Bonus Product Sku</th>
            <th>Bonus Qty</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productBonuses as $productBonus)
            <tr>
                <td>{{ $productBonus->product_sku }}</td>
                <td>{{ $productBonus->product_bonus_sku }}</td>
                <td>{{ $productBonus->bonus_qty }}</td>
                <td>
                    {!! Form::open(['route' => ['productBonuses.destroy', $productBonus->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('productBonuses.show', [$productBonus->id]) }}"--}}
                           {{--class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        {{--<a href="{{ route('productBonuses.edit', [$productBonus->id]) }}"--}}
                           {{--class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

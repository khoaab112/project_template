<div class="table-responsive">
    <table class="table" id="productPromotions-table">
        <thead>
        <tr>
            <th>SKU</th>
            <th>% Giảm</th>
            <th>Trạng thái</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày Kết thúc</th>
            <th>Ngày Tạo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productPromotions as $productPromotion)
            <tr>
                <td>{{ $productPromotion->product_variant_sku }}</td>
                <td>{{ $productPromotion->discount_percent }}%</td>
                <td>{{ \App\Models\ProductPromotion::$aryPromotionStatus[$productPromotion->status] ?? '' }}</td>
                <td>{{ date("Y-m-d H:i:s", $productPromotion->start_date) }}</td>
                <td>{{ date("Y-m-d H:i:s", $productPromotion->end_date) }}</td>
                <td>{{ $productPromotion->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['productPromotions.destroy', $productPromotion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productPromotions.show', [$productPromotion->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productPromotions.edit', [$productPromotion->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $productPromotions->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<div class="table">
    <table class="table" id="products-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Sku</th>
            <th>Name</th>
            <th>price</th>
            <th>Inventory</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_variants as $variant)
            <tr>
                <td>{{ $variant->id }}</td>
                <td>{{ $variant->sku }}</td>
                <td>{{ $variant->name }}</td>
                <td>{{ price($variant->price) }}</td>
                <td>{{ price($variant->available_count_total) }}</td>
                <td>                        
                    <input data-id="{{ $variant->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $variant->status ? 'checked' : '' }}>
                </td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('productVariants.edit', [$variant->id]) }}?product_id={{$product->id}}"
                           class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var variant_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{route("productVariantChangeStatus")}}',
              data: {'status': status, 'variant_id': variant_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

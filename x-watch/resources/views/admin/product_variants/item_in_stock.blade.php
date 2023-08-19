<div class="table">
    <table class="table" id="products-table">
        <thead>
        <tr>
            <th>Sku</th>
            <th>Location</th>
            <th>Store ID</th>
            <th>Quanity</th>
        </tr>
        </thead>
        <tbody>
            @if($locations->isNotEmpty())
                @foreach($locations as $location)
                <tr>
                    <td>{{ $location->sku }}</td>
                    <td>{{ $location->location_address }}</td>
                    <td>{{ $location->location_store_id }}</td>
                    <td>{{ $location->available_count }}</td>
                </tr>
                @endforeach
            @endif
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

<div class="table-responsive">
    <table class="table" id="reviews-table">
        <thead>
        <tr>
            <th>User name</th>
            <th>Phone</th>
            <th>Id product</th>
            <th>Type</th>
            <th>Status</th>
            <th>Rate</th>
            <th>Conten</th>
            {{--<th>Url img</th>--}}
            <th>Time</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->user_id }}</td>
                <td>{{ $review->phone_number  }}</td>
                <td>{{ $review->entity_id }}</td>
                <td>{{ \App\Models\Review::$aryReviewEntity[$review->entity_type] }}</td>
                <td>{{ \App\Models\Review::$aryReviewStatus[$review->status] }}</td>
                <td>{{  $review->rating }}</td>
                <td>{!! $review->content !!}</td>
{{--                <td>{!! $review->img_review ?? "" !!}</td>--}}
                <td>{!! $review->created_at !!}</td>
                <td>
                    {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                         <a href="{{ route('reviews.show', [$review->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('reviews.edit', [$review->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                         {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\TotalReview\TotalReviewRepository;
use Carbon\Carbon;

class ReviewService
{
    protected $repo,$totalRepo;

    public function __construct(ReviewRepository $repository, TotalReviewRepository $totalRepo)
    {
        $this->repo = $repository;
        $this->totalRepo = $totalRepo;
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function getData(array $request)
    {
        $query = $this->repo->query();

        if (!empty($request['time_start']) || !empty($request['time_end'])) {
            $query = $query->whereBetween('created_at', [
                Carbon::parse($request['time_start'])->format('Y-m-d H:i:s'),
                Carbon::parse($request['time_end'])->format('Y-m-d H:i:s')
            ]);
        }

        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }

        if (!empty($request['product_id'])) {
            $query =$query->where('entity_id', $request['product_id']);
        }

        return $query->orderBy('created_at', 'desc')->paginate(15);
    }

    public function show(int $id)
    {
        return $this->repo->find($id);
    }

    public function update(array $params, $id)
    {
        $review = $this->repo->find($id);

        if (isset($params['status'])) {
            $total = $this->totalRepo->firstOrNew([
               'entity_id' => $review->entity_id,
                'entity_type' => $review->entity_type, [
                    'total_user' => 0,
                    'total_rating' => 0
                ]
            ]);
            $total->save();

            if ($params['status'] == Review::REVIEW_STATUS_ACTIVE) {
                $array = [
                    'total_user' => $total->total_user + 1,
                    'total_rating' => $total->total_rating + $review->rating
                ];
            }

            if (in_array($params['status'], [Review::REVIEW_STATUS_PENDING, Review::REVIEW_STATUS_DISABLE])) {
                if ($review->status == Review::REVIEW_STATUS_ACTIVE) {
                    $array = [
                        'total_user' => $total->total_user - 1,
                        'total_rating' => $total->total_rating - $review->rating
                    ];
                }
            }

            if (isset($array)) {
                $this->totalRepo->where('entity_id', $review->entity_id)
                    ->where('entity_type', $review->entity_type)
                    ->update($array);
            }
        }

        $review->update($params);
        return $review;

    }
}

<?php 

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\PaginateInterface;

class ApiAdapter {
    public static function toJson(
        PaginateInterface $data
    ) {
        return DefaultResource::collection($data->items())
        ->additional([
            'meta' => [
                'total' => $data->tot(),
                'isFirstPag' => $data->isFirstPag(),
                'isLastPag' => $data->isLastPag(),
                'currentPag' => $data->currentPag(),
                'numNextPag' => $data->getNumNextPag(),
                'numPrevPag' => $data->getNumPrevPag(),


            ]
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Supports\CreateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Resources\SupportResource;
use App\Models\Support;
use App\Services\SupportService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {
    }

    public function index(Request $request)
    {
        // $support = Support::paginate();

        $supports = $this->service->paginate(
            pag: $request->get('page', 1), 
            totPerPag: $request->get('per_page', 1), 
            filter: $request->filter
        );

        return ApiAdapter::toJson($supports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupport $request)
    {
        $support = $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return new SupportResource($support, );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return response()->json([
                "erro" => "Not found"
            ], HttpFoundationResponse::HTTP_NOT_FOUND);    
        }

        return new SupportResource($support);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                "erro" => "Not found"
            ], HttpFoundationResponse::HTTP_NOT_FOUND);    
        }

        $this->service->delete($id);

        return response()->json([], HttpFoundationResponse::HTTP_NO_CONTENT);

    }
}

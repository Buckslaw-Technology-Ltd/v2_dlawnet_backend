<?php

namespace Modules\Bank\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bank\App\Http\Requests\TopupRequest;
use Modules\Bank\App\Interfaces\TopUpRepositoryInterface;
use Modules\Bank\App\Models\TopUp;
use Modules\Bank\App\Services\TopUpService;
use Modules\Core\App\Traits\ResponseTrait;

class TopUpController extends Controller
{
    use ResponseTrait;

    protected TopUpService $topUpRepository;
    public function __construct(TopUpService $topUpRepository)
    {
        $this->topUpRepository = $topUpRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->successResponse('',$this->topUpRepository->getAll());
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }



    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        try {
            return $this->successResponse('',$this->topUpRepository->getTopUpById($id));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TopupRequest $request)
    {
        try {
            return $this->successResponse('Top-up Created', $this->topUpRepository->createTopUp($request));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TopupRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            return $this->successResponse('Top-up Updated',$this->topUpRepository->updateTopUp($request,$id));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topup $top_up)
    {
        try {
            return $this->successResponse('Top-up Deleted',$this->topUpRepository->deleteTopUp($top_up));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }

    public function activate(Topup $top_up){
        try {
            return $this->successResponse('Top-up Activated',$this->topUpRepository->activateTopUp($top_up));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }


    public function deactivate(Topup $top_up){
        try {
            return $this->successResponse('Top-up Deactivated',$this->topUpRepository->deactivateTopUp($top_up));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong");
        }
    }


}

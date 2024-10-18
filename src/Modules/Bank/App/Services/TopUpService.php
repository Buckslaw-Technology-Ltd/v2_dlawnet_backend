<?php

namespace Modules\Bank\App\Services;


use Modules\Bank\App\Http\Requests\TopupRequest;
use Modules\Bank\App\Interfaces\TopUpRepositoryInterface;
use Modules\Bank\App\Interfaces\WalletRepositoryInterface;
use Modules\Bank\App\Models\TopUp;

class TopUpService
{
    protected TopUpRepositoryInterface $topUpRepo;
    protected WalletRepositoryInterface $walletRepo;

    public function __construct(TopUpRepositoryInterface $repository,WalletRepositoryInterface $walletRepo)
    {
        $this->topUpRepo = $repository;
        $this->walletRepo = $walletRepo;
    }

    // select top-ups
    public function getAll(){
        return $this->topUpRepo->topup_pricings(auth()->check()?auth()->user():'*')->get();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getTopUpById($id){
        return $this->topUpRepo->findById($id);
    }


    // fetch single top-up

    public function createTopUp(TopupRequest $request){
        return $this->topUpRepo->create($request->all());
    }


    public function updateTopUp(TopupRequest $request, $id){
        return $this->topUpRepo->update($id, $request->all());
    }


    // activate topup

    public function activateTopUp($top_up){

    }


    // deactivate topup
    public function deActivateTopUp($top_up){

    }

    /**
     * @param TopUp $topUp
     * @return mixed
     */
    public function deleteTopUp(TopUp $topUp){
        return $this->topUpRepo->delete($topUp);
    }


}

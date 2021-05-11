<?php

namespace App\Repositories;

use App\Http\Resources\BalancePackageResource;
use App\Models\BalancePackage;

class BalancePackageRepository
{

    public function all()
    {
        $balancepackages = BalancePackageResource::collection(BalancePackage::active()->get());

        if (!$balancepackages->isEmpty()) {
            return success([
                'balancepackages' => $balancepackages
            ]);
        }

        return failed('not found any balance package', [], 404);
    }

    public function findById($id)
    {
        $balancepackage = BalancePackageResource::collection(
            BalancePackage::where('id', $id)->active()->get()
        );

        if (!$balancepackage->isEmpty()) {
            return success($balancepackage);
        }

        return failed('this balance package not found or not available', [], 404);
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Installment;
use App\Models\PaidInstallment;
use Illuminate\Http\Resources\Json\JsonResource;


/** @mixin \App\Models\Installment * */
class InstallmentResource extends JsonResource
{

    public function toArray($request)
    {
        $data = parent::toArray($request);

        if (isset($data['paid_on'])) {
            $paidInstallment = PaidInstallment::where('installment_id', $data['id'])->first();

            $data['paidOrNot'] = $data['amount'] == $paidInstallment->paid_amount ? 'paid' : 'not totally paid';

        } else {
            $data['paidOrNot'] = 'not paid';
        }
        return $data;
    }
}

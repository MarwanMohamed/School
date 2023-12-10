<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\PaidInstallment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\InstallmentResource;

class InstallmentsController extends Controller
{
    public function index(Request $request)
    {
        $installments = Installment::where('student_id', $request->student_id)->get();
        return response()->json(['data' => InstallmentResource::collection($installments)]);
    }

    public function pay(Request $request)
    {
        $studentInstallment = Installment::findOrFail($request->installment_id);
        $studentInstallment->update(['paid_on' => Carbon::now()]);

        $receiptVoucher = new PaidInstallment();
        $receiptVoucher->installment_id = $request->installment_id;
        $receiptVoucher->paid_amount = $request->paid_amount;
        $receiptVoucher->student_id = $studentInstallment->student_id;
        $receiptVoucher->save();

        return response()->json(['message' => 'Receipt Created successfully']);
    }

}

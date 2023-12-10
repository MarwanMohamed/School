<?php

namespace App\Observers;

use App\Models\Installment;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\StudyCategory;

class StudentObserver
{
    public function created(Student $student): void
    {
        $studyCategory  = StudyCategory::find($student->study_category_id);
        $studentGroup  = StudentGroup::find($student->student_group_id);

        $numberOfInstallments = $studyCategory->payments;
        $paidEvery = $studyCategory->pay_every;

        $startingDateFirstInstallment = \DateTime::createFromFormat('d-m-Y', $studentGroup->first_installment);

        $installmentsDates = [];
        $installmentsDates[]  = $startingDateFirstInstallment->format('d-m-Y');
        $numberOfInstallments--;


        $dateInterval  = new \DateInterval('P'. $paidEvery .'M');

        for ($i = 0; $i < $numberOfInstallments; $i++) {
            $lastInsertedDate = new \DateTime($installmentsDates[$i]);
            $installmentsDates[] = $lastInsertedDate->add($dateInterval)->format('d-m-Y');
        }

        $this->createInstallments($student, $installmentsDates, $studyCategory);
    }


    private function createInstallments($student, $installmentsDate, $studyCategory)
    {
        foreach ($installmentsDate as $date)
        {
           Installment::create([
               'student_group_id' => $student->student_group_id,
               'study_group_id' => $student->study_category_id,
               'student_id' => $student->id,
               'amount' => $studyCategory->cost,
               'date' => $date
           ]);
        }
    }
}

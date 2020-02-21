<?php


namespace App\Transformers;

use League\Fractal;
use App\Models\PatientContact;

class PatientContactTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param PatientContact $patientContact
     * @return array
     */
    public function transform(PatientContact $patientContact)
    {
        return [
            'id' => $patientContact->id,
            'number' => $patientContact->number,
            'type' => $patientContact->type,
        ];
    }
}

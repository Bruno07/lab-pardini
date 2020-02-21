<?php


namespace App\Transformers;

use League\Fractal;
use App\Models\PatientAddress;

class PatientAddressTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param PatientAddress $patientAddress
     * @return array
     */
    public function transform(PatientAddress $patientAddress)
    {
        return [
            'id' => $patientAddress->id,
            'postalCode' => $patientAddress->postal_code,
            'address' => $patientAddress->address,
            'number' => $patientAddress->number,
            'neighborhood' => $patientAddress->neighborhood,
            'town' => $patientAddress->town,
            'state' => $patientAddress->state
        ];
    }
}

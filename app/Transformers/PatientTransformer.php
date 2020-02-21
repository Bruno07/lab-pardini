<?php


namespace App\Transformers;

use League\Fractal;
use App\Models\Patient;

class PatientTransformer extends Fractal\TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'contacts',
        'addresses'
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        'contacts',
        'addresses'
    ];

    /**
     * @param Patient $patient
     * @return array
     */
    public function transform(Patient $patient)
    {
        return [
            'id' => $patient->id,
            'name' => $patient->name,
            'lastName' => $patient->last_name,
            'fullName' => $patient->getFullNameAttribute(),
            'birth' => $patient->birth,
            'email' => $patient->email
        ];
    }

    /**
     * @param Patient $patient
     * @return mixed
     */
    public function includeContacts(Patient $patient)
    {
        return $this->collection($patient->contacts, new PatientContactTransformer);
    }

    /**
     * @param Patient $patient
     * @return mixed
     */
    public function includeAddresses(Patient $patient)
    {
        return $this->collection($patient->addresses, new PatientAddressTransformer);
    }
}

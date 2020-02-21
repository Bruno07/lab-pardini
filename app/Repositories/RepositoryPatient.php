<?php


namespace App\Repositories;

use App\Models\Patient;
use App\Models\PatientAddress;
use App\Models\PatientContact;
use Illuminate\Database\Eloquent\Collection;

class RepositoryPatient
{
    /**
     * @return Patient[]|Collection
     */
    public function all()
    {
        return Patient::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Patient::find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Patient
     */
    public function savePatient(array $data, int $id = null)
    {
        $patient = new Patient;

        if (! empty($id))
            $patient = Patient::findOrFail($id);

        $patient->name = $data['name'];
        $patient->last_name = $data['lastname'];
        $patient->birth = $data['birth'];
        $patient->email = $data['email'];

        $patient->save();

        return $patient;
    }

    /**
     * @param array $data
     * @param Patient $patient
     * @return void
     */
    public function savePatientAddress(array $data, Patient $patient)
    {
        $patientAddress = new PatientAddress;

        if (data_get($data, 'id', false))
            $patientAddress = PatientAddress::findOrFail($data['id']);

        $patientAddress->postal_code = $data['postal_code'];
        $patientAddress->address = $data['address'];
        $patientAddress->number = $data['number'];
        $patientAddress->neighborhood = $data['neighborhood'];
        $patientAddress->town = $data['town'];
        $patientAddress->state = $data['state'];

        $patientAddress->patient()->associate($patient);

        $patientAddress->save();
    }

    /**
     * @param array $data
     * @param Patient $patient
     * @return void
     */
    public function savePatientContact(array $data, Patient $patient)
    {
        $patientContact = new PatientContact;

        if (data_get($data, 'id', false))
            $patientContact = PatientContact::findOrFail($data['id']);

        $patientContact->number = $data['number'];
        $patientContact->type = $data['type'];

        $patientContact->patient()->associate($patient);

        $patientContact->save();
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $patient = Patient::find($id);

        $patient->delete();
    }

    /**
     * @param int $id
     */
    public function restore(int $id)
    {
        Patient::withTrashed()
            ->where('id', $id)
            ->restore();
    }
}

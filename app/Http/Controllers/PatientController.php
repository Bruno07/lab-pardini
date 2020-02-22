<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RequestPatient;
use Illuminate\Contracts\View\Factory;
use App\Repositories\RepositoryPatient;
use Illuminate\Contracts\Foundation\Application;

class PatientController extends Controller
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var mixed
     */
    private $url;

    /**
     * @var RepositoryPatient
     */
    private $repository;

    /**
     * PatientController constructor.
     * @param RepositoryPatient $repository
     * @param Client $client
     */
    public function __construct(RepositoryPatient $repository, Client $client)
    {
        $this->client = $client;
        $this->url = env('API_URL');
        $this->repository = $repository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $patients = $this->client->request('GET', "{$this->url}/api/patients", [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $patients = json_decode((string)$patients->getBody());

        return view('patients.list', compact('patients'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $patient = $this->client->request('GET', "{$this->url}/api/patients/{$id}", [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $patient = json_decode((string)$patient->getBody());

        return view('patients.show', compact('patient'));
    }

    /**
     * @param $id
     * @return string
     */
    public function showAddresses($id)
    {
        $patient = $this->client->request('GET', "{$this->url}/api/patients/{$id}", [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        return (string)$patient->getBody();
    }

    /**
     * @param $id
     * @return string
     */
    public function showContacts($id)
    {
        $patient = $this->client->request('GET', "{$this->url}/api/patients/{$id}", [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        return (string)$patient->getBody();
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * @param RequestPatient $request
     * @return RedirectResponse
     */
    public function store(RequestPatient $request)
    {
        try {
            $data = $request->except('_token');

            DB::beginTransaction();

            $patient = $this->repository->savePatient($data['patient']);

            foreach ($data['addresses'] as $dataAddress)
                $this->repository->savePatientAddress($dataAddress, $patient);

            foreach ($data['contacts'] as $dataContact)
                $this->repository->savePatientContact($dataContact, $patient);

            DB::commit();

            return back()->with(['class' => 'success', 'status' => 'Paciente cadastrado com sucesso']);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['class' => 'danger', 'status' => $e->getMessage()]);
        }
    }

    /**
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        $patient = $this->client->request('GET', "{$this->url}/api/patients/{$id}", [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $patient = json_decode((string)$patient->getBody());

        return view('patients.edit', compact('patient'));
    }

    /**
     * @param RequestPatient $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(RequestPatient $request, $id)
    {
        try {
            $data = $request->except('_token');

            DB::beginTransaction();

            $patient = $this->repository->savePatient($data['patient'], $id);

            foreach ($data['addresses'] as $dataAddress)
                $this->repository->savePatientAddress($dataAddress, $patient);

            foreach ($data['contacts'] as $dataContact)
                $this->repository->savePatientContact($dataContact, $patient);

            DB::commit();

            return back()->with(['class' => 'success', 'status' => 'Dados alterado com sucesso']);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['class' => 'danger', 'status' => $e->getMessage()]);
        }
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->repository->delete($id);

        return back();
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function restore(int $id)
    {
        $this->repository->restore($id);

        return back();
    }
}

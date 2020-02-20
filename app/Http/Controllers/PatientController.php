<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RequestPatient;
use Illuminate\Contracts\View\Factory;
use App\Repositories\RepositoryPatient;
use Illuminate\Contracts\Foundation\Application;

class PatientController extends Controller
{
    /**
     * @var RepositoryPatient
     */
    private $repository;

    /**
     * PatientController constructor.
     * @param RepositoryPatient $repository
     */
    public function __construct(RepositoryPatient $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $client = new Client;

        $patients = $client->request('GET', '127.0.0.1:8004/api/patients', [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        return (string)$patients->getBody();
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

            return back()->with(['class' => 'success', 'status' => 'Paciênte cadastrado com sucesso']);

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
        $patient = $this->repository->find($id);

        if ($patient)
            return view('patients.edit', compact('patient'));

        return back()->with(['class' => 'danger', 'status' => 'Ops, não conseguimos encontrar esse paciênte']);
    }

    /**
     * @param RequestPatient $request
     * @param int $id
     * @return void
     */
    public function update(RequestPatient $request, $id)
    {
        //
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

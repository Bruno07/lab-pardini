<?php

namespace App\Http\Controllers\Api;

use Spatie\Fractalistic\Fractal;
use App\Http\Controllers\Controller;
use App\Repositories\RepositoryPatient;
use App\Transformers\PatientTransformer;

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
     * @return string
     */
    public function index()
    {
        $patients = $this->repository->all();

        return Fractal::create()
            ->collection($patients, new PatientTransformer)
            ->toJson();
    }

    /**
     * @param int $id
     * @return string
     */
    public function show(int $id)
    {
        $patient = $this->repository->find($id);

        return Fractal::create()
            ->item($patient, new PatientTransformer)
            ->toJson();
    }

    /**
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function edit(int $id)
    {
        $patient = $this->repository->find($id);

        if (! $patient)
            throw new \Exception('Ops, não conseguimos encontrar esse paciênte');

        return Fractal::create()
            ->item($patient, new PatientTransformer)
            ->toJson();
    }
}

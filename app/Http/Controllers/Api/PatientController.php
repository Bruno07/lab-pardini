<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RepositoryPatient;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

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
        $patients = $this->repository->all();

        return response()->json($patients);
    }
}

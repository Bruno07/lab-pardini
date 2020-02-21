@extends('layouts.app')

@section('title', 'Lista de cadastros')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">E-mail</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients->data as $patient)
                        <tr>
                            <th scope="row">{{$patient->id}}</th>
                            <td>{{ $patient->fullName }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->birth)->format('d/m/Y') }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-default show" data-id="{{ $patient->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Nenhum resultado encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Formulário - Hermes Pardini')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registre-se</h4>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Sobrenome</label>
                                    <input type="text" class="form-control" name="lastname">
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Nascimento</label>
                                    <input type="text" class="form-control" name="birth">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="email">
                                    <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com mais ninguém.</small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-primary" data-bind="click: addAddress">
                                        <i class="fa fa-plus"></i> Endereço</button>
                                </div>
                            </div>

                            <div data-bind="foreach: addresses.slice(0,6)">
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="postal_code">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label>Número</label>
                                        <input type="text" class="form-control" name="number">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name="neighborhood">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="town">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label>Estado</label>
                                        <input type="text" class="form-control" name="state">
                                    </div>

                                    <div class="form-group col-md-1" data-bind="visible: $parent.addresses().length > 1">
                                        <button type="button" class="btn btn-primary" data-bind="click: $parent.removeAddress">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-primary" data-bind="click: addPhone">
                                        <i class="fa fa-plus"></i> Telefone</button>
                                </div>
                            </div>

                            <div data-bind="foreach: phones.slice(0,6)">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>

                                    <div class="form-group col-md-1" data-bind="visible: $parent.phones().length > 1">
                                        <button type="button" class="btn btn-primary" data-bind="click: $parent.removePhone">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $phone_types = [
        'Fixo',
        'Celular',
    ]
@endphp

<div class="form-row">
    <div class="form-group col-md-3">
        <label>Nome</label>
        <input type="text" name="patient[name]" class="form-control @error('patient.name') is-invalid @enderror" value="{{ $patient->name ?? old('patient.name') }}" required>

        @error('patient.name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="exampleInputEmail1">Sobrenome</label>
        <input type="text" name="patient[lastname]" class="form-control @error('patient.lastname') is-invalid @enderror" value="{{ $patient->lastname ?? old('patient.lastname') }}" required>

        @error('patient.lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label>Nascimento</label>
        <input type="text" name="patient[birth]" class="form-control date @error('patient.birth') is-invalid @enderror" value="{{ $patient->birth ?? old('patient.birth') }}" required>

        @error('patient.birth')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-7">
        <label>E-mail</label>
        <input type="text" name="patient[email]" class="form-control @error('patient.email') is-invalid @enderror" value="{{ $patient->email ?? old('patient.email') }}" required>

        @error('patient.email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <button type="button" class="btn btn-primary" data-bind="click: addAddress">
            <i class="fa fa-plus"></i> Endereço
        </button>
    </div>
</div>

<div data-bind="foreach: addresses.slice(0,6)">
    <div class="form-row">
        <div class="form-group col-md-1">
            <label>CEP</label>
            <input type="text" class="form-control @error('addresses.*.postal_code') is-invalid @enderror" data-bind="attr: {'name': 'addresses['+$index()+'][postal_code]'}" required>

            @error('addresses.*.postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label>Endereço</label>
            <input type="text" class="form-control @error('addresses.*.address') is-invalid @enderror" data-bind="attr: {'name': 'addresses['+$index()+'][address]'}" required>

            @error('addresses.*.address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-1">
            <label>Número</label>
            <input type="text" class="form-control @error('addresses.*.number') is-invalid @enderror" data-bind="attr: {'name': 'addresses['+$index()+'][number]'}" required>

            @error('addresses.*.number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label>Bairro</label>
            <input type="text" class="form-control @error('addresses.*.neighborhood') is-invalid @enderror" data-bind="attr: {'name': 'addresses['+$index()+'][neighborhood]'}" required>

            @error('addresses.*.neighborhood')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label>Cidade</label>
            <input type="text" class="form-control @error('addresses.*.town') is-invalid @enderror" data-bind="attr: {'name': 'addresses['+$index()+'][town]'}" required>

            @error('addresses.*.town')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-1">
            <label>Estado</label>
            <input type="text" class="form-control @error('addresses.*.state') is-invalid @enderror" data-bind="attr: {'name': 'addresses['+$index()+'][state]'}" required>

            @error('addresses.*.state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
            <i class="fa fa-plus"></i> Telefone
        </button>
    </div>
</div>

<div data-bind="foreach: phones.slice(0,6)">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Telefone</label>
            <input type="text" class="form-control phone @error('contacts.*.number') is-invalid @enderror" data-bind="attr: {'name': 'contacts['+$index()+'][number]'}" required>

            @error('contacts.*.number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            <label>Tipo</label>
            <select class="form-control @error('contacts.*.type') is-invalid @enderror" name="type" data-bind="attr: {'name': 'contacts['+$index()+'][type]'}">
                @foreach($phone_types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>

            @error('contacts.*.type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-1" data-bind="visible: $parent.phones().length > 1">
            <button type="button" class="btn btn-primary" data-bind="click: $parent.removePhone">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>

@php
    $patient = $patient->data;
    $birth = \Carbon\Carbon::parse($patient->birth);
@endphp

<p>
    <strong>ID #</strong> {{ $patient->id }} <br/>
    <strong>Paciênte</strong> {{ $patient->fullName }} - {{ $birth->format('d/m/Y') }} - {{ $birth->age }} anos <br/>
    <strong>E-mail</strong> {{ $patient->email }}
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">Endereços</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patient->addresses as $addresses)
            @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->address }}, {{ $address->number }} - {{ $address->neighborhood }} - {{ $address->town }} - {{ $address->state }} - {{ $address->postalCode }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">Contatos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patient->contacts as $contacts)
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->number }} - {{ $contact->type }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

<a href="/patients/edit/{{ $patient->id }}" class="btn btn-primary">
    <i class="fa fa-pencil"></i> Editar
</a>

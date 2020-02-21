function ViewModel(patientId = null) {
    var self = this;

    if (patientId == null) {
        self.addresses = ko.observableArray([
            {
                id: ko.observable(null),
                postal_code: ko.observable(null),
                address: ko.observable(null),
                number: ko.observable(null),
                neighborhood: ko.observable(null),
                town: ko.observable(null),
                state: ko.observable(null)
            }
        ]);

        self.phones = ko.observableArray([{id: null, number: null, type: null}]);

    } else {
        self.addresses = ko.observableArray([])
        self.phones = ko.observableArray([])

        $.getJSON('/patients/'+patientId+'/addresses', function (data) {
            $.each(data, function (key, val) {
                $.each(val.addresses, function (keyAddresses, dataAddresses) {
                    $.each(dataAddresses, function (keyAddress, dataAddress) {
                        self.addresses.push({
                            id: dataAddress.id,
                            postal_code: dataAddress.postalCode,
                            address: dataAddress.address,
                            number: dataAddress.number,
                            neighborhood: dataAddress.neighborhood,
                            town: dataAddress.town,
                            state: dataAddress.state
                        });
                    })
                })
            });
        });

        $.getJSON('/patients/'+patientId+'/contacts', function (data) {
            $.each(data, function (key, val) {
                $.each(val.contacts, function (keyContacts, dataContacts) {
                    $.each(dataContacts, function (keyContact, dataContact) {
                        self.phones.push({
                            id: dataContact.id,
                            number: dataContact.number,
                            type: dataContact.type,
                        });
                    })
                })
            });
        });
    }

    self.addAddress = function() {
        self.addresses.push({
            id: null,
            postal_code: null,
            address: null,
            number: null,
            neighborhood: null,
            town: null,
            state: null
        });
    };


//
//
//
//
//
//    for (var i = 0; i <= self.addresses.length; i++) {
//       $(document).on('change', '#pc-'+i, function (event) {
//            var postalCode = $('#pc-'+i).val()
//
//            $.ajax({
//                url: 'https://viacep.com.br/ws/'+postalCode+'/json/',
//            }).done(function (response) {
//                $('#address-'+i).val(response.logradouro)
//                $('#neighborhood-'+i).val(response.bairro)
//                $('#town-'+i).val(response.localidade)
//                $('#state-'+i).val(response.uf)
//            })
//        })
//    }

    self.removeAddress = function() {
        self.addresses.remove(this);
    }

    self.addPhone = function() {
        self.phones.push({id: null, number: null, type: null});
    };

    self.removePhone = function() {
        self.phones.remove(this);
    }
}

$(document).ready(function () {

    var patientId = $('#form-patient').data('id')
    ko.applyBindings(new ViewModel(patientId));

    $('.date').mask('99/99/9999');
    $('.phone').mask('(99) 99999-9999');

    setTimeout(function () {
        $('#alert').removeClass('alert-danger alert-success').html('')
    }, 3000)

    $('.show').on('click', function () {
        let id = $(this).data('id')
        let modal = $('#genericModal').modal('show')

        modal.find('.modal-title').text('Detalhe do paciênte')
        modal.find('.modal-body').load('/patients/'+id)
    });

    $(document).on('change', '.pc', function (event) {
        var $this = $(this)
        var postalCode = $this.val()

        $.ajax({
            url: 'https://viacep.com.br/ws/'+postalCode+'/json/',
        }).done(function (response) {
            $this.parent().parent().find('.address').val(response.logradouro)
            $this.parent().parent().find('.neighborhood').val(response.bairro)
            $this.parent().parent().find('.town').val(response.localidade)
            $this.parent().parent().find('.state').val(response.uf)
        })
    })
})

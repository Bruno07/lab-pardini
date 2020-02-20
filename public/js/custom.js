function ViewModel() {
    var self = this;

    self.addresses = ko.observableArray([
        {
            postal_code: null,
            address: null,
            number: null,
            neighborhood: null,
            town: null,
            state: null
        }
    ]);

    self.phones = ko.observableArray([{phone: null}]);

    self.addAddress = function() {
        self.addresses.push({
            postal_code: null,
            address: null,
            number: null,
            neighborhood: null,
            town: null,
            state: null
        });
    };

    self.removeAddress = function() {
        self.addresses.remove(this);
    }

    self.addPhone = function() {
        self.phones.push({phone: null});
    };

    self.removePhone = function() {
        self.phones.remove(this);
    }
}

ko.applyBindings(new ViewModel());

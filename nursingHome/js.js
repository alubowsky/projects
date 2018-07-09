/*global $*/
(function () {
    "use strict";
    function loadContacts() {
        $.getJSON("getNursingHomes.php?callback=?", function (loadedContacts) {
            loadedContacts.forEach(element => {
                $('#Nselect').append("<option>" + element.name + "</option>");
            });
        });

        $.getJSON("getInsurance.php?callback=?", function (loadedContacts) {
            loadedContacts.forEach(element => {
                $('#Iselect').append("<option>" + element.name + "</option>");
            });
        });
    }

    loadContacts();
}());
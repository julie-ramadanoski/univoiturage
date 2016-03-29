$(function () {

    // Instanciation du date picker de la page recherche.form
    $('#datetimepicker1').datetimepicker();

    
    $('input:text').bind({

    });
    /*
    * Rempli la liste des sites universitaires pour l'inscription.
    */
    $.ajax({
        url: '/autocomplete/site',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.map(data, function (value, key) {                                     
                var first;
                for (var i in value) {
                    if (value.hasOwnProperty(i) && typeof(i) !== 'function') {
                        first = value[i];
                        break;
                    }
                }
                $("#site").append('<option value=' + i + '>' + first + '</option>'); 
                
            });
        },
        error: function(data){ 
            console.log(data);
        }
    });
    $("#universite").autocomplete({
        minLength: 1,
        autoFocus: true,
        source: '/autocomplete/univ'
     });

    $("#villedepart, #villearrivee").autocomplete({
        minLength: 1,
        autoFocus: true,
        source: '/autocomplete/ville'
     });

});

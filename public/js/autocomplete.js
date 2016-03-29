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

    /*
     * Rempli la liste des universitées disponibles
     */
    $("#universite").autocomplete({
        minLength: 1,
        autoFocus: true,
        source: '/autocomplete/univ',
        select: function(event, ui) { 
            event.preventDefault();
            $("#universite").val(ui.item.value);
        }
     });
    /*
     * Affiche la liste de sites en fonction de l'université choisie avec des villes disponibles
     */
    $("#villedepart, #villearrivee").autocomplete({
        minLength: 1,
        autoFocus: true,
        source: '/autocomplete/ville/' +  $("#universite").val() +'toto' 
        
            
    });

});

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
        
        // Au changement d'université précharger l'autocompletion   
        select: function(event, ui) { 
            // Annuler le comportement par défault 
            event.preventDefault();

            // Donner la valeur au champ
            $("#universite").val(ui.item.value);
           
            function uniVal(){
                var val = '/autocomplete/ville/' + $("#universite").val();
                return val; 
            }

            $("#villedepart, #villearrivee").autocomplete({
                minLength: 1,
                autoFocus: true,
                source: uniVal(),
                messages: {
                    noResults: '',
                    results: ''
                }                  
            });            
        },
        messages: {
            noResults: '',
            results: ''
        }
     });
    /*
     * Préchargement de la recherche si la page a été rechargée
     */
    function uniVal(){
        var val = '/autocomplete/ville/' + $("#universite").val();
        return val; 
    }

    $("#villedepart, #villearrivee").autocomplete({
        minLength: 1,
        autoFocus: true,
        source: uniVal(),
        response: function(event, ui) {
           
        }  
    });
});

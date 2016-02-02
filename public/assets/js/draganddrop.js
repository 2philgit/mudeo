// On pose les évènements nécessaires au drag'n'drop
$('#upload_Zone').bind
({
    "dragenter dragexit dragover" : do_nothing,
    drop : drop
});

var fichier;

// Fonction stoppant toute évènement natif et leur propagation
function do_nothing(evt){
    evt.stopPropagation();
    evt.preventDefault();
}


    function drop(evt){
        do_nothing(evt);

        var files = evt.originalEvent.dataTransfer.files;


        // On vérifie que des fichiers ont bien été déposés
        if(files.length>0){
            for(var i in files){
                // Si c'est bien un fichier
                if(files[i].size!=undefined) {

                    fichier= files[i];

                    // On ajoute notre fichier à la liste
                    $('#zone_Row').append('<li>'+files[i].name+'</li>');

                }
            }
        }

    }

/***************************choix categorie et type*********************************************
*************************************************************************************************/  
//

if ((!$("#videoFile").is(':checked')) && (!$("#musicFile").is(':checked')))
{
    $('#musicCategory').hide();
    $("#movieCategory").hide()
}


$('#videoFile').click(function(){
   if (this.checked) {
        $('#musicCategory').hide();
        $("#movieCategory").show();
    }
})
$('#musicFile').click(function(){
    if (this.checked) {
        $('#movieCategory').hide();
        $("#musicCategory").show();
    }
}) 


/***************************information formulaire pendant que l'on rentre des données*****************************************
*******************************************************************************************************************************/  




$("#titleContent").keyup(function() {
    var $t = $(this);
    var $e = $("#erreur");
    if (!$t.val()) 
    {
        $e.text("le champ titre est vide").show();
    } 
    else  if($t.val().length < 3) 
    {
        $e.text("3 charactères minimums");
    }
    else
    {

        $e.hide();
    }
}).keyup();



// validation du formulaire



function check_form() 
{
    var uploadFormHasError = false;
    /***************************verification du bouton radio*****************************************
    *************************************************************************************************/  


    if ((!$("#videoFile").is(':checked')) && (!$("#musicFile").is(':checked')))
    {
        console.log('non coché');
        $("#type_Error").html("Veuillez choisir un type de fichier !");
        uploadFormHasError = true
        


    }   
    else if ($("#musicFile").is(':checked'))
    {

        /***************************verification des categories*****************************************
        *************************************************************************************************/ 

        if ( $("#musicCategory").val() )
        {
            
            console.log("music cat selectionnée");

        }
        else if (!$("#musicCategory").val() )
        {
            $("#categorie_Error").html("Veuillez choisir un type de musique!");
            console.log("error music category");
            uploadFormHasError = true

        }
    }

    else if ($("#videoFile").is(':checked'))
    {

        //verif category
        if ( $("#movieCategory").val() )
        {
            
            console.log("video cat selectionnée");

        }
        else if (!$("#movieCategory").val() )
        {
            $("#categorie_Error").html("Veuillez choisir un type de video!");
            
            uploadFormHasError = true

        }

    }

    else
    {
        $("#type_Error").empty();
        console.log($('input[type=radio]:checked').attr('value'));
    }

/***************************verification du champ rating*****************************************
*************************************************************************************************/

    if ( $("#rating").val() )
        {
           $("#rating_Error").empty();
            console.log("rating ok");

        }
        else if (!$("#rating").val() )
        {
            $("#rating_Error").html("Veuillez selectionner le public visé !");
           
            uploadFormHasError = true

        }



/***************************verification du champs licence*****************************************
*************************************************************************************************/  


    
    //si j'ai une valeur, y'a pas d'erreur
    if ( !$("#contenu_licence").val() )
    {
        $("#licence_Error").html("Veuillez choisir un type de licence pour le contenu!");
        
        uploadFormHasError = true
    }
    //sinon, y'a une erreur
    else 
    {
        $("#title_error").empty();
    }




/***************************verification du champs titre*****************************************
*************************************************************************************************/  


    var titleVal = $("#titleContent").val().trim();
    var titleRegexp = /^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]/;

    //champs requis
    if (titleVal == "")
    {
        $("#title_Error").html("Votre titre doit comporter au moins 3 caractères !");
         uploadFormHasError = true
    }
    else if( titleRegexp.test(titleVal) === false )
    {
        $("#title_Error").html("seul les caractères alphanumerique sont accepté !");
         uploadFormHasError = true
    }
    //pas d'erreur !!!
    else 
    {
        $("#title_Error").empty();
    }

/***************************verification du champs keyword **********************************
*************************************************************************************************/

    var keywordVal = $("#keysearch").val().trim();
    var keywordRegexp = /^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]/;

    //champs requis
    if (keywordVal == "")
    {
        $("#keyword_Error").html("Votre titre doit comporter au moins 3 caractères !");
        uploadFormHasError = true
    }
    else if( keywordRegexp.test(keywordVal) === false )
    {
        $("#keyword_Error").html("seul les caractères alphanumerique sont accepté !");
        uploadFormHasError = true
    }
    //pas d'erreur !!!
    else 
    {
        $("#keyword_Error").empty();
    }





/***************************verification du champs description **********************************
*************************************************************************************************/  



   //  var fileDescription = $("#description").val().trim();
   //  var descriptionRegexp = /^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]/;

   // if( descriptionRegexp.test(fileDescription) === false )
   //  {
   //      $("#describe_Error").html("sont autorisées seulement les caracteres alphabetique et numerique !");
   //  }
   //  //pas d'erreur !!!
   //  else 
   //  {
   //      $("#describe_Error").empty();
   //  }


    var hasSelectedFile = $.trim( $('#uploadImput').val());
    console.log(fichier);
    if (hasSelectedFile == "" && !fichier) 
    {
        $("#file_Error").html("aucune fichier ajouté!");
        uploadFormHasError = true
    }
    else 
    {
       $("#file_Error").empty();
     

    }



    //upload thumbs
    


    var hasSelectedThumbs = $.trim( $('#thumbs').val());
    console.log(fichier);
    if (hasSelectedThumbs == "" && !fichier) 
    {
        $("#thumb_Error").html("aucune image ajoutée!");
        uploadFormHasError = true
    }
    else 
    {
        $("#thumb_Error").empty();

    }

    //fin de la validation !

    //s'il y a des erreurs...

    if (uploadFormHasError == false)
    {
            var formElement = document.querySelector("#file_Param")

            var fd= new FormData(formElement);
                    fd.append('fichier',fichier);
                    


                $.ajax({
                    url: "add",
                    type: 'POST',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(response){
                    console.log(response);
                });


                // // On ajoute notre fichier à la liste
                // ;



    }
    else 
    {
        
        
        alert("Votre formulaire comporte des erreurs !");
    }
}



/***************************Requete ajax pour envoyer le fichier et le formulaire****************
*************************************************************************************************/  

$('#file_Param').on('submit', function(e) 
{
    e.preventDefault(); 
    check_form();

        
    
});
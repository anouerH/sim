$( document ).ready(function() {
    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18)
            {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex)
            {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
            {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3)
            {
                form.steps("previous");
            }
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            //alert("Submitted!");
            form.submit();
        }
    }).validate({
        //errorClass : 'error clearfix',
        errorPlacement: function errorPlacement(error, element) {element.parent().after(error); /*element.parent().parent().after(error);*/ },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });
    
    
    // get wall_thickness
    $("input[name='wall_material']").change(function() {
        var wall = $(this).val() ;
        $.ajax({
            type: "POST",
            url: "index.php/simulateur/wall_thickness",
            data: { wall: wall}
        })
        .done(function( html ) {
            if(html === "0")
                $('#wall_thickness_group').hide("slow");
            else{
                $( "#wall_thickness" ).html( html );
                $('#wall_thickness_group').show("slow");
            }
        });
    });
    
    
    // get Basement from : Uplancher bas
    $("#CORsol").change(function() {
       
        var id_basement = $(this).find('option:selected').attr('rel');
        var code =  $(this).find('option:selected').attr('code');
        $("#plancher_bas").val(code);
        alert(code);
        
        $.ajax({
            type: "POST",
            url: "index.php/simulateur/basement",
            data: { id_basement: id_basement}
        })
        .done(function( html ) {
            if(html === "0")
                $('#basement_form_group').fadeOut();
            else{
                $( "#basement_form" ).html( html );
                $('#basement_form_group').fadeIn();
            }
        });
    });
    
    // lame d'air
    $("#glazing_type").change(function(){
      var id = $(this).val();
      if(id == 3 || id == 4) $('#air_space_group').fadeIn();
      else $('#air_space_group').fadeOut();
    });
  
});
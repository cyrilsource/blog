$(function(){

    $("#submit").on("click", function() {
      if($("#extrait").val().length > 140) {
        $("#extraitForm").addClass("has-error");
        $("#caracError").show("slow").delay(4000).hide("slow");
       	return false;
        }
        
            
    });
     
  });
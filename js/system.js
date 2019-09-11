//login form submit
$(function() {
        $("#loginForm").on('submit', function(e) {
            e.preventDefault();

            var loginForm = $(this);

            $.ajax({
                url: loginForm.attr('action'),
                type: 'post',
                data: loginForm.serialize(),

                success: function(response){
                  if(response.status == 'faliure'){
                    $("#message").html(response.message)
                  }
                  else{
                    $("#loginFormdiv").html(response);
                  } 
                }
            });
        });
  });

//jobseeker info form submit

$(function() {
  $("#jobseeker_info").on('submit', function(e) {
    
      e.preventDefault();

      var jobseeker_infoForm = $(this);
      
      $.ajax({
          url: jobseeker_infoForm.attr('action'),
          type: 'post',
          data: jobseeker_infoForm.serialize(),

          success: function(response){
           $("#jobseeker_dashboard").html(response);
            if(response.status == 'success'){
              alert("xxx");
              $("#loginFormdiv").load(responce);
            }
            else{
              alert("xxxxx");
            } 
          }
      });
  });
});

//jobseeker exp form submit

$(function() {
  $("#jobseeker_exp").on('submit', function(e) {
     alert("ssss");
      e.preventDefault();

      var jobseeker_expForm = $(this);
      
      $.ajax({
          url: jobseeker_expForm.attr('action'),
          type: 'post',
          data: jobseeker_expForm.serialize(),

          success: function(response){
           $("#jobseeker_dashboard").html(response);
            if(response.status == 'success'){
              alert("xxx");
              $("#loginFormdiv").load(responce);
            }
            else{
              alert("xxxxx");
            } 
          }
      });
  });
});

//jobseeker info form submit




  
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



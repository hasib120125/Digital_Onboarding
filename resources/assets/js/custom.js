function submitForm(form){
  alert('submitForm');
    var formURL = $(form).attr('action');
    var formData = new FormData(form);
    $.post({
      url: formURL,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data, textStatus, jqXHR) {
        $("#success-msg").html(data.success);
        $("#success-msg").show();
        setTimeout(function(){
          $("#success-msg").hide();
        }, 5000)
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        if (jqXHR.status === 422) {
          $('.help-block').html('');
          $('.has-error').removeClass('has-error');
          errors = jqXHR.responseJSON;
          $.each(errors.errors, function (key, value) {
            var group = $("[name=" + key + "]").closest('.form-group');
            if(!group.length){
              group = $("[name='" + key + "[]']").closest('.form-group');
            }
            $(group).addClass("has-error")
            $(group).find('.help-block').html(value[0]);
          });
        } else if(jqXHR.status === 403) {
          var element = document.getElementById('error-msg');
          $("#modal-form").modal('hide');
          element.innerHTML = "You don't have permission to do this";
          element.style.display = "block";
        } else {
          //console.log(jqXHR.responseText)
        }
      }
    })
}
function validateAndSubmitForm(form){
  alert('validateAndSubmitForm');
  var data = new FormData($(form)[0]);
  data.delete('files[]');
  data.delete('file');
  data.append('validate', true);
  console.log(data);
  $.post({
    url : $(form).attr('action'),
    data: data,
    processData: false,  // Important!
    contentType: false,
    cache: false,
    success: function(){
      $(".has-error").removeClass('has-error');
      $(".help-block").html('');
      submitForm(form);
    },
    error: function(jqXHR){
      if (jqXHR.status === 422) {
        $('.help-block').html('');
        $('.has-error').removeClass('has-error');
        errors = jqXHR.responseJSON;
        $.each(errors.errors, function (key, value) {
          var group = $("[name=" + key + "]").closest('.form-group');
          if(!group.length){
            group = $("[name='" + key + "[]']").closest('.form-group');
          }
          $(group).addClass("has-error")
          $(group).find('.help-block').html(value[0]);
        });
      } else if(jqXHR.status === 403) {
        var element = document.getElementById('error-msg');
        $("#modal-form").modal('hide');
        element.innerHTML = "You don't have permission to do this";
        element.style.display = "block";
      } else {
        //console.log(jqXHR.responseText)
      }
    }
  });
}
$(document).ready(function(){

  $(document).on('submit', "#day1", function (e) {
    alert('submit start');
    e.preventDefault();
    if($(this).is('[data-val]')){
      validateAndSubmitForm(this);
    }else{
      submitForm(this);
    }
  })
});

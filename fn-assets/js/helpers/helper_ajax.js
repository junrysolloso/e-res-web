'use strict';

var ajaxOptions  = {
  dataType: 'json',
  beforeSend: function() {
    swal({
      title: 'Message',
      text: 'Please wait while processing data.',
      icon: 'info',
      button: false,
      dangerMode: false,
      closeOnClickOutside: false,
    });
  },
  success: showSuccessResponse,
  error: function(response) {
    console.log(response.responseText);
  }
}

var validateOptions = {
  errorElement: 'small',
  errorClass: 'text-danger',
  errorPlacement: function(error, element) {
    if(element.parent('.input-group').lenght) {
      // something
    } else {
      error.appendTo(element.next('.input-helper'));
    }
  },
  submitHandler: function(form){
    $(form).ajaxSubmit(ajaxOptions);
  }
}

function showSuccessResponse(response) {
  console.log(response);

  switch (response.msg) {
    case 'success':
      showSuccessSwal('Data successfully ' + response.data);
      break;
    case 'exist':
      showWarningSwal(response.data + ' already exist.');
      break;
    case 'abs_len':
      showWarningSwal(response.data);
      break;
    case 'file-error':
      showErrorSwal(response.data);
      break;
    default:
      break;
  }
}

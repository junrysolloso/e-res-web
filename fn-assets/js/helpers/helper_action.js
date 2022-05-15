$(document).ready(function () {

  // Input events
  $('input').on('keyup', function () {
    addInputIcon($(this));
  });

  // Select events
  $('select').on('change', function () {
    addInputIcon($(this));
  });

  // Inputmask
  $(":input").inputmask();

  //Initialize Select2 Elements
  $('.select2').select2({width: '100%'});

  // Reset input icons
  resetInputIcon();

  // Table pagination button click
  $('.paginate_button').on('click', function(){
    $('body').delegate('.deleteForm', 'submit', function(ev){
      ev.preventDefault();
      action_delete($(this));
    });
  })

  // Trim whitespace
  if ($('input[name="item_id"]').length) {
    $('input[name="item_id"]').on('mouseleave', function(){
      $(this).val( trimWhitespace($(this).val()) );
    });
  } 

  // Initialize form
  $('.dataForm').validate(validateOptions);

  // Delete action
  $('.deleteForm').submit(function(ev) {
    ev.preventDefault();
    caution($(this));
  });

  // Reset action
  $('.resetForm').submit(function(ev) {
    ev.preventDefault();
    caution($(this));
  });

  // Save action
  $('.saveForm').submit(function(ev) {
    ev.preventDefault();
    caution($(this));
  });

  // Input tags
  if ($('.tags').length) {
    $('.tags').tagsinput({
      'width': '100%',
      'interactive': true,
      'defaultText': 'Add More',
      'removeWithBackspace': true,
      'minChars': 1,
      'maxTags': 50,
      'placeholderColor': '#666666'
    });
  }

  // Summernote editor
  // function registerSummernote(element, placeholder, max, callbackMax) {
  //   $(element).summernote({
  //     toolbar: [
  //       ['style', ['bold', 'italic', 'underline', 'clear']]
  //     ],
  //     placeholder,
  //     callbacks: {
  //       onKeydown: function(e) {
  //         var t = e.currentTarget.innerText;
  //         if (t.length >= max) {
  //           //delete key
  //           if (e.keyCode != 8)
  //             e.preventDefault();
  //           // add other keys ...
  //         }
  //       },
  //       onKeyup: function(e) {
  //         var t = e.currentTarget.innerText;
  //         if (typeof callbackMax == 'function') {
  //           callbackMax(max - t.length);
  //         }
  //       },
  //       onPaste: function(e) {
  //         var t = e.currentTarget.innerText;
  //         var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
  //         e.preventDefault();
  //         var all = t + bufferText;
  //         document.execCommand('insertText', false, all.trim().substring(0, 3000));
  //         if (typeof callbackMax == 'function') {
  //           callbackMax(max - t.length);
  //         }
  //       }
  //     }
  //   });
  // }

  // registerSummernote('.texteditor', 'Abstract', 3000);

  if ($(".texteditor").length) {
    $('.texteditor').summernote({
      height: 500,
      tabsize: 2,
      toolbar: [
        ['font', ['bold', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']]
      ]
    });
  }

  // Do something
  function caution(form) {
    swal({
      title: "Warning",
      text: "This action cannot be reverted.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      closeOnClickOutside: false,
    })
    .then((value) => {
      if (value) {
        form.ajaxSubmit(ajaxOptions);
      } else {
        swal.close();
      }
    });
  }

  // Image lazy loading
  var lazyLoad = function() {
    $('.lazy').Lazy({
      effect: 'fadeIn',
      effectTime: 1500,
      delay: 2000,
      visibleOnly: true,
      scrollDirection: 'vertical'
    });
  }
  lazyLoad();

  // Upload button click
  $('.file-upload-browse').on('click', function() {
    var file = $(this).parent().parent().find('.file-upload-default');
    file.trigger('click');
  });

  // File upload
  $('.file-upload-default').on('change', function(event) {
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    var id = $(this).attr('id');
    var imgPath = URL.createObjectURL(event.target.files[0]);

    if ( $(this).attr('name') == 'photo' ) {
      var img = $('.photo-input');
    } else {
      var img = $(this).parent().parent().parent().parent().find('.' + id);
    }

    img.attr('src', imgPath);
  });

  // Access
  $('.not-role').on('click', function(){
    swal({
      title: 'Warning!',
      text: "Your account is not eligible to access this.",
      icon: 'warning',
      dangerMode: true,
      closeOnClickOutside: false
    })
  });
  
});

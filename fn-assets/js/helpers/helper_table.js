
$(document).ready(function() {

  var base_url = $('#base_url').val();
  var paging   = true, len = 10;
  var page     = $('input[name="current-segment"]').val();
  
  // Table values
  var ar_tables = ['.data-table'];
  var ar_paging = [false];
  var ar_filter = [true];
  var ar_sort   = [false];
  var ar_info   = [false];
  var ar_dlen   = [len];

  // Initialize datatable
  for (let i = 0; i < ar_tables.length; i++) {
    if ( $( ar_tables[i] ).length ) {
      $( ar_tables[i] ).DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        paging  : ar_paging[i],
        bFilter : ar_filter[i],
        bSort   : ar_sort[i],
        bInfo   : ar_info[i],
        "iDisplayLength": ar_dlen[i],
        "bLengthChange" : false,
      });
    }
  }

  // Search table
  // if ( $('input[name="search-field"]').length ) {
  //   $('input[name="search-field"]').on('keyup', function () {
  //     //$('.data-table').DataTable().search($(this).val()).draw();

  //     if ( $(this).val() ) {
  //       $.ajax({
  //         type: 'GET',
  //         dataType: 'html',
  //         url: base_url + 'search',
  //         data: {
  //           s: $(this).val()
  //         },
  //         success: function(res) {
  //           if (res) {
  //             res = JSON.parse(res);
  //             if (res.status == 200) {
  //               if($('#search-results').length){
  //                 $('#search-results').html(res.content);
                  
  //                 $('input[name="search-field"]').css('border-bottom-left-radius', '0px');
  //                 $('input[name="search-field"]').css('border-bottom-right-radius', '0px');

  //                 $('#search-results').slideDown('fast');
  //               }
  //             }
  //           }
  //         }
  //       });
  //     } else {
  //       $('input[name="search-field"]').css('border-bottom-left-radius', '6px');
  //       $('input[name="search-field"]').css('border-bottom-right-radius', '6px');
  //       $('#search-results').slideUp('fast');
  //     }
  //   });
  // }

  if ( $('input[name="search-field"]').length ) {
    $('input[name="search-field"]').on('keyup', function () {
      $('.data-table').DataTable().search($(this).val()).draw();
  
      if ( $(this).val() ) {
        $.ajax({
          type: 'GET',
          dataType: 'html',
          url: base_url + 'keywords/value',
          data: {
            s: $(this).val()
          },
          success: function(res) {
            if (res) {
              res = JSON.parse(res);
              if (res.status == 200) {
                if($('#search-results').length){
                  $('#search-results').html(res.content);
                  
                  $('input[name="search-field"]').css('border-bottom-left-radius', '0px');
                  $('input[name="search-field"]').css('border-bottom-right-radius', '0px');
                  $('#search-results').slideDown('fast');
                }
              }
            }
          }
        });
      } else {
        $('input[name="search-field"]').css('border-bottom-left-radius', '6px');
        $('input[name="search-field"]').css('border-bottom-right-radius', '6px');
        $('#search-results').slideUp('fast');
      }
    });

    $('body').on('click', '.search___value', function(){
      $('input[name="search-field"]').val($(this).text());

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: base_url + 'keywords/add',
        data: {
          word: $(this).text()
        },
        success: function(res) {
          if (res) {
            
            if (res.status == 200) {
              console.log(res);
            }
          }
        },
        fail: function(res) {
          console.log(res);
        }
      });

      $('input[name="search-field"]').css('border-bottom-left-radius', '6px');
      $('#search-results').slideUp('fast');
    });
  }

});

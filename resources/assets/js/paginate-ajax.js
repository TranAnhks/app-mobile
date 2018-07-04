    // $(document).on('click','.pagination a', function(e){
    //        e.preventDefault();
    //        var page = $(this).attr('href').split('page=')[1];
    //        getPosts(page);
    //    });
//  $(document).on('click', '.pagination a', function (event) {
//     event.preventDefault();
//     ajaxLoad($(this).attr('href'));
// });
    
// $(document).on('submit', 'form#frm', function (event) {
//     event.preventDefault();
//     var form = $(this);
//     var data = new FormData($(this)[0]);
//     var url = form.attr("action");
//     $.ajax({
//         type: form.attr('method'),
//         url: url,
//         data: data,
//         cache: false,
//         contentType: false,
//         processData: false,
//         success: function (data) {
//             $('.is-invalid').removeClass('is-invalid');
//             if (data.fail) {
//                 for (control in data.errors) {
//                     $('#' + control).addClass('is-invalid');
//                     $('#error-' + control).html(data.errors[control]);
//                 }
//             } else {
//                 ajaxLoad(data.redirect_url);
//             }
//         },
//         error: function (xhr, textStatus, errorThrown) {
//             alert("Error: " + errorThrown);
//         }
//     });
//     return false;
// });

 

// $(document).on('click', 'a.page-link', function (event) {
//     event.preventDefault();
//     ajaxLoad($(this).attr('href'));
// });

// $(document).on('submit', 'form#frm', function (event) {
//     event.preventDefault();
//     var form = $(this);
//     var data = new FormData($(this)[0]);
//     var url = form.attr("action");
//     $.ajax({
//         type: form.attr('method'),
//         url: url,
//         data: data,
//         cache: false,
//         contentType: false,
//         processData: false,
//         success: function (data) {
//             $('.is-invalid').removeClass('is-invalid');
//             if (data.fail) {
//                 for (control in data.errors) {
//                     $('#' + control).addClass('is-invalid');
//                     $('#error-' + control).html(data.errors[control]);
//                 }
//             } else {
//                 ajaxLoad(data.redirect_url);
//             }
//         },
//         error: function (xhr, textStatus, errorThrown) {
//             alert("Error: " + errorThrown);
//         }
//     });
//     return false;
// });

// function ajaxLoad(filename, content) {
//     content = typeof content !== 'undefined' ? content : 'content';
//     $('.loading').show();
//     $.ajax({
//         type: "GET",
//         url: filename,
//         contentType: false,
//         success: function (data) {
//             $("#" + content).html(data);
//             $('.loading').hide();
//         },
//         error: function (xhr, status, error) {
//             alert(xhr.responseText);
//         }
//     });
// }

  

// function ajaxLoad(filename, content) {
//     content = typeof content !== 'undefined' ? content : 'content';
//     $('.loading').show();
//     $.ajax({
//         type: "GET",
//         url: filename,
//         contentType: false,
//         success: function (data) {
//             $("#" + content).html(data);
//             $('.loading').hide();
//         },
//         error: function (xhr, status, error) {
//             alert(xhr.responseText);
//         }
//     });
// }
 
 

     $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            Type: 'GET',
        }).done(function (data) {
            $('body').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
 
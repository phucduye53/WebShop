$(document).ready(function(){
  $(".updatecart").click(function(){
    var rowid = $(this).attr('id');
    var qty = $(this).parent().parent().find(".qty").val();
    var token = $("input[name='_token']").val();
    $.ajax({
      url:'cap-nhat/'+rowid+'/'+qty,
      type:'GET',
      cache:false,
      data:{"_token":token,"id":rowid,"qty":qty},
      success:function(data){
        if(data == "oke"){
          window.location="gio-hang"
        }
      }
    });
  });
});

$(function () {function closeSearch() {
    var $form = $('.navbar-collapse form[role="search"].active')
    $form.find('input').val('');
  $form.removeClass('active');
}

// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
$(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
  event.preventDefault();
  var $form = $(this).closest('form'),
    $input = $form.find('input');
  $form.addClass('active');
  $input.focus();
});
// ONLY FOR DEMO // Please use $('form').submit(function(event)) to track from submission
// if your form is ajax remember to call `closeSearch()` to close the search container
$(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
  event.preventDefault();
  var $form = $(this).closest('form'),
    $input = $form.find('input');
  $('#showSearchTerm').text($input.val());
        closeSearch();
      });
});

Stripe.setPublishableKey('pk_test_GoS5V1hMoZTOaSUVFhsx4m7W');


var $form=$('#checkout-form');

$form.submit(function(event){
  $('#charge-error').addClass('hidden');
  $form.find('.submit').prop('disable',true);
  Stripe.card.createToken($form, stripeResponseHandler);
  return false;
});

function stripeResponseHandler(status,response){
  if(response.error){
    $('#charge-error').removeClass('hidden');
    $('#charge-error').text(response.error.message);
    $form.find('button').prop('disabled',false);
  }else{
    var token=response.id;
    $form.append($('<input type="hidden" name="stripeToken">').val(token));
    $form.get(0).submit();
  }
}

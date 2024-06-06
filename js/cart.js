$(document).ready(function(){
  function upd() {
    mn_roses = $('input[name="radio_roses"]:checked').attr('attr_mnoj');
    $.ajax({
      url: 'template/loop_cart_cont.php',
      method: 'post',
      data: {mn_roses: mn_roses,},
      success: function(data){
        console.log(mn_roses);
        $('.cart_prods').html(data);
      },
      complete: function(){ 
        var sum=0;
        $('.poditog').each(function(){
          sum += parseInt($(this).html(), 10);
        });
        //alert(sum);
        $('.price_itog').html(sum);
      },
    });
  }
  upd();
  $(document).on('change', 'input:radio[name="radio_roses"]', function() {
    //alert('asdf');
    upd();
  });
});
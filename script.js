var txt;
var username = "";
var password = "";
var note = "";

function jQueryTest()
{
  //$('.row').fadeOut(3000);
  username = $('.username').val();
  password = $('.password').val();
  note = $('.note').val(213);
  console.log(username);
  console.log(password);
  console.log(note);

  var userdata = $('#myform').serialize();
  console.log(userdata);
  if(username == "")
  {
    $("#test").fadeOut(500);
  }
  else {
    $("#test").fadeIn(500).removeClass('hidden');

  }
}
function deleteCustomer(id)
{
  console.log("OK");

  $.ajax({
    type: "GET",
    url: "delete.php",
    data: {customer: id},
    dataType: "JSON",
    success: function(response){
      console.log(response);
      console.log("OKK");
      $('tr#' + id).fadeOut(800);
      ;
    }
  });
}







function getConfirmation(lul)
{
  //var lul;
  var r = confirm("Press a Button");

  if(r == true)
  {
    jQueryTest();
    //txt = "You pressed " + lul;
  }
  else {
    txt = "You pressed cancel";
  }

  /*alert(txt);
  console.log(txt);*/
}

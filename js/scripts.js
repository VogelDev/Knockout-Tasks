$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  	$(this).removeClass('is-active');
  });

});

$(document).ready(function(){
  $("#loginBtn").click(function(){
      var username = $("#loginUser").val();
      var password = $("#loginPwd").val();
      login(username, password);
  });
  $("#registerBtn").click(function(){
    var username = $("#loginUser").val();
    var password = $("#loginPwd").val();
    $.post("data/register.php",
        {name: username, pwd: password},
        function(data, status){
          var response = JSON.parse(data);
          $("#err_msg").text(response.msg);
          if(!response.error){
            login(username, password);
          }
    });
  });

  function login(u, p){
    $.post("data/loginProcess.php",
        {name: u, pwd: p},
        function(data, status){
          var response = JSON.parse(data);
          $("#err_msg").text(response.msg);
          if(!response.error){
            $("#logindiv").hide();
          }
    });
  }
})

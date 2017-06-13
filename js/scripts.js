var $card;
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
  $(".card").click(function(){
    //$("#addBtn").hide();
    $(this).find(".taskMsg .addBtn").hide();
    $(this).find(".taskMsg .addInput").show();
    $(this).find(".taskMsg .addInput").focus();
    $card = $(this);
  });
  $(".addInput").blur(function(){
    $card.find(".taskMsg .addBtn").show();
    $card.find(".taskMsg .addInput").hide();
    $card.find(".taskMsg .addInput").val("");
  });
  // $('.addInput').keypress(function (e) {
  //   if (e.which == 13) {
  //     //viewModel.addTask()
  //     console.log(this);
  //     $(".addInput").blur();
  //     return false;
  //   }
  // });
});
var TaskListModel = function() {
	var self = this;
  self.tasks = ko.observableArray();
  self.categories = ko.observableArray();

  self.addTask = function(t, c) {
    uploadTask(t, c);
    $card.find(".taskMsg .addInput").blur();
  }

  self.completeTask = function(t){
    $.post("data/completeTask.php", {task: JSON.stringify(t)}, function(data, status){
      getTasks();
    });
  }

  self.onEnter = function(d,e){
    if(e.which == 13){
      //console.log(d.category);
      var t = $card.find(".taskMsg .addInput").val();
      self.addTask(t, d.category);
      $card.find(".taskMsg .addInput").blur();
      return false;
    }else{
      return true;
    }
  }
}

function login(u, p){
  $.post("data/loginProcess.php",
      {name: u, pwd: p},
      function(data, status){
        var response = JSON.parse(data);
        $("#err_msg").text(response.msg);
        if(!response.error){
          $("#logindiv").hide();
          getTasks();
          $("#mainPage").show();
        }
  });
}

function uploadTask(t, c){
  $.post("data/addTasks.php", {task: t, category: c}, function(data, status){
    getTasks();
  });
}

function getTasks(){
  $.getJSON("./data/getTasks.php", function(data) {
    viewModel.categories(data);
    var obj = {name:"New Category...",tasks:[]};
    viewModel.categories.push(obj);
  });
}

var viewModel = new TaskListModel();

ko.applyBindings(viewModel);

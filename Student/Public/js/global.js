/*导航栏日期弹出*/

$(document).ready(function() {
  $('#termList').click(function() {
    if($('#term-dropdown').hasClass('active')) {
      $('#term-dropdown').css({display: "none"});
      $('#term-dropdown').removeClass('active');
    } else {
      $('#term-dropdown').css({display: "block"});
      $('#term-dropdown').addClass('active');
    }
  });

  $('#term-dropdown').find('a').click(function() {
    $('#term-dropdown').css({display: "none"});
    $('#termID').html($(this).html());
    $('#term-dropdown').removeClass('active');
  });
});

/*breadTab click current*/

$(document).ready(function() {
  $lis = $('ol.breadcrumb').find('li');
  $lis.each(function(index){
    $(this).click(function() {
      $lis.removeClass('current');
      $lis.eq(index).addClass('current');
    });
  });
});


window.onload = function(){
    document.getElementById("apply_group_id").onchange = function(){
        document.getElementById("apply_project_id").value = this.value;
    }
}
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
});

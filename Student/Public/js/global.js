/*手风琴效果*/

$(document).ready(function() {
  var obj = $('#collapse');
  $('.toggle-control').click(function() {
    obj.stop().toggle('500');
  });
});

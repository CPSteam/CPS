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

/*edit_group添加组员*/

$(document).ready(function() {
  $("#add-member").append('<div class="form-group" id="member"></div>');

  //改变选项
  $("#group-member").change(function() {
    $val = $(this).val();
    $valList = $("#member input");
    $flag = true;

    $valList.each(function() {
      if($(this).val() == $val) {
        $flag = false;
        return 0;
      }
      // console.log($(this).val());
    });
    if($val == "添加最多三名组员") {
      return 0;
    }
    if($valList.length >= 3) {
      return 0;
    }
    if($flag == true) {
      $("#member").append('<input type="text" class="form-control add-member" name="" value="' + $val + '">');
    }
  });

  //移除选项
  $(".form-group").on("click","input.add-member", function() {
    $(this).remove();
  });
});

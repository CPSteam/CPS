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
  $member = ["member0", "member1", "member2"];//添加成员的name

  $("#add-member").append('<div class="form-group" id="member"></div>');

  //改变选项
  $("#group-member").change(function() {
    $innerHtml = $(this).find("option:selected").text();
    $value = $(this).val();
    $valList = $("#member-btn input");
    $flag = true;

    $valList.each(function() {
      if($(this).val() == $value) {
        $flag = false;
        return 0;
      }
    });
    if($value == "添加最多三名组员") {
      return 0;
    }
    if($valList.length >= 3) {
      return 0;
    }
    if($flag == true) {
      $("#member-btn").append('<input type="hidden" class="form-control add-member" name="' + $member.shift() +'" value="' + $value + '"><button style="button" class="btn btn-default member-btn"><i>' + $innerHtml +'</i><span class="glyphicon glyphicon-remove"></span></button>');
    }
  });

  //移除选项
  $(".form-group").on("click","input.add-member", function() {
    $thisname = $(this).attr("name");
    $member.push($thisname);
    $(this).next().remove();
    $(this).remove();
  });
  $(".form-group").on("click","button.btn", function() {
    $thisname = $(this).prev().attr("name");
    $member.push($thisname);
    $(this).prev().remove();
    $(this).remove();
  });
});

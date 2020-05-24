$(document).ready(function(){
    $(".drawer-sub-menu").hide();
    $(".drawer-parent-menu").click(function(e){
      $this = $(this).find(".drawer-sub-menu");
      $this.toggle();
    });
    $(".menu-item-has-children").click(function(){
        $(this).toggleClass("down");
      })
  });


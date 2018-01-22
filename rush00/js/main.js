$('#nav_icon').on("click", function(){
    if($(this).hasClass('open')){
        $(this).removeClass('open');
        $('.nav_shop').animate({width: "0%"});
        $('#ul_nav_shop').hide(); 
    } else {
        $(this).addClass('open');
        $('.nav_shop').animate({width: "20%"});
        $('#ul_nav_shop').show();
    }
  });

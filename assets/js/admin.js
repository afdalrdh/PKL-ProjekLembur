$(".menu li > a").click(function(e){
  $(".menu ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),e.stopPropagation()
})

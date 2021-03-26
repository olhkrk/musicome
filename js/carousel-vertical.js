//Обработка клика на стрелку вниз
$(document).on('click', ".carousel_vertical-button-bottom",function(){
    var carusel = $(this).parents('.carousel_vertical');
    bottom_carusel(carusel);
    return false;
});
//Обработка клика на стрелку вверх
$(document).on('click',".carousel_vertical-button-top",function(){
    var carusel = $(this).parents('.carousel_vertical');
    top_carusel(carusel);
    return false;
});
function top_carusel(carusel){
    var block_width = $(carusel).find('.carousel_vertical-block').outerHeight();
    $(carusel).find(".carousel_vertical-items .carousel_vertical-block").eq(-1).clone().prependTo($(carusel).find(".carousel_vertical-items"));
    $(carusel).find(".carousel_vertical-items").css({"top":"-"+block_width+"px"});
    $(carusel).find(".carousel_vertical-items .carousel_vertical-block").eq(-1).remove();
    $(carusel).find(".carousel_vertical-items").animate({top: "0px"}, 200);

}
function bottom_carusel(carusel){
    var block_width = $(carusel).find('.carousel_vertical-block').outerHeight();
    $(carusel).find(".carousel_vertical-items").animate({top: "-"+ block_width +"px"}, 200, function(){
        $(carusel).find(".carousel_vertical-items .carousel_vertical-block").eq(0).clone().appendTo($(carusel).find(".carousel_vertical-items"));
        $(carusel).find(".carousel_vertical-items .carousel_vertical-block").eq(0).remove();
        $(carusel).find(".carousel_vertical-items").css({"top":"0px"});
    });
}

// Навели курсор на карусель
$(document).on('mouseenter', '.carousel_vertical', function(){$(this).addClass('hover')})
//Убрали курсор с карусели
$(document).on('mouseleave', '.carousel_vertical', function(){$(this).removeClass('hover')})
function equalizeHeights(siblingsClass, containerId) {
    //whether class name starts with dot
    if  (siblingsClass[0] != ".") {siblingsClass = "."+siblingsClass; }
    //whether container defined
    if (containerId === undefined) {
        var choser = siblingsClass;
    } else {
        //whether container name starts with #
        if  (containerId[0] != "#") {siblingsClass = "#"+containerId; }
        var choser = containerId+" "+siblingsClass;
    }
    var heights = $(choser).map(function() {
            return $(this).height();
        }).get(),

        maxHeight = Math.max.apply(null, heights);
    $(choser).height(maxHeight);
    return 0;
}



function equalHeights(siblingsJQ, containerJQ) {
    //whether container defined
    if (containerJQ === undefined) {
        var choser = siblingsJQ;
    } else {
        var choser = containerJQ+" "+siblingsJQ;
    }
    console.log(choser);
    var heights = $(choser).map(function() {
            return $(this).height();
        }).get(),
        maxHeight = Math.max.apply(null, heights);
    console.log(heights);

    $(choser).height(maxHeight);
    return 0;
}









//======================================
//===============   JUNK    ============
//======================================
//======================================
/*Footer Stuff about Sliders */
//======================================
/*if (win_w > 768) {
 $('.carousel .item').each(function() {
 var next = $(this).next();
 if (!next.length) {
 next = $(this).siblings(':first');
 }
 next.children(':first-child').clone().appendTo($(this));

 if (next.next().length > 0) {
 next.next().children(':first-child').clone().appendTo($(this));
 }
 else {
 $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
 }
 });
 } else if (win_w > 480) {
 $('.carousel .item').each(function() {
 var next = $(this).next();
 if (!next.length) {
 next = $(this).siblings(':first');
 }
 next.children(':first-child').clone().appendTo($(this));
 });
 }
 else {
 return;
 }*/

//======================================

/* $('.carousel .item').each(function(){
 var win_w = $(window).width();

 if (win_w > 480) {
 var next = $(this).next();
 if (!next.length) {
 next = $(this).siblings(':first');
 }
 next.children(':first-child').clone().appendTo($(this));
 } else { return; }
 if (win_w > 768) {
 if (next.next().length > 0) {
 next.next().children(':first-child').clone().appendTo($(this));
 }
 else {
 $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
 }
 }
 });*/

/*$('.carousel .item').each(function(){
 var next = $(this).next();
 if (!next.length) {
 next = $(this).siblings(':first');
 }
 next.children(':first-child').clone().appendTo($(this));

 if (next.next().length>0) {
 next.next().children(':first-child').clone().appendTo($(this));
 }
 else {
 $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
 }
 });*/
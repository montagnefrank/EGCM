$(document).on("click", ".showmodal", function (event){
    ////////////////////////////////////////////////////////////////////////////RECOLECTAMOS LA DATA
    var img1,img2,img3,title,text;
    img1 = $(this).find(".image:eq(0) img").attr('src').split("/");
    img2 = $(this).find(".image:eq(1) img").attr('src').split("/");
    img3 = $(this).find(".image:eq(2) img").attr('src').split("/");
    title = $(this).find("h2").html();
    text = $(this).find("p").html();
    
    ////////////////////////////////////////////////////////////////////////////MANDAMOS LA DATA AL MODAL
    $("#modalimg1 img").attr('src', "img/portfolio/"+img1[2]);
    $("#modalimg2 img").attr('src', "img/portfolio/"+img2[2]);
    $("#modalimg5 img").attr('src', "img/portfolio/"+img3[2]);
    $("#modaltitulo").html(title);
    $("#modaltexto").html(text);
});
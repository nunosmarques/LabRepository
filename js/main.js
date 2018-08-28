$( document ).ready(function() {
    resizeSearch();
});

$( window ).resize(function() {
  resizeSearch();
});

function resizeSearch() {
	var hd_height = $("header").height();
    console.log("header height is " + hd_height);
    var ft_height = $("footer").height();
    console.log("footer height is " + ft_height);
    var wd_height = $(window).height();
    console.log("window height is " + wd_height);

    var srch_height = wd_height - hd_height - ft_height;
    console.log("search height is " + srch_height);
    if ($("article").height() > srch_height) {
    	srch_height = $("article").height();
    }
    $("aside").height(srch_height);
    //coment
}

var combo_name= "laboratorios";
$( document ).ready(function(){
    
    //Navegar pelas páginas
    $(".ajax").on("click", function(){
        var page = $(this).attr("href");
        var debug = page.split('?')[1];
        var tmp = debug.split('=')[2];
        
        var actual_url = page;
        page = page.split('=')[1];

        $.get("ajax.php?"+debug, function(data){
            $("article").html( data );
            
            if(page != "home" && page != "login" && tmp != "registar"){
                $.get("inc_search.php?s="+page, function(data){
                    
                        $("#cb_search").val(page);
                    
                    $(".search").html( data );
                }).fail(function() {
                  alert( "Ocorreu um erro!" );
                });
            }
        });
        
        //Muda o Title da página e capitaliza a primeira letra
        var title = page.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        
        $(document).prop('title', title);
        window.history.pushState("", page, actual_url);
        event.preventDefault();
    });
    
    //Ir para a página de registo
    $(".reg").on("click", function(){
        var page = $(this).attr("href");
        var actual_url = page;
        $.get("inc_registar.php?tbl=registo", function(data){
            $("article").html( data );
        });
        //Muda o Title da página e capitaliza a primeira letra
        
        $(document).prop('title', "Novo Registo");
        window.history.pushState("", "Novo Registo", actual_url);
        event.preventDefault();
    });
    
    //Permite retroceder para a página anterior
    window.addEventListener("popstate", function(e) {
     window.location.href = location.href;
    });
    
    //Define menu de pesquisa
    $("#cb_search").on("change", function(){
        var page = $(this).val();
        combo_name = page;
        $.get("inc_search.php?s="+page, function(data){
            $(".search").html( data );
        }).fail(function() {
          alert( "Ocorreu um erro!" );
        });
        event.preventDefault();
    });

});

function begin(){
  var page = "laboratorios";
  $.get("inc_search.php?s="+page, function(data){
      $(".search").html( data );
  }).fail(function() {
    alert( "Ocorreu um erro!" );
  });
}
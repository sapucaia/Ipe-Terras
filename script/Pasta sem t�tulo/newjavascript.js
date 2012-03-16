/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(function(){
    
    atribuir("pagina1.html")
    navegar()
})


atribuir =  function(pagina){

    $("#conteudoEsquerdo").load(pagina)   
}

navegar = function(){
    $("#barra a").click(function(){
        
        atribuir($(this).attr("href"))
        return false;

    })
}



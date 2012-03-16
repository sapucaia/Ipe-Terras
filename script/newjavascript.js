/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    //    alert("mensagem");
    $("#conteudoEsquerdo").load("pagina1.html");

    $("#barra a").click(function(){
        $("#conteudoEsquerdo").load($(this).attr('href'));
        return false;
    });
    $("#links a").click(function(){
        $("#conteudoEsquerdo").load($(this).attr('href'));
        return false;
    });
});


    


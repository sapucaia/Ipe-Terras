/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    $("#barra a").mouseenter(function(){
        $(this).stop().animate({
            "color":"#f1f1f1",
            "background-color":"#4374fd"
            
        },300)
    })
    $("#barra a").mouseout(function(){
        $(this).stop().animate({
            "color":"#010101",
            "background-color":"#fefefe"  
        },300)
    })
});
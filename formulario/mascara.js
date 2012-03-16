function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")         
    return v
}
function mtel(v){
    v=v.replace(/\D/g,"")                 
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") 
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    
    return v
}
function cnpj(v){
    v=v.replace(/\D/g,"")                           
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") 
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              
    return v
}
function mcpf(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       
                                             
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") 
    return v
}
function mdata(v){
    v=v.replace(/\D/g,"");                    
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mtempo(v){
    v=v.replace(/\D/g,"");                    
    v=v.replace(/(\d{1})(\d{2})(\d{2})/,"$1:$2.$3");    
    return v;
}
function mhora(v){
    v=v.replace(/\D/g,"");                    
    v=v.replace(/(\d{2})(\d)/,"$1h$2");       
    return v;
}
function mrg(v){
    v=v.replace(/\D/g,"");                                      
        v=v.replace(/(\d)(\d{7})$/,"$1.$2");   
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");   
        v=v.replace(/(\d)(\d)$/,"$1-$2");               //Coloca o - antes do último dígito
    return v;
}
function mnum(v){
    v=v.replace(/\D/g,"");                                      
    return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");
        
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");
    return v;
}
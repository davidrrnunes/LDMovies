function filme(i){
    location.href = "/filme.php?i="+i;
}

function compra(i){
    location.href = "/compra.php?i="+i;
}






function finalizar(i){
    if(document.forms['purchaseForm'].Endereço.value === "" || document.forms['purchaseForm'].Cartão.value === "" || document.forms['purchaseForm'].VCV.value === "" || document.forms['purchaseForm'].Data.value === "" || document.forms['purchaseForm'].PAC.value === ""){
        alert("Preencha todos os campos!");
    }
    else{
        location.href = "/confirmation.php?i="+i;
    }
}
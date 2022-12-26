const minus = document.getElementById("minus");
const plus = document.getElementById("plus");
const input = document.getElementById("item__input");
const maxValue = document.getElementById("max_value");

minus.onclick = function(){
    input.value = input.value - 1;
    if(input.value < 1) input.value = 1;
}

input.addEventListener("click", function(){
    if(input.value >= maxValue.value) input.value = maxValue.value;
});

plus.onclick = function(){
    if(input.value >= maxValue.value) input.value = maxValue.value;
    else{
        input.value++;
    }
}


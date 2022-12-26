const item = document.querySelectorAll('.item');
var bool = true;
const error = document.getElementById('search_error');

document.querySelector('#search').oninput = function(){
    let val = this.value.trim();
    let elasticItems = document.querySelectorAll('.item .item__name');

    if(val!=''){
        elasticItems.forEach(function(elem){
            if(elem.innerText.search(val) == -1){
                elem.parentNode.style.display = "none";
            }
            else{
                elem.parentNode.style.display = "block";
            }
            
        });
    }
    else{
        elasticItems.forEach(function(elem){
            elem.parentNode.style.display = "block";
        });
    }

    elasticItems.forEach(function(elem){
        if(elem.parentNode.style.display == "block"){
            bool = false;
            error.style.display ="none";
        }       
})
    if(bool) error.style.display ="block";

    bool = true;

}
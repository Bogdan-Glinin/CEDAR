const filterItem = document.querySelectorAll('.item');

document.querySelector('.categories').addEventListener("change", (event)=>{
    
    let filterClass = event.target.dataset['categories'];

    if(event.target.checked){
        
        
        filterItem.forEach(elem => {
            if(!elem.classList.contains(filterClass)){
                if(!elem.classList.contains('checked')){
                    elem.style.position = "absolute";
                    elem.style.display = "none";
                }
                else{
                    elem.style.position = "static";
                    elem.style.display = "block";
                }

            }
            else{
                elem.classList.add('checked');
                elem.style.position = "static";
                elem.style.display = "block";
            }
        });
    }
    else{
        filterItem.forEach(elem => {
            if(!elem.classList.contains(filterClass)){
                if(elem.classList.contains('checked')){
                    elem.style.position = "static";
                    elem.style.display = "block";
                }
                else{
                    elem.style.position = "absolute";
                    elem.style.display = "none";
                }

            }
            else{
                elem.classList.remove('checked');
                elem.style.position = "absolute";
                elem.style.display = "none";
            }
        });
    }
    

});

document.querySelector('.material').addEventListener("change", (event)=>{
    
    let filterClass = event.target.dataset['material'];

    if(event.target.checked){
        
        
        filterItem.forEach(elem => {
            if(!elem.classList.contains(filterClass)){
                if(!elem.classList.contains('checked')){
                    elem.style.position = "absolute";
                    elem.style.display = "none";
                }
                else{
                    elem.style.position = "static";
                    elem.style.display = "block";
                }

            }
            else{
                elem.classList.add('checked');
                elem.style.position = "static";
                elem.style.display = "block";
            }
        });
    }
    else{
        filterItem.forEach(elem => {
            if(!elem.classList.contains(filterClass)){
                if(elem.classList.contains('checked')){
                    elem.style.position = "static";
                    elem.style.display = "block";
                }
                else{
                    elem.style.position = "absolute";
                    elem.style.display = "none";
                }

            }
            else{
                elem.classList.remove('checked');
                elem.style.position = "absolute";
                elem.style.display = "none";
            }
        });
    }
    

});
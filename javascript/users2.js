const searchbar = document.querySelector(".search input"),
searchBtn = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchBtn.onclick = ()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchBtn.classList.toggle("active");
    searchbar.value = "";
}

searchbar.onkeyup = ()=>{
    let searchTerms = searchbar.value;
    if (searchTerms != "") {
        searchbar.classList.add("active");  
    }else{
        searchbar.classList.remove("active");  
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200) {
                let data =xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("content-type", "application/x-ww-form-urlencoded");
    xhr.send("searchTerms=" + searchTerms);
}
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users2.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200) {
                let data =xhr.response;
                if (!searchbar.classList.contains("active")) { //if active is not contain in searchbar then add this data
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);//this will run after 500ms
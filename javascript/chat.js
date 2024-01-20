const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200) {
                inputField.value = "";//once message inserted leave blank the input field
                scrollToBotton();
            }
        }
    }
    //send data through php
    let formData =new FormData(form);//creating next formdata object
    xhr.send(formData);//send the form data to php

}
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                scrollToBotton();
            }
        }
    }
    //send data through php
    let formData =new FormData(form);//creating next formdata object
    xhr.send(formData);//send the form data to php
}, 500);//this will run after 500ms

function scrollToBotton(){
    chatBox.scrollTo = chatBox.scrollHeight;
}
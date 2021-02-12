var chatContainer = document.getElementById('chat-container');
var sendbtn = document.getElementById('btn');
var input = document.getElementById('msg');
var room = document.getElementById('roomname').value;
var form = document.getElementById('form');
var name = '';
console.log(room);

//fetch ip 
// fetch('http://api.ipify.org/?format=json').then(result => result.json()).then(console.log);
// name functionality
var nameBtn = document.getElementById('nameBtn');
nameBtn.addEventListener('click', (e) => {
    e.preventDefault();
    name = document.getElementById('userName').value;
    let showMsg = document.querySelector('.show-msg');
    let showName = document.querySelector('.show-name');
    input.removeAttribute('disabled');
    showMsg.classList.remove('hide');
    showName.classList.add('hide');
    console.log(name);
});

//form handling 

input.addEventListener('keypress', () => {
    sendbtn.removeAttribute('disabled');
});
input.addEventListener('keyup', () => {
    if(input.value == ''){
        sendbtn.setAttribute('disabled', '');
    }
})


sendbtn.addEventListener('click', (e) => {
    e.preventDefault();
    let msg = document.getElementById('msg').value;
    input.value = '';
    var msgDetail = { name: name, message: msg, roomName: room};
    var myJSON = JSON.stringify(msgDetail);
    sendMsg(myJSON);
});

//function to send msg to database using ajax
function sendMsg(msg) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "sendMsg.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("json="+msg);
}

//function for load msg into browser using ajax
function loadDoc() {
    setInterval(() => {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let jsonString = this.responseText;
                fetchMsg(jsonString);
            }
        };
        xhttp.open("GET", "realtimeMsg.php?roomname="+room, true);
        xhttp.send();            
        scrollToBottom();
    }, 500);
}
loadDoc();


function fetchMsg(str) {
    let obj = JSON.parse(str);
    // console.log(obj);
    let displayMsg = obj.map(function(item) {
        if(item['name'] == name) {
            return `<div class="container darker">
                        <h3 class="right title"> ${item['name']}  <small>(${item['ip']})</small> </h3>
                        <p class="right">${item['message']}</p>
                        <span class="time-left">${item['date'].substring(11,16)}</span>
                    </div>`;
        }
        else {
            return `<div class="container">
                        <h3 class="title"> ${item['name']}  <small>(${item['ip']})</small> </h3>                       
                        <p>${item['message']} </p>
                        <span class="time-right">${item['date'].substring(11,16)}</span>
                    </div>`;
        }
        }).join("");
    chatContainer.innerHTML = displayMsg;
}

//scroll function
window.addEventListener('DOMContentLoaded', () => {
   scrollToBottom();
});

function scrollToBottom() {
    chatContainer.scrollTo(0, chatContainer.scrollHeight);
}


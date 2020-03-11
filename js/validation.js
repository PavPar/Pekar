console.log('i am gere');
var btn = {
    submit: document.getElementById("submit"),
    file: document.getElementById(""),
}
var user = {
    name: document.getElementById("name"),
    address: document.getElementById(""),
    phone: document.getElementById(""),
    orderDate: document.getElementById(""),
}

btn.submit.addEventListener("click", (event) => {
    var eventt = event
    event.preventDefault();
    if (user.name.value = "") {
        
        btn.submit.disbled = true;
    }else{
        btn.submit.disbled = false;
        event.submit = eventt.submit;
    }
  
})


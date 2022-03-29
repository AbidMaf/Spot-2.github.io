function setdata() {
    var nim = document.getElementById("nim").value;
    var password = document.getElementById("password").value;

    localStorage.setItem("setnim", nim);
    localStorage.setItem("setpass", password);
}

function getdata(){
    document.getElementById("getnim").innerHTML = localStorage.getItem("setnim");
}

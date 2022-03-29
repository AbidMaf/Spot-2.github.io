function setdata() {
    var nim = document.getElementById("nim").value;
    var password = document.getElementById("password").value;

    localStorage.setItem("setnim", nim);
    localStorage.setItem("setpass", password);
}

function getdata(){
    document.getElementById("getnim").textContent = localStorage.getItem("setnim");

    var nim = document.getElementById("getnim");
    
    if (nim.textContent == "2000637"){
        document.getElementById("getnama").textContent="Adrian Sugandi Wijaya";
    }else if (nim.textContent == "2000649"){
        document.getElementById("getnama").textContent="Abid Mafahim";
    }else if (nim.textContent == "2000427"){
        document.getElementById("getnama").textContent="Faaris Muda Dwi Nugraha";
    }else{
        document.getElementById("getnama").textContent="Nama tidak ditemukan";
        document.getElementById("getnim").textContent="NIM tidak ditemukan";
    }
}

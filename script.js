function setdata() {
    var nim = document.getElementById("nim").value;
    var password = document.getElementById("password").value;
    
    const nimList = [
        '2000649', '2000427', '2000637', 'guest'
    ];
    const passList = [
        '1234abcd', 'abcd1234', 'aaaa0000', 'guest'
    ];
    
    var checkNim = nimList.includes(nim);
    if (nim != '' || password != '') {
        console.log("nim: " + nim + " pass: "+ password);
        if(checkNim == true){
            var nimIndex = nimList.indexOf(nim);
            if(passList[nimIndex] == password){
                localStorage.setItem("setnim", nim);
                localStorage.setItem("setpass", password);
                location.replace("dashboard.html");
            }
            else{
                alert("NIM atau password salah");
            }
        }
        else{
            alert("NIM atau password salah");
        }
    } else {
        alert("Semua masukan harus terisi");
    }
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
    }else if (nim.textContent == "gues"){
        document.getElementById("getnama").textContent="guest";
    }else{
        document.getElementById("getnama").textContent="Nama tidak ditemukan";
        document.getElementById("getnim").textContent="NIM tidak ditemukan";
    }
}

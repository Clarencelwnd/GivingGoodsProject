var timer = 30;
const kirimUlang = "Kirim ulang";
const url = document.getElementById('kirim').value;

function anchor(){
    const anchor = document.createElement('a');
    anchor.setAttribute("href", url);
    anchor.textContent = kirimUlang;
    anchor.className = "link-kirim-ulang";
    document.getElementById('kirim-ulang').appendChild(anchor);
}

function countdown(){
    document.getElementById('sec').innerHTML = timer;
    timer--;
    if(timer < 0){
        clearInterval(getCountDown);
        document.getElementById('kirim-ulang').innerHTML = "Tidak menerima kode?" + " ";
        anchor();
    }
}
var getCountDown = setInterval(countdown, 1000);

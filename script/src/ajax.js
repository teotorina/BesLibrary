let xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
        myFunction(this.responseText);
    }
}

xhttp.open

function myFunction(data) {
    // что-то делает с ответом
}
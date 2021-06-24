function asigna(btn) {
    console.log(btn.id);//id  btn actual
    this.btn = btn;
    console.log(this.btn);//boton actual pulsado
    var next = btn.parentNode.parentNode.nextSibling; //siguiente row

    if (next.hidden != true) {
        next.setAttribute('hidden', true);
    } else {
        var trtoHide = document.querySelectorAll('tr tr');
        for (var i = 0; i < trtoHide.length; i++) {
            trtoHide[i].setAttribute('hidden', true);
            console.log(trtoHide[i]);
        }
        console.log(trtoHide);

        //trtoHide.setAttribute('hidden', true);
        next.removeAttribute('hidden');
    }
    console.log(next);
};

function movement(e) {
    e.style.transform = "scale(1.2, 1.3)";
    e.style.boxShadow = "20px 20px 20px lightblue";

}

function dismov(e){
    e.style.transform = "scale(1,1)";
    e.style.boxShadow = "0px 0px 0px ";
}


window.onload = () => {

    function confirmar() {//function to confim delete user
        if (confirm('Seguro que quieres borrar')) {
            location.href = 'deleteController.php';
        } else {
            alert('operacion cancelada');
        }
    }

    document.getElementById('navegacion').onclick = () => {
        var btns = document.querySelectorAll('#amaga');
        for (var i = 0; i < btns.length; i++) {
            if (btns[i].hidden != true) {
                btns[i].setAttribute('hidden', true);
            } else {
                btns[i].removeAttribute('hidden');
            }
        }
    };

    document.getElementById('avisos').onclick = () => {
        var info = document.getElementById('info');
        if (info.hidden != true) {
            info.setAttribute('hidden', true);
        } else {
            info.removeAttribute('hidden');
        }
    };


};

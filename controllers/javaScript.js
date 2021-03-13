function asigna(btn) {
  console.log(btn.id);//id  btn actual
  this.btn = btn;
  console.log(this.btn);//boton actual pulsado
  var next = btn.parentNode.parentNode.nextSibling; //siguiente row
  if (next.hidden != true) {
    next.setAttribute('hidden', true);
  }else {
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
}

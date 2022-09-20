const icono = document.querySelector(".container .row .pass .icono");
const inputPass = document.querySelector(".container .row .pass input");
const eyeShow = 'fa-eye'
const eyeHidden = 'fa-eye-slash'
icono.addEventListener('click', function () {
  switch (this.classList[2]) {
    case eyeShow:
      this.classList.replace(eyeShow, eyeHidden);
      inputPass.attributes.type.value = 'text';
      break;
    case eyeHidden:
      this.classList.replace(eyeHidden, eyeShow);
      inputPass.attributes.type.value = 'password';
      break;
  }

})


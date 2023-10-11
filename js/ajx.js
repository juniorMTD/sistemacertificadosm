

const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e) {
    e.preventDefault();


    Swal.fire({
        title: '¿Quieres realizar este proceso?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI'
      }).then((result) => {
        if (result.isConfirmed) {
            let data = new FormData(this);
            let method = this.getAttribute("method");
            let action = this.getAttribute("action");

            let encabezados = new Headers();

            let config = {
                method: method,
                headers: encabezados,
                mode: 'cors',
                cache: 'no-cache',
                body: data
            };
                fetch(action, config)
                    .then(respuesta => respuesta.text())
                    .then(respuesta => {
                        let ar=respuesta.split(',');

                        var a0=ar[0];
                        var a1=ar[1];
                        var a2=ar[2];
                        Swal.fire(
                            a0,
                            a1,
                            a2
                            )
                    })  
        }
      });

    // let enviar = confirm("¿Quieres enviar el formulario?");


    // if (enviar == true) {
        
    //     let data = new FormData(this);
    //     let method = this.getAttribute("method");
    //     let action = this.getAttribute("action");

    //     let encabezados = new Headers();

    //     let config = {
    //         method: method,
    //         headers: encabezados,
    //         mode: 'cors',
    //         cache: 'no-cache',
    //         body: data
    //     };
        
    //     fetch(action, config)
    //         .then(respuesta => respuesta.text())
    //         .then(respuesta => {
    //             let contenedor = document.querySelector('.form-rest');
    //             contenedor.innerHTML = respuesta;
    //         });
    // }
}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});

function mialertaeliminar(e) {  
    e.preventDefault();
    var url=e.currentTarget.getAttribute('href');
    Swal.fire({
        title: '¿Esta seguro de eliminar este registro?',
        text:'Una vez eliminada no se recuperara',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI,Eliminar',
        cancelButtonText: 'No, cancelar!',
        padding:'2em'

    }).then((result)=>{
        if(result.isConfirmed){
            window.location.href=url;
        }
    })
};





const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', function (event) {
  event.preventDefault();

  const formData = new FormData(loginForm);
  const documento = formData.get('documento');
  const password = formData.get('password');

  // Realizar la solicitud de inicio de sesión al controlador API 
  fetch('https://libraryapi.amjor.shop/api/prueba/pruebalogi', {
    method: 'POST',
    credentials: 'include',
    body: JSON.stringify({ documento, password }),
    headers: {
      'Content-Type': 'application/json'
    },
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      console.log("Token: ",data.token)
	if (data.token){
	console.log("Hola desde el if del token")
	document.cookie = `token=${data.token}; expires=Fri, 31 Dec 9999 23:59:59 GMT;  path=/;`;

	}

      if (data.error) {
        // Mostrar alerta si hay un error
         Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: data.error,
          confirmButtonColor: '#16a084',
          confirmButtonText: 'Aceptar'
        })
    

      }
 // Verificar si hay redireccionamiento
      else if (data.redirect) {
        window.location.href = data.redirect;
      } else {
        // Aquí puedes redirigir a una página de error o mostrar un mensaje apropiado
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'No tienes permisos para acceder a ninguna página.',
          confirmButtonColor: '#16a084',
          confirmButtonText: 'Aceptar'
        });
      }
    })
    .catch(error => {
      console.error('Error al iniciar sesión:', error);
      // Aquí puedes mostrar un mensaje de error o hacer cualquier otra acción apropiada
    });
});

function salir() {
  Swal.fire({
    title: '¿Estás seguro de salir?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    confirmButtonColor: '#16a084',
  }).then((result) => {
    if (result.isConfirmed) {
	document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      // Realizar solicitud al servidor para eliminar la cookie
      fetch('https://libraryapi.amjor.shop/api/prueba/logout', {
        method: 'GET',
        credentials: 'include' // Para incluir las cookies en la solicitud
      })
        .then(() => {
	
          window.location.href = '../login.php'; // Redirige a la página de login
        })
        .catch((error) => {
          console.error('Error al realizar la solicitud de logout:', error);
        });
    } else {
     // CANCELO EL CIERRE
    }
  });
}



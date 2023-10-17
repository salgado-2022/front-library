//LISTAR EN LA VISTA DE USUARIOS DEL FRONT-END
const listarUsuarios = () => {
  load();
  let url = 'https://libraryapi.amjor.shop/api/usuarios/todos';

  fetch(url)
    .then(response => response.json())
    .catch(error => {
      console.error('Ocurrió un problema al obtener los Usuarios:', error);
    })
    .then(data => {
      const beneficiarios = data.beneficiarios;

      // Filtrar beneficiarios por el rol "profesor"
      const Todos = beneficiarios.filter(beneficiario => beneficiario.nombreRol != 'Profesor' && beneficiario.nombreRol != 'Estudiante');

      // renderUsuariosResult(profesores);
      renderUsuariosAdminResult(Todos);
    });
};

function renderUsuariosAdminResult(beneficiarios) {
  const table = $('#tablaAdministrador').DataTable();
  table.clear().draw();

  beneficiarios.forEach((beneficiario) => {
    const switchId = `estado-switch-${beneficiario.idBeneficiario}`;
    const estadoActualId = `estado-actual-${beneficiario.idBeneficiario}`;
    const isChecked = beneficiario.estado;

    const tableAdmin = `
        <tr>
        <td scope="col">${beneficiario.nombreRol}</td>
        <td scope="col">${beneficiario.documento}</td>
        <td scope="col">${beneficiario.nombres}</td>
         <td scope="col">${beneficiario.apellidos}</td>
        <td scope="col">${beneficiario.correo}</td>
       <td scope="col">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" ${isChecked ? 'checked' : ''} id="${switchId}" onchange="validarEstado(${beneficiario.idBeneficiario})">
            <span id="${estadoActualId}">${isChecked ? 'Activo' : 'Inactivo'}</span> 
          </div>
        </td>
        <td style="text-align: center;">
          <button type="button" class="btn btn-z" data-bs-toggle="modal" data-bs-target="#modalUpdateUsers" onclick="obtenerBeneficiario(${beneficiario.idBeneficiario})">
            <i class="fa-solid fa-pen-to-square"></i>
          </button>
        </td>
      </tr>
        `;
    table.row.add($(tableAdmin)).draw();
  });

  setTimeout(() => {
    closeLoad()
  }, 1000)
}








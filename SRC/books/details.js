const LoadDataDetails = async (idBook) => {
    try {
        const response = await fetch(`https://libraryapi.amjor.shop/api/libros/${idBook}`);
        const libro = await response.json();

        if (response.status === 404) {
            return;
        }
        document.getElementById('isbnD').value = libro.isbn;
        document.getElementById('tituloD').value = libro.titulo;
        document.getElementById('ilustradorD').value = libro.ilustracion;
        document.getElementById('autorD').value = libro.autor;
        document.getElementById('impresionD').value = libro.impresion;
        document.getElementById('ciudadD').value = libro.ciudad;
        document.getElementById('editorialD').value = libro.editorial;
        document.getElementById('disponiblesD').value = libro.disponibles;
        document.getElementById('categoriaD').value = libro.categoria; 
        
        listCopiesDetails(idBook)
        

    } catch (error) {
        console.error('Error al cargar los datos del libro:', error);
    }
};

const listCopiesDetails = async (idBook) => {
    try {
        //Espera de la respuesta de la api
        const responseCopies = await fetch(`https://libraryapi.amjor.shop/api/libros/copies/${idBook}`);
        const responseCopiesView = await fetch(`https://libraryapi.amjor.shop/api/libros/copies/details/${idBook}`);
        const data = await responseCopies.json();
        const data2 = await responseCopiesView.json();
        let copies = '';
            if (responseCopies.status === 404) {
                copies += `
                    <tr>
                        <td colspan="6" class="text-center">NO HAY EJEMPLARES REGISTRADOS</td>
                    </tr>
                `;
                document.getElementById('list-details').innerHTML = copies;
            }else if (responseCopies.status === 200 && permisos.includes('Dashboard') || permisos.includes('Roles') || permisos.includes('Usuarios')) {
                        data.forEach(copie => {
                            copies += `
                            <tr>
                                <td id="idEjemplar" value="${copie.idEjemplar}" style="text-align: center;" hidden>${copie.idEjemplar}</td>
                                <td style="text-align: center;">${copie.ejemplar}</td>
                                <td style="text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">${copie.descripcion}</td>
                                <td style="text-align: center;">${copie.estadoEjemplar}</td>
                                <td style="text-align: center;">${copie.ubicacionEjemplar}</td> 
                                <td style="text-align: center;">${copie.disponibilidad ? 'Disponible' : 'No disponible'}</td>                    
                            </tr>
                            `;
                    });
                document.getElementById('list-details').innerHTML = copies;
            }else if (responseCopiesView.status === 200) {
                data2.forEach(copie => {
                    copies += `
                    <tr>
                        <td id="idEjemplar" value="${copie.idEjemplar}" style="text-align: center;" hidden>${copie.idEjemplar}</td>
                        <td style="text-align: center;">${copie.ejemplar}</td>
                        <td style="text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">${copie.descripcion}</td>
                        <td style="text-align: center;">${copie.estadoEjemplar}</td>
                        <td style="text-align: center;">${copie.ubicacionEjemplar}</td> 
                        <td style="text-align: center;">${copie.disponibilidad ? 'Disponible' : 'No disponible'}</td>                    
                    </tr>
                    `;
            });
        document.getElementById('list-details').innerHTML = copies;
    }
        }catch (error) {
        console.log(error);
    }
}

const detailsCopyInLoan = async (ejemplar) => {

    try {
        const response = await fetch(`https://libraryapi.amjor.shop/api/libros/copie/copyInLoad/${ejemplar}`);
        const copy = await response.json();
        if (response.status === 404) {
            return;
        }
        verPrestamo(copy.IdPrestamo)

    } catch (error) {
        console.log(error)
    }
};





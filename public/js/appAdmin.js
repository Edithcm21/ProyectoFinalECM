 // Obtener el contenedor donde se agregarán los select y input
 const residuosContainer = document.getElementById('residuosContainer');
 const addMoreButton = document.getElementById('addMore');
 const residuos= window.residuos;
 
 

 // Función para agregar un nuevo conjunto de select e input
 addMoreButton.addEventListener('click', function() {console.log('Entro a la funion');
     const newRow = document.createElement('div');
     newRow.classList.add('row', 'mb-3');
        console.log(residuos);
                           
     let opcionesResiduo = `<option value="" disabled selected >Selecciona un residuo</option>`;
     residuos.forEach(function(residuo) {
        opcionesResiduo += `<option value = "${residuo.id_tipo}">${residuo.nombre_tipo}</option>`;
     });
    
     newRow.innerHTML = `
         <div class="col-md-5">
             <select name="residuos[]" class="form-select " required>
                 ${opcionesResiduo}
             </select>
         </div>
         <div class="col-md-2">
            <input class="inputC form-control " type="number" name="cantidades[] " value="0"  min="0" onchange="updateTotals() " required>
         </div>
         <div class="col-md-2">
             <input class="inputC  form-control " type="text"   name="porcentajes[]" value="0 %" min="0" onchange="updateTotals() " required>
         </div>
         <div class="col-md-3">
             <button type="button" class="btn btn-danger btn-remove" style="width:90%">Eliminar</button>
         </div>
     `;
     residuosContainer.appendChild(newRow);

     // Añadir funcionalidad de eliminar para este nuevo conjunto
     addRemoveFunctionality();
 });

 // Función para eliminar un conjunto de select e input
 function addRemoveFunctionality() {
     const removeButtons = document.querySelectorAll('.btn-remove');
     removeButtons.forEach(button => {
         button.addEventListener('click', function() {
             this.closest('.row').remove();
         });
     });
 }

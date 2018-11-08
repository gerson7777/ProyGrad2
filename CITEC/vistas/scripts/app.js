firebase.initializeApp({
    apiKey: "AIzaSyA5aTD3Q-wbRaTdo3o0364W1kbPpPUWKfg",
    authDomain: "crud-demo-5b63a.firebaseapp.com",
    databaseURL: "https://crud-demo-5b63a.firebaseio.com",
    projectId: "crud-demo-5b63a",
    storageBucket: "crud-demo-5b63a.appspot.com",
    messagingSenderId: "391637193866"
  });
// Initialize Cloud Firestore through Firebase
var db = firebase.firestore();
var esperarSubiendoArchivo = false;

var archivoPorSubir = null;

//funcion para obtener el elemento del html
function getID(id){
    return document.getElementById(id).value;
}

function prepararCargaArchivo(){


    var fileButton = document.getElementById('fileButton');
    // Vigilar selección archivo
    fileButton.addEventListener('change', function(e) {
      //Obtener archivo
       archivoPorSubir = e.target.files[0];
    });
    }
    
    function subirArchivo(id)
    {
        var fileButton = document.getElementById('fileButton');
        var uploader = document.getElementById('uploader');
        // Crear un storage ref
      var storageRef = firebase.storage().ref('actasMunicipales/' + id);
      // Subir archivo
      var acta = storageRef.put(archivoPorSubir);
    
      esperarSubiendoArchivo = true;
      // Actualizar barra progreso
      acta.on('state_changed',
        function progress(snapshot) {
          var porcentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
          uploader.value = porcentage;
        },
        function error(err) {
            esperarSubiendoArchivo = false;
            archivoPorSubir = null;
            fileButton.value = '';
            uploader.value = 0;
        },
        function complete() {
            esperarSubiendoArchivo = false;
            archivoPorSubir = null;
            fileButton.value = '';
            uploader.value = 0;
        }
        )
    }
    

//Funcion insertar
function guardar(){
    var numCorrelativo = getID("numeroCorrelativo");
    var nomFamilia = getID("nombreFamilia");
    var creacion = getID("fechaCreacion");

    if (numCorrelativo.length==0 || nomFamilia.length==0 || creacion.length==0){
        alert("Por favor ingrese todos los campos");
    }else{
    
        //ingersa de forma dinamica
    db.collection("actas").add({
        correlativo: numCorrelativo,
        nombreFamilia: nomFamilia,
        fechaCreacion: creacion,
        nombreArchivo : archivoPorSubir != null ? archivoPorSubir.name : '',
    })
    .then(function(docRef) {
        console.log("Document written with ID: ", docRef.id);
         //para que aparezcan vacios los campos luego de ingresar
        document.getElementById('numeroCorrelativo').value ='';
        document.getElementById('nombreFamilia').value ='';
        document.getElementById('fechaCreacion').value = "";
       alert("Información guardada correctamente");

       // Aca debes de subir el archivo
       if(archivoPorSubir)
       {
            subirArchivo(docRef.id);
       }
       
    })
    
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });
  
    }
   
}

var storage = firebase.storage();

function descargarArchivo(id, name){
    console.log('Descargar archivo ', id);
    //var descargar = document.getElementById('btnDescargar');
    var doc = storage.ref('actasMunicipales/' + id);
   // var httpsReference = storage.refFromURL('https://firebasestorage.googleapis.com/actasMunicipales/DPI.pdf');

    //descargar.addEventListener('click', function(){

        doc.getDownloadURL().then(function(url){
        
            console.log(url)

            var xhr = new XMLHttpRequest();
            xhr.responseType = 'blob';
            xhr.onload = function(event) {
                var a = document.createElement('a');
                a.href = window.URL.createObjectURL(xhr.response);
                a.download = name; // Name the file anything you'd like.
                a.style.display = 'none';
                document.body.appendChild(a);
                a.click();
            };
            xhr.open('GET', url);
            xhr.send();

        })

    //})

}

//funcion mostrar datos en la tabla
function refrescarDatos() {
    var datos = [];

    db.collection("actas").onSnapshot((querySnapshot) => {
        datos = [];
        querySnapshot.forEach((doc) => {
            datos.push([ 
                doc.data().correlativo || '',
                doc.data().nombreFamilia || '',
                doc.data().fechaCreacion || '',
               '<button type="button" id="btnDescargar" class="btn btn-link" onclick="descargarArchivo(\'' + doc.id  + '\', \'' + doc.data().nombreArchivo + '\')" >PDF</button>',
                '<button class="btn btn-danger" onclick="eliminar(\'' + doc.id + '\')">Eliminar</button>',
                '<button class="btn btn-warning" onclick="editar(\'' + doc.id + '\',\'' +
                    doc.data().correlativo + '\',\'' +
                    doc.data().nombreFamilia+ '\',\'' +
                    doc.data().fechaCreacion + '\')">Editar</button>'
            ])
        });

      //  console.log(datos);

        if ($.fn.dataTable.isDataTable('#dataTable'))
        {
            $('#dataTable').DataTable().destroy();
        }

        $('#dataTable').DataTable({
            data : datos,
            columns : [
                { title : 'No. Correlativo'},
                { title : 'Apellidos de Matrimonio'},
                { title : 'Fecha de Creación'},
                { title : 'Archivo'},
                { title : 'Eliminar'},
                { title : 'Editar'}
            ]
        });
    });
}

refrescarDatos();

//subir documentos


//subirArchivos();

//Funcion Eliminar
function eliminar(id){
    db.collection("actas").doc(id).delete().then(function() {
        console.log("Document successfully deleted!");
    }).catch(function(error) {
        console.error("Error removing document: ", error);
    });

    // Create a reference to the file to delete
    var desertRef = storage.ref('actasMunicipales/' + id);
    
    // Delete the file
    desertRef.delete().then(function() {
    // File deleted successfully
    console.log('successfully');
    }).catch(function(error) {
    // Uh-oh, an error occurred!
    console.log('eerror', error);
    });

}




//Funcion Editar
function editar(id,numCorrelativo,nomFamilia,creacion){

    document.getElementById('numeroCorrelativo').value = numCorrelativo;
    document.getElementById('nombreFamilia').value = nomFamilia;
    document.getElementById('fechaCreacion').value = creacion;

    document.getElementById('numeroCorrelativo').focus();

var boton = document.getElementById('btnGuardar');
boton.innerHTML = 'Editar';

boton.onclick = function(){
    var washingtonRef = db.collection("actas").doc(id);
   
        var numCorrelativo = document.getElementById('numeroCorrelativo').value;
        var nomFamilia = document.getElementById('nombreFamilia').value;
        var creacion= document.getElementById('fechaCreacion').value;
 
    return washingtonRef.update({

        correlativo: numCorrelativo,
        nombreFamilia: nomFamilia,
        fechaCreacion: creacion,
        nombreArchivo : archivoPorSubir != null ? archivoPorSubir.name : washingtonRef.data().nombreArchivo

    })
    .then(function() {
        console.log("Document successfully updated!");
        boton.innerHTML = 'Guardar';
        document.getElementById('numeroCorrelativo').value = '';
        document.getElementById('nombreFamilia').value = '';
        document.getElementById('fechaCreacion').value = '';

        if (archivoPorSubir)
        {
            subirArchivo(id);
        }

    })
    .catch(function(error) {
        // The document probably doesn't exist.
        console.error("Error updating document: ", error);
    });
}
}


prepararCargaArchivo();



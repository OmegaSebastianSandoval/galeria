
<div class="col-12">
    <form class="dropzone" id="cargarFotos">
    </form>
    
    	<div class="botones-acciones">
			<a href="/administracion/fotos" class="btn btn-cancelar">Volver</a>
		</div>
</div>

<script>
    Dropzone.autoDiscover = false;


    var myDropzone = new Dropzone("#cargarFotos", {
        paramName: "fotos-file", // The name that will be used to transfer the file
        maxFilesize: 8, // MB,
        dictDefaultMessage: '<i class="fas fa-folder-plus"></i><h3>Seleccione las imágenes a subir',
        dictInvalidFileType: 'Formato no compatible',
        acceptedFiles: '.png, .jpg, .jpeg',
        dictMaxFilesExceeded: 'Solo puede ser cargado un archivo',
        autoProcessQueue: false,
        url: "/administracion/fotos/uploadfotos",
        autoProcessQueue:true,
        parallelUploads:1,
       

    })

</script>

<style>
    :root {
        --regular-gray: #C3C3C3;
        --low-gray: #F2F2F2;
        --dark-gray: #727272;
        --purple: #252525;
    }

  

    .dropzone {
        height: 250px;
        background: var(--purple);
        border: 1px solid var(--purple);
        cursor: pointer;
        position: relative;
        padding: 20px;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        width: 98%;
        margin: 0 auto;
        border: 1px solid #FFF;
        margin-top: 30px;
        margin-bottom: 30px;
        transition: all 300ms ease-in-out;
        overflow-x: scroll;
    }



    .dropzone::before {
        content: '';
        height: 110%;
        position: absolute;
        z-index: -1;
        background-color: var(--purple);
        display: block;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .dropzone .dz-button {
        border: none;
        background: transparent;
        color: #FFF !important;
        font-family: 'Avenir Book';
        font-size: 18px;
        cursor: pointer;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .dz-preview {
        background-color: transparent !important;
        padding: 5px;
        border: 1px solid #FFF;
    }

    .dropzone .dz-button i {
        font-size: 50px;
    }

    .dropzone .dz-button:focus {
        outline: none;
    }

    .dz-remove {
        color: #FFF;
    }

    .dz-remove span {
        color: #FFF;
        text-decoration: none;
        cursor: pointer;
    }

    .dz-remove:hover {
        color: #FFF;
        text-decoration: none;
        cursor: pointer;
    }



    .dropzone .dz-preview .dz-error-message {
        top: 100%;
    }

 
</style>
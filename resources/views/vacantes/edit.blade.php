@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection


@section('content')
    <h1 class="text-2xl text-center mt-10">Editar vacante {{$vacante->titulo}}</h1>

    <form action="{{route('vacante.update', ['vacante' => $vacante->id])}}" method="post" class="max-w-lg mx-auto my-10">
        @csrf
        @method('put')
        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="titulo">
                T&iacute;tulo vacante:
            </label>

            <input id="titilo" type="text"
                class="p-3 bg-gray-100 rounded form-input w-full  @error('titulo') is-invalid @enderror" 
                name="titulo"
                placeholder="Título de la vacante" 
                value="{{$vacante->titulo}}" >

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>

                </div>
            @enderror
            
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="categoria">
                Categor&iacute;a:
            </label>

            <select name="categoria" id="categoria" 
                class="block appearnce-none w-full border 
                    border-gray-200 text-gray rounded
                    leading-tight focus:outline-none focus:bg-white
                    focus:border-gary-500 p-3 bg-gray-100">
            
                <option disabled selected>- Seleciones -</option> 
                @foreach ($categorias as $categoria)
                    <option {{$vacante->categoria_id == $categoria->id ? 'selected' : ''}} 
                        value="{{ $categoria->id}}">
                        {{ $categoria->nombre}}
                    </option>
                @endforeach
            
            </select>
            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>

                </div>
            @enderror
            
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="experiencia">
               Experiencia:
            </label>

            <select name="experiencia" id="experiencia" 
                class="block appearnce-none w-full border 
                    border-gray-200 text-gray rounded
                    leading-tight focus:outline-none focus:bg-white
                    focus:border-gary-500 p-3 bg-gray-100">
            
                <option disabled selected>- Seleciones -</option> 
                @foreach ($experiencias as $experiencia)
                    <option 
                        {{$vacante->experiencia_id == $experiencia->id ? 'selected' : ''}}
                        value="{{ $experiencia->id}}">{{ $experiencia->nombre}}</option>
                @endforeach
            
            </select>
            @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>

                </div>
            @enderror
            
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="ubicacion">
               Ubicación:
            </label>

            <select name="ubicacion" id="ubicacion" 
                class="block appearnce-none w-full border 
                    border-gray-200 text-gray rounded
                    leading-tight focus:outline-none focus:bg-white
                    focus:border-gary-500 p-3 bg-gray-100">
            
                <option disabled selected>- Seleciones -</option> 
                @foreach ($ubicaciones as $ubicacion)
                    <option
                        {{$vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}} 
                        value="{{ $ubicacion->id}}">
                            {{ $ubicacion->nombre}}
                    </option>
                @endforeach
            
            </select>
            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>

                </div>
            @enderror
            
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="salario">
               Salario:
            </label>

            <select name="salario" id="salario" 
                class="block appearnce-none w-full border 
                    border-gray-200 text-gray rounded
                    leading-tight focus:outline-none focus:bg-white
                    focus:border-gary-500 p-3 bg-gray-100">
            
                <option disabled selected>- Seleciones -</option> 
                @foreach ($salarios as $salario)
                    <option
                        {{$vacante->salario_id == $salario->id ? 'selected' : ''}} 
                        value="{{ $salario->id}}">{{ $salario->nombre}}</option>
                @endforeach
            
            </select>
            @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>

                </div>
            @enderror
            
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="descripcion">
               Descripci&oacute;n del puesto:
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 "></div>

            <input type="hidden" name="descripcion" value="{{$vacante->descripcion}}" id="descripcion">
            
            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="imagen">
              Imagen:
            </label>
            <div id="dropzonedevjobs" class="dropzone rounded bg-gray-100"></div>

            <input type="hidden" name="imagen" id="imagen" value="{{$vacante->imagen}}">
            <p id="error"></p>
            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror

            
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2" for="salario">
              Habilidades y conocimeintos:
            </label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <lista-h :skills="{{json_encode($skills)}}"
                :oldskills="{{json_encode($vacante->habilidades)}}"
            ></lista-h>
          
            @error('habilidades')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
           
            
        </div>

            <button 
                type="submit" 
                class="bg-green-500 w-full hover:bg-green-600 text-gray-100 
                p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
                Publicar vacante 
            </button>
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () =>{
            
            //Medium editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3' ],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text:'Información de la vacante'
                }
            })
            //Agrega al input hidden lo que el usario escribe en medium editor
            editor.subscribe('editableInput', function(e, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })
            //Llena el editor con el contenido del input hidden
            editor.setContent( document.querySelector('#descripcion').value )



            
            //Dropzone
            const dropzone = new Dropzone('#dropzonedevjobs', {
                url:"/vacantes/imagen",
                dictDefaultMessage: 'Sube tu imagen',
                acceptedFiles: ".png, .jpg, .gif, .jpeg, .bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if(document.querySelector('#imagen').value.trim() ) {
                       let imagenPublicada = {};
                       imagenPublicada.size = 1234;
                       imagenPublicada.name = document.querySelector('#imagen').value;
                       
                       this.options.addedfile.call(this, imagenPublicada);
                       this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                       imagenPublicada.previewElement.classList.add('dz-sucess');
                       imagenPublicada.previewElement.classList.add('dz-complete');
                    } 
                },
                success: function(file, response){
                    document.querySelector('#error').textContent = '';
                    document.querySelector('#imagen').value = response.correcto;

                    //Añadir al objeto de rchivo el nombre en el servidor
                    file.nombreServidor =  response.correcto;
                }, 
              
                maxfilesexceeded: function(file){
                    if(this.files[1] != null){
                        
                        this.removeFile(this.files[0]); //elimina el primer archivo subido
                        this.addFile(file); //Agregar el nuevo archivo
                    }
                },
                removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params )
                        .then(respuesta => console.log(respuesta))
                }
            })


        })
    </script>
@endsection
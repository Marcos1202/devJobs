<template>
    <div>

        <ul class="flex flex-wrap justify-center">
            <li class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="verificarClaseActiva(skill)"
                v-for="( skill, i ) in this.skills"
                v-bind:key="i"
                @click="activar($event)"
                >{{skill}}</li>

        </ul> 

        <input type="hidden" name="habilidades" id="habilidades">
    </div>
</template>

<script>
    export default{
        props:['skills', 'oldskills'],
        data: function(){
            return {
                habilidades: new Set()
            }
        },
        created: function(){
            if(this.oldskills){
                const skillsArray = this.oldskills.split(",");
                 skillsArray.forEach(skill => this.habilidades.add(skill));
            }
        },
        mounted: function(){
            document.querySelector('#habilidades').value = this.oldskills;
        },
        methods: {
            activar(e){
                if(e.target.classList.contains('bg-green-400')){
                    e.target.classList.remove('bg-green-400');
                    
                    //Eliminar del set de habilidades
                    this.habilidades.delete(e.target.textContent);
                }else{
                    e.target.classList.add('bg-green-400');
                    //Agregar datos al set de habilidades
                    console.log(e.target.textContent);
                    this.habilidades.add(e.target.textContent);

                } 

                //Agregar habilidades al inputacion
                const strHabilidades = [...this.habilidades];
                document.querySelector('#habilidades').value =strHabilidades;
            },

            verificarClaseActiva(skill){
                return this.habilidades.has(skill) ? 'bg-green-400': '';
            }

        }
    }    
</script>

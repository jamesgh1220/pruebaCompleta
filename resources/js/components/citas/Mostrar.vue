<template>
    <div class="container-fluid w-75">
        <h1 class="text-center">Listado de citas</h1>
        <div v-for="cita in citas" :key="cita.id" class="d-flex justify-content-evenly align-items-center mt-3">
            <!-- <input type="checkbox" :checked="checkCompleted(cita.completed)" @click="completeTask(cita)"> -->
            <p class="mt-2">{{cita.name}}</p>
            <p class="mt-2">{{cita.id_category_cita === 1 ? 'Cita' : 'Recordatorio'}}</p>
            <p v-for="(estado, index) in estados" :key="estado.id">
                {{cita.id_state_cita === index + 1 ? estado.nombre : ''}}
            </p>
            <!-- <p class="mt-2">{{cita.id_state_cita}}</p> -->
            <p class="mt-2">{{cita.fecha}}</p>
            <p class="mt-2">{{cita.observacion}}</p>
            <div class="ml-auto d-flex">
                <router-link :to="'/edit/'+cita.id" class="btn btn-primary">Editar</router-link>
            </div>
            
            <form v-on:submit.prevent="deleteCita(cita.id)">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                citas: [],
                estados: [{
                    id: 1,
                    nombre : 'Pendiente'
                }, {
                    id: 2,
                    nombre : 'Completada'
                }, {
                    id: 3,
                    nombre : 'Cancelada'
                }],
            }
        },
        methods:{
            getCitas(){
                axios.get('/citas')
                .then(response=> this.citas = response.data)
                .catch(error=>console.log(error));
            },
            deleteCita(id){
                axios.delete('/citas/'+id).then(response => {console.log(response)}).catch(error => {console.log(error)});
                this.getCitas();
            }
        },
        created(){
            axios.get('/citas')
                .then(response=> this.citas = response.data)
                .catch(error=>console.log(error));
            
        }
        
    }
</script>
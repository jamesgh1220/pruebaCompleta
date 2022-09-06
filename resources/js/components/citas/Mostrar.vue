<template>
    <div class="container w-75">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h3 class="text-center">Listado de citas</h3>
                <div class="table-responsive">
                    <table class="table table-borderless mt-3">
                        <thead class="table-dark table-borderless">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Observacion</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cita in citas" :key="cita.id">
                                <td>{{cita.name}}</td>
                                <td>{{cita.id_category_cita === 1 ? 'Cita' : 'Recordatorio'}}</td>
                                <div v-if="cita.id_state_cita === 1">
                                    <td>Pendiente</td>
                                </div>
                                <div v-else-if="cita.id_state_cita === 2">
                                    <td>Completada</td> 
                                </div>
                                <div v-else>
                                    <td>Cancelada</td>
                                </div>
                                <td>{{cita.fecha}}</td>
                                <td>{{cita.observacion}}</td>
                                <td>
                                    <div class="ml-auto d-flex">
                                        <router-link :to="'/edit/'+cita.id" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></router-link>
                                    </div>
                                </td>
                                <td>
                                    <form v-on:submit.prevent="deleteCita(cita.id)">
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
            async getCitas(){
                await axios.get('/citas').then(response=> this.citas = response.data).catch(error=>console.log(error));
            },
            async deleteCita(id){
                if (confirm("Eliminar la cita ?")) {
                    await axios.delete('/citas/'+id).then(response => {console.log(response)}).catch(error => {console.log(error)});
                this.getCitas();
                }
            }
        },
        async created(){
            await axios.get('/citas').then(response=> this.citas = response.data).catch(error=>console.log(error));
        }
    }
</script>
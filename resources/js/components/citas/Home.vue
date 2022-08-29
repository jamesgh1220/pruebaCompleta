<template>
    <div class="container-fluid w-50 mt-3">
        <div class="card border-success bg-transparent">
            <div class="card-header text-center">
                <h3>Crear Cita</h3>
            </div>
            <div class="card-body">
                <form v-on:submit.prevent="saveCita" name="name" method="POST" class="d-flex justify-content-center flex-column">
                    <input type="text" v-model="name" class="form-control" placeholder="Nombre cita">
                    <div class="form-floating mt-3">
                        <select v-model="id_category_cita" name="id_category_cita" class="form-select">
                            <option v-for="category in categories.data"  :key="category.id">
                                {{category.name}}
                            </option>
                        </select>
                        <label style="color: black;">Seleccione una categoria</label>
                    </div>
                    <div class="form-floating mt-3">
                        <select v-model="id_state_cita" name="id_category_cita" class="form-select" aria-label="Floating label select example">
                            <option v-for="state in states.data"  :key="state.id">
                                {{state.name}}
                            </option>
                        </select>
                        <label style="color: black;">Estado de la cita</label>
                    </div>
                    <input type="date" v-model="fecha" class="form-control mt-3" aria-describedby="">
                    <input type="text" v-model="observacion" placeholder="Observacion" class="form-control mt-3">
                    <input type="submit" class="btn btn-success w-25 mt-3" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data(){
            return {
                name:'',
                id_category_cita:'',
                id_state_cita:'',
                fecha:'',
                observacion:'',
                categories: [],
                states: []
            }
        },
        methods:{
            saveCita(){
                if(this.id_category_cita === 'Cita'){
                    this.id_category_cita = 1;
                }else{
                    this.id_category_cita = 2;
                }

                if(this.id_state_cita === 'Pendiente'){
                    this.id_state_cita = 1;
                }else if(this.id_state_cita === 'Completada'){
                    this.id_state_cita = 2;
                }else{
                    this.id_state_cita = 3;
                }
                axios.post('/citas', {name:this.name, id_category_cita:this.id_category_cita, id_state_cita:this.id_state_cita, fecha:this.fecha, observacion:this.observacion}).then(response => {console.log(response)}).catch(error => {console.log(error)})
                this.$router.push('/citalist');
            }
        }
        ,
        mounted(){
            axios.get('/category_citas').then(response => {this.categories = response}).catch(error => {console.log(error)})
            axios.get('/state_citas').then(response => {this.states = response}).catch(error => {console.log(error)})
        }
    }
</script>
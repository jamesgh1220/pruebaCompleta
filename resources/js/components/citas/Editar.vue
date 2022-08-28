<template>
    <div class="container-fluid w-50">

        <h1 class="text-center">Editar cita: {{id}}</h1>
        <form v-on:submit.prevent="saveCita()" method="POST" class="d-flex justify-content-center flex-column">
            <input type="text" v-model="cita.name" name="name" placeholder="Nombre cita" class="mt-3">
            <div class="form-floating mt-3">
                <select v-model="cita.id_category_cita" name="id_category_cita" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option v-for="category in categories.data"  :key="category.id">
                        {{category.name}}
                    </option>
                </select>
                <label style="color: black;" for="floatingSelect">Seleccione una categoria</label>
            </div>
            <div class="form-floating mt-3">
                <select v-model="cita.id_state_cita" name="id_state_cita" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option v-for="state in states.data"  :key="state.id">
                        {{state.name}}
                    </option>
                </select>
                <label style="color: black;" for="floatingSelect">Estado de la cita</label>
            </div>
            <input type="date" v-model="cita.fecha" name="fecha" class="mt-3">
            <input type="text" v-model="cita.observacion" name="observacion" placeholder="Observacion" class="mt-3">
            <input type="submit" class="btn btn-success w-25 mt-3" value="Guardar">
        </form>
        
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data(){
            return {
                id: this.$route.params.id,
                cita:[],
                name:'',
                id_category_cita:'',
                id_state_cita:'',
                fecha:'',
                observacion:'',
                categories: [],
                states: []
            }
        },
        created(){
            axios.get('/citas/'+this.id+'/edit').then(response=> this.cita = response.data).catch(error=>console.log(error));
            axios.get('/category_citas').then(response => {this.categories = response}).catch(error => {console.log(error)})
            axios.get('/state_citas').then(response => {this.states = response}).catch(error => {console.log(error)})
        },
        methods:{
            
            saveCita(){
                if(this.cita.id_category_cita === 'Cita'){
                    this.cita.id_category_cita = 1;
                }else{
                    this.cita.id_category_cita = 2;
                }

                if(this.cita.id_state_cita === 'Pendiente'){
                    this.cita.id_state_cita = 1;
                }else if(this.cita.id_state_cita === 'Completada'){
                    this.cita.id_state_cita = 2;
                }else{
                    this.cita.id_state_cita = 3;
                }
                axios.put('/citas/'+this.id, {name:this.cita.name, id_category_cita:this.cita.id_category_cita, id_state_cita:this.cita.id_state_cita, fecha:this.cita.fecha, observacion:this.cita.observacion}).then(response => {console.log(response)}).catch(error => {console.log(error)})
                this.$router.push('/citalist');
            }
        }
    }
</script>
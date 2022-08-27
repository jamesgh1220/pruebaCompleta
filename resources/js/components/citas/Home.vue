<template>


    <div class="container-fluid w-50">
        <!-- <ul>
            <li v-for="category in categories.data"  :key="category.id">
                {{category.name}}
            </li>
        </ul> -->
        <h1 class="text-center">Crear Cita</h1>
        <form v-on:submit.prevent="saveCita" name="name" method="POST" class="d-flex justify-content-center flex-column">
            <input type="text" v-model="name" placeholder="Nombre cita" class="mt-3">
            <select v-model="id_category_cita" name="id_category_cita">
                <option  v-for="category in categories.data"  :key="category.id" value="">{{category.name}}</option>
            </select>

            <!-- <input type="number" v-model="id_category_cita" placeholder="Categoria cita" class="mt-3"> -->
            <input type="number" v-model="id_state_cita" placeholder="Estado cita" class="mt-3">
            <input type="date" v-model="fecha" class="mt-3">
            <input type="text" v-model="observacion" placeholder="Observacion" class="mt-3">
            <input type="submit" class="btn btn-success w-25 mt-3" value="Guardar">
        </form>
        
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
                categories: []
            }
        },
        methods:{
            saveCita(){
                axios.post('/citas', {name:this.name, id_category_cita:this.id_category_cita, id_state_cita:this.id_state_cita, fecha:this.fecha, observacion:this.observacion}).then(response => {console.log(response)}).catch(error => {console.log(error)})
                // this.task = '';
                // this.$router.push('/');
            }
        }
        ,
        mounted(){
            axios.get('/category_citas').then(response => {this.categories = response}).catch(error => {console.log(error)})
        }
    }
</script>
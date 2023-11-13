<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Adicionar Empresa</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label form="">Código</label>
                    <input type="text" v-model="model.empresa.codigo" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="">Empresa</label>
                    <input type="text" v-model="model.empresa.empresa" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="">Sigla</label>
                    <input type="text" v-model="model.empresa.sigla" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="">Razão Social</label>
                    <input type="text" v-model="model.empresa.razao_social" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="button" @click="saveEmpresa" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    name:'empresaCreate',
    data(){
        return{
            model:{
                empresa:{
                    codigo: '',
                    empresa: '',
                    sigla: '',
                    razao_social: ''
                }
            }
        }
    },
    methods: {
        saveEmpresa(){

            axios.post('http://localhost:8000/empresa', this.model.empresa).then(res=>{
                console.log(res.data)
                alert('Gravado com sucesso');

                this.model.empresa = {
                    codigo: '',
                    empresa: '',
                    sigla: '',
                    razao_social: ''
                }
            })
            .catch(function(error){

                if (error.response) {
                    
                    console.error(error.response.data);
                    console.error(error.response.status);
                    console.error(error.response.headers);
                } else if (error.request) {
                    console.error(error.request);
                } else {
                    console.error('Error', error.message);
                }
           })
        }
    }
}
</script>
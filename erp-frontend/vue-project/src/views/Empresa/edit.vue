<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Atualizar Empresa</h4>
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
                    <button type="button" @click="updateEmpresa" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    name:'empresaEdit',
    data(){
        return{
            empresaCodigo:'',
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
    mounted(){
        this.empresaCodigo = this.$route.params.codigo;
        this.getEmpresaData(this.$route.params.codigo);
    },
    methods: {
        getEmpresaData(empresaCodigo){
            axios.get(`http://localhost:8000/empresa/${empresaCodigo}`).then(res =>{
                console.log(res.data.data);

                this.model.empresa = res.data.data

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
            });
        },
        updateEmpresa(){

            axios.patch(`http://localhost:8000/empresa/${this.empresaCodigo}`, this.model.empresa).then(res=>{
                console.log(res.data)
                alert('Atualizado com sucesso');

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
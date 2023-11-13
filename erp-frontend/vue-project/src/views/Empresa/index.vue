<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Empresa
                    <RouterLink to="/empresa/create" class="btn btn-primary float-end">
                        Adicionar Empresa
                    </RouterLink>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Recnum</th>
                            <th>Código</th>
                            <th>Empresa</th>
                            <th>Sigla</th>
                            <th>Razão Social</th>
                            <th>Botões</th>
                        </tr>
                    </thead>
                    <tbody v-if="this.empresa.length > 0">
                        <tr v-for="(empresa, index) in this.empresa" :key="index">
                            <td>{{ empresa.recnum }}</td>
                            <td>{{ empresa.codigo }}</td>
                            <td>{{ empresa.empresa }}</td>
                            <td>{{ empresa.sigla }}</td>
                            <td>{{ empresa.razao_social }}</td>
                            <td>
                                <RouterLink :to="{ path: '/empresa/'+empresa.codigo+'/show'}" class="btn btn-success">
                                    Visualizar
                                </RouterLink>
                                <RouterLink :to="{ path: '/empresa/'+empresa.codigo+'/edit'}" class="btn btn-success">
                                    Editar
                                </RouterLink>
                                <button type="button" @click="deleteEmpresa(empresa.codigo)" class="btn btn-danger">Apagar</button>
                            </td>
                        </tr>
                        </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="6">Carregando...</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </template>
  

  <script>
import axios from 'axios'

export default{
    name: 'empresa',
    data(){
        return {
            empresa: []
        }
    },
    mounted(){
        this.getEmpresa();
    },
    methods:{
        getEmpresa(){

            axios.get('http://localhost:8000/empresa').then(res =>{
                this.empresa = res.data.data
                
            })
        },
        deleteEmpresa(empresaCodigo){
            
            if(confirm('Tem certeza que quer apagar este registro?')){
                axios.delete(`http://localhost:8000/empresa/${empresaCodigo}`).then(res => {
                    alert("Registro deletado com sucesso!");
                    this.getEmpresa();
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
            };
        }
    }
}
</script>
<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Cliente
                    <RouterLink to="/cliente/create" class="btn btn-primary float-end">
                        Adicionar Cliente
                    </RouterLink>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Recnum</th>
                            <th>Empresa</th>
                            <th>Código</th>
                            <th>Razão Social</th>
                            <th>Tipo</th>
                            <th>CPF/CNPJ</th>
                            <th>Botões</th>
                        </tr>
                    </thead>
                    <tbody v-if="this.cliente.length > 0">
                        <tr v-for="(cliente, index) in this.cliente" :key="index">
                            <td>{{ cliente.recnum }}</td>
                            <td>{{ cliente.empresa }}</td>
                            <td>{{ cliente.codigo }}</td>
                            <td>{{ cliente.razao_social }}</td>
                            <td>{{ cliente.tipo }}</td>
                            <td>{{ cliente.cpf_cnpj }}</td>
                            <td>
                                <RouterLink :to="{ path: '/cliente/'+cliente.codigo+'/show'}" class="btn btn-success">
                                    Visualizar
                                </RouterLink>
                                <RouterLink :to="{ path: '/cliente/'+cliente.codigo+'/edit'}" class="btn btn-success">
                                    Editar
                                </RouterLink>
                                <button type="button" @click="deleteCliente(cliente.codigo)" class="btn btn-danger">Apagar</button>
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
    name: 'cliente',
    data(){
        return {
            cliente: []
        }
    },
    mounted(){
        this.getCliente();
    },
    methods:{
        getCliente(){

            axios.get('http://localhost:8000/cliente').then(res =>{
                this.cliente = res.data.data
                
            })
        },
        deleteCliente(clienteCodigo){
            
            if(confirm('Tem certeza que quer apagar este registro?')){
                axios.delete(`http://localhost:8000/cliente/${clienteCodigo}`).then(res => {
                    alert("Registro deletado com sucesso!");
                    this.getCliente();
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
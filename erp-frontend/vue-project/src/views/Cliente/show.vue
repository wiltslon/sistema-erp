<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Visualizar Cliente</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label form="">Empresa</label>
                    <input type="text" readonly v-model="model.cliente.empresa" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="">Código</label>
                    <input type="text" readonly v-model="model.cliente.codigo" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="">Razão Social</label>
                    <input type="text" readonly v-model="model.cliente.razao_social" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="">Tipo</label>
                    <select disabled v-model="model.cliente.tipo" >
                        <option value="PF">PF</option>
                        <option value="PJ">PJ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label form="">CPF/CNPJ</label>
                    <input type="text" readonly v-model="model.cliente.cpf_cnpj" class="form-control">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    name:'clienteShow',
    data(){
        return{
            clienteCodigo:'',
            model:{
                cliente:{
                    empresa: '',
                    codigo: '',
                    razao_social: '',
                    tipo: '',
                    cpf_cnpj: ''
                }
            }
        }
    },
    mounted(){
        this.clienteCodigo = this.$route.params.codigo;
        this.getClienteData(this.$route.params.codigo);
    },
    methods: {
        getClienteData(clienteCodigo){
            axios.get(`http://localhost:8000/cliente/${clienteCodigo}`).then(res =>{
                console.log(res.data.data);

                this.model.cliente = res.data.data

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
        }
    }
}
</script>
<template>
    <div class="container container-empresa">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        Lista de Empresas
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Cif</th>
                                        <th scope="col">Conta.</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Op.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="empresa in arrayEmpresas" :key="empresa.id">
                                        <td v-text="empresa.name"></td>
                                        <td v-text="empresa.cifnif"></td>
                                        <td v-text="empresa.cuentacontable"></td> 
                                        <td v-text="empresa.estado"></td> 
                                        <td>
                                            <button class="btn" @click="loadFieldsUpdate(empresa)"><i class="far fa-edit text-primary"></i></button>
                                            <button class="btn" @click="deleteEmpresa(empresa)"><i class="far fa-trash-alt text-danger"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-default">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input v-model="name" type="text" class="form-control">

                        <label>Nif</label>
                        <input v-model="cifnif" type="text" class="form-control">

                        <label>C.Ctble</label>
                        <input v-model="cuentacontable" type="text" class="form-control">

                        <label>Estado</label>
                        <input v-model="estado" type="text" class="form-control">
                    </div>
                </div>
                <div class="container-buttons">
                    <button v-if="update == 0" @click="saveEmpresas()" class="btn btn-success">Añadir</button>
                    <button v-if="update != 0" @click="updateEmpresas()" class="btn btn-warning">Actualizar</button>
                    <button v-if="update != 0" @click="clearFields()" class="btn">Atrás</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name :"",
                direccion :"",
                codpostal :"",
                localidad :"",
                provincia_id :0,
                pais_id :"",
                cifnif :"",
                tfno :"",
                email :"",
                web :"",
                idioma :"",
                cuentacontable :"",
                marta :0,
                susana :0,
                observaciones :"",
                estado :"",

                update:0, /*Esta variable contrarolará cuando es una nueva empresa o una modificación, 
                            si es 0 significará que no hemos seleccionado ninguna empresa, 
                            pero si es diferente de 0 entonces tendrá el id de la empresa y no mostrará el boton guardar sino el modificar*/
                arrayEmpresas:[] //Este array contendrá las emrpesas de nuestra bd
            }
        },
        methods:{
            getEmpresas(){
                let me =this;
                let url = '/erp/empresas' //Ruta que hemos creado para que nos devuelva todas las empresas
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayEmpresas = response.data;
                    })
                .catch(function (error) {
                        // handle error
                        console.log(error);
                });
            },
            saveEmpresas(){
                let me =this;
                let url = '/erp/empresas/guardar' //Ruta que hemos creado para enviar una empresa y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la empresa
                    'name': this.name,
                    'direccion': this.direccion,
                    'codpostal': this.codpostal,
                    'localidad': this.localidad,
                    'provincia_id': this.provincia_id,
                    'pais_id': this.pais_id,
                    'cifnif': this.cifnif,
                    'tfno': this.tfno,
                    'email': this.email,
                    'web': this.web,
                    'idioma': this.idioma,
                    'cuentacontable': this.cuentacontable,
                    'marta': this.marta,
                    'susana': this.susana,
                    'observaciones': this.observaciones,
                    'estado': this.estado
                }).then(function (response) {
                    me.getEmpresas();//llamamos al metodo getEmpresas(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });   
            },
            updateEmpresas(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                    empresa que queremos modificar*/
                let me = this;
                axios.put('/erp/empresas/actualizar',{
                    'id':this.update,
                    'name': this.name,
                    'direccion': this.direccion,
                    'codpostal': this.codpostal,
                    'localidad': this.localidad,
                    'provincia_id': this.provincia_id,
                    'pais_id': this.pais_id,
                    'cifnif': this.cifnif,
                    'tfno': this.tfno,
                    'email': this.email,
                    'web': this.web,
                    'idioma': this.idioma,
                    'cuentacontable': this.cuentacontable,
                    'marta': this.marta,
                    'susana': this.susana,
                    'observaciones': this.observaciones,
                    'estado': this.estado
                }).then(function (response) {
                    me.getEmpresas();//llamamos al metodo getEmpresas(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ 
                this.update = data.id
                let me =this;
                let url = '/erp/empresas/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.name= response.data.name;
                    me.direccion= response.data.direccion;
                    me.codpostal= response.data.codpostal;
                    me.localidad= response.data.localidad;
                    me.provincia_id= response.data.provincia_id;
                    me.pais_id= response.data.pais_id;
                    me.cifnif= response.data.cifnif;
                    me.tfno= response.data.tfno;
                    me.email= response.data.email;
                    me.web= response.data.web;
                    me.idioma= response.data.idioma;
                    me.cuentacontable= response.data.cuentacontable;
                    me.marta= response.data.marta;
                    me.susana= response.data.susana;
                    me.observaciones= response.data.observaciones;
                    me.estado= response.data.estado
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deleteEmpresa(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la empresa que hemos elegido
                let me =this;
                let empresa_id = data.id
                if (confirm('¿Seguro que deseas borrar esta empresa?')) {
                    axios.delete('/erp/empresas/borrar/'+empresa_id
                        ).then(function (response) {
                            me.getEmpresas();
                        })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.name= "";
                this.direccion= "";
                this.codpostal= "";
                this.localidad= "";
                this.provincia_id= "";
                this.pais_id= "";
                this.cifnif= "";
                this.tfno= "";
                this.email= "";
                this.web= "";
                this.idioma= "";
                this.cuentacontable= "";
                this.marta= "";
                this.susana= "";
                this.observaciones= "";
                this.estado= "";
            }
        },
        mounted() {
            this.getEmpresas();
        }
    }
</script>

<template>
    <div class="card " >
        <div class="card-header py-0 px-1">
            <h3 class="card-title">Diagnósticos</h3>

            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>

        <div class="card-body p-0">

            <div class="row" v-show="!disabled">
                <div class="col-12 p-3">

                    <div class="form-row">


                        <div class="form-group col-sm-6">
                            <select-diagnostico
                                label="Diagnostico"
                                v-model="diagnostico" >

                            </select-diagnostico>
                        </div>



                        <div class="form-group col-sm-4">
                            <label for="peep">&nbsp;</label>
                            <div>
                                <button type="button" class="btn btn-success" @click.prevent="save()">
                                    <i class="fa fa-save" v-show="!loading"></i>
                                    <i class="fa fa-sync fa-spin" v-show="loading"></i>
                                    <span v-text="textButtonSubmint"></span>
                                </button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

            <div class="table-responsive mb-0">
                <table class="table table-bordered table-sm table-striped mb-0">
                    <thead v-show="!disabled">
                    <tr>
                        <th>Diagnóstico</th>
                        <th >Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="parte_diagnosticos.length == 0">
                        <td colspan="10" class="text-center">Ningún Registro agregado</td>
                    </tr>
                    <tr v-for="det in parte_diagnosticos" >
                        <td v-text="det.diagnostico.text"></td>

                        <td  class="text-nowrap" v-show="!disabled">
                            <button type="button" @click="editItem(det)" class="btn btn-sm btn-outline-info" v-tooltip="'Editar'"  >
                                <i class="fa fa-edit"></i>
                            </button>

                            <button type="button" @click="deleteItem(det)"  class='btn btn-outline-danger btn-sm' v-tooltip="'Eliminar'" >
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</template>


<script>

import SelectDiagnostico from "./SelectDiagnostico";

export default {

    name: 'panel-diagnosticos-parte',
    created() {
        this.getItems();
    },
    components:{
        SelectDiagnostico
    },
    props:{
        parte_id: {
            required: true
        },
        disabled:{
            type: Boolean,
            default: false
        }
    },

    data: () => ({
        nombre: null,
        parte_diagnosticos: [],
        editedItem: {
            id : 0,
            parte_id: null,
        },
        defaultItem: {
            id : 0,
            parte_id: null,

        },

        diagnostico: null,

        loading: false,

    }),
    methods: {
        async getItems() {
            const res = await  axios.get(route('api.parte_diagnosticos.index',{parte_id: this.parte_id}));

            this.parte_diagnosticos = res.data.data;
        },
        getId(item){
            if(item)
                return item.id;

            return null
        },
        editItem (item) {
            console.log('edit ',item)
            this.nombre = Object.assign({}, item.tipo);
            this.editedItem = Object.assign({}, item);

        },
        close () {
            this.loading = false;
            setTimeout(() => {
                this.nombre = null;
                this.editedItem = Object.assign({}, this.defaultItem);
            }, 300)
        },
        async save () {

            this.loading = true;



            try {

                this.editedItem.diagnostico_id = this.getId(this.diagnostico)
                this.editedItem.parte_id = this.parte_id;
                const data = this.editedItem;

                console.log(data);

                if(this.editedItem.id === 0){

                    var res = await axios.post(route('api.parte_diagnosticos.store'),data);

                }else {

                    var res = await axios.patch(route('api.parte_diagnosticos.update',this.editedItem.id),data);

                }

                logI(res.data);

                iziTs(res.data.message);
                this.getItems();

                this.close();

            }catch (e) {
                notifyErrorApi(e);
                this.loading = false;
            }

        },
        async deleteItem(item) {

            let confirm = await Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, elimínalo\n!'
            });

            if (confirm.isConfirmed){
                try{
                    let res = await  axios.delete(route('api.parte_diagnosticos.destroy',item.id))
                    logI(res.data);

                    iziTs(res.data.message);
                    this.getItems();


                }catch (e){
                    notifyErrorApi(e);
                    this.itemElimina = {};
                }

            }

            console.log("Confirmacion",confirm);
        }
    },
    computed: {
        modalFormTitle () {
            return this.editedItem.id === 0 ? 'Nuevo Detalle' : 'Editar Detalle'
        },
        textButtonSubmint () {
            if (this.loading){
                return this.editedItem.id === 0 ? 'Agregando...' : 'Actualizando...'

            }else {
                return this.editedItem.id === 0 ? 'Agregar' : 'Actualizar'

            }
        }
    },
    watch: {
        item (val) {
            this.$emit('input', val);
        },
        value(val){
            this.item = val;
        }
    }

}
</script>

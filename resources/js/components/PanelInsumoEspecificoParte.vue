<template>
    <div class="card " >
        <div class="card-header py-0 px-1">
            <h3 class="card-title">Insumo Especifico</h3>

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
                            <select-insumo-especifico
                                label="Insumo Especifico"
                                v-model="insumo" >

                            </select-insumo-especifico>
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
                        <th>Insumo</th>
                        <th >Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="parte_insumos.length == 0">
                        <td colspan="10" class="text-center">Ningún Registro agregado</td>
                    </tr>
                    <tr v-for="det in parte_insumos" >
                        <td v-text="det.insumo.nombre"></td>

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

import SelectInsumoEspecifico from "./SelectInsumoEspecifico";

export default {

    name: 'panel-insumo-parte',
    created() {
        this.getItems();
    },
    components:{
        SelectInsumoEspecifico
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
        parte_insumos: [],
        editedItem: {
            id : 0,
            parte_id: null,
        },
        defaultItem: {
            id : 0,
            parte_id: null,

        },

        insumo: null,

        loading: false,

    }),
    methods: {
        async getItems() {
            const res = await  axios.get(route('api.parte_insumo_especificos.index',{parte_id: this.parte_id}));

            this.parte_insumos = res.data.data;
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
            this.insumo = item.insumo;
        },
        close () {
            this.loading = false;
            setTimeout(() => {
                this.nombre = null;
                this.editedItem = Object.assign({}, this.defaultItem);
                this.insumo = null;
            }, 300)
        },
        async save () {

            this.loading = true;



            try {

                this.editedItem.insumo_id = this.getId(this.insumo)
                this.editedItem.parte_id = this.parte_id;
                const data = this.editedItem;

                console.log(data);

                if(this.editedItem.id === 0){

                    var res = await axios.post(route('api.parte_insumo_especificos.store'),data);

                }else {

                    var res = await axios.patch(route('api.parte_insumo_especificos.update',this.editedItem.id),data);

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
                    let res = await  axios.delete(route('api.parte_insumo_especificos.destroy',item.id))
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

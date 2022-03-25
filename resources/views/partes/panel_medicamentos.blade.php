<div class="card " id="panel_contactos">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">Medicamentos</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>

    <div class="card-body p-0">  

        <div class="row">

            <div class="col-12 p-3">

                <div class="form-row">


                    <div class="form-group col-sm-6" style="padding: 0px; margin: 0px">


                        <label for="vol">Nombre:</label>
                        <input class="form-control" type="text" @keypress.prevent.enter="save()" v-model="editedItem.nombre"
                               style="padding:20px;">
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
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Numero</th>
                    <th>Parentesco</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="parte_contactos.length == 0">
                    <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="det in parte_contactos">
                    <td v-text="det.tipo.nombre"></td>
                    <td v-text="det.numero"></td>
                    <td v-text="det.parentesco"></td>
                    <td v-text="det.nombre"></td>
                    <td  class="text-nowrap">
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




@push('scripts')
    <script>


        var vmItem = new Vue({
            el: '#panel_contactos',
            name: '#panel_contactos',
            created: function() {
                this.getItems();
            },
            mounted() {
            },
            data: {

                tipo_contacto: null,
                parte_contactos: [],
                editedItem: {
                    id : 0,
                    parte_id: @json($parte->id),
                },
                defaultItem: {
                    id : 0,
                    parte_id: @json($parte->id),

                },

                loading: false,

                parte_id: @json($parte->id),

            },
            methods: {
                async getItems() {
                    const res = await  axios.get(route('api.parte_contactos.index',{parte_id: this.parte_id}));

                    this.parte_contactos = res.data.data;
                },
                getId(item){
                    if(item)
                        return item.id;

                    return null
                },
                editItem (item) {
                    console.log('edit ',item)
                    this.tipo_contacto = Object.assign({}, item.tipo);
                    this.editedItem = Object.assign({}, item);

                },
                close () {
                    this.loading = false;
                    setTimeout(() => {
                        this.tipo_contacto = null;
                        this.editedItem = Object.assign({}, this.defaultItem);
                    }, 300)
                },
                async save () {

                    this.loading = true;



                    try {

                        this.editedItem.tipo_id = this.getId(this.tipo_contacto)
                        const data = this.editedItem;

                        console.log(data);

                        if(this.editedItem.id === 0){


                            var res = await axios.post(route('api.parte_contactos.store'),data);

                        }else {

                            var res = await axios.patch(route('api.parte_contactos.update',this.editedItem.id),data);

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
                            let res = await  axios.delete(route('api.parte_contactos.destroy',item.id))
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
        });


    </script>
@endpush

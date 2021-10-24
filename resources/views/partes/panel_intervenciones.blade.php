<div class="card " id="panel_intervenciones">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">Intervenciones</h3>

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


                    <div class="form-group col-sm-12">
                        <select-intervencion
                            :items="intervenciones"
                            label="Intervencion"
                            v-model="intervencion" >

                        </select-intervencion>
                    </div>

                    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

                    <div class="form-group col-sm-8">
                        <label for="vol">Lateralidad:</label>
                        <input class="form-control" type="text" v-model="editedItem.lateralidad">
                    </div>


                    <div class="form-group col-sm-2">
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
                    <th>intervencion</th>
                    <th>Lateralidad</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="parte_intervenciones.length == 0">
                    <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="det in parte_intervenciones">
                    <td v-text="det.intervencion.nombre"></td>
                    <td v-text="det.lateralidad"></td>
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
            el: '#panel_intervenciones',
            name: '#panel_intervenciones',
            created: function() {
                this.getItems();
            },
            mounted() {
            },
            data: {

                intervenciones: @json(\App\Models\Intervencion::all() ?? []),
                parte_intervenciones: [],
                intervencion: null,
                editedItem: {
                    id : 0,
                    parte_id: @json($parte->id),
                },
                defaultItem: {
                    id : 0,
                    parte_id: @json($parte->id),

                },
                itemElimina: {

                },

                loading: false,

                parte_id: @json($parte->id), 

            },
            methods: {
                async getItems() {
                    const res = await  axios.get(route('api.parte_intervenciones.index',{parte_id: this.parte_id}));

                    console.log('res getItems:',res)
                    this.parte_intervenciones = res.data.data;
                },
                getId(item){
                    if(item)
                        return item.id;

                    return null
                },
                editItem (item) {
                    this.intervencion = Object.assign({}, item.intervencion);
                    this.editedItem = Object.assign({}, item);

                },
                close () {
                    this.loading = false;
                    setTimeout(() => {
                        this.intervencion = null;
                        this.editedItem = Object.assign({}, this.defaultItem);
                    }, 300)
                },
                async save () {

                    this.loading = true;



                    try {

                        this.editedItem.intervencion_id = this.getId(this.intervencion)
                        const data = this.editedItem;

                        console.log(data);

                        if(this.editedItem.id === 0){

                            var res = await axios.post(route('api.parte_intervenciones.store'),data);

                        }else {

                            var res = await axios.patch(route('api.parte_intervenciones.update',this.editedItem.id),data);

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
                            let res = await  axios.delete(route('api.parte_intervenciones.destroy',item.id))
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

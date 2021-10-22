
<div id="bitacoras">

    <form @submit.prevent="save()">

        <div class="form-row ml-3">

            <!-- Observaciones Field -->
            <div class="form-group col-sm-10 col-lg-10">
                {!! Form::label('observaciones', 'Observaciones:') !!}
                {!! Form::textarea('observaciones', null, ['v-model' => 'editedItem.descripcion','class' => 'form-control','rows' => 2]) !!}
            </div>
            <div class="form-group col-sm-2 col-lg-2">
                <label for="">&nbsp;</label>
                <div>
                    <button type="submit" class="btn btn-success">
                        <span v-text="textButtonSubmit"></span>
                    </button>
                </div>
            </div>
        </div>

    </form>




    <!-- timeline item -->
    <div v-if="items.length > 0" >
        <div class="timeline">
            <template v-for="(item,index) in items">
                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <span class="time">
                            <i class="fas fa-clock"></i>
                            <span v-text="item.creado_el"></span>
                        </span>
                        <h3 class="timeline-header">
                            <a href="#">
                                <span v-text="item.user.name"></span>
                            </a>
                            <span v-text="item.titulo"></span>
                        </h3>

                        <div class="timeline-body">
                            <span v-text="item.descripcion"></span>
                        </div>
                    </div>
                </div>

                <div v-show="items.length==(index+1)">
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </template>
        </div>

    </div>
    <div v-else>
        <div class="timeline">
        <div>
            <i class="fas fa-clock bg-gray"></i>
            <div class="timeline-item">
                ningun registro agregado
            </div>
        </div>
        </div>
    </div>




</div>


@push('scripts')
<script>


    new Vue({
        el: '#bitacoras',
        name: 'bitacoras',

        created() {
            this.getItems();
        },

        data: {
            loading: false,

            items: [],
            editedItem: {
                id : 0,
                parte_id: '{{$parte->id}}',
                user_id: '{{auth()->user()->id}}',
                titulo: '',
                descripcion: '',
            },
            defaultItem: {
                id : 0,
                parte_id: '{{$parte->id}}',
                user_id: '{{auth()->user()->id}}',
                titulo: '',
                descripcion: '',
            },
        },
        methods: {

            async getItems () {

                try {

                    var res = await axios.get('{{route('api.bitacoras.index')."?parte_id=".$parte->id}}');

                    console.log(res.data.data)
                    this.items  = res.data.data;

                }catch (e) {
                    notifyErrorApi(e);
                }

            },
            async save () {

                this.loading = true;


                try {

                    const data = this.editedItem;

                    if(this.editedItem.id === 0){

                        var res = await axios.post(route('api.bitacoras.store'),data);

                    }else {

                        var res = await axios.patch(route('api.bitacoras.update',this.editedItem.id),data);

                    }


                    this.getItems();
                    iziTs(res.data.message);
                    this.loading = false;


                }catch (e) {
                    notifyErrorApi(e);
                    this.loading = false;
                }

            }
        },
        computed: {
            textButtonSubmit () {
                if (this.loading){
                    return this.editedItem.id === 0 ? 'Agregando... ' : 'Actualizando... ';
                }

                return this.editedItem.id === 0 ? 'Agregar ' : 'Editar ';
            }
        },
        watch: {

        }
    });
</script>
@endpush
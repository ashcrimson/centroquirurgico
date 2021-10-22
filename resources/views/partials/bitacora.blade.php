
<div id="bitacoras">

    <form action="{{route('admision.bitacora.store',$parte->id)}}">

        <div class="form-row">

            <!-- Observaciones Field -->
            <div class="form-group col-sm-10 col-lg-10">
                {!! Form::label('observaciones', 'Observaciones:') !!}
                {!! Form::textarea('observaciones', null, ['class' => 'form-control','rows' => 2]) !!}
            </div>
            <div class="form-group col-sm-2 col-lg-2">
                <label for="">&nbsp;</label>
                <div>
                    <button type="submit" class="btn btn-success">
                        Agregar
                    </button>
                </div>
            </div>
        </div>

    </form>


    <div class="timeline">

        <!-- timeline item -->
        @forelse($parte->bitacoras as $bitacora)
            <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{ $bitacora->created_at->format('d/m/Y h:i:s a')}}</span>
                    <h3 class="timeline-header">
                        <a href="#">{{ $bitacora->user->name  }}</a>
                        {{ $bitacora->titulo }}
                    </h3>

                    @if($bitacora->descripcion)
                        <div class="timeline-body">
                            {{ $bitacora->descripcion }}
                        </div>
                    @endif
                </div>
            </div>

            @if($loop->last)
                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            @endif
        @empty


            <div>
                <i class="fas fa-clock bg-gray"></i>
                <div class="timeline-item">
                    ningun registro agregado
                </div>
            </div>
        @endforelse



    </div>

</div>


@push('scripts')
<script>
    new Vue({
        el: '#bitacoras',
        name: 'bitacoras',
        created() {

        },
        data: {

        },
        methods: {

        }
    });
</script>
@endpush



<div class="timeline">
    <!-- timeline time label -->
{{--    <div class="time-label">--}}
{{--        <span class="bg-red">10 Feb. 2014</span>--}}
{{--    </div>--}}
    <!-- /.timeline-label -->

    <!-- timeline item -->
    @forelse($bitacoras->sortByDesc('created_at') as $bitacora)
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
        </div>
    @endforelse



</div>



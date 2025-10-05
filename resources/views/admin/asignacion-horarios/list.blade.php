<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Tipo</th>
                    <th>Rango</th>
                    <th>Archivo</th>
                    <th>Estado</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportes as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nombre_reporte }}</td>
                    <td>{{ optional($r->empresa)->nombre_empresa }}</td>
                    <td>{{ ucfirst($r->tipo) }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($r->fecha_inicio)->format('d/m/Y') }}
                        @if($r->fecha_fin)
                            <br>al<br>{{ \Carbon\Carbon::parse($r->fecha_fin)->format('d/m/Y') }}
                        @endif
                    </td>
                    <td>
                        @if($r->estado === 'completado' && $r->archivo_path)
                            <a href="{{ Storage::url($r->archivo_path) }}" class="btn btn-xs btn-success" target="_blank">
                                <i class="voyager-download"></i> Descargar
                            </a>
                        @else
                            <span class="text-muted">No disponible</span>
                        @endif
                    </td>
                    <td>
                        <span class="label label-{{
                            $r->estado === 'completado'  ? 'success' :
                            ($r->estado === 'procesando' ? 'warning' : 'danger')
                        }}">
                            {{ ucfirst($r->estado) }}
                        </span>
                    </td>
                    <td class="text-right" style="width: 30%">
                        @can('view', $r)
                            <a href="{{ route('admin.reportes-asistencia.show', $r) }}" title="Ver" class="btn btn-sm btn-warning">
                                <i class="voyager-eye"></i> Ver
                            </a>
                        @endcan
                        @can('delete', $r)
                            <button type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Borrar"
                                    onclick="deleteItem('{{ route('admin.reportes-asistencia.destroy', $r) }}', '{{ $r->nombre_reporte }}')"
                                    data-toggle="modal"
                                    data-target="#delete_modal">
                                <i class="voyager-trash"></i> Borrar
                            </button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
                        <h5 class="text-center" style="margin-top: 50px">
                            <img src="{{ asset('images/empty.png') }}" width="120px" alt="" style="opacity: 0.8">
                            <br><br>
                            No se encontraron reportes
                        </h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4 text-muted">
        @if($reportes->count())
            Mostrando del {{ $reportes->firstItem() }} al {{ $reportes->lastItem() }} de {{ $reportes->total() }} registros.
        @endif
    </div>
    <div class="col-md-8 text-right">
        <nav class="text-right">{{ $reportes->links() }}</nav>
    </div>
</div>

@if(request()->ajax())
<script>
    $(document).ready(function(){
        $('.page-link').click(function(e){
            e.preventDefault();
            const url = new URL($(this).attr('href'));
            const page = url.searchParams.get('page') || 1;
            if (typeof list === 'function') list(page);
            else window.location.href = $(this).attr('href');
        });
    });
</script>
@endif

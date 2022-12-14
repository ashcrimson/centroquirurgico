<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Document</title>

        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}">

    <style>
       /*td {*/
       /*     height: -10px;*/
       /* }*/
    </style>

    </head>
    <body>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-bottom: 0;font-size: 11px;height: 15px;">
            <tbody>
                <tr>
                    <td width="20%" style="text-align: center;" rowspan="2"><img src="http://sistemarema.hospitalnaval.cl/dist/img/Logo%20HNV.png" alt=""
                        style="width: 60px;"></td>
                    <td width="25%"  style="text-align: center; ">PARTE QUIRÚRGICO</td>
                    <td width="25%" style="text-align: center;">PARTE Nro {{ $parte->id ?? null }}</td>
                </tr>
                <tr>
                    <td width="25%" style="text-align: center;">Usuario Solicitante: {{ Auth::user()->name }}</td>
                    <td width="25%" style="text-align: center;">Fecha/Hora: {{ \Carbon\Carbon::now()->format('j \d\e F Y h:i A') }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-top: 1rem; margin-bottom: 0;font-size: 11px;">
            <tbody>
                <tr>
                    <td colspan="4" style="text-align: center;">Datos Paciente</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Nombre</td>
                    <td width="30%" style="text-align: left;">{{ $parte->nombre_completo ?? null }}</td>
                    <td width="10%" style="text-align: left;">Edad</td>
                    <td width="10%" style="text-align: left;">{{ $parte->edad ?? null }}</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Rut</td>
                    <td width="30%" style="text-align: left;">{{ $parte->rut_completo ?? null }}</td>
                    <td width="10%" style="text-align: left;">Especialidad</td>
                    <td width="10%" style="text-align: left;">{{ $especialidad->nombre ?? null }}</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Medico Tratante</td>
                    <td width="30%" style="text-align: left;">{{ $parte->userIngresa->name ?? null }}</td>
                    <td width="10%" style="text-align: left;">Sub-especialidad</td>
                    <td width="10%" style="text-align: left;">{{ $parte->subEspecialidad->nombre ?? null }}</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Fecha Parte</td>
                    <td width="30%" style="text-align: left;">{{ $parte->created_at->format('j \d\e F Y') }}</td>
                    <td width="10%" style="text-align: left;">Hora Parte</td>
                    <td width="10%" style="text-align: left;">{{ $parte->created_at->format('h:i A') }}</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: center;">Consentimiento</td>
                    <td width="70%" colspan="3" style="text-align: left;">{{ $parte->consentimiento == 1 ? 'SI' : 'NO' }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-bottom: 0;font-size: 11px;">
            <tbody>
                <tr>
                    <td colspan="6" style="text-align: center;">Procedimiento</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Tipo Cirugía:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->cirugiaTipo->nombre }}</td>
                    <td width="10%" style="text-align: left;">Anestesia:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->anestesia_sugerida }}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Tiempo:</td>
                    <td width="25%" colspan="5" style="text-align: left;">{{ $parte->tiempo_quirurgico }}</td>

                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Diagnósticos:</td>
                    <td width="25%" colspan="5" style="text-align: left;">{{ $parte->diagnosticosNombres() }}</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Otro Diag:</td>
                    <td width="25%" colspan="5" style="text-align: left;">{{ $parte->otros_diagnosticos }}</td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Intervención:</td>
                    <td width="25%" colspan="3" style="text-align: left;">
                        <ul>
                            @foreach($parte->parteIntervenciones as $intervencion)
                                <li>{{ $intervencion->intervencionNew->text }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td width="10%" style="text-align: left;">Lateralidad:</td>
                    <td width="25%" style="text-align: left;">
                        <ul>
                            @foreach($parte->parteIntervenciones as $intervencion)
                                <li>{{ $intervencion->lateralidad }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td width="10%" style="text-align: left;">Otras Interv:</td>
                    <td width="25%" colspan="5" style="text-align: left;">{{ $parte->otras_intervenciones }}</td>

                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-bottom: 0;font-size: 11px;">
            <tbody>
                <tr>
                    <td colspan="6" style="text-align: center;">Requisitos</td>
                </tr>
                <tr>
                    <td width="20%" style="text-align: left;">Aislamiento:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->aislamiento ? 'SI' : 'NO' }}</td>
                    <td width="20%" style="text-align: left;">Prioridad:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->prioridad ? 'SI' : 'NO' }}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td width="20%" style="text-align: left;">Alergia Latex:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->alergia_latex ? 'SI' : 'NO' }}</td>
                    <td width="20%" style="text-align: left;">Necesidad Cama UPC:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->nececidad_cama_upc ? 'SI' : 'NO' }}</td>
                    <td width="20%" style="text-align: left;">Tipo Cama UPC:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->tipo_cama_upc }}</td>
                </tr>
                <tr>
                    <td width="20%" style="text-align: left;">Usuario Taco:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->usuario_taco ? 'SI' : 'NO' }}</td>
                    <td width="20%" style="text-align: left;">Insumos Específicos:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->insumosNombres()  }}</td>
                    <td width="20%" style="text-align: left;">Cantidad:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->insumosCantidads()  }}</td>
                </tr>
                <tr>
                    <td width="20%" style="text-align: left;">Equipo Rayos:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->equipo_rayos ? 'SI' : 'NO' }}</td>
                    <td width="20%" style="text-align: left;">Necesidad Donantes Sangre:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->necesita_donante_sangre ? 'SI' : 'NO' }}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td width="20%" style="text-align: left;">Evaluación Preanestesica:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->evaluacion_preanestesica ? 'SI' : 'NO' }}</td>
                    <td width="20%" style="text-align: left;">CMA:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->cma ? 'SI' : 'NO' }}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td width="20%" style="text-align: left;">Biopsia:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->biopsia ? $parte->biopsia : '' }}</td>
                    <td width="20%" style="text-align: left;">Examen Preoperatorio:</td>
                    <td width="25%" style="text-align: left;">{{ $parte->preoperatorio ? $parte->preoperatorio->nombre : '' }}</td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-bottom: 0;font-size: 11px;">
            <tbody>
                <tr>
                    <td style="text-align: center;">Instrumental</td>
                </tr>
                <tr>
                    <td width="100%" style="text-align: left;">{{ $parte->instrumental }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-bottom: 0;font-size: 11px;">
            <tbody>
                <tr>
                    <td style="text-align: center;">Otros Insumos</td>
                </tr>
                <tr>
                    <td width="100%" style="text-align: left;">{{ $parte->otros_insumos }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-sm table-condensed" style="width: 100%; margin-bottom: 0;font-size: 11px;">
            <tbody>
                <tr>
                    <td style="text-align: center;">Observaciones</td>
                </tr>
                <tr>
                    <td width="100%" style="text-align: left;">{{ $parte->observaciones }}</td>
                </tr>
            </tbody>
        </table>

        <!-- <table class="table table-bordered table-sm table-condensed" style="width: 50%; margin-bottom: 0; margin-top: 1rem;font-size: 11px;float: right;">
            <tbody>

                <tr>

                    <td style="text-align: left;"></td>
                </tr>
            </tbody>
        </table> -->

    </body>
</html>

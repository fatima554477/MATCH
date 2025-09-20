<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $identioficador = isset($_POST["personal_id"]) ? $_POST["personal_id"] : '';
    if ($identioficador !== '') {
        require "controladorMH.php";

        $idempermiso = $_SESSION["idempermiso"];
        $conn = $match->db();
        echo 'ROL DE TRABAJO: ' . $permiso = $conexion2->idempermiso($idempermiso, $conn);
        $queryVISTAPREV = $match->SELECT_match_xml($identioficador);
        $var_respuesta = $conexion->variablespermisos('', 'INBURSA_VERIFICAR', 'ver');

        $rowsHtml = [];
        $lastRowId = '';

        while ($row = mysqli_fetch_array($queryVISTAPREV)) {
            if ($row['TARJETA'] != 'INBURSA' && $row['TABLE_MATCH'] == 'si') {
                continue;
            }

            $idd = isset($row['idd']) ? (int) $row['idd'] : 0;
            $numeroEvento = isset($row['NUMERO_EVENTO']) ? htmlspecialchars($row['NUMERO_EVENTO'], ENT_QUOTES, 'UTF-8') : '';
            $nombreEvento = isset($row['NOMBRE_EVENTO']) ? htmlspecialchars($row['NOMBRE_EVENTO'], ENT_QUOTES, 'UTF-8') : '';
            $motivoGasto = isset($row['MOTIVO_GASTO']) ? htmlspecialchars($row['MOTIVO_GASTO'], ENT_QUOTES, 'UTF-8') : '';
            $uuid = isset($row['UUID']) ? htmlspecialchars($row['UUID'], ENT_QUOTES, 'UTF-8') : '';
            $concepto = isset($row['CONCEPTO_PROVEE']) ? htmlspecialchars($row['CONCEPTO_PROVEE'], ENT_QUOTES, 'UTF-8') : '';
            $fechaTimbrado = isset($row['fechaTimbrado']) ? htmlspecialchars($row['fechaTimbrado'], ENT_QUOTES, 'UTF-8') : '';

            $fechaTimbradoData = '';
            if (!empty($row['fechaTimbrado'])) {
                $fechaTime = strtotime($row['fechaTimbrado']);
                if ($fechaTime !== false) {
                    $fechaTimbradoData = date('Y-m-d', $fechaTime);
                }
            }

            $total = isset($row['total']) && is_numeric($row['total']) ? (float) $row['total'] : 0.0;
            $totalFormatted = '$' . number_format($total, 2, '.', ',');

            $checkboxId = 'documentos' . $idd;
            $checkboxState = $match->validaexistematch($idd, $identioficador, 'INBURSA');
            $checkboxDisabled = $match->validaexistematch3res($idd, $identioficador, $permiso, 'INBURSA', $var_respuesta);
            $checkboxAttributes = trim($checkboxState . ' ' . $checkboxDisabled);
            $matchBadge = $match->validaexistematch4($idd, 'INBURSA');
            $matchStatus = (strpos($checkboxState, 'checked') !== false) ? 'asignado' : 'sin-asignar';

            $rowsHtml[] = '<tr data-match-status="' . $matchStatus . '">' .
                '<td class="match-col-select text-center align-middle">' .
                    '<div class="form-check m-0 d-inline-flex justify-content-center">' .
                        '<input type="checkbox" class="form-check-input match-row-selector" data-row-id="' . $idd . '" aria-label="Seleccionar fila ' . $idd . '">' .
                    '</div>' .
                '</td>' .
                '<td class="match-col-id" data-value="' . $idd . '">' . $idd . '</td>' .
                '<td class="match-col-numero-evento" data-value="' . $numeroEvento . '">' . $numeroEvento . '</td>' .
                '<td class="match-col-nombre-evento" data-value="' . $nombreEvento . '">' . $nombreEvento . '</td>' .
                '<td class="match-col-motivo-gasto" data-value="' . $motivoGasto . '">' . $motivoGasto . '</td>' .
                '<td class="match-col-uuid" data-value="' . $uuid . '">' . $uuid . '</td>' .
                '<td class="match-col-descripcion" data-value="' . $concepto . '">' . $concepto . '</td>' .
                '<td class="match-col-fecha" data-raw-date="' . $fechaTimbradoData . '">' . $fechaTimbrado . '</td>' .
                '<td class="match-col-total text-end" data-raw-total="' . number_format($total, 6, '.', '') . '">' . $totalFormatted . '</td>' .
                '<td class="match-col-match text-nowrap">' .
                    '<input type="checkbox" style="width:30px; color:red;" name="documentos' . $idd . '" value="' . $idd . '" class="form-check-input" id="' . $checkboxId . '" onclick="pasarmatchdocumento(' . $idd . ',' . (int) $identioficador . ',\'INBURSA\')" ' . $checkboxAttributes . '> ' .
                    '<span class="match-status-label">' . $matchBadge . '</span>' .
                '</td>' .
            '</tr>';

            $lastRowId = (string) $idd;
        }

          $rowsHtml[] = '<tr><td colspan="10" class="text-center text-muted">No se encontraron registros.</td></tr>';
        }


        ob_start();
        ?>
        <style>
            #Listado_MATCH_documentos tbody tr.match-row-selected {
                background-color: #fff3cd;
            }

            #Listado_MATCH_documentos tbody tr.match-row-selected td {
                background-color: #fff3cd;
                transition: background-color 0.2s ease-in-out;
            }
        </style>
        <div id="mensajeMATCHAdocumentos"></div>
        <div class="card card-body mb-3 match-search-card">
            <h6 class="mb-3">BÚSQUEDA AVANZADA</h6>
            <div class="row g-2 align-items-end">
                <div class="col-sm-6 col-md-3">
                    <label for="filter-id" class="form-label mb-0 small">ID</label>
                    <input type="text" id="filter-id" class="form-control form-control-sm match-filter-input" placeholder="Buscar por ID" autocomplete="off">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-numero-evento" class="form-label mb-0 small">NÚMERO DE EVENTO</label>
                    <input type="text" id="filter-numero-evento" class="form-control form-control-sm match-filter-input" placeholder="Ej. EPC4444" autocomplete="off">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-nombre-evento" class="form-label mb-0 small">NOMBRE DEL EVENTO</label>
                    <input type="text" id="filter-nombre-evento" class="form-control form-control-sm match-filter-input" placeholder="Ej. COMIDA FIN DE AÑO" autocomplete="off">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-concepto" class="form-label mb-0 small">CONCEPTO DEL GASTO</label>
                    <input type="text" id="filter-concepto" class="form-control form-control-sm match-filter-input" placeholder="Buscar concepto" autocomplete="off">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-uuid" class="form-label mb-0 small">UUID</label>
                    <input type="text" id="filter-uuid" class="form-control form-control-sm match-filter-input" placeholder="Buscar UUID" autocomplete="off">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-descripcion" class="form-label mb-0 small">DESCRIPCIÓN</label>
                    <input type="text" id="filter-descripcion" class="form-control form-control-sm match-filter-input" placeholder="Buscar descripción" autocomplete="off">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-fecha-desde" class="form-label mb-0 small">FECHA TIMBRADO DESDE</label>
                    <input type="date" id="filter-fecha-desde" class="form-control form-control-sm match-filter-input">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-fecha-hasta" class="form-label mb-0 small">FECHA TIMBRADO HASTA</label>
                    <input type="date" id="filter-fecha-hasta" class="form-control form-control-sm match-filter-input">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-total-min" class="form-label mb-0 small">TOTAL MÍNIMO</label>
                    <input type="number" step="0.01" id="filter-total-min" class="form-control form-control-sm match-filter-input" placeholder="0.00">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-total-max" class="form-label mb-0 small">TOTAL MÁXIMO</label>
                    <input type="number" step="0.01" id="filter-total-max" class="form-control form-control-sm match-filter-input" placeholder="0.00">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="filter-match" class="form-label mb-0 small">ESTADO DE MATCH</label>
                    <select id="filter-match" class="form-select form-select-sm match-filter-input">
                        <option value="">TODOS</option>
                        <option value="asignado">ASIGNADO</option>
                        <option value="sin-asignar">SIN ASIGNAR</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3 text-sm-end">
                    <button type="button" class="btn btn-sm btn-outline-secondary mt-3 mt-sm-0" id="match-filter-clear">LIMPIAR FILTRO</button>
                </div>
            </div>
        </div>
        <form id="Listado_MATCH_documentos_form">
            <div class="table-responsive match-scroll" style="max-height:400px; overflow-y:auto;">
                <table class="table table-bordered" id="Listado_MATCH_documentos">
                    <thead class="bg-light" style="position:sticky; top:0; z-index:1;">
                        <tr class="text-center">
                            <th width="30%">id</th>
                            <th width="30%">NÚMERO DE EVENTO</th>
                            <th width="30%">NOMBRE DEL EVENTO</th>
                            <th width="30%">CONCEPTO DEL GASTO</th>
                            <th width="30%">UUID</th>
                            <th width="30%">DESCRIPCION</th>
                            <th width="30%">FECHA TIMBRADO</th>
                            <th width="30%">TOTAL</th>
                            <th width="30%">MATCH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo implode("\n", $rowsHtml); ?>
                        <tr>
                            <td width="10%"></td>
                            <td width="30%" colspan="5"></td>
                                <label></label>
                                <input type="hidden" value="<?php echo htmlspecialchars($lastRowId, ENT_QUOTES, 'UTF-8'); ?>" name="IpMATCHDOCUMENTOS" id="IpMATCHDOCUMENTOS"/>
                                <input type="hidden" value="enviarMATCHDOCUMENTOS" name="enviarMATCHDOCUMENTOS"/>
                            </td>
                            <td width="30%"></td>
                            <td width="30%"></td>
                            <td width="30%">
                                <button class="btn btn-sm btn-outline-success px-5" type="button" id="clickMATCH">GUARDAR</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <?php
        $output = ob_get_clean();
        echo $output;
    }
?>

<script>
function pasarmatchdocumento(pasardocumentomatch_id, IpMATCHDOCUMENTOS2, tarjeta) {
    var checkBox = document.getElementById('documentos' + pasardocumentomatch_id);
    var pasardocumentomatch_text = checkBox && checkBox.checked ? 'si' : 'no';

    $.ajax({
        url: 'reportes/controladorMH.php',
        method: 'POST',
        data: {
            pasardocumentomatch_id: pasardocumentomatch_id,
            pasardocumentomatch_text: pasardocumentomatch_text,
            IpMATCHDOCUMENTOS2: IpMATCHDOCUMENTOS2,
            tarjeta: tarjeta
        },
        beforeSend: function() {
            $('#mensajeMATCHAdocumentos').html('cargando');
        },
        success: function(data) {
            $('#mensajeMATCHAdocumentos').html("<span id='ACTUALIZADO' >" + data + "</span>");
            $.getScript(load3(1));
        }
    });
}

var matchHtmlDecoder = document.createElement('textarea');

function decodeMatchHtml(value) {
    if (typeof value !== 'string') {
        return value;
    }
    matchHtmlDecoder.innerHTML = value;
    return matchHtmlDecoder.value;
}

function getMatchCellValue($cell) {
    if ($cell.length === 0) {
        return '';
    }
    var dataValue = $cell.data('value');
    if (dataValue === undefined) {
        dataValue = $cell.text();
    }
    return decodeMatchHtml(dataValue);
}

function normalizeMatchValue(value) {
    if (value === undefined || value === null) {
        return '';
    }

    var normalized = value.toString().toLowerCase();
    if (typeof normalized.normalize === 'function') {
        normalized = normalized.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    return normalized.trim();
}

function parseMatchFloat(value) {
    if (typeof value === 'string') {
        value = value.replace(/[^0-9.\-]/g, '');
    }
    var parsed = parseFloat(value);
    return isNaN(parsed) ? null : parsed;
}

function parseMatchDate(value) {
    if (!value) {
        return null;
    }

    var date = new Date(value);
    if (!isNaN(date.getTime())) {
        return date;
    }

    var parts = value.split(/[\/\-]/);
    if (parts.length === 3) {
        var year = parts[0].length === 4 ? parseInt(parts[0], 10) : parseInt(parts[2], 10);
        var month = parseInt(parts[1], 10) - 1;
        var day = parts[0].length === 4 ? parseInt(parts[2], 10) : parseInt(parts[0], 10);
        var fallback = new Date(year, month, day);
        if (!isNaN(fallback.getTime())) {
            return fallback;
        }
    }

    return null;
}

function applyMatchFilters() {
    var textFilters = {
        id: normalizeMatchValue($('#filter-id').val()),
        numeroEvento: normalizeMatchValue($('#filter-numero-evento').val()),
        nombreEvento: normalizeMatchValue($('#filter-nombre-evento').val()),
        concepto: normalizeMatchValue($('#filter-concepto').val()),
        uuid: normalizeMatchValue($('#filter-uuid').val()),
        descripcion: normalizeMatchValue($('#filter-descripcion').val())
    };

    var fechaDesde = $('#filter-fecha-desde').val();
    var fechaHasta = $('#filter-fecha-hasta').val();
    var totalMin = parseMatchFloat($('#filter-total-min').val());
    var totalMax = parseMatchFloat($('#filter-total-max').val());
    var matchEstado = $('#filter-match').val();

    $('#Listado_MATCH_documentos tbody tr').each(function() {
        var $row = $(this);
        if ($row.find('.match-col-id').length === 0) {
            return;
        }

        var visible = true;

        if (visible && textFilters.id) {
            var idValue = normalizeMatchValue(getMatchCellValue($row.find('.match-col-id')));
            visible = idValue.indexOf(textFilters.id) !== -1;
        }

        if (visible && textFilters.numeroEvento) {
            var eventoValue = normalizeMatchValue(getMatchCellValue($row.find('.match-col-numero-evento')));
            visible = eventoValue.indexOf(textFilters.numeroEvento) !== -1;
        }

        if (visible && textFilters.nombreEvento) {
            var nombreValue = normalizeMatchValue(getMatchCellValue($row.find('.match-col-nombre-evento')));
            visible = nombreValue.indexOf(textFilters.nombreEvento) !== -1;
        }

        if (visible && textFilters.concepto) {
            var conceptoValue = normalizeMatchValue(getMatchCellValue($row.find('.match-col-motivo-gasto')));
            visible = conceptoValue.indexOf(textFilters.concepto) !== -1;
        }

        if (visible && textFilters.uuid) {
            var uuidValue = normalizeMatchValue(getMatchCellValue($row.find('.match-col-uuid')));
            visible = uuidValue.indexOf(textFilters.uuid) !== -1;
        }

        if (visible && textFilters.descripcion) {
            var descripcionValue = normalizeMatchValue(getMatchCellValue($row.find('.match-col-descripcion')));
            visible = descripcionValue.indexOf(textFilters.descripcion) !== -1;
        }

        if (visible && (fechaDesde || fechaHasta)) {
            var rowFecha = $row.find('.match-col-fecha').data('raw-date');
            var rowDateObj = parseMatchDate(rowFecha);
            var desdeDate = parseMatchDate(fechaDesde);
            var hastaDate = parseMatchDate(fechaHasta);

            if (rowDateObj === null && (desdeDate || hastaDate)) {
                visible = false;
            } else {
                if (visible && desdeDate && rowDateObj && rowDateObj < desdeDate) {
                    visible = false;
                }
                if (visible && hastaDate && rowDateObj && rowDateObj > hastaDate) {
                    visible = false;
                }
            }
        }

        if (visible && (totalMin !== null || totalMax !== null)) {
            var rowTotal = parseMatchFloat($row.find('.match-col-total').data('raw-total'));
            if (rowTotal === null) {
                visible = false;
            } else {
                if (visible && totalMin !== null && rowTotal < totalMin) {
                    visible = false;
                }
                if (visible && totalMax !== null && rowTotal > totalMax) {
                    visible = false;
                }
            }
        }

        if (visible && matchEstado) {
            visible = $row.data('match-status') === matchEstado;
        }

        $row.toggle(visible);
    });
}

$(document).ready(function() {
    if ($.fn.draggable) {
        $('#dataModal4')
            .on('shown.bs.modal', function () {
                var $dialog = $(this).find('.modal-dialog');
                if (!$dialog.hasClass('ui-draggable')) {
                    $dialog.draggable({
                        handle: '.modal-header',
                        containment: 'window'
                    });
                }
                $dialog.css({
                    top: 0,
                    left: 0,
                    transform: 'none'
                });
                $(this).find('.modal-header').css('cursor', 'move');
            })
            .on('hidden.bs.modal', function () {
                var $dialog = $(this).find('.modal-dialog');
                if ($dialog.hasClass('ui-draggable')) {
                    $dialog.draggable('destroy');
                }
                $dialog.css({
                    top: '',
                    left: '',
                    transform: ''
                });
                $(this).find('.modal-header').css('cursor', '');
            });
    }

    $('#clickMATCH').click(function() {
        $.ajax({
            url: 'reportes/controladorMH.php',
            method: 'POST',
            data: $('#Listado_MATCH_documentos_form').serialize(),
            beforeSend: function() {
                $('#mensajeMATCHAdocumentos').html('cargando');
            },
            success: function(data) {
                $('#dataModal4').modal('hide');
                $.getScript(load3(1));
            }
        });
    });

    $('#Listado_MATCH_documentos').on('change', '.match-row-selector', function() {
        var $row = $(this).closest('tr');
        $row.toggleClass('match-row-selected', this.checked);
    });

    $('#Listado_MATCH_documentos .match-row-selector:checked').each(function() {
        $(this).closest('tr').addClass('match-row-selected');
    });

    $('.match-filter-input').on('keyup change', function() {
        applyMatchFilters();
    });

    $('#match-filter-clear').on('click', function() {
        $('.match-filter-input').each(function() {
            if (this.tagName === 'SELECT') {
                this.selectedIndex = 0;
            } else {
                $(this).val('');
            }
        });
        applyMatchFilters();
    });
});
</script>
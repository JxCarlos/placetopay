@extends('layout.app')
@section('contenido')

    @if($mensaje != null)

        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$mensaje}}
        </div>

    @endif

<h1>Consultar transaccion</h1><hr><br>

<div class="form-inline">
<a href="/placetopay/create" class="btn btn-danger">Crear credito</a>
</div>
<hr>

    <div class="form-inline">
        {!! Form::open(['route'=>'consultar','method'=> 'POST','autocomplete'=> 'off','id'=>'form-consultar']) !!}
        <div class="form-group">
            <label>ID de transaccion:</label>
            <input name="id" class="form-control">
        </div>
        <button type="submit" class="btn btn-consultar btn-primary">Consultar</button>
        {!! Form::close() !!}
        <br>

    </div>
    <div class="hidden" id="datos">
        <div class="form-group">
            <label>Estado de la Transacción</label>
            <br>
            <label style="font-weight: 700; color: #5cb85c; font-size: 2em;" id="estado_transaccion"></label>
        </div>
        <div class="form-group">
            <label>Transaction ID:</label>
            <label style="font-weight: 100" id="transactionState"></label>
        </div>
        <div class="form-group">
            <label>Session ID: </label>
            <label style="font-weight: 100" id="sessionID"></label>
        </div>
        <div class="form-group">
            <label>Reference: </label>
            <label style="font-weight: 100" id="reference"></label>
        </div>
    </div>

    <div>

    </div>

@endsection

@push('script')

<script>


    $('#form-consultar').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{url('consultar')}}',
            data: $(this).serialize(),
            success: function (data) {
                $('#datos').removeClass('hidden');

//                if (data.transactionState==='NOT_AUTHORIZED') {
//                    $('#estado_transaccion').text('No Autorizado')
//                }else if (data.transactionState==='NOT_AUTHORIZED'){
//                    $('#estado_transaccion').text('No Autorizado')
//                }
                $('#estado_transaccion').text(data.returnCode)
                $('#transactionState').text(data.transactionID);
                $('#sessionID').text(data.sessionID);
                $('#reference').text(data.reference);

                console.log(data.transactionID+' - '+data.sessionID+' - '+data.reference);
            }
        });
    });


</script>

@endpush
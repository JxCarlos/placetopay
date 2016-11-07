@extends('layout.app')
@section('contenido')
    <h1>Credito</h1>
    <br>
    {!! Form::open(['route'=>'placetopay.store','method'=> 'POST','autocomplete'=> 'off']) !!}
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" class="form-control" placeholder="Ingresar los nombres del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Apellidos:</label>
                    <input name="apellido" class="form-control" placeholder="Ingresar los apellidos del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Tipo de documento:</label>
                    <select name="tipo_doc" class="form-control" required>
                        <option value="CC">Cédula de ciudanía colombiana</option>
                        <option value="CE">Cédula de extranjería</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="PPN">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Numero del documento:</label>
                    <input name="num_doc" class="form-control" placeholder="Ingresar documento del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Empresa:</label>
                    <input name="empresa" class="form-control" placeholder="Ingresar la empresa donde trabaja el cliente" required/>
                </div>
                <div class="form-group">
                    <label>Correo eléctronico:</label>
                    <input name="correo" class="form-control" placeholder="Ingresar correo electronico del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Ciudad:</label>
                    <input  name="ciudad" class="form-control" placeholder="Ingresar ciudad residencial del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Departamento:</label>
                    <input name="departamento" class="form-control" placeholder="Ingresar departamento del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Codigo postal del país:</label>
                    <input name="cod_pais" class="form-control" placeholder="Ingresar codigo del país" required/>
                </div>
                <div class="form-group">
                    <label>Direccion:</label>
                    <input  name="direccion" class="form-control" placeholder="Ingresar la direccion del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input name="telefono" class="form-control" placeholder="Ingresar numero de teléfono del cliente" required/>
                </div>
                <div class="form-group">
                    <label>Celular:</label>
                    <input name="celular" class="form-control" placeholder="Ingresar numero de celular cliente" required/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select name="interfaz" class="form-control" required>
                        <option value="0">Persona</option>
                        <option value="1">Empresa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>URL:</label>
                    <input class="form-control"name="url" placeholder="URL de retorno" required/>
                </div>
                <div class="form-group">
                    <label>Referencia:</label>
                    <input class="form-control" name="referencia" placeholder="Ingresar referencia del credito" required/>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <textarea name="descripcion" class="form-control" placeholder="Ingresar la descripción del credito" required></textarea>
                </div>
                <div class="form-group">
                    <label >Lenguaje formato ISO:</label>
                    <input name="lenguaje" class="form-control"  placeholder="Lenguaje en formato ISO (mayuscula)" required/>
                </div>
                <div class="form-group">
                    <label>Banco:</label>
                    <select name="banco" class="form-control" required>
                        @foreach($bancos['item'] as $k=> $v)
                            @foreach($v as $key=>$value)
                                @if($key==="bankCode")
                                    <option value="{{$value}}">
                                        @elseif($key==="bankName")
                                            {{$value}}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Moneda en formato ISO:</label>
                    <input name="moneda" class="form-control" placeholder="Ingresar tipo de moneda" required/>
                </div>
                <div class="form-group">
                    <label>Valor a recaudar:</label>
                    <input name="valor" class="form-control" placeholder="Ingresar monto" required/>
                </div>
                <div class="form-group">
                    <label >Tasa de impuesto:</label>
                    <input name="impuesto" class="form-control" placeholder="Ingresar impuestos" required/>
                </div>
                <div class="form-group">
                    <label>Tasa de devolución:</label>
                    <input name="devolucion" class="form-control" placeholder="Ingresar base de devolución" required/>
                </div>
                <div class="form-group">
                    <label>Propina:</label>
                    <input name="propina" class="form-control" placeholder="Ingresar propina" required/>
                </div>
            </div>

        </div>
        <div align="center">
            <button class="btn btn-primary"> Aceptar</button>
        </div>
    </div>

    {!! Form::close() !!}


@endsection
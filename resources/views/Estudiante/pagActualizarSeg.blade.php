@extends('pagPlantilla')

@section('titulo')
  <h1 class="display-4">Pagina actualizar seguimiento</h1>
@endsection

@section('seccion')

  @if(session('msj'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('msj') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
    </div>
  @endif

  <form action="{{ route('Estudiante.xUpdateSeg', $xActAluSeg->id) }}" method="POST">
    @method('PUT')
    @csrf

    @error('idEst')
      <div class="alert alert-danger">
        El idEst es requerido,
      </div>
    @enderror

    @error('ofiAct')
      <div class="alert alert-danger">
        El oficio actual es requerido,
      </div>
    @enderror

    <input type="text" name="idEst" value="{{ $xActAluSeg->idEst }}" placeholder="Código" class="form-control mb-2">
    <select name="traAct" class="form-control mb-2">
      <option value="">Seleccione... trabaja actualmente?...</option>
      <option value="SI" @if ($xActAluSeg->traAct == 'SI') {{ "SELECTED" }} @endif >Si trabajo</option>
      <option value="NO" @if ($xActAluSeg->traAct == 'NO') {{ "SELECTED" }} @endif >No trabajo</option>
    </select>

    <select name="ofiAct" class="form-control mb-2">
      <option value="">Seleccione...oficio actual?</option>
      <option value="1cp" @if ($xActAluSeg->ofiAct == '1cp') {{ "SELECTED" }} @endif >Relacionado a contabilidad</option>
      <option value="2cp" @if ($xActAluSeg->ofiAct == '2cp') {{ "SELECTED" }} @endif >Relacionado a administración</option>
      <option value="3cp" @if ($xActAluSeg->ofiAct == '3cp') {{ "SELECTED" }} @endif >Relacionado a mecanica automotriz</option>
      <option value="4cp" @if ($xActAluSeg->ofiAct == '4cp') {{ "SELECTED" }} @endif >Relacionado a mecanica producción</option>
      <option value="5cp" @if ($xActAluSeg->ofiAct == '5cp') {{ "SELECTED" }} @endif >Relacionado a 5cp</option>
      <option value="6cp" @if ($xActAluSeg->ofiAct == '6cp') {{ "SELECTED" }} @endif >Relacionado a 6cp</option>
      <option value="7cp" @if ($xActAluSeg->ofiAct == '7cp') {{ "SELECTED" }} @endif >Relacionado a computación e informatica</option>
      <option value="8cp" @if ($xActAluSeg->ofiAct == '8cp') {{ "SELECTED" }} @endif >Relacionado a 8cp</option>
      <option value="9cp" @if ($xActAluSeg->ofiAct == '9cp') {{ "SELECTED" }} @endif >Relacionado a 9cp</option>
      <option value="10cp" @if ($xActAluSeg->ofiAct == '10cp') {{ "SELECTED" }} @endif >Relacionado a 10cp</option>
      <option value="11cp" @if ($xActAluSeg->ofiAct == '11cp') {{ "SELECTED" }} @endif >Relacionado a 11cp</option>
    </select>
    
    <select name="satEst" class="form-control mb-2">
      <option value="" >Seleccione satisfacción del egresado...</option>
      <option value="0" @if ($xActAluSeg->satEst == '0') {{ "SELECTED" }} @endif >No estoy satisfecho</option>
      <option value="1" @if ($xActAluSeg->satEst == '1') {{ "SELECTED" }} @endif >Regular</option>
      <option value="2" @if ($xActAluSeg->satEst == '2') {{ "SELECTED" }} @endif >Bueno</option>
      <option value="3" @if ($xActAluSeg->satEst == '3') {{ "SELECTED" }} @endif >Muy bueno</option>
    </select>

    <input type="date" name="fecSeg" value="{{ old('fecSeg') }}" placeholder="Fecha Nac." class="form-control mb-2">
    
    <select name="estSeg" class="form-control mb-2">
      <option value="">Seleccione... estado de matricula?</option>
      <option value="0" @if ($xActAluSeg->estSeg == '0') {{ "SELECTED" }} @endif >Inactivo</option>
      <option value="1" @if ($xActAluSeg->estSeg == '1') {{ "SELECTED" }} @endif >Activo</option>
    </select>

    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
  </form>
 
@endsection
@extends('pagPlantilla')

@section('titulo')
  <h1 class="display-4">Pagina Seguimiento - Evaluación 3</h1>
@endsection

@section('seccion')

  @if(session('msj'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('msj') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
    </div>
  @endif

  <form action="{{ route('Estudiante.xRegistrarSeguimiento') }}" method="POST"> <!--  -->
    @csrf

    @error('idEst')
      <div class="alert alert-danger">
        El código idEst es necesario,
      </div>
    @enderror
    
    @error('traAct')
      <div class="alert alert-danger">
        El trabajo actual es necesario,
      </div>
    @enderror

    @error('ofiAct')
      <div class="alert alert-danger">
        El oficio actual es necesario,
      </div>
    @enderror
    
    @error('satEst')
      <div class="alert alert-danger">
        Satisfacción del estudiante es necesario,
      </div>
    @enderror

    @error('fecSeg')
      <div class="alert alert-danger">
        Fecha seguimiento es necesario,
      </div>
    @enderror

    @error('estSeg')
      <div class="alert alert-danger">
        Estado seguimiento es necesario,
      </div>
    @enderror

    <input type="text" name="idEst" value="{{ old('codEst') }}" placeholder="Código" class="form-control mb-2">
    <select name="traAct" class="form-control mb-2">
      <option value="">Seleccione... trabaja actualmente?...</option>
      <option value="SI">Si trabajo</option>
      <option value="NO">No trabajo</option>
    </select>
    <select name="ofiAct" class="form-control mb-2">
      <option value="">Seleccione...oficio actual?</option>
      <option value="1cp">Relacionado a contabilidad</option>
      <option value="2cp">Relacionado a administración</option>
      <option value="3cp">Relacionado a mecanica automotriz</option>
      <option value="4cp">Relacionado a mecanica producción</option>
      <option value="5cp">Relacionado a 5cp</option>
      <option value="6cp">Relacionado a 6cp</option>
      <option value="7cp">Relacionado a computación e informatica</option>
      <option value="8cp">Relacionado a 8cp</option>
      <option value="9cp">Relacionado a 9cp</option>
      <option value="10cp">Relacionado a 10cp</option>
      <option value="11cp">Relacionado a 11cp</option>
    </select>
    <select name="satEst" class="form-control mb-2">
      <option value="">Seleccione satisfacción del egresado...</option>
      <option value="0">No estoy satisfecho</option>
      <option value="1">Regular</option>
      <option value="2">Bueno</option>
      <option value="3">Muy bueno</option>
    </select>
    <input type="date" name="fecSeg" value="{{ old('fecSeg') }}" placeholder="Fecha Nac." class="form-control mb-2">
    <select name="estSeg" class="form-control mb-2">
      <option value="">Seleccione... estado de matricula?</option>
      <option value="0">Inactivo</option>
      <option value="1">Activo</option>
    </select>

    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
  </form>
  <br />

  <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimiento</div>
  <br />

  <table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Codigo</th>
        <th scope="col">Oficio actual</th>
        <th scope="col">Edición</th>
      </tr>
    </thead>

    @foreach($xAluSeg as $item)
    
    <tbody>
      <tr>
        <th scope="row">{{ $item ->id }}</th>
        <td>{{ $item ->idEst }}</td>
        <td>
          <a href="{{ route('Estudiante.xDetalleSeg', $item->id ) }}">
            {{ $item ->ofiAct }}
          </a>
        </td>
        <td>
          <form action="{{ route('Estudiante.xEliminarSeg', $item->id) }}" method="post" class="d-inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">x</button>
          </form>
          
          <a href="{{ route('Estudiante.xActualizarSeg', $item->id ) }}" class="btn btn-warning btn-sm">
            ...A 
          </a>
        </td>
      </tr>
    </tbody>

    @endforeach

  </table>
 
@endsection
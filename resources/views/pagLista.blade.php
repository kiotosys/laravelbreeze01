@extends('pagPlantilla')

@section('titulo')
  <h1 class="display-4">Pagina Lista</h1>
@endsection

@section('seccion')

  @if(session('msj'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('msj') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
    </div>
  @endif

  <form action="{{ route('Estudiante.xRegistrar') }}" method="POST">
    @csrf

    @error('codEst')
      <div class="alert alert-danger">
        El código es requerido,
      </div>
    @enderror
 
    @error('nomEst')
      <div class="alert alert-danger">
        El nombre es requerido,
      </div>
    @enderror

    <input type="text" name="codEst" placeholder="Código" class="form-control mb-2">
    <input type="text" name="nomEst" placeholder="Nombres" class="form-control mb-2">
    <input type="text" name="apeEst" placeholder="Apellidos" class="form-control mb-2">
    <input type="date" name="fnaEst" placeholder="Fecha Nac." class="form-control mb-2">

    <select name="turMat" class="form-control mb-2">
      <option name="">Seleccione...</option>
      <option name="1">Turno Día</option>
      <option name="2">Turno Noche</option>
      <option name="3">Turno Tarde</option>
    </select>

    <select name="semMat" class="form-control mb-2">
      <option name="">Seleccione...</option>
        @for($i=1; $i < 7; $i++)
          <option name="{{$i}}">Semestre {{$i}}</option>
        @endfor
    </select>

    <select name="estMat" class="form-control mb-2">
      <option name="">Seleccione...</option>
      <option name="0">Inactivo</option>
      <option name="1">Activo</option>
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
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>

    @foreach($xAlumnos as $item)
    
    <tbody>
      <tr>
        <th scope="row">{{ $item ->id }}</th>
        <td>{{ $item ->codEst }}</td>
        <td>
          <a href="{{ route('Estudiante.xDetalle', $item->id ) }}">
            {{ $item ->apeEst }}, {{ $item ->nomEst }}
          </a>
        </td>
        <td> A    ----     x </td>
      </tr>
    </tbody>

    @endforeach

  </table>
 
@endsection
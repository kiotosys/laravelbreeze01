@extends('pagPlantilla')

@section('titulo')
  <h1>Pagina Lista</h1>
@endsection

@section('seccion')
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
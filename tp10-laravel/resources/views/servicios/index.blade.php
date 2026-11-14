@extends('layouts.app')

@section('title', 'Gestión de Servicios | SIS Seguridad Electrónica')

@section('content')
      <section class="page-hero">
        <div class="container">
          <h1>Gestión de Servicios</h1>
          <p>Administración del catálogo de servicios de seguridad electrónica (Laravel).</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold">Listado de Servicios</h2>
            <a class="btn btn-sis" href="{{ route('servicios.create') }}">
              <i class="bi bi-plus-lg me-2"></i>Nuevo Servicio
            </a>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($servicio->descripcion, 60) }}</td>
                        <td>{{ $servicio->imagen ?? '—' }}</td>
                        <td>
                            <a href="{{ route('servicios.show', $servicio) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <p class="lead-muted mb-0">No hay servicios registrados.</p>
                            <a href="{{ route('servicios.create') }}" class="btn btn-sis">Crear primer servicio</a>
                        </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿Necesitas ayuda con los servicios?</h2>
          <a class="btn btn-sis" href="{{ route('servicios.create') }}">Agregar servicio</a>
        </div>
      </section>
@endsection

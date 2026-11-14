@extends('layouts.app')

@section('title', 'Editar Servicio | SIS Seguridad Electrónica')

@section('content')
      <section class="page-hero">
        <div class="container">
          <h1>Editar Servicio #{{ $servicio->id }}</h1>
          <p>Modifica los datos del servicio.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Datos del Servicio</h2>

                <form action="{{ route('servicios.update', $servicio) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre del servicio</label>
                    <input
                      class="form-control @error('nombre') is-invalid @enderror"
                      id="nombre" name="nombre" type="text"
                      placeholder="Ej. Cámaras de Seguridad"
                      value="{{ old('nombre', $servicio->nombre) }}" required
                    />
                    @error('nombre')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="descripcion">Descripción</label>
                    <textarea
                      class="form-control @error('descripcion') is-invalid @enderror"
                      id="descripcion" name="descripcion" rows="4"
                      placeholder="Describí el servicio..."
                    >{{ old('descripcion', $servicio->descripcion) }}</textarea>
                    @error('descripcion')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="imagen">Imagen (nombre de archivo)</label>
                    <input
                      class="form-control @error('imagen') is-invalid @enderror"
                      id="imagen" name="imagen" type="text"
                      placeholder="Ej: camara.webp"
                      value="{{ old('imagen', $servicio->imagen) }}"
                    />
                    @error('imagen')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="d-flex gap-2">
                    <button class="btn btn-sis flex-grow-1" type="submit">
                      <i class="bi bi-check-lg me-2"></i>Actualizar Servicio
                    </button>
                    <a class="btn btn-sis-outline flex-grow-1" href="{{ route('servicios.index') }}">Cancelar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

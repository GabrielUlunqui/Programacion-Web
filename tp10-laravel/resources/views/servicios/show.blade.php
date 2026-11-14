@extends('layouts.app')

@section('title', 'Servicio | SIS Seguridad Electrónica')

@section('content')
      <section class="page-hero">
        <div class="container">
          <h1>{{ $servicio->nombre }}</h1>
          <p>Detalle del servicio #{{ $servicio->id }}.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Datos del Servicio</h2>

                <dl class="row">
                  <dt class="col-sm-3">ID</dt>
                  <dd class="col-sm-9">{{ $servicio->id }}</dd>

                  <dt class="col-sm-3">Nombre</dt>
                  <dd class="col-sm-9">{{ $servicio->nombre }}</dd>

                  <dt class="col-sm-3">Descripción</dt>
                  <dd class="col-sm-9">{{ $servicio->descripcion ?? '—' }}</dd>

                  <dt class="col-sm-3">Imagen</dt>
                  <dd class="col-sm-9">{{ $servicio->imagen ?? '—' }}</dd>

                  <dt class="col-sm-3">Creado</dt>
                  <dd class="col-sm-9">{{ $servicio->created_at->format('d/m/Y H:i') }}</dd>
                </dl>

                <div class="d-flex gap-2">
                  <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-sis flex-grow-1">
                    <i class="bi bi-pencil me-2"></i>Editar
                  </a>
                  <a href="{{ route('servicios.index') }}" class="btn btn-sis-outline flex-grow-1">Volver</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

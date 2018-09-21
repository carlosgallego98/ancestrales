@extends('layouts.app')

@section('conteinido')
<div class="container">
    <body>
        <div class="aviso">
            <h2>Sitio web en Construcción...</h2>
        </div>
    </body>
</div>
@endsection

@push('styles')
<style>
  .aviso{
    padding-top: 15%;
    text-align: center;
  }
</style>
@endpush

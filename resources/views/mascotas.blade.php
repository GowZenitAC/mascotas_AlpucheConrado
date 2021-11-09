@extends('layout.master')
@section('titulo','CRUD MASCOTAS')
@section('contenido')
    <h1>Hola Mundo</h1>
@endsection

@push('scripts')
<script src="{{asset('js/apis/mascotas.js')}}"></script>
@endpush
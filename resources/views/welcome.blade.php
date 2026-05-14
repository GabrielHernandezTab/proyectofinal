@extends('layout')
@section('titulo', 'GeN Trading')
@section('contenido')

@if(session('cuenta_eliminada'))
<div id="toast-cuenta-eliminada"
     style="position:fixed; bottom:2rem; left:50%; transform:translateX(-50%); z-index:9999;
            background:#1a1a2e; color:#fff; padding:1rem 2rem; border-radius:12px;
            box-shadow:0 4px 24px rgba(0,0,0,0.4); display:flex; align-items:center; gap:0.75rem;
            font-size:0.95rem; font-weight:500; opacity:1; transition:opacity 0.5s;">
    <span style="font-size:1.3rem;">✓</span>
    Tu cuenta ha sido eliminada correctamente.
</div>
<script>
    setTimeout(function() {
        var t = document.getElementById('toast-cuenta-eliminada');
        if(t) { t.style.opacity = '0'; setTimeout(() => t.remove(), 500); }
    }, 4000);
</script>
@endif

    <portada-section></portada-section>

    <div style="background-color: white; height: 100px; width: 100%;"></div>

    <caracteristicas-section></caracteristicas-section>

    <div style="background-color: white; height: 100px; width: 100%;"></div>

    <elegirnos-section></elegirnos-section>

    <div style="background-color: white; height: 100px; width: 100%;"></div>

    <planes-section></planes-section>

    <div style="background-color: white; height: 100px; width: 100%;"></div>

    <donaciones-section></donaciones-section>

    <div style="background-color: white; height: 100px; width: 100%;"></div>

    <anuncios-section></anuncios-section>

    <div style="background-color: white; height: 100px; width: 100%;"></div>

    <footer-section></footer-section>

@endsection
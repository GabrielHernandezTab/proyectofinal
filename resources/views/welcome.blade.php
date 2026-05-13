@extends('layout')
@section('titulo', 'GeN Trading')
@section('contenido')

<div id="test-vue" style="padding: 100px; text-align: center; font-size: 2rem;">
    Cargando Vue...
</div>

<script>
window.addEventListener('load', function() {
    setTimeout(function() {
        var el = document.getElementById('test-vue');
        var appEl = document.getElementById('app');
        if (appEl && appEl.__vue_app__) {
            el.innerHTML = '✅ Vue está funcionando';
            el.style.color = 'green';
        } else {
            el.innerHTML = '❌ Vue NO está montado - Error en JS';
            el.style.color = 'red';
        }
    }, 3000);
});
</script>

@endsection
@extends('layouts.app')

@section('content')
<body>
<style>
    canvas.drawing, canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }

</style>

	
    <div id="scanner-container"></div>
	<input type="button" class="btn btn-primary" id="start" value="Skeniraj" >
	<input type="button" class="btn btn-primary" id="stop" value="Stop">
    <input type="button" class="btn btn-primary" id="button" value="Zaduzi paket">


	<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('js/quagga.js')}}"></script>

    <script src="{{asset('js/script.js')}}"></script>
@endsection
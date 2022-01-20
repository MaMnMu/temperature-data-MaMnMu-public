@extends('master')
@section('content')<div>
<div>
            <table id="tablafinal" border="1">
                <caption>Temperaturas anuales</caption>
                <thead>
                    <tr>
                        <th></th>
                        <th>Mínimo</th>
                        <th>Máximo</th>
                        <th>Media</th>
                    </tr>
                </thead>
                @foreach ($arranual as $ciudad => $temps)
                <tbody>
                    <tr>
                        <th>{{$ciudad}}</th>
                        @foreach ($temps as $minmaxmed => $valor) 
                        <td>{{$valor}}</td>
                        @endforeach
                    </tr>
                </tbody>
                @endforeach
            </table>
</div>
@endsection
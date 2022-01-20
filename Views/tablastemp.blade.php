@extends('master')
@section('content')
<div>
    <form name="formulario2" action="tablasfinal.php" method="POST">
        <div>
            @foreach ($arrtotal as $ciudad => $arrmeses)
            <table border="1">
                <caption>Temperaturas mensuales de {{$ciudad}}</caption>
                <thead>
                    <tr>
                        <th></th>
                        <th>Mínimo</th>
                        <th>Máximo</th>
                    </tr>
                </thead>
                @foreach ($arrmeses as $mes => $arrtemp)
                <tbody>
                    <tr>
                        <th>{{$mes}}</th>
                        @foreach ($arrtemp as $minmax => $temp)
                        <td><input type="number" name="arrtotal[{{$ciudad}}][{{$mes}}][{{$minmax}}]" value="{{$temp}}" /></td>
                        @endforeach
                    </tr>
                </tbody>
                @endforeach
            </table>
            @endforeach
        </div>
        <div id="btncentro">
            <input type="submit" value="Confirmar temperaturas" name="confirmartemp">
        </div>
    </form>
</div>
@endsection

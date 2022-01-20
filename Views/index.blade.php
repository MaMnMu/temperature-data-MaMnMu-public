@extends('master')
@section('content')
            <form id="form1" name="formulario" action="tablastemp.php" method="POST">
                    <div>    
                        <label for="ciudades">Introduzca el nombre de las ciudades:</label><br> 
                        <input id="ciudades" type="text" name="ciudades" size="50" required />
                    </div>
                    <div>
                        <input class="submit" type="submit" value="Mostrar temperaturas" name="mostrartemp">
                    </div>
                </div>
            </form>
@endsection


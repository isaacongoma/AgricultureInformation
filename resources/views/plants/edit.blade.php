<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Edit</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Editar Plantas</h1>
    <div class="container">
        <form method="post" action="/plants/{{$plant->id}}}" class="form-horizontal" id="form_plants">
            @method('PUT')
            @csrf

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="name" class="control-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$plant->name}}">
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="description" class="control-label">Descripcion:</label>
                    <input type="text"  id="description" name="description" class="form-control" value="{{$plant->description}}">
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="enfermedades" class="control-label">Enfermedades:</label>
                    <input type="text"  id="enfermedades" name="enfermedades" class="form-control" value="{{$plant->enfermedad}}">
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="plague" class="control-label">Plagas:</label>
                    <input type="text"  id="plague" name="plague" class="form-control" value="{{$plant->plaga}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="imagen" class="control-label">
                        <img src={{isset($plant->photo) ? url($plant->photo) : "https://informesinbandera.com/img/placeholder-img.png"}} alt="" width="150px"><br>
                        Imagen anterior <br>
                        Cambiar URL O Direccion De La Imagen:

                    </label>
                    <input type="text" name="imagen" id="imagen" class="form-control">
                </div>
            </div>
            <input type="submit" name="enviar" id="btn_enviar" value="Guardar" class="btn-success">
        </form>
    </div>
</div>

</body>
</html>

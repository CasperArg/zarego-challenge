<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Muli:100,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/main.css">
  <title>Document</title>
</head>
<body>
  <div class="main-wrapper">
      
    <div class="img-logo">
      <img src="http://prospects.cabify.zarego.com/img/logo.png">
    </div>

  @if (isset($success))
    @if ($success == true)
      <h2 class="success-title">Gracias!</h2>

      @if ($isnew === true)
        <p class="success-p">Siga las instrucciones del mail enviado para instalar nuestra app.</p>
      @else
        <p class="success-p">Ya se encontraba registrado con anterioridad.</p>
      @endif

      @else 
      <h2 class="success-title">Ups!</h2>
      <p class="success-p">Ha ocurrido un error. Vuelva a intentarlo más tarde.</p>
      @endif
      
      <a class="success-return-btn" href="/"><button class="confirm-btn">Home</button></a>
    
  @else
    <form action="/prospects" method="POST" novalidate>

    {{ csrf_field() }}
    {{method_field('POST')}}

      <div class="form-wrapper">
        <div class="row row1">
          <div class="input-item item-name">
            <label for="name">Nombre</label>
            <input type="text" name="name" placeholder="Ingrese el nombre" value="{{old('name')}}">
            {!! $errors->first('name', '<p class="input-warning">:message</p>') !!} 
            
          </div>
          <div class="input-item item-lastname">
            <label for="lastname">Apellido</label>
            <input type="text" name="lastname" placeholder="Ingrese el apellido" value="{{old('lastname')}}">
            {!! $errors->first('lastname', '<p class="input-warning">:message</p>') !!} 
          </div>
        </div>
        <div class="row row2">
          <div class="input-item item-email">
            <label for="email">Mail</label>
            <input type="email" name="email" placeholder="Ingrese el mail">
            {!! $errors->first('email', '<p class="input-warning">:message</p>') !!} 
          </div>
        </div>
        <div class="row row3">
          <input class="confirm-btn" type="submit" value="Enviar">
        </div>
    
      </div>

    </form>
  @endif
  
  </div>
</body>
</html>

<?php   
    function GetConnection() {
        $mysqli = new mysqli("localhost", "root", "", "proginternet");
        if ($mysqli->connect_errno) {
            echo 'Falló al conectar base de datos <br/>';
        }
        return $mysqli;
    }
    if(count($_POST) > 0) {
        $connection = GetConnection();
        $mysqli->real_query("SELECT * FROM usuarios");
        $resultado = $mysqli->use_result();
        while($fila = $resultado->fetch_assoc()) {
            echo $fila . '<br/>';
        }
        echo "Estos son los datos recibidos";

        echo "<br/>";
    }
    foreach($_POST as $key => $value) {
        echo "Clave: $key; Value: $value <br/>";
    }
    $meta = ''; 
    if (isset($_POST['Meta'])) {
        $meta = $_POST['Meta'];
    } else {
    }
            
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
    <h1>Contacto</h1>
    <form action='./form.php' method='POST'>
        <div>
            <label for='Meta'>Meta</label>
            <?php
                echo "<input type='text' value='$meta '  name='Meta' id='Meta'/>";
            ?>
        </div>
        <div>
            <label for='Descripcion'>Descripción</label>
            <textarea id='Descripcion' name='Descripcion'>

            </textarea>
        </div>
        <div>
            <label for='Plazo'>Plazo</label>
            <select id='Plazo' name='Plazo'>
                <option value='1'>1</option>
                <option value='3'>3</option>
                <option value='5'>5</option>
                <option value='10'>10</option>
            </select>
        </div>
        <div>
            <label>Urgencia:</label>
            <label for='indispensable'>Indispensable: </label>
            <input type='radio' name='urgencia' value='Indispensable' id='indispensable'/>
            <label for='no-indispensable'>Puedo vivir sin ello: </label>
            <input type='radio' name='urgencia' value='Puedo vivir sin ello' id='no-indispensable'/>
        </div>
        <div>
            <label>Puedo realizarlo</label>
            <br>
            <label for='antes'>Antes de la carrera: </label>
            <input type='checkbox' id='antes' name='antes' />

            <label for='durante'>Durante la carrera: </label>
            <input type='checkbox' id='durante' name='durante' />

            <label for='despues'>Después de la carrera: </label>
            <input type='checkbox' id='despues' name='despues'/>
        </div>
        <div>
            <label for='pass'>Contraseña</label>
            <input id='pass' name='contra' type='password'/>
            <button type='button' id='showHidePass'>Mostrar/Ocultar</button>
        </div>
        <div>
            <input type='hidden' name='codigo' value='2182'>
        </div>
        <button type='submit'>Crear meta</button>
    </form>
    <a href='index.html'>Regresar</a>
    <script>
        const passInput = document.getElementById('pass');
        const btn = document.getElementById('showHidePass');
        btn.addEventListener('click', () => {
            if (passInput.getAttribute('type') === 'password') {
                passInput.setAttribute('type', 'text');
            } else {
                passInput.setAttribute('type', 'password');
            }
        });
    </script>
    <div>
        
    </div>
    
</body>
</html>
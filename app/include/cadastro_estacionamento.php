<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Cadastro do estacionamento</h1>
    <form action="../estacionamento/gEstacionamento.php" method="post">


        <select name="idEstacionamento">
            <optgroup label="Escolha a vaga">
                <option value=1>Vaga 1</option>
                <option value=2>Vaga 2 </option>
                <option value=3>Vaga 3 </option>
                <option value=4>Vaga 4 </option>
                <option value=5>Vaga 5 </option>
                <option value=6>Vaga 6 </option>
                <option value=7>Vaga 7</option>
                <option value=8>Vaga 8 </option>
                <option value=9>Vaga 9</option>
                <option value=10>Vaga 10</option>
                <option value=11>Vaga 11 </option>
                <option value=12>Vaga 12 </option>
                <option value=13>Vaga 13 </option>
            </optgroup>
        </select>
        <br />
        <br>

        Frigobar status<br />
        <input type="radio" name="status" value="A" required /> Ativo
        <input type="radio" name="status" value="I"  required/> Inativo <br>


        <input type="submit" value="Enviar" />

    </form>







</body>

</html>
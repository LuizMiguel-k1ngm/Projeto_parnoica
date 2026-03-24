<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Cadastro do frigobar</h1>
 <form action="../frigobar/gFrigobar.php" method="post">
            
                
               <select name="idAcomodacao" > 
               <optgroup label = "Escolha a acomodação">
                <option value = 1 >Suíte Lopes Mendes</option>
                <option value = 2 >Suíte Parnaoica</option>
                <option value = 3 >Suíte Lagoa Azul</option>
                <option value = 4 >Apartamento 1</option>
                <option value = 5 >Apartamento 2</option>
                <option value = 6 >Apartamento 3</option>
                <option value = 7 >Apartamento 4</option>
                <option value = 8 >Apartamento 5</option>
                <option value = 9 >Apartamento 6</option>
                <option value = 10 >Apartamento 7</option>
                <option value = 11 >Apartamento 8</option>
                <option value = 12 >Apartamento 9</option>
                <option value = 13 >Apartamento 10</option>
            </optgroup>
            </select>
            <br/>
            <br> 
            
            Frigobar status<br/> 
            <input type="radio" name="fstatus" value= "A" /> Ativo
            <input type="radio" name="fstatus" value= "I" /> Inativo  <br>  
            
            
            <input type="submit" value="Enviar" />
            
        </form>
        


    
</body>
</html>
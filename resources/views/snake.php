
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<table id="table" border=1 >
    <?php
    $rowNr=20;
    $colNr=20;
        for($i=0;$i<$rowNr;$i++){
        ?>
        <tr>
            <?php
                for($j=0;$j<$colNr;$j++){
  
                ?>
                <td  id=<?=$i.",".$j ?> href="snake.php?row=<?=  $i ?>&col=<?= $j?>"  border=1 width="20px" height="20px"> <?=$i,$j ?>
                </td>
                <?php
                    
                }
            ?>      
        </tr>
        <?php
        }
    ?>
</table>
       
       <?php
         echo ($_GET['row']);
         echo ($_GET['col']);

       ?>
</body>

<script type="text/javascript" src="/js/snake.js" >
     
</script>
</html>

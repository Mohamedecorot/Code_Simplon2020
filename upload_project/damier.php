<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        function dessinerDamier ($nombredecase)
        {
            $i = 0;
            $j = 0;
            while ($j<$nombredecase){
                if (($j%2)==0) {
                    echo "X";
                    $j=$j+1;}
                else {
                    while ($j<$nombredecase)
                        {
                            if (($j%2)!=0)
                                {
                                    echo "0";
                                }
                            $j=$j+1;
                        }
                    $i=$i+1;
                    }
        }
           
        }
        dessinerDamier(5);
    ?>
</body>
</html>

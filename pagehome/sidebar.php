<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>

    <link rel="stylesheet" href="sidebar8.css">

    <style> 
        <?php 
        include 'sidebar8.css';
        ?>
    </style>

</head>
<body>
    <div class="container">
        <div class="sidebar">
                        <div class="search2">
                            <form action="" method="post">
                                <input type="text" class="car" name="keyword" placeholder="Seacrh Keyword">
                                <button type="submit" class="btn" name="cari">Search</button>

                                <!-- <input type="text" name="keyword" placeholder="Search Keyword" > -->
                                <!-- <p>Search</p> -->
                                <!-- <button type="submit" class="btn" name="cari">Search</button> -->
                            </form>

                        </div>
                        <div class="category1">
                            <h2>Category</h2>
                            <hr class="b">
                            <ul>
                                <li>
                                    <?php foreach($data2 as $row){?>  
                                    <li><h4 class="kat"><?= $row['kategori']?></h4></li>
                                    <li><hr class="g"></li>
                                    <?php } ?>
                        


                                </li>

                            
                            </ul>
                        </div>
        </div>
    </div>  
</body>
</html>
<?php
include('config/db_connect.php');
//write query for all pizzas
$sql = 'SELECT title , ingredients , id  FROM pizzas ORDER BY created_at';
//make qury & get result
$result = mysqli_query($conn,$sql);
// fetch the reulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
//free results from memmory
mysqli_free_result($result);
//close the connection
mysqli_close($conn);

//print_r($pizzas);
//explode(',',$pizzas[0]['ingredients']);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php');?>
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/p.webp" width=100 height=100 class="pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <!--<div> //echo htmlspecialchars($pizza['ingredients']);?></div>-->
                            <ul>
                                <?php foreach(explode(',',$pizza['ingredients']) as $ing ): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- <?php if(count($pizzas)>=2): ?>
                    <p>there are two or more pizzas</p>
                <?php  else : ?>
                    <p>there are less than two pizzas</p>
                <?php endif; ?> -->

                
        </div>
    </div>
    <?php include('templates/footer.php');?>
</html>
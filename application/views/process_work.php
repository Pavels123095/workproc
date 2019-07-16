<?
                (int)$currentpage = (!empty($_GET["currentpage"]))?$_GET["currentpage"]:0;
                (int)$nextpage = $currentpage + 1;
                (int)$prevpage = $currentpage - 1;

 $format = 'd/m/Y l'; 

 $rof = '';
                    
 function dateDifference($date1,$date2) {

    $date1 = date_create($worker_result['date_bnar']);
    $date2 = date_create($worker_result['date_endnar']);

    $rof = date_diff($date1,$date2);

}
 
 ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">  
        <div id="my-nav" class="navbar-nav">      
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item">  
                    </li>
                    <li class="nav-item">  
                    </li>
                    <li class="nav-item">  
                    </li>
                    <li class="nav-item col-3">
                        <span class="btn btn-outline-light btn-block">
                            Сегодня: <?php echo date($format);?>
                        </span>
                    </li>
                    <li class="nav-item">  
                    </li>
                    <li class="nav-item">  
                    </li>
                    <li class="nav-item">
                    
                        <a class="nav-link" href="<? echo base_url().'quites';?>">
                            <button class="btn btn-outline-light btn-block">
                                Выход
                            </button>
                        </a>

                    </li>
            </ul>

        </div>

    </nav>

</header>

<div class="container-fluid margin-top">
    
    <div class="row justify-content-center">

                <div class="col-2" style="margin-bottom: 10px">
                    <button type="submit" class="btn btn-success"><a class="no_decor" href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$prevpage"; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></button>
                    <button type="submit" class="btn btn-success"><a class="no_decor" href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$nextpage"; ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></button>
                </div>
        
    </div>


        <table class="table table-bordered table-hover table-striped">

        <thead class="thead-light">
            <th>ФИО Сотрудника</th>
            <?php

                $ts = date(strtotime('last Friday')); 
                $ts += $currentpage * 86400 * 7; 
                $dow = date('w' , $ts); 
                $offset = $dow; 
                $ts = $ts - $offset * 86400;


           for ($x=1 ; $x<7 ; $x++,$ts += 86400) {
               $date = date("d-m-Y l", $ts);
             echo  '<th>'.$date.'</th>' ;
           }    
            ?>
        </thead>

            <tbody>
            <?php 
           
                foreach ($worker_result as $item) {

                $task = '<td><p class="name_task">'.$item['name_task'].'</p><p>'.$item['description'].'</p></td>';  
                
                    echo '<tr class="thead-light">';

                    echo '<th>'.$item['fio'].'<br>'.$item['name_spec'].'</th>';
                    echo $task;
                    echo '</tr>';
                }                 
           ?>
           </tbody>

        </table> 

    </div>

</div>


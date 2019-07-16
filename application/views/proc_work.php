<?php


foreach ($naryad as $item) {

    $date_bnar = $item['date_bnar'];
    $date_endnar = $item['date_endnar'];

}

$now = time(); // текущее время (метка времени)
$your_date = strtotime($date_bnar); // какая-то дата в строке (1 января 2017 года)
$datediff = $now - $your_date; // получим разность дат (в секундах)
$date_now = floor($datediff / (60 * 60 * 24)); 
$format = 'd/m/y h:i:s';

?>
<header>
	<div class="container-fluid">
		<div class="row justify-content-center badge-secondary">
			<div class="col-11">
			<?php 
			$format = 'd/m/y День недели: l';
			echo '<p class="text-center time_text">Cегодняшнее число: <span>'.date($format).'<span></p>';
			?>
			</div>
			<div class="float-right">
					<button class="btn btn-danger btn-sm">
						<a class="nav-link no_decor" href="<? echo base_url().'quites';?>">Выход</a>
					</button>
			</div>
		</div>
	</div>

</header>

<div class="container-fluid">

    <div class="row">   <!-- Таблица задач сотрудника -->

        <table class="table table-bordered table-hover table-striped">

            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Название работы</th>
                <th>Описание</th>
                <th>Дней на работу</th>
                <th>Часов в день</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
            </tr>

            </thead>

            <tbody>
<?php foreach ($task as $item) {

    if (($item['date_endnar'] == "0000-00-00") or (empty($item['date_endnar']))) {
        echo '<tr style="background: yellow !important;">';
            echo  '<td>'.$item['n_naryad'].'</td>';
            echo  '<td>'.$item['name_works'].'</td>';
            echo  '<td>'.$item['description'].'</td>';
            echo  '<td>'.$item['day'].'</td>';
            echo  '<td>'.$item['time_day'].'</td>';
            echo  '<td>'.$item['date_bnar'].'</td>';
            echo  '<td>'.$item['date_srok'].'</td>';
        echo '</tr>';
        
    } else {
        if (($item['date_endnar'] != "0000-00-00") or (!empty($item['date_endnar']))) {
            echo '<tr>';
                echo  '<td>'.$item['n_naryad'].'</td>';
                echo  '<td>'.$item['name_works'].'</td>';
                echo  '<td>'.$item['description'].'</td>';
                echo  '<td>'.$item['day'].'</td>';
                echo  '<td>'.$item['time_day'].'</td>';
                echo  '<td>'.$item['date_bnar'].'</td>';
                echo  '<td>'.$item['date_srok'].'</td>';
            echo '</tr>';
        }
    }



}?>  
            </tbody>

        </table>

    </div>

</div>  <!-- Таблица задач сотрудника -->
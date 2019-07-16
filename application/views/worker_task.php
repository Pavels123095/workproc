
<div class="container-fluid">
    
    <div class="row">

        <div class="col add_dogovor">
            <div class="col text-center">
                <h5>Список всех задач</h5>
            </div>
            <div class="float-right">
                <button class="btn btn-primary"><a class="no_decor" href="<? echo base_url().'home'; ?>">Назад</a></button>
            </div>
        </div>

        <table class="table table-striped table-bordered table-light">
            <thead>
                <th>Название задачи</th>
                <th>Описание</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
                <th>Дней на работу (по плану)</th>
                <th>Рабочих часов в день (по плану)</th>
                <th>Статус</th>
            </thead>
            <tbody>
                <?php
                foreach ($worker_task as $item) {

                    if (empty($item['result'])) {
                        echo '<tr style="background:#800000; color: white;">';
                            echo '<td>'.$item['name_works'].'</td>';
                            echo '<td>'.$item['description'].'</td>';
                            echo '<td>'.$item['date_begin'].'</td>';
                            echo '<td>'.$item['date_endnar'].'</td>';
                            echo '<td>'.$item['day'].'</td>';
                            echo '<td>'.$item['time_day'].'</td>';
                            if ($item['date_endnar']<$item['date_srok']) {
                                echo '<td> Просрочен </td>';
                            } else {
                                echo '<td> Выполняется </td>';
                            }

                        echo '</tr>';

                    } else {

                        echo '<tr style="background: #008000; color: white;">';
                            echo '<td>'.$item['name_works'].'</td>';
                            echo '<td>'.$item['description'].'</td>';
                            echo '<td>'.$item['date_begin'].'</td>';
                            echo '<td>'.$item['date_srok'].'</td>';
                            echo '<td>'.$item['day'].'</td>';
                            echo '<td>'.$item['time_day'].'</td>';
                            echo '<td>'.$item['result'].'</td>';
                        echo '</tr>';

                    }

                    }
                ?>
            </tbody>
        </table>

    </div>

</div>
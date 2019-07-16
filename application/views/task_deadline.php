<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-12 add_worker">  <!-- Форма выбора периода невыполненных задач -->    
                <form action="task_deadline" method="POST" class="form-inline" role="form">
                <label class="h-text">Выберите даты</label>
                    <div class="col-1"></div>
                    <div class="form-group">
                        <input type="date" name="date1" class="form-control">
                    </div>
                    <div class="col-1"></div>
                    <div class="form-group">
                        <input type="date" name="date2" class="form-control">
                    </div>
                    <div class="col-1"></div>
                    <div class="form-group">
                        <button type="submit" name="search_date" class="btn btn-primary">Просмотр</button>
                    </div>
                </form>
        </div>
    
    </div>
    
</div>  <!-- Форма выбора периода невыполненных задач -->
                    
    <table class="table table-bordered table-hover table-striped">    <!-- Вывод списка невыполненных задач -->
        <thead class="thead-dark">
            <tr>
                <th>Исполнитель</th>
                <th>Задача</th>
                <th>Описание задачи</th>
                <th>Статус</th>
                <th>Дата начала</th>
                <th>Срок выполнения</th>
            </tr>
        </thead>
            <tbody>
                <?php
                if (isset($_POST['search_date'])) {
                    foreach ($task_deadline as $item) 
                    {
                        echo  '<tr>';
                            echo  '<td>'.$item['fio'].'</td>';
                            echo  '<td>'.$item['name_task'].'</td>';
                            echo  '<td>'.$item['description'].'</td>';
                            echo  '<td>'.$item['result'].'</td>';
                            echo  '<td>'.$item['date_bnar'].'</td>';
                            echo  '<td>'.$item['date_srok'].'</td>';
                        echo  '<tr>';
                    }
                }

                    foreach ($task_not as $item) 
                    {
                        echo  '<tr>';
                            echo  '<td>'.$item['fio'].'</td>';
                            echo  '<td>'.$item['name_task'].'</td>';
                            echo  '<td>'.$item['description'].'</td>';
                            echo  '<td>'.$item['result'].'</td>';
                            echo  '<td>'.$item['date_bnar'].'</td>';
                            echo  '<td>'.$item['date_srok'].'</td>';
                        echo  '<tr>';
                    }
                ?>
            </tbody>
    </table>  <!-- Вывод списка невыполненных задач -->

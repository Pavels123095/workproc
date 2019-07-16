<div class="container add_dogovor">

    <div class="row justify-content-center">  <!-- Добавление договора -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Добавить договор
                </button>
        <div class="modal" tabindex="-1" role="dialog" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="form" action="dogovors" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">Добавление договора</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>   
                    <div class="modal-body"> 

                        <form action="dogovors" method="post" role="form">
                            <div class="form-group">    <!-- Название клиента -->
                                <input type="text" name="name_client" class="form-control" required  placeholder="Название клиента">
                            </div>  <!-- Название клиента -->
                        
                            <div class="form-group">    <!-- Адрес клиента -->
                                <input type="adress" name="adress_client" class="form-control" required  placeholder="Юридический адрес">
                            </div>  <!-- Адрес клиента -->

                            <div class="form-group">    <!-- телефон клиента -->
                                <input type="text" name="tel_client" class="form-control" id="phone" required  placeholder="+7 (999) 999-99-99">
                            </div>  <!-- телефон клиента -->

                            <div class="form-group">    <!-- email клиента -->
                                <input type="email" name="email_client" class="form-control" required placeholder="Email клиента">
                            </div>  <!-- email клиента -->

                            <div class="form-group">
                                <p class="text-center">Дата подписания договора</p>
                                <input type="date" name="date_concl" class="form-control" required placeholder="Дата подписания">
                            </div>

                            <div class="form-group">
                                <p class="text-center">Срок истечения договора</p>
                                <input type="date" name="date_validity" class="form-control" required  placeholder="Срок исполнения">
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                                <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Закрыть</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- Добавление договора -->
</div> 

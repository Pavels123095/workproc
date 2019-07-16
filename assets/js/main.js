$(document).ready( function () {


    //При открытии окна в элемент input занесем атрибут кнопки с номером наряда, чтобы он попал в $_POST
    $('#my-modal_work').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget); // Кнока, которая открыла модальное окно
    var id_worker = button.data('whatever'); // Значение data-* атрибута
    var modal = $(this);
    modal.find('#id_worker').val(id_worker);

    });


    $('body').on('hidden.bs.modal', function () {
        if ($('.modal.show').length > 0) {
            $('body').addClass('modal-open');
        }
    });

        //При открытии окна в элемент input занесем атрибут кнопки с номером наряда, чтобы он попал в $_POST
        $('#my-modal_cls_nar').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Кнока, которая открыла модальное окно
            var n_naryad = button.data('whatever'); // Значение data-* атрибута
            var id_worker = button.data('id'); // Значение data-* атрибута
            var n_task = button.data('name');
            var modal = $(this);
            modal.find('#n_naryad').val(n_naryad);
            modal.find('#id_worker').val(id_worker);
            modal.find('#n_task').val(n_task);
        
        });   
         
        $('#new_nar').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Кнока, которая открыла модальное окно
            var n_naryad = button.data('whatever'); // Значение data-* атрибута
            var n_task = button.data('id'); // Значение data-* атрибута
            var id_worker_cls = button.data('name');
            var modal = $(this);
            modal.find('#n_naryad').val(n_naryad);
            modal.find('#n_task').val(n_task);
            modal.find('#id_worker_cls').val(id_worker_cls);
        
        });   

        $('#my-modal_go_work').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Кнока, которая открыла модальное окно
            var n_task = button.data('whatever'); // Значение data-* атрибута
            var modal = $(this);
            modal.find('#n_task').val(n_task);
        
        });

        $('#my-modal_update_dog').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Кнока, которая открыла модальное окно
            var n_dogovor = button.data('whatever'); // Значение data-* атрибута
            var modal = $(this);
            modal.find('#n_dogovor').val(n_dogovor);
            document.getElementById("n_dog").innerHTML = n_dogovor;
        });

        $('#my-modal_update_object').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Кнока, которая открыла модальное окно
            var n_object = button.data('whatever'); // Значение data-* атрибута
            var modal = $(this);
            modal.find('#n_object').val(n_object);
            document.getElementById("n_objects").innerHTML = n_object;
        });

        $("#modal_sp_task").on("show.bs.modal", function (event) {

            var button = $(event.relatedTarget);
            var n_dogovor = button.data('whatever');
            var modal = $(this);
            modal.find('#n_dogovor').val(n_dogovor);
            document.getElementById("n_dog").innerHTML = n_dogovor;

        });

        $("#my-modal_update_cost").on("show.bs.modal", function (event) {

            var button = $(event.relatedTarget);
            var id_works = button.data('whatever');
            var modal = $(this);
            modal.find('#id_works').val(id_works);

        });

});
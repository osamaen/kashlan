window.setNew = function (btn, e) {
    e.preventDefault();
    var data_table = $(btn).parents('table').attr('id'); //$('#dataTable').DataTable().draw();

    $.ajax({
        type: 'POST',
        url: $(btn).attr('href'),
        data: {},
        dataType: 'json',
        beforeSend: function beforeSend() {
            $(btn).button('loading');
        },
        success: function success(data) {
            console.log(data);

            if (data_table != 'ajaxTable') {
                $(btn).button('reset');
            }

            if (data.status == 'success') {
                if (data_table == 'ajaxTable') {
                    $('#' + data_table).DataTable().draw(false);
                } else {
                    setTimeout(function () {
                        if (data.item.status) {
                            $(btn).removeClass('btn-warning');
                            $(btn).addClass('btn-success');
                            $(btn).find('i').attr('class', 'fa fa-check');
                        } else {
                            $(btn).removeClass('btn-success');
                            $(btn).addClass('btn-warning');
                            $(btn).find('i').attr('class', 'fa fa-ban');
                        }
                    }, 200);
                }

                Toast.fire({
                    icon: 'success',
                    title: data.message
                }); //  window.location.reload();
            } else {
                if (data_table != 'ajaxTable') {
                    setTimeout(function () {
                        $(btn).button('reset');
                    }, 500);
                }

                Toast.fire({
                    icon: 'error',
                    title: data.message
                });
            }
        },
        error: function error(data) {
            Toast.fire({
                icon: 'error',
                title: 'error'
            }); // var errors = $.parseJSON(data.responseText);
        }
    });
};


window.atHome = function (btn, e) {
    e.preventDefault();
    var data_table = $(btn).parents('table').attr('id'); //$('#dataTable').DataTable().draw();

    $.ajax({
        type: 'POST',
        url: $(btn).attr('href'),
        data: {},
        dataType: 'json',
        beforeSend: function beforeSend() {
            $(btn).button('loading');
        },
        success: function success(data) {
            console.log(data);

            if (data_table != 'ajaxTable') {
                $(btn).button('reset');
            }

            if (data.status == 'success') {
                if (data_table == 'ajaxTable') {
                    $('#' + data_table).DataTable().draw(false);
                } else {
                    setTimeout(function () {
                        if (data.item.status) {
                            $(btn).removeClass('btn-warning');
                            $(btn).addClass('btn-success');
                            $(btn).find('i').attr('class', 'fa fa-check');
                        } else {
                            $(btn).removeClass('btn-success');
                            $(btn).addClass('btn-warning');
                            $(btn).find('i').attr('class', 'fa fa-ban');
                        }
                    }, 200);
                }

                Toast.fire({
                    icon: 'success',
                    title: data.message
                }); //  window.location.reload();
            } else {
                if (data_table != 'ajaxTable') {
                    setTimeout(function () {
                        $(btn).button('reset');
                    }, 500);
                }

                Toast.fire({
                    icon: 'error',
                    title: data.message
                });
            }
        },
        error: function error(data) {
            Toast.fire({
                icon: 'error',
                title: 'error'
            }); // var errors = $.parseJSON(data.responseText);
        }
    });
};

window.inNav = function (btn, e) {
    e.preventDefault();
    var data_table = $(btn).parents('table').attr('id'); //$('#dataTable').DataTable().draw();

    $.ajax({
        type: 'POST',
        url: $(btn).attr('href'),
        data: {},
        dataType: 'json',
        beforeSend: function beforeSend() {
            $(btn).button('loading');
        },
        success: function success(data) {
            //console.log(data);

            if (data_table != 'ajaxTable') {
                $(btn).button('reset');
            }

            if (data.status == 'success') {
                if (data_table == 'ajaxTable') {
                    $('#' + data_table).DataTable().draw(false);
                } else {
                    setTimeout(function () {
                        if (data.item.status) {
                            $(btn).removeClass('btn-warning');
                            $(btn).addClass('btn-success');
                            $(btn).find('i').attr('class', 'fa fa-check');
                        } else {
                            $(btn).removeClass('btn-success');
                            $(btn).addClass('btn-warning');
                            $(btn).find('i').attr('class', 'fa fa-ban');
                        }
                    }, 200);
                }

                Toast.fire({
                    icon: 'success',
                    title: data.message
                }); //  window.location.reload();
            } else {
                if (data_table != 'ajaxTable') {
                    setTimeout(function () {
                        $(btn).button('reset');
                    }, 500);
                }

                Toast.fire({
                    icon: 'error',
                    title: data.message
                });
            }
        },
        error: function error(data) {
            Toast.fire({
                icon: 'error',
                title: 'error'
            }); // var errors = $.parseJSON(data.responseText);
        }
    });
};
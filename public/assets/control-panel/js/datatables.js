/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';

    var dtUserTable = $('.user-list-table'),

        statusOrder = {
            1: {title: 'قيد التقديم', class: 'badge-light-warning'},
            2: {title: 'جديد', class: 'badge-light-success'},
            3: {title: 'معاد للاستكمال', class: 'badge-light-danger'},
            4: {title: 'معاد من الاستكمال', class: 'badge-light-success'},
            5: {title: 'قيد التحكيم', class: 'badge-light-secondary'},
            6: {title: 'انتهى الطلب', class: 'badge-light-primary'},
            7: {title: 'مرفوض', class: 'badge-light-danger'},
        },
        statusJudgement = {
            0: {title: 'مرفوض', class: 'badge-light-danger'},
            1: {title: 'مقبول', class: 'badge-light-success'},
        };

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/users'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'id'},
                {data: 'full_name'},
                {data: 'user_name'},
                {data: 'email'},
                {data: 'phone_number'},
                {data: 'roles'},
                {data: ''}
            ],
            columnDefs: [

                {
                    // Actions
                    targets: -1,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        var id = full['id'];
                        return (

                            '<a href="/c-panel/user/' +
                            id +
                            '/roles" class="btn btn-primary btn-sm mr-1">' +
                            feather.icons['eye'].toSvg({class: 'font-small-4 mr-50'}) +
                            'الصلاحيات</a>' +
                            '<a href="/c-panel/users/' +
                            id +
                            '/edit" class="btn btn-secondary btn-sm mr-1">' +
                            feather.icons['edit'].toSvg({class: 'font-small-4 mr-50'}) +
                            'تعديل</a>' +
                            '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' + id + '">' +
                            feather.icons['trash-2'].toSvg({class: 'font-small-4 mr-50'}) +
                            'حذف</a>'

                        );
                    }
                }

            ],
            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    text: 'اضافة مستخدم جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/users/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ],
            initComplete: function () {
                // Adding role filter once table initialized
                this.api()
                    .columns(5)
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select id="UserRole" class="form-control text-capitalize mb-md-0 mb-2"><option value=""> اختار الصلاحية </option></select>'
                        )
                            .appendTo('.user_role')
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                console.log(val);
                                column.search(val ? val : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                            });
                    });

            }

        });
    }

});

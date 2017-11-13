$(document).ready(function () {
    $('.collapse.in').prev('.panel-heading').addClass('active');
    $('#accordion, #bs-collapse')
        .on('show.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });
    $('#accordion, #bs-collapse2')
        .on('show.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });
    $('#accordion, #bs-collapse3')
        .on('show.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });
    $('#accordion, #bs-collapse4')
        .on('show.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });
});

// if other sections
// $(document).ready(function () {
//     $('.collapse.in').prev('.panel-heading').addClass('active');
//     $('#accordion, #bs-collapse1')
//         .on('show.bs.collapse1', function (a) {
//             $(a.target).prev('.panel-heading').addClass('active');
//         })
//         .on('hide.bs.collapse1', function (a) {
//             $(a.target).prev('.panel-heading').removeClass('active');
//         });
// });
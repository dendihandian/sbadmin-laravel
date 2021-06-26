window._ = require('lodash');

try {
    // start of jQuery and the dependants
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('jquery.easing');
    require('chart.js/dist/Chart.bundle');

    require('datatables.net-bs4');

    require('startbootstrap-sb-admin-2/js/sb-admin-2');

    // select2
    require('select2');
    $('.custom-select').select2({theme: 'bootstrap4', width: 'resolve'});

    // end of jQuery and the dependants

} catch (error) {
    console.log(error);
}

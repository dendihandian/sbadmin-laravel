window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('jquery.easing');
    require('datatables.net-bs4')( window, $ );
    // require('chart.js/dist/Chart.bundle');
    require('startbootstrap-sb-admin-2/js/sb-admin-2');

} catch (error) {
    console.log(error);
}
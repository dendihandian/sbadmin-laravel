// window._ = require('lodash');

try {
    window.$ = window.jQuery = require('startbootstrap-sb-admin-2/vendor/jquery/jquery.slim'); // minimal jquery
    // window.$ = window.jQuery = require('startbootstrap-sb-admin-2/vendor/jquery/jquery'); // or use this instead if you want full jquery

    // sbadmin script
    require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing');
    require('startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle');
    require('startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4');
    // require('startbootstrap-sb-admin-2/vendor/datatables');
    require('startbootstrap-sb-admin-2/js/sb-admin-2');

} catch (error) {
    console.log(error);
}

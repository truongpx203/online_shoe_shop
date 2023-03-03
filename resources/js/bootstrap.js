window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    window.$ = window.jQuery = require('jquery');
    window.moment = require('moment');
    require('admin-lte');
    require('bootstrap');
    require('popper.js');
    require('datatables.net-bs4');
    require('chart.js');
    require('datatables.net-select-bs4');
} catch (e) {}

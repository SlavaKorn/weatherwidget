define([
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function (Component, customerData) {
    return Component.extend({
        initialize: function () {
            this._super();
            this.weatherData = customerData.get('weather-data');
        }
    });
});

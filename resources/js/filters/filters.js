import Vue from 'vue';

//*** Vue Global Filter

// *** Capitalize the String
Vue.filter('capitalize', function(value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
    })
    //*** *** F */
Vue.filter('numberToNth', function(value) {
    if (!value) return ''
    if (value == '1')
        return value + 'st';
    else if (value == '2')
        return value + 'nd';
    else if (value == '3')
        return value + 'rd';
    else
        return value + 'th';

})
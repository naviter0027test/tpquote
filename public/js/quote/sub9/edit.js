function countFreight() {
    var port = $('[name=port]').val();
    var formula = $('[name=formula]').val();
    var portPrice = 0;
    var sum = 0;
    switch(port) {
    case '1':
        portPrice = 5400;
        break;
    case '2':
        portPrice = 4200;
        break;
    case '3':
        portPrice = 4400;
        break;
    }
    switch(formula) {
    case '1':
        sum = 150 + 150 + 500 + portPrice;
        break;
    case '2':
        sum = 150 + 150 + 50 + portPrice;
        break;
    case '3':
        sum = 150 + 500 + 45 + portPrice;
        break;
    case '4':
        sum = 150 + 50 + 45 + portPrice;
        break;
    }
    return sum;
}

$(document).ready(function() {
    $('[name=freight]').val(countFreight());
    $('[name=port]').on('change', function() {
        $('[name=freight]').val(countFreight());
    });
    $('[name=formula]').on('change', function() {
        $('[name=freight]').val(countFreight());
    });
});

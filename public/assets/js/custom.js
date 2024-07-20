//Read input and convert it into natural number
function __read_input_number(input_element) {
    var input_element_value = input_element.val();
    if (input_element_value != undefined) {
        if (input_element_value.length == 0) {
            input_element_value = 0;
        } else {
            input_element_value = parseFloat(input_element_value.replace(/(,)+/g, ''));
        }
    } else {
        input_element_value = 0;
    }


    return input_element_value;
}


function __read_number(input_element) {
    var number_value = input_element;
    if (number_value != undefined) {
        if (number_value.length == 0) {
            number_value = 0;
        } else {
            number_value = parseFloat(number_value);
        }
    } else {
        number_value = 0;
    }


    return number_value;
}




function __formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
    try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
        const negativeSign = amount < 0 ? "-" : "";
        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
        let j = (i.length > 3) ? i.length % 3 : 0;
        return negativeSign +
            (j ? i.substr(0, j) + thousands : '') +
            i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) +
            (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
        console.log(e)
    }
};
function __formatDate(date, format = "DD/MM/YYYY") {
    return moment(date).format(format)
}


var start = moment();
var end = moment().add(1, 'year').subtract(1, 'day');
function cb(start, end) {
    $('.cover-note-period span').html(start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));
}
$('.cover-note-period').daterangepicker({
    startDate: start,
    endDate: end,
    showCustomRangeLabel: false,
    ranges: {
        '1 Year': [moment(), moment().add(1, 'year').subtract(1, 'day')],
        '270 Days': [moment(), moment().add(270, 'days').subtract(1, 'day')],
        '180 Days': [moment(), moment().add(180, 'days').subtract(1, 'day')],
        '60 Days': [moment(), moment().add(60, 'days').subtract(1, 'day')],
        '30 Days': [moment(), moment().add(30, 'days').subtract(1, 'day')]
    }
}, cb);
cb(start, end);

function __select2() {
    $('.select2').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
}
__select2();



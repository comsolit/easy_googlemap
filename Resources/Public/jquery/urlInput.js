(function() {
    var hiddenField = $('.url-input');
    var inputField = $('<input type="text" class="form-control">');
    hiddenField.after(inputField);

    var invalidElem = $('<p>URL is not valid</p>');
    var validElem = $('<p>URL is valid</p>');

    var protocols = ['http://', 'https://'];
    var select = $('<select>');

    protocols.forEach(function(protocol) {
        select.append($('<option>').text(protocol));
    });

    invalidElem.css({
        'color'       : 'red',
        'display'     : 'inline',
        'margin-left' : '6px'
    });
    validElem.css({
        'color'       : 'green',
        'display'     : 'inline',
        'margin-left' : '6px'
    });

    inputField.before(select);
    select.addClass('form-control');
    select.css({
        'display' : 'inline',
        'top'      : '0',
        'min-width': '20%',
        'max-width': '20%'
    });
    select.addClass('form-control');

    inputField.css({
        'display' : 'inline',
        'width'   : '50%'
    });

    inputField.after(invalidElem);
    invalidElem.after(validElem);

    invalidElem.hide();
    validElem.hide();

    var initialValue = hiddenField.val().split('://');

    inputField.val(initialValue[1]);
    select.find('option:contains(' + initialValue[0]+ '://' + ')').attr('selected', 'true');

    function validateUrl(url) {
        var regexp = new RegExp("^(www\\.)?([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?");
        if (!regexp.test(url)) {
            return false;
        } else {
            return true;
        }
    }

    function setValue()
    {
        if(validateUrl(inputField.val())) {
            validElem.show();
            invalidElem.hide();
            hiddenField.val(select.find(":selected").text() + inputField.val());
        } else {
            invalidElem.show();
            validElem.hide();
            hiddenField.val('');
        }
    }

    select.change(function(){
        setValue();
    });

    inputField.on('change blur input', function() {
        setValue();
    });
})();

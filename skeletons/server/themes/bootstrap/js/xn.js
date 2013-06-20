var dateFormat = function () {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
    timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[\-+]\d{4})?)\b/g,
    timezoneClip = /[^-+\dA-Z]/g,
    pad = function (val, len) {
        val = String(val);
        len = len || 2;
        while (val.length < len) val = "0" + val;
        return val;
    };

    // Regexes and supporting functions are cached through closure
    return function (date, mask, utc) {
        var dF = dateFormat;

        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date();
        if (isNaN(date)) throw SyntaxError("invalid date");

        mask = String(dF.masks[mask] || mask || dF.masks["default"]);

        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var _ = utc ? "getUTC" : "get",
        d = date[_ + "Date"](),
        D = date[_ + "Day"](),
        m = date[_ + "Month"](),
        y = date[_ + "FullYear"](),
        H = date[_ + "Hours"](),
        M = date[_ + "Minutes"](),
        s = date[_ + "Seconds"](),
        L = date[_ + "Milliseconds"](),
        o = utc ? 0 : date.getTimezoneOffset(),
        flags = {
            d:    d,
            dd:   pad(d),
            ddd:  dF.i18n.dayNames[D],
            dddd: dF.i18n.dayNames[D + 7],
            m:    m + 1,
            mm:   pad(m + 1),
            mmm:  dF.i18n.monthNames[m],
            mmmm: dF.i18n.monthNames[m + 12],
            yy:   String(y).slice(2),
            yyyy: y,
            h:    H % 12 || 12,
            hh:   pad(H % 12 || 12),
            H:    H,
            HH:   pad(H),
            M:    M,
            MM:   pad(M),
            s:    s,
            ss:   pad(s),
            l:    pad(L, 3),
            L:    pad(L > 99 ? Math.round(L / 10) : L),
            t:    H < 12 ? "a"  : "p",
            tt:   H < 12 ? "am" : "pm",
            T:    H < 12 ? "A"  : "P",
            TT:   H < 12 ? "AM" : "PM",
            Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
            o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
            S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
        };

        return mask.replace(token, function ($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();

// Some common format strings
dateFormat.masks = {
    "default":      "dd/mm/yyyy HH:MM:ss",
    shortDate:      "m/d/yy",
    mediumDate:     "mmm d, yyyy",
    longDate:       "mmmm d, yyyy",
    fullDate:       "dddd, mmmm d, yyyy",
    shortTime:      "h:MM TT",
    mediumTime:     "h:MM:ss TT",
    longTime:       "h:MM:ss TT Z",
    isoDate:        "yyyy-mm-dd",
    isoTime:        "HH:MM:ss",
    isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",
    xinixDate:      "dd/mm/yyyy",
    xinixTime:      "HH:MM:ss"
};

// Internationalization strings
dateFormat.i18n = {
    dayNames: [
    "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
    "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
    "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
    return dateFormat(this, mask, utc);
};


$(function() {
    try {
        var ciprofiler = $('#codeigniter_profiler').html();
        $('#codeigniter_profiler').detach();
        $("#profiler_btn").click(function(evt) {
            xn.helper.modal({
                title: 'Profiler',
                body: ciprofiler
            });
            return evt.preventDefault();
        });
    } catch (e) {
        console.error(e);
    }
});

/******************************************************************************/


var xn = {
    helper: {
        stylize: function(selector) {
            selector = selector || 'body';

            $(selector).find('input[type=submit], input[type=button]').not('.btn').addClass('btn');

            // $(selector).find('li.has-children > a').filter(function() {
            //     return $(this).find('.caret').length === 0;
            // }).append('<span class="caret"></span>').addClass('dropdown');

            $(selector).find('.table thead tr:not(.btn-inverse)').addClass('btn-inverse');

            $(selector).find('.table thead tr a.asc').prepend('<i class="icon-white icon-chevron-down"></i>');
            $(selector).find('.table thead tr a.desc').prepend('<i class="icon-white icon-chevron-up"></i>');

            $(selector).find('.highlight-phrase').addClass('label label-warning');

            $(selector).find('.breadcrumb li:not(:last)').append('<span class="divider">&gt;</span>');

            $(selector).find('.submenu span').each(function() {
                $(this).find('a').addClass('icon-' + $(this).attr('class'));
            });

            $(selector).find('a[data-class=home]').each(function() {
                $(this).html('<span class="icon-home" style="text-indent: 10000px; overflow: hidden">' + $(this).html() + '</span>');
            });
            $(selector).find('.breadcrumb li:first a').each(function() {
                $(this).addClass('icon-home');
                $(this).css({
                    'text-indent': 100000,
                    'overflow': 'hidden'
                });
            });

            $(selector).find('form').each(function() {
                $(this).find('input[type=submit]:first').addClass('btn-primary');
            });

            $(selector).find('.mandatory').append('<i style="color: red">*</i>');

            $(selector).find('a.mass-action').each(function() {
                $(this).attr('data-href', $(this).attr('href'));
            }).click(function(evt) {
                var href = $(this).attr('data-href');

                var selectedList = [];
                $('table.grid').find('tr.grid_row *[checked]').parents('tr').each(function(index, node) {
                    if (selectedList[0] != $(node).attr('data-ref')) {
                        selectedList.push($(node).attr('data-ref'));
                    }
                });
                $(this).attr('data-selected', selectedList.join(','));
                $(this).attr('href', href + '/' + selectedList.join(','));
                if (selectedList.join(',') === '') {
                    xn.helper.alert(_.template($('#template-no-data-selected-error').html()));
                    evt.preventDefault();
                    return false;
                }

                return true;
            });

            xn.helper.alert();
        },

        alert: function(msg, severity) {
            if (typeof(msg) == 'undefined') {
                severity = ($('.error').length) ? 'error' : ($('.info').length) ? 'info' : null;
                if (!severity) return;
            } else {
                severity = severity || 'error';
                msg = (typeof(msg) == 'function') ? msg() : msg;
                $('.' + severity).remove();
                $('#container').append('<div class="' + severity + '">' + msg + '</div>');
            }
            $('.' + severity).each(function() {
                $(this).addClass(function() {
                    return 'hide alert alert-' + $(this).attr('class');
                });
                $(this).prepend('<button type="button" class="close" data-dismiss="alert">×</button>').css('left', ( $(document).innerWidth() - $(this).width() ) / 2 );
                $(this).fadeIn('slow');
            });
        },

        modal: function(options) {
            $('.modal').remove();
            options.footer = options.footer || '';
            var $modal = $(_.template($('#template-modal').html(), options)).appendTo('#container');
            $('.modal').modal();
        }
    }
};

/******************************************************************************/


xn.helper.stylize();

function timer() {
    var t = new Date();
    $('.system-datetime').html(t.format('default'));
    $('.xinix-time').html(t.format('xinixTime'));
    $('.xinix-date').html(t.format('xinixDate'));
}
setInterval(timer, 1000);
timer();

prettyPrint();
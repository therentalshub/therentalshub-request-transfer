var trhtrRequestForm = (function($, flatpickr) {

    /**
     * Form elements.
     */
    var arvDateEl = null;
    var arvTimeEl = null;
    var arvPaxEl = null;
    var arvFromEl = null;
    var arvToEl = null;
    var arvFlightEl = null;
    var dptDateEl = null;
    var dptTimeEl = null;
    var dptPaxEl = null;
    var dptFromEl = null;
    var dptToEl = null;
    var dptFlightEl = null;
    var fnameEl = null;
    var lnameEl = null;
    var emailEl = null;
    var phoneEl = null;
    var notesEl = null;

    /**
     * The form.
     */
    var form = null;

    /**
     * Arrival date picker.
     */
    var arvDateCal = null;

    /**
     * Arrival time picker.
     */
    var arvTimeCal = null;

    /**
     * Departure date picker.
     */
    var dptDateCal = null;

    /**
     * Departure time picker.
     */
    var dptTimeCal = null;

    /**
     * Request type flat (one/return).
     */
    var requestType = null;

    /**
     * Load form elements
     */
    var loadElements = function() {

        arvDateEl = $('#trhrft_arv_date');
        arvTimeEl = $('#trhrft_arv_time');
        arvPaxEl = $('#trhrft_arv_pax');
        arvFromEl = $('#trhrft_arv_from');
        arvToEl = $('#trhrft_arv_to');
        arvFlightEl = $('#trhrft_arv_flight');

        dptDateEl = $('#trhrft_dpt_date');
        dptTimeEl = $('#trhrft_dpt_time');
        dptPaxEl = $('#trhrft_dpt_pax');
        dptFromEl = $('#trhrft_dpt_from');
        dptToEl = $('#trhrft_dpt_to');
        dptFlightEl = $('#trhrft_dpt_flight');

        fnameEl = $('#trhrft_fname');
        lnameEl = $('#trhrft_lname');
        emailEl = $('#trhrft_email');
        phoneEl = $('#trhrft_phone');
        notesEl = $('#trhrft_notes');

        form = $('#trhtr-request-form');
    };

    /**
     * Setup calendars.
     */
    var loadPickers = function() {

        // flatpickr for dates options
        var opts = {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: new Date().fp_incr(1)
        };
        
        // setup date pickers
        arvDateCal = arvDateEl.flatpickr(opts);
        dptDateCal = dptDateEl.flatpickr(opts);

        // flatpickr for times options
        opts = {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 5
        };

        // setup time pickers
        arvTimeCal = arvTimeEl.flatpickr(opts);
        dptTimeCal = dptTimeEl.flatpickr(opts);
    }

    /**
     * Toggles transfer type.
     */
    var toggleType = function(btn) {

        $('.trhtr-toggle-type-btn').removeClass('active');
        btn.addClass('active');

        if (btn.data('type') === 'one') {

            requestType = 'one';

            dptDateEl.prop('required', false);
            dptTimeEl.prop('required', false);
            dptPaxEl.prop('required', false);
            dptFromEl.prop('required', false);
            dptToEl.prop('required', false);

            $('#trhtr_dpt_wrap').css('display', 'none');
        } else {

            requestType = 'return';

            dptDateEl.prop('required', true);
            dptTimeEl.prop('required', true);
            dptPaxEl.prop('required', true);
            dptFromEl.prop('required', true);
            dptToEl.prop('required', true);

            $('#trhtr_dpt_wrap').css('display', 'block');
        }
    };

    /**
     * Submit form.
     */
    var submitForm = function() {

        var btn = form.find(':submit');
        var btnHtml = btn.html();

        btn.html('Please wait...');

        $('#trh-request-failed-alert').css('display', 'none');
        $('#trh-request-success-alert').css('display', 'none');

        // submit request
        $.post(trhrt_ajax_obj.ajax_url, {

            _ajax_nonce: trhrt_ajax_obj.nonce,
            action: 'trhtr_submit_transfer_form',
            type: requestType === 'one' ? 1 : 2,
            arvd: arvDateEl.val(),
            arvt: arvTimeEl.val(),
            arvp: arvPaxEl.val(),
            arvfl: arvFromEl.val(),
            arvtl: arvToEl.val(),
            arvf: arvFlightEl.val(),
            dptd: dptDateEl.val(),
            dptt: dptTimeEl.val(),
            dptp: dptPaxEl.val(),
            dptfl: dptFromEl.val(),
            dpttl: dptToEl.val(),
            dptf: dptFlightEl.val(),
            fname: fnameEl.val(),
            lname: lnameEl.val(),
            email: emailEl.val(),
            phone: phoneEl.val(),
            notes: notesEl.val()
        }, function(data) {

            btn.html(btnHtml);

            if (Object.hasOwn(data, 'error')) {

                $('#trhtr-request-failed-alert').css('display', 'block');
                $('.trhtr-error-alert').html(data.error);

                return;
            }

            $('#trhtr-request-success-alert').css('display', 'block');
        });
    };

    /**
     * Init function.
     */
    var init = function() {

        // load only when on correct page
        if (typeof trhtrApp === 'undefined') {
            return;
        }

        // default type
        requestType = 'one';

        // load form elements
        loadElements();

        // load datetime pickers
        loadPickers();

        // toggle type event
        $('.trhtr-toggle-type-btn').on('click', function() {
            toggleType($(this));
        });

        // form submit event
        form.on('submit', function(e) {

            e.preventDefault();

            submitForm();
        });
    };

    return {
        init: function() {
            init();
        }
    };
})(jQuery, flatpickr);

jQuery(document).ready(function($) {
    trhtrRequestForm.init();
});
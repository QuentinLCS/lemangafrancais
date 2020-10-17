var MaterialDateTimePicker = {
    control: null,
    dateRange: null,
    pickerOptions: null,
    create: function(element){
        this.control = element == undefined? $('#' + localStorage.getItem('element')) : element;
        element = this.control;
        if (this.control.is("input[type='text']"))
        {
            var defaultDate = new Date();
            element.off('click');
            element.datepicker({
                firstDay: 1,
                format: 'yyyy-mm-dd',
                selectMonths: true,
                dismissable: false,
                autoClose: true,
                setDefaultDate: true,
                minDate: new Date(),
                i18n: {
                    done: 'Valider',
                    cancel: 'Annuler',
                    months:
                        [
                            'Janvier',
                            'Février',
                            'Mars',
                            'Avril',
                            'Mai',
                            'Juin',
                            'Juillet',
                            'Août',
                            'Septembre',
                            'Octobre',
                            'Novembre',
                            'Décembre'
                        ],
                    monthsShort:
                        [
                            'Jan',
                            'Fev',
                            'Mar',
                            'Avr',
                            'Mai',
                            'Jun',
                            'Jul',
                            'Aoû',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        ],
                    weekdays:
                        [
                            'Dimanche',
                            'Lundi',
                            'Mardi',
                            'Mercredi',
                            'Jeudi',
                            'Vendredi',
                            'Samedi'
                        ],
                    weekdaysShort:
                        [
                            'Dim',
                            'Lun',
                            'Mar',
                            'Mer',
                            'Jeu',
                            'Ven',
                            'Sam'
                        ],
                    weekdaysAbbrev:
                        ['D', 'L', 'M', 'M', 'J', 'V', 'S']
                },
                onClose: function(){
                    element.datepicker('destroy');
                    element.timepicker({
                        dismissable: false,
                        twelveHour: false,
                        onSelect: function(hr, min){
                            element.attr('selectedTime', (hr + ":" + min).toString());
                        },
                        onCloseEnd: function(){
                            element.blur();
                        }
                    });
                    $('button.timepicker-close')[0].remove();

                    if(element.val() != "")
                    {
                        element.attr('selectedDate', element.val().toString());
                    }
                    else
                    {
                        element.val(defaultDate.getFullYear().toString() + "/" + (defaultDate.getMonth() + 1).toString() + "/" + defaultDate.getDate().toString())
                        element.attr('selectedDate', element.val().toString());
                    }
                    element.timepicker('open');
                }
            });
            element.unbind('change');
            element.off('change');
            element.on('change', function(){
                if(element.val().indexOf(':') > -1){
                    element.attr('selectedTime', element.val().toString());
                    element.val(element.attr('selectedDate') + " " + element.attr('selectedTime'));
                    element.timepicker('destroy');
                    element.unbind('click');
                    element.off('click');
                    element.on('click', function(e){
                        element.val("");
                        element.removeAttr("selectedDate");
                        element.removeAttr("selectedTime");
                        localStorage.setItem('element', element.attr('id'));
                        MaterialDateTimePicker.create.call(element);
                        element.trigger('click');
                    });
                }
            });
            $('button.btn-flat.datepicker-cancel.waves-effect, button.btn-flat.datepicker-done.waves-effect').remove();
            return element;
        }
    },
    addCSSRules: function(){
        $('html > head').append($('<style>div.modal-overlay { pointer-events:none; }</style>'));
    },
};

$(document).ready(function(){
    var DateField1 = MaterialDateTimePicker.create($('.datetimepicker'));
});


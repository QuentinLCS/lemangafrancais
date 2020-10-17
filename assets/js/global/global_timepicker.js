$(document).ready(function(){
    $('.datepicker').datepicker({
        twelveHour: false,
        defaultTime: 'now',
        i18n: {
            done: 'Valider',
            cancel: 'Annuler',
        }
    });
});
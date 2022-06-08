// ----------------------------------- left menu -----------------------------------

function openLeftMenuBtn() {
    document.getElementById("leftMenu").style.width = "200px";
}

function closeLeftMenuBtn() {
    document.getElementById("leftMenu").style.width = "0";
}

// ----------------------------------- left menu end -----------------------------------

// ----------------------------------- utility functions -----------------------------------

function formatDateToHumanCalendar(dateString) {
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleDateString
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/DateTimeFormat/DateTimeFormat
    var date = new Date(dateString).toLocaleDateString("en-GB", {
        dateStyle: "full",
    });
    document.write(date);
}

function formatDateToHumanCalendarAccurate(dateString) {
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleDateString
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/DateTimeFormat/DateTimeFormat
    var date = new Date(dateString).toLocaleDateString("en-GB", {
        dateStyle: "short",
    });
    var time = new Date(dateString).toLocaleTimeString("en-GB", {});

    document.write(date + " " + time);
}

function changeInputValueAndSubmitForm(formId, inputId, inputValue) {
    document.getElementById(inputId).value = inputValue;
    document.getElementById(formId).submit();
}

// ----------------------------------- utility functions end -----------------------------------

// Specify date and time format using "style" options (i.e. full, long, medium, short)
console.log(
    new Intl.DateTimeFormat("en-GB", {
        dateStyle: "full",
        timeStyle: "long",
    }).format(date)
);
// Expected output "Sunday, 20 December 2020 at 14:23:16 GMT+11"

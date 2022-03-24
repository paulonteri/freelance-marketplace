// --------------------------- utility functions ---------------------------

function formatDateToHumanCalendar(dateString) {
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleDateString
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/DateTimeFormat/DateTimeFormat
    var date = new Date(dateString).toLocaleDateString("en-GB", {
        dateStyle: "full",
    });
    document.write(date);
}

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

// ----------------------------------- utility functions end -----------------------------------

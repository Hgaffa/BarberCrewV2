/*
 * Edited Cookie Alert by Wruczek & Hgaffa
 * Original Source Code: https://github.com/Wruczek/Bootstrap-Cookie-Alert
 * Released under MIT license
 */
(function() {
    "use strict";

    var cookieAlert = document.querySelector(".cookiealert");
    var acceptCookies = document.querySelector(".acceptcookies");

    if (!cookieAlert) {
        return;
    }

    cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

    // Show the alert if we cant find the "acceptCookies" cookie
    if (localStorage.getItem('cookies_enabled') === null) {
        cookieAlert.classList.add("show");
    }

    // When clicking on the agree button, create a 1 year
    // cookie to remember user's choice and close the banner
    acceptCookies.addEventListener("click", function() {
        localStorage.setItem('cookies_enabled', '1');
        cookieAlert.classList.remove("show");

        // dispatch the accept event
        window.dispatchEvent(new Event("cookieAlertAccept"))
    });
})();

//Local Storage Functions
function setCookie(val) {
    localStorage.setItem("site", val);
}

var rs = document.getElementById("reviews_script");

function storageChanged(key, oldVal, newVal) {
    if (key == "site" && newVal != oldVal) {
        var reviews = rs.getAttribute('check');

        if (newVal == "Wokingham") {
            reviews = "barbercrew-wokingham";
        } else if (newVal == "Wargrave") {
            reviews = "barbercrew-wargrave";
        } else {
            reviews = "barbercrew";
        }
        window.location.reload();
    }
}
window.addEventListener("storage", storageChanged);
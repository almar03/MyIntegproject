// JavaScript function for confirmation before redirecting
function confirmRedirect(memberName, url) {
    var userConfirmation = confirm("Do you want to view the details of " + memberName + "?");
    if (userConfirmation) {
        window.location.href = url;
    }

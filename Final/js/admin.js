$(document).ready(function() {
    // Check to confirm if the user wants to delete an item
    $("body").on("click", "#deleteBtn", function() {
        if (confirm("Are you sure you want to delete?")) {
            $("#deleteBtn").submit();
        } else {
            event.preventDefault();
        }
    })
});
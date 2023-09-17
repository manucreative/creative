    $(document).ready(function() {
        // Select the flash message container
        var flashMessage = $('#flash-message');

        // Check if the flash message is present
        if (flashMessage.length) {
            setTimeout(function() {
                flashMessage.addClass('fade-out');
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    });
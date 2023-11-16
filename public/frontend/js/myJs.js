$(document).ready(function () {


    const contactForm = $('#contactForm');
    const commentForm = $('#commentForm');

    const contactUsername = $('#contact_name');
    const commentUsername = $('#comment-name');

    const contactEmail = $('#contact_email');
    const commentEmail = $('#comment-email');

    const contactMessage = $('#contact_message');
    const commentMessage = $('#comment-message');

    const subject = $('#subject');

    contactForm.on('submit', function (e) {
        e.preventDefault();
        validateContactInputs();

        if (contactForm.find('.error').length == 0) {
            contactForm.submit();
        }
    });

    commentForm.on('submit', function (e) {
        e.preventDefault();
        validateCommentInputs();

         console.log('Errors:', commentForm.find('.error').length);
            console.log('Success:', commentForm.find('.success').length);
        // Check if all fields are successfully validated
        if (commentForm.find('.error').length === 0) {
            console.log("Submitting the form...");
            commentForm.submit();
        } else {
            console.log("Form validation failed");
        }
    });

    const setError = (element, message) => {
        const formControl = element.parent();
        const errorDisplay = formControl.find('.error');

        errorDisplay.text(message);
        formControl.addClass('error').removeClass('success');
    };

    const setSuccess = element => {
        const formControl = element.parent();
        const errorDisplay = formControl.find('.error');

        errorDisplay.text('');
        formControl.addClass('success').removeClass('error');
    };

    const isValidEmail = email => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    };


    const validateContactInputs = () => {
        const usernameValue = contactUsername.val().trim();
        const emailValue = contactEmail.val().trim();
        const messageValue = contactMessage.val().trim();
         const subjectValue = subject.val().trim();

        if (usernameValue === '') {
            setError(contactUsername, 'Your Name is Required');
        } else {
            setSuccess(contactUsername);
        }

        if (subjectValue === '') {
            setError(subject, 'Subject is required');
        } else {
            setSuccess(subject);
        }

        if (emailValue === '') {
            setError(contactEmail, 'Email is required');
        } else if (!isValidEmail(emailValue)) {
            setError(contactEmail, 'Provide a valid email address');
        } else {
            setSuccess(contactEmail);
        }

        if (messageValue === '') {
            setError(contactMessage, 'Message is required');
        } else {
            setSuccess(contactMessage);
        }


    };

    const validateCommentInputs = () => {
        const commentUsernameValue = commentUsername.val().trim();
         const commentEmailValue = commentEmail.val().trim();
         const commentMessageValue = commentMessage.val().trim();

        if (commentUsernameValue === '') {
            setError(commentUsername, 'Names is Required');
        } else {
            setSuccess(commentUsername);
        }

        if (commentEmailValue === '') {
            setError(commentEmail, 'Your Email is required');
        } else if (!isValidEmail(commentEmailValue)) {
            setError(commentEmail, 'Provide a valid email address');
        } else {
            setSuccess(commentEmail);
        }

        if (commentMessageValue === '') {
            setError(commentMessage, 'Required Message is required');
        } else {
            setSuccess(commentMessage);
        }
    };


});
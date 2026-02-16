jQuery(document).ready(function ($) {
    const form = $('#contactForm');
    const submitButton = form.find('button[type="submit"]');
    const messageContainer = $('#formMessage');
    const originalButtonText = submitButton.text();
    let isSubmitting = false;

    form.on('submit', function (e) {
        e.preventDefault();

        // Prevent multiple submissions
        if (isSubmitting) {
            return false;
        }

        // Clear previous messages
        messageContainer.html('').removeClass('success error');

        // Get form data
        const formData = {
            action: 'peersupport_contact_form',
            nonce: peersupportContact.nonce,
            name: $('#contactName').val(),
            email: $('#contactEmail').val(),
            phone: $('#contactPhone').val(),
            subject: $('#contactSubject').val(),
            message: $('#contactMessage').val()
        };

        // Set submitting state
        isSubmitting = true;
        submitButton.prop('disabled', true).text('Enviando...').css('opacity', '0.6');

        // Send AJAX request
        $.ajax({
            url: peersupportContact.ajax_url,
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    // Show success message
                    messageContainer
                        .html('<p style="color: var(--color-success); background-color: rgba(76, 175, 80, 0.1); padding: var(--spacing-md); border-radius: 4px; margin-top: var(--spacing-md);">' + response.data.message + '</p>')
                        .addClass('success');

                    // Reset form
                    form[0].reset();
                } else {
                    // Show error message
                    messageContainer
                        .html('<p style="color: var(--color-error); background-color: rgba(244, 67, 54, 0.1); padding: var(--spacing-md); border-radius: 4px; margin-top: var(--spacing-md);">' + response.data.message + '</p>')
                        .addClass('error');
                }
            },
            error: function () {
                // Show generic error message
                messageContainer
                    .html('<p style="color: var(--color-error); background-color: rgba(244, 67, 54, 0.1); padding: var(--spacing-md); border-radius: 4px; margin-top: var(--spacing-md);">Error al enviar el mensaje. Por favor, intentá nuevamente.</p>')
                    .addClass('error');
            },
            complete: function () {
                // Re-enable submit button
                isSubmitting = false;
                submitButton.prop('disabled', false).text(originalButtonText).css('opacity', '1');
            }
        });

        return false;
    });
});

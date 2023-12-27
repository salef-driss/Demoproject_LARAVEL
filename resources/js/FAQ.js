jQuery.noConflict();

jQuery(document).ready(function ($) {
    console.log("Test123");

    $('.dropdown-item').on('click', function (e) {
        e.preventDefault();

        var categoryId = $(this).data('category'); // Fix the typo here

        // Use AJAX to fetch questions and answers for the selected category
        $.ajax({
            url: '/faq/' + categoryId,
            type: 'GET',
            success: function (data) {
                // Update the card content with the fetched data
                $('#cardText').text(data.text);
            },
            error: function () {
                console.error('Failed to fetch FAQ data');
            }
        });
    });
});

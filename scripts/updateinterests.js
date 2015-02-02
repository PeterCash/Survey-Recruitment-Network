/**
 * Created by cashp on 02/02/2015.
 * http://malsup.com/jquery/form/
 */
$(document).ready(function() {
    $("#submitButton").click(function() {
        //http://stackoverflow.com/questions/1237896/how-to-disable-submit-button-with-jquery
        $('#submitButton').attr('disabled', 'disabled');
    });

    // bind 'myForm' and provide a simple callback function
    $('#interestsForm').ajaxForm(function() {
        document.getElementById("ajaxStuff").innerHTML = "Interests Updated!"

        setTimeout(function()
        {
                $("#ajaxStuff").html("Hello");
        }, 5000);
    });
});
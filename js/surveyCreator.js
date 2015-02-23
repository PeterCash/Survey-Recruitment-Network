$(document).ready(function() {


    var options = {
        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse,  // post-submit callback
        clearForm: true,        // clear all form fields after successful submit
        resetForm: true        // reset the form after successful submit

        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    };

    // bind form using 'ajaxForm' 
    // $('#loginForm').ajaxForm(options);

    $("#createQuestion").click(function() {
       var questionID = $(".qTitle").length + 1;


       $("#questions").append('<div class="panel medium-12 columns" id="' + questionID +'">');

       $('#' + questionID).append('<p class="qTitle">Question ' + questionID + '</p>');
       $('#' + questionID).append('<input name="question" type="text" title="question here">');


       $('#' + questionID).append('<div class="row" id="row' + questionID + '">');
       $('#' + questionID).append('<hr/>');

       for(i = 1; i <= 4; i++){

           $('#row' + questionID).append('<div class="medium-6 columns">\
               <input name="answer" type="text">\
               </div>');       

       }


       $('#' + questionID).append('<br/>');
       $('#' + questionID).append('<button class="" id="add' + questionID + '">Add answer</button>');
       $('#' + questionID).append('<button class="removeQuestion right" id="remove' + questionID + '">Remove</button>');

       $('#' + questionID).append('</div>');


       $(".removeQuestion").click(function(e) {
        var divID = ($(event.target).attr('id'));
        tempID = 1;
        var divID = divID.replace("remove","");

        $('#' + divID).remove();


        $('.qTitle').each(function(){
    //if statement here 
    // use $(this) to reference the current div in the loop
    //you can try something like...
        this.innerHTML = '<p>Question ' + tempID +'</p>';
        tempID=tempID+1;

    });



    });

       $("#questions").append('</div>');

   });



});




// pre-submit callback 
function showRequest(formData, jqForm, options) {
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData);

    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 


    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true;
}

// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  {
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 

    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 

    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server


  /*  if(responseText == ''){
        document.getElementById("#ajaxStuff").style.display = '';
    }else{
        window.location.href = "profile.php";
    }

    document.getElementById("preloader").style.display = 'none';*/


} 



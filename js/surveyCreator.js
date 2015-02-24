$(document).ready(function() {

 var questionID = 1;
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
     alert(questionID);

     $('#t1').append('<div class="panel medium-12 columns question" id="Q' + questionID + '">'+
       '<div class="row" id="row' + questionID + '">'+
       '<p class="qTitle">Question ' + questionID + '</p>'+
       '<input name="question" type="text" title="question here">'+




       '<hr/>');

     for(i = 1; i <= 4; i++){
      $('#Q' + questionID).append('<div class="medium-6 columns">'+
        '<input name="answer" type="text">'+
        '</div>');
    }


    $('#Q' + questionID).append('</div>'+

      '<br/>'+

      '<button class="" id="add">Add answer</button>'+
      '<button class="removeQuestion right" id="remove' + questionID + '">Remove</button>'+
      '</div>');



    questionID=questionID+1;

    refreshVisibleQuestionCount();



    $(".removeQuestion").click(function(e) {
      var divID = ($(event.target).attr('id'));
      var divID = divID.replace("remove","");

      $('#Q' + divID).remove();

      refreshVisibleQuestionCount();
    });

    function refreshVisibleQuestionCount(){
     var tempID=1;
     $('.qTitle').each(function(){
    //if statement here 
    // use $(this) to reference the current div in the loop
    //you can try something like...
        //this.find('.qTitle').attr("",tempID);
        this.innerHTML = '<p>Question ' + tempID +'</p>';
        tempID=tempID+1;
      });

     tempID=1;
     $('.question').each(function(){
    //if statement here 
    // use $(this) to reference the current div in the loop
    //you can try something like...
        //this.find('.qTitle').attr("",tempID);
        
        attr('id','Q' + tempID);
        tempID=tempID+1;
      });
   }



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



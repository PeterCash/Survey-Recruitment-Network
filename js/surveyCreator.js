$(document).ready(function() {

 var questionID = 1;

    $("#createQuestion").click(function() {
    /*The div questionBlock contains the parent divs of all questions. We count the number
    of those to count questions. This means that as they are added and deleted we don't need to
    keep track manually. This div is specifically for the questions so a non question is not going
    to appear here.

     */
    var questionNumber = $('#questionBlock > div').length + 1;

        //Question parent div.
    var $ques = $('<div/>',
        {'id':'',
        'name':"question[" + questionNumber + "]",
        'class':'panel medium-12 columns'
    });

        //Question label
        $('<p/>', {
            'id':'questionLabel',
            'html':'<span>Question ' + questionNumber + '</span>'
        }).appendTo($ques);

        //The form input text box with the question in.
        $('<input/>', {
            'type':'text',
            'id':'myDiv',
            'name':'questions[' + questionNumber + ']',
            'class':''
        }).appendTo($ques);

        //This is the div that contains the answer selections
        var $ansBlock = $('<div/>', {
            'id':'answerBlock' & questionNumber,
            'class':'answers'
        });


        //4 Answers by default.
        for(i = 1;i <=4; i++) {
            createAnswer(questionNumber, i, $ansBlock);
        }

        $ques.append($ansBlock);

        $ques.append("<br/>");

        $('#questionBlock').append($ques);

});

    function createAnswer(questionNumber, ansNumber, ansBlock)
    {

        //Just for foundation 5 layout
        var $ansCol = $('<div/>', {
            'class':'medium-6 columns'
        });

        //Answer input text box.
        var $ansText = $('<input/>', {
            'type':'text',
            'name':'answers[' + questionNumber + '][' + ansNumber + ']',
            'class':''
        });

        $ansCol.append($ansText);

        ansBlock.append($ansCol);
    }




    $(".removeQuestion").click(function(e) {
      var divID = $(this).attr('id');
      var divID = divID.replace("remove","");

      $('#Q' + divID).remove();


    });



 });



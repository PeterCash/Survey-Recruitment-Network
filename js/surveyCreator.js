$(document).ready(function() {

 var questionID = 1;

    $("#createQuestion").click(function() {

    var questionNumber = $('#questionBlock > div').length + 1;

    var $ques = $('<div/>',
        {'id':'myDiv',
        'name':"question[" + questionNumber + "]",
        'class':'panel medium-12 columns'
    });

        $('<p/>', {
            'id':'questionLabel',
            'html':'<span>Question ' + questionNumber + '</span>'
        }).appendTo($ques);

        $('<input/>', {
            'type':'text',
            'id':'myDiv',
            'name':'question[' + questionNumber + ']',
            'class':''
        }).appendTo($ques);

        var $ansBlock = $('<div/>', {
            'id':'answerBlock' & questionNumber,
            'class':'answers'
        });



        for(i = 1;i <=4; i++) {
            createAnswer(questionNumber,$ansBlock);
        }

        $ques.append($ansBlock);

        $ques.append("<br/>");

        $('#questionBlock').append($ques);

});

    function createAnswer(num, ansBlock)
    {
        var $ansCol = $('<div/>', {
            'class':'medium-6 columns'
        });

        var $ansText = $('<input/>', {
            'type':'text',
            'id':'myDiv',
            'name':'answer[' + num + ']',
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



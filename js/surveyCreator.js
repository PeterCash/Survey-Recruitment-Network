$(document).ready(function() {

    var questionID = 1;

    $(document).on('click', '.removeQuestion' , function(e){
        var qToRemove = e.target.id;
        qToRemove = qToRemove.replace("removeQuestion","");
        qToRemove = "Q" + qToRemove;


        $('#' + qToRemove).remove();

        renameVisibleQuestions();
    });

    $(document).on('click', '.addAnswer' , function(e){
        var targetAnswer = e.target.id;
        targetAnswer = targetAnswer.replace("addAnswer","");

        var questionNumber = targetAnswer;

        var answerNumber = $('#answerBlock' + questionNumber + '> div').length + 1;


        createAnswer(questionNumber, answerNumber, $('#answerBlock' + questionNumber))

    });

    $("#createQuestion").click(function () {
        /*The div questionBlock contains the parent divs of all questions. We count the number
         of those to count questions. This means that as they are added and deleted we don't need to
         keep track manually. This div is specifically for the questions so a non question is not going
         to appear here.

         */
        var questionNumber = $('#questionBlock > div').length + 1;

        //Question parent div.
        var $ques = $('<div/>',
            {
                'id': "Q"  + questionNumber,
                'name': "question[" + questionNumber + "]",
                'class': 'panel medium-12 columns'
            });

        //Question label
        $('<p/>', {
            'class': 'questionLabel',
            'html': '<span>Question ' + questionNumber + '</span>'
        }).appendTo($ques);

        //The form input text box with the question in.
        $('<input/>', {
            'type': 'text',
            'id': 'myDiv',
            'name': 'questions[' + questionNumber + ']',
            'class': ''
        }).appendTo($ques);

        //This is the div that contains the answer selections
        var $ansBlock = $('<div/>', {
            'id': 'answerBlock' + questionNumber,
            'class': 'answers'
        });



        //4 Answers by default.
        for (i = 1; i <= 4; i++) {
            createAnswer(questionNumber, i, $ansBlock);
        }

        $ques.append($ansBlock);

        $ques.append("<br/>");

        var $btnBlock = $('<div/>', {
            'class': 'buttons medium-12 columns'
        });


        $('<a/>', {
            'id': "removeQuestion" + questionNumber,
            'class': 'removeQuestion right fi-x'
        }).appendTo($btnBlock);

        $('<a/>', {
            'id': "addAnswer" + questionNumber,
            'class': 'addAnswer fi-plus'
        }).appendTo($btnBlock);

        $ques.append($btnBlock);

        $('#questionBlock').append($ques);

    });

    function createAnswer(questionNumber, ansNumber, ansBlock) {

        //Just for foundation 5 layout
        var $ansCol = $('<div/>', {
            'class': 'medium-6 columns left'
        });

        //Answer input text box.
        var $ansText = $('<input/>', {
            'type': 'text',
            'name': 'answers[' + questionNumber + '][' + ansNumber + ']',
            'class': ''
        });

        $ansCol.append($ansText);

        $(ansBlock.append($ansCol));
    }

    function renameVisibleQuestions()
    {
        var tempID = 1;
        $('.questionLabel').each(function(){
            //if statement here
            // use $(this) to reference the current div in the loop
            //you can try something like...
            //this.find('.qTitle').attr("",tempID);
            this.innerHTML = '<span>Question ' + tempID +'</span>';
            tempID=tempID+1;
        });
    }

});



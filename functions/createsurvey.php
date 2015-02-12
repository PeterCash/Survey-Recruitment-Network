<!--/**
* Created by PhpStorm.
* User: cashp
* Date: 27/01/2015
* Time: 12:57
* This is used to create a survey and pass the content to the database.
*
* It is different to the survey object which is used for retrieval.
*
* This will contain all the stages to create a set of questions and specify the distribution and demographic information.
*/
-->
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="../content/main.css">
</head>
<body>
<h1>Survey Distribution Network</h1>
<br/>
<br/>

<div id="survey" class="survey" >
    <form action="">
        Survey Name:<input name="survey_name" id="survey_name" type="text"  title="Survey Title">
        <br/>
        Select A Category:
        <br/>
            <select multiple="multiple" name="topics" id="topics"  width="200px">
            <option value="Topic 1">Topic 1</option>
            <option value="Topic 2">Topic 2</option>
            <option value="Topic 3">Topic 3</option>
            <option value="Topic 4">Topic 4</option>
            <option value="Topic 5">Topic 5</option>
            <option value="Topic 6">Topic 6</option>
        </select>
        <br/>
    </form>
</div>
<?php

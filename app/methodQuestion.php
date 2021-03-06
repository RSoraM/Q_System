<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/3
 * Time: 15:44
 */

class questionnaire
{
    public $questionnaire_titel;
    public $stringquestionnaire_string;
    public $question;
    public $status;
    public $answer_num;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getAnswerNum()
    {
        return $this->answer_num;
    }

    /**
     * @param mixed $answer_num
     */
    public function setAnswerNum($answer_num)
    {
        $this->answer_num = $answer_num;
    }


    /**
     * @return mixed
     */
    public function getQuestionnairetitel()
    {
        return $this->questionnaire_titel;
    }

    /**
     * @param mixed $questionnaire_titel
     */
    public function setQuestionnairetitel($questionnaire_titel)
    {
        $this->questionnaire_titel = $questionnaire_titel;
    }

    /**
     * @return mixed
     */
    public function getStringquestionnaireString()
    {
        return $this->stringquestionnaire_string;
    }

    /**
     * @param mixed $stringquestionnaire_string
     */
    public function setStringquestionnaireString($stringquestionnaire_string)
    {
        $this->stringquestionnaire_string = $stringquestionnaire_string;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function setQuestionarray($question, $num)
    {
        $this->question[$num] = $question;
    }

}

class question
{
    public $questionnaire_question;
    public $questionnaire_question_type;
    public $questionnaire_question_nec;
    public $questionnaire_question_option;

    /**
     * @return mixed
     */
    public function getQuestionnairequestion()
    {
        return $this->questionnaire_question;
    }

    /**
     * @param mixed $questionnaire_question
     */
    public function setQuestionnairequestion($questionnaire_question)
    {
        $this->questionnaire_question = $questionnaire_question;
    }

    /**
     * @return mixed
     */
    public function getQuestionnairequestionType()
    {
        return $this->questionnaire_question_type;
    }

    /**
     * @param mixed $questionnaire_question_type
     */
    public function setQuestionnairequestionType($questionnaire_question_type)
    {
        $this->questionnaire_question_type = $questionnaire_question_type;
    }

    /**
     * @return mixed
     */
    public function getQuestionnairequestionNec()
    {
        return $this->questionnaire_question_nec;
    }

    /**
     * @param mixed $questionnaire_question_nec
     */
    public function setQuestionnairequestionNec($questionnaire_question_nec)
    {
        $this->questionnaire_question_nec = $questionnaire_question_nec;
    }

    /**
     * @return mixed
     */
    public function getQuestionnairequestionOption()
    {
        return $this->questionnaire_question_option;
    }

    /**
     * @param mixed $questionnaire_question_option
     */
    public function setQuestionnairequestionOption($questionnaire_question_option)
    {
        $this->questionnaire_question_option = $questionnaire_question_option;
    }

    public function setOptionarray($option)
    {
        $this->questionnaire_question_option[$option] = $option;
    }
}

function toJSONQuestion($rawPostData)
{

    //raw post to array
    $token = strtok($rawPostData, "&");
    $rawArray = null;

    $i = 0;
    while ($token != false) {
        $rawArray[$i] = $token;
        $token = strtok("&");
        $i++;
    }

//输出raw array
//    print("<pre>");
//    print_r($rawArray);
//    print("</pre>");

//raw array to json array
    $quen = new questionnaire();
    $que = new question();
    $i = 0;
    $j = 0;
    foreach ($rawArray as $value) {
        //get key
        $token = strtok($value, "=");

        if ($token == "questionnaire_titel") {
            $token = strtok("=");

            $quen->setQuestionnairetitel($token);
            continue;
        } elseif ($token == "questionnaire_string") {
            $token = strtok("=");

            $quen->setStringquestionnaireString($token);
            continue;
        }

        if ($token == "questionnaire_question_type") {
            $token = strtok("=");

            $que->setQuestionnairequestionType($token);
            continue;
        } elseif ($token == "questionnaire_question_nec") {
            $token = strtok("=");

            $que->setQuestionnairequestionNec($token);
            continue;
        }

        if ($token == "questionnaire_question") {
            if (!empty($que->questionnaire_question)) {
                $quen->setQuestionarray($que, $i);
                $que = new question();
                $i++;
                $j = 0;

                $token = strtok("=");

                $que->setQuestionnairequestion($token);
            } else {
                $token = strtok("=");

                $que->setQuestionnairequestion($token);
            }
        }

        if ($token == "questionnaire_question_option") {
            $token = strtok("=");

            $que->setOptionarray($token);
            $j++;
        }


    }

//插入最后一题（插入机制引起）
    if (!empty($que->questionnaire_question)) {
        $quen->setQuestionarray($que, $i);
        $que = new question();
    }
    $json = json_encode($quen);

//输出JSON
    return $json;
//    print("<pre>");
//    print_r(json_decode($json));
//    print("</pre>");

}

function toArrayQuestion($json)
{
    return json_decode($json, true);
}

function getJSONQuestion($id){

    $_SESSION['questionnairePTR'] = $id;
//    include '../config/dbconfig.php';

    $dbc=null;
    $dbc = dbc();
    $query = "SELECT question FROM t_questionnaire WHERE ID ='".$id."'";

    $result = $dbc->query($query);
    $result = $result->fetch_row();

    $_SESSION['questionnaireJSON'] = $result[0];

    $dbc->close();
}
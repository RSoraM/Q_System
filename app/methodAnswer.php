<?php

/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/3
 * Time: 15:45
 */
class ques
{
    public $que;

    /**
     * @return mixed
     */
    public function getQue()
    {
        return $this->que;
    }

    /**
     * @param mixed $que
     */
    public function setQue($que)
    {
        $this->que = $que;
    }

    public function setQueArray($num, $que)
    {
        $this->que[$num] = $que;
    }

}

class que
{
    public $type;
    public $option;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param mixed $option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }

    public function setOptionArray($option, $value)
    {
        $this->option[$option] = $value;
    }
}

function toJSONAnswer($rawJSON)
{
    $QueJSONArray = json_decode(urldecode($rawJSON),true);
    $i = 0;
    $ques = new ques();
    foreach ($QueJSONArray['question'] as $question) {
        $que = new que();

        $type = $question['questionnaire_question_type'];
        $que->setType($type);

        if ($type != "简答题") {
            foreach ($question['questionnaire_question_option'] as $option) {
                $que->setOptionArray($option, 0);
            }
            $ques->setQueArray($i, $que);
            $i++;
        } else {
            $que->setOption(null);
            $ques->setQueArray($i, $que);
            $i++;
        }

    }

    return json_encode($ques);
}

function getAnswerNum($Q_ID)
{
    include '../config/dbconfig.php';
    require '../app/methodCheckRelation.php';
    checkRelation($Q_ID,$_SESSION['login_ID']);

    $dbc=null;
    $dbc = dbc();
    $query = "SELECT count(*) FROM t_answer WHERE Q_ID='" . $Q_ID . "'";

    $questionnaireAnswerNum = $dbc->query($query);
    $questionnaireAnswerNum = $questionnaireAnswerNum->fetch_row();

    $dbc->close();
    return $questionnaireAnswerNum[0];
    exit;
}
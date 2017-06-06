<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/4
 * Time: 03:11
 */

//session_start();

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

class questions
{
    public $option;

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

    public function setOptionArray($num, $option)
    {
        $this->option[$num] = $option;
    }
}

class options
{
    public $type;
    public $op;

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
    public function getOp()
    {
        return $this->op;
    }

    /**
     * @param mixed $op
     */
    public function setOp($op)
    {
        $this->op = $op;
    }

    public function setOpArray($ops)
    {
        $this->op[$ops] = 0;
    }
}

$q = new questions();
$i = 0;
foreach ($pageArr[1]['que'] as $que) {

    if ($que['type'] == "简答题") {
        $i++;
        continue;
    }

    $j = 0;
    $o = new options();
    $o->setType($que['type']);
    foreach ($que['option'] as $option => $options) {
        $o->setOpArray($option);
        $j++;
    }

    $q->setOptionArray($i, $o);
    $i++;
}

$arrChart = json_encode($q);
$arrChart = json_decode($arrChart, true);

foreach ($pageArr as $page) {
    $i = 0;
    foreach ($page['que'] as $que) {
        if ($que['type'] == "简答题") {
            $i++;
            continue;
        }

        foreach ($que['option'] as $option => $options) {
            if ($options == 1) {
                $arrChart['option'][$i]['op'][$option]++;
            }
        }
        $i++;
    }
}
?>

<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a uk-toggle="target: .countChartButton;animation: uk-animation-fade">
                    <span class="countChartButton" uk-icon="icon: triangle-up"></span>
                    <span class="countChartButton" uk-icon="icon: triangle-down" hidden></span>
                </a>
            </li>
            <li>
                <a type="button" uk-icon="icon: more"
                   href="#"></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class="uk-navbar-center">
        <span class="uk-navbar-item uk-logo">统计</span>
    </div>

    <!--    <div class="uk-navbar-right">-->
    <!--        <ul class="uk-navbar-nav">-->
    <!--            <li>-->
    <!--                <a href="?page=--><?php //echo ($_GET['page'] - 1) . "&id=" . $_GET['id'] ?><!--"-->
    <!--                   uk-icon="icon: chevron-left"></a>-->
    <!--            </li>-->
    <!--            <li>-->
    <!--                <a href="?page=--><?php //echo ($_GET['page'] + 1) . "&id=" . $_GET['id'] ?><!--"-->
    <!--                   uk-icon="icon: chevron-right"></a>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--    </div>-->
</nav>

<div class="countChartButton uk-card-hover uk-card uk-card-small uk-card-default">
    <div class="uk-card-header uk-card-secondary">
        <span class="uk-text-truncate uk-card-title">
            <?php echo $JArray['questionnaire_titel']; ?>
        </span>
    </div>
    <div class="uk-card-body">
        <?php include '../app/funcLoadChart.php'?>
<!--        <pre>-->
<!--            --><?php //print_r($arrChart) ?>
<!--        </pre>-->
    </div>
    <div class="uk-card-footer">
        答卷数量：<?php echo $answerNum;?>
    </div>
</div>

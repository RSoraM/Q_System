<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/5
 * Time: 15:30
 */

?>
<div uk-grid>
    <?php
    $i = 0;
    foreach ($arrChart['option'] as $queNum => $options) {
        if ($options['type'] == "单选题") {
            ?>
            <div class="uk-height-large uk-width-1-2@m uk-width-1-1@s" id="ques<?php echo $queNum ?>"></div>
            <script>
                var ques<?php echo $queNum ?> = echarts.init(document.getElementById('ques<?php echo $queNum ?>'));

                var option<?php echo $queNum ?> = {

                    title: {
                        text: '<?php echo $JArray['question'][$queNum]['questionnaire_question'];?>',
                        left: 'center',
                        top: 20,
                        textStyle: {
                            color: '#333'
                        }
                    },

                    tooltip: {
                        trigger: 'item',
                        formatter: "{b} : {c} ({d}%)"
                    },

                    visualMap: {
                        <?php
                        $max = 0;
                        foreach ($options['op'] as $key => $value) {
                            $max < $value ? $max = $value : "";
                        }
                        ?>
                        show: false,
                        min: 0,
                        max:<?php echo $max;?>,
                        inRange: {
                            colorLightness: [0, 0.5]
                        }
                    },
                    series: [
                        {
                            name: "fuck",
                            type: 'pie',
                            radius: '70%',
                            center: ['50%', '50%'],
                            data: [
                                <?php
                                $x = 1;
                                $length = count($options['op']);
                                foreach ($options['op'] as $key => $value) {
                                ?>
                                {
                                    value:<?php echo $value;?>,
                                    name: '<?php echo $key?>'
                                }<?php echo ($x == $length) ? "" : ","; ?>
                                <?php
                                $x++;
                                }
                                ?>
                            ].sort(function (a, b) {
                                return a.value - b.value;
                            }),
                            roseType: 'radius',
                            label: {
                                normal: {
                                    textStyle: {
                                        color: '#444'
                                    }
                                }
                            },
                            labelLine: {
                                normal: {
                                    lineStyle: {
                                        color: '#666'
                                    },
                                    smooth: 0.2,
                                    length: 10,
                                    length2: 20
                                }
                            },
                            itemStyle: {
                                normal: {
                                    color: '#c23531',
                                    shadowBlur: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            },

                            animationType: 'scale',
                            animationEasing: 'elasticOut',
                            animationDelay: function (idx) {
                                return Math.random() * 200;
                            }
                        }
                    ]
                };

                ques<?php echo $queNum?>.setOption(option<?php echo $queNum ?>);
            </script>
        <?php
        $i++;
        } else {
        ?>
            <div class="uk-height-large uk-width-1-2@m uk-width-1-1@s" id="ques<?php echo $queNum ?>"></div>
            <script>
                var ques<?php echo $queNum ?> = echarts.init(document.getElementById('ques<?php echo $queNum ?>'));

                var option<?php echo $queNum ?> = {
                    title: {
                        text: '<?php echo $JArray['question'][$queNum]['questionnaire_question'];?>',
                        left: 'center',
                        top: 20,
                        textStyle: {
                            color: '#333'
                        }
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: [
                        {
                            type: 'category',
                            data: [
                                <?php
                                $x = 1;
                                $length = count($options['op']);
                                $max = 0;
                                foreach ($options['op'] as $key => $value) {
                                $max < $value ? $max = $value : "";
                                ?>
                                '<?php echo $key;?>'<?php echo ($x == $length) ? "" : ","; ?>
                                <?php
                                $x++;
                                }
                                ?>
                            ]
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value',
                            max: <?php echo $max + 0.5;?>
                        }
                    ],
                    visualMap:{
                        show:false,
                        min:0,
                        max:<?php echo $max?>,
                        inRange: {
                            colorLightness: [0, 0.5]
                        }
                    },
                    series: [
                        {
                            name: 'value',
                            type: 'bar',
                            data: [
                                <?php
                                $x = 1;
                                $length = count($options['op']);
                                foreach ($options['op'] as $key => $value) {
                                ?>
                                <?php echo $value;?><?php echo ($x == $length) ? "" : ","; ?>
                                <?php
                                $x++;
                                }
                                ?>],
                            markPoint: {
                                data: [
                                    {type: 'max', name: '最大值'},
                                    {type: 'min', name: '最小值'}
                                ]
                            },
                            itemStyle: {
                                normal: {
                                    color: '#c23531',
                                    shadowBlur: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            },
                            animationEasing: 'elasticOut',
                            animationDelay: function (idx) {
                                return Math.random() * 200;
                            }
                        }
                    ]
                };

                ques<?php echo $queNum?>.setOption(option<?php echo $queNum ?>);
            </script>
            <?php
            $i++;
        }
    }
    ?>
</div>


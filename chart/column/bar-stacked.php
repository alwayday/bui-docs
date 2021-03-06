<?php $title="柱状图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
        var chart = new AChart({
          id : 'canvas',
          <?php print getTheme()."\n"?>
          width : 950,
          height : 400,
           plotCfg : {
            margin : [50,50,80,80] //画板的边距
          },
          title : {
            text : 'Monthly Average Temperature',
            'font-size' : '16px'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          invert : true,
          xAxis : {
            categories: [
                      '一月',
                      '二月',
                      '三月',
                      '开票人预审',
                      '五月',
                      '六月',
                      '七月',
                      '八月',
                      '九月',
                      '十月',
                      '十一月',
                      '十二月'
            ],
            position : 'left', //x轴居左
            labels : {
              label : {
                'text-anchor' : 'end',
                'font-family' : '宋体',
                'font-weight': 'bold',
                x : -12,
                y : 0
              }
            }
          },
          yAxis : {
            position : 'bottom',
            min : 0
          },
          tooltip : {
            shared : true
          },
          seriesOptions : {
              columnCfg : {
                stackType : 'normal' //层叠
              }
          },
          series: [ {
                  name: 'Tokyo',
                  data: [49.9, 71.5, 106.4, 129.2, 144.0, 110, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

              }, {
                  name: 'New York',
                  data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

              }, {
                  name: 'London',
                  data: [48.9, 38.8, 39.3, 42, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

              }, {
                  name: 'Berlin',
                  data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

              }]

        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>

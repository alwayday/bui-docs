<?php $title="层叠柱状图"?>
<?php include("../../templates/chart-header.php"); ?>
  
    <style>
      .pie-container{
        position:absolute;
        visibility:hidden;
        border : 1px solid #efefef;
        background-color: white;
        opacity: .8;
        padding: 5px;
     
        transition: top 200ms,left 200ms;
        -moz-transition:  top 200ms,left 200ms;  /* Firefox 4 */
        -webkit-transition:  top 200ms,left 200ms; /* Safari 和 Chrome */
        -o-transition:  top 200ms,left 200ms;
      }

    </style>

    <div class="detail-section">

      <p>自定义tooltip上添加图表：</p>
      <ol>
        <li>指定tooltip对应的DOM p1</li>
        <li>在tooltip内部生成饼图</li>
        <li>监听chart的事件，更改饼图数据</li>
      </ol>
      <div id="canvas">
        
      </div>
    </div>

    <div style="display:none">
      <div id="p1" class="pie-container">
        <span>细节分步图</span>
        <div id="c2"></div>
      </div>
    </div>

    <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
        var chart = new AChart({
          id : 'canvas',
          <?php print getTheme()."\n"?>
          width : 950,
          height : 400,
          title : {
            text : 'Monthly Average Temperature',
            'font-size' : '16px'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          xAxis : {
            categories: [
                      'Jan',
                      'Feb',
                      'Mar',
                      'Apr',
                      'May',
                      'Jun',
                      'Jul',
                      'Aug',
                      'Sep',
                      'Oct',
                      'Nov',
                      'Dec'
                  ]
          },
          yAxis : {
            title : {
              text : 'xxxxx'
            },
            min : 0
          },
          tooltip : {
            shared : true,
            custom : true,
            html : '#p1'
          },
          seriesOptions : {
              columnCfg : {
                stackType : 'normal' //层叠
              }
          },
          series: [ {
                  name: 'Tokyo',
                  data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

              }, {
                  name: 'New York',
                  data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

              }, {
                  name: 'London',
                  data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

              }, {
                  name: 'Berlin',
                  data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

              }]
        });

        chart.render();



        var pieChart = new AChart({
          id : 'c2',
          <?php print getTheme()."\n"?>
          plotCfg : {
            margin : 0
          },
          width : 250,
          height : 250,
          
          legend : null ,//不显示图例
          seriesOptions : { //设置多个序列共同的属性
            pieCfg : {
              labels : {
                distance : 10,
                label : {
                  //文本信息可以在此配置
                },
                renderer : function(value,item){ //格式化文本
                  return value + ' ' + (item.point.percent * 100).toFixed(2)  + '%';
                }
              }
            }
          },
          tooltip : null,
          series : [{
              type: 'pie',
              size : '40%',
              animate : false,
              name: 'percent'
          }]
        });

        pieChart.render();
        var pie = pieChart.getSeries()[0];
        var handler = null;
        chart.on('tooltipchange',function(ev){
          var items = ev.items,
            data = [];
          for(var i = 0;i<items.length; i++){
            var item = items[i];
            data.push([item.name,item.value]);
          }

          clearTimeout(handler);
          handler = setTimeout(function(){ //避免频繁更改
            pie.changeData(data,true);
          },200);
          
          
        });
      </script>
<?php include("../../templates/control-footer.php"); ?>

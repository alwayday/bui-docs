<?php $title="嵌套"?>
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
          height : 500,
          title : {
            text : '浏览器分布图'
          },
          legend : null ,//不显示图例
          seriesOptions : { //设置多个序列共同的属性
            pieCfg : {
              allowPointSelect : true,
              colors:["#81abda","#bcdcbc","#feb698","#ffde8d","#e5e5e5","#fef8f8"],
              labels : {
                distance : 40, //文本距离圆的距离
                label : {
                  //文本信息可以在此配置
                },
                renderer : function(value,item){ //格式化文本
                  return value + ' ' + (item.point.percent * 100).toFixed(2)  + '%';
                }
              },
              innerSize : '60%' //内部的圆，留作空白

            }
          },
          tooltip : {
            pointRenderer : function(point){
              return (point.percent * 100).toFixed(2)+ '%';
            }
          },
          series : [{
              type: 'pie',
              name: 'Browser share',
              data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
              ]
          }]
        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>

<?php $title="多坐标轴"?>
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
          plotCfg : {
            margin : [50,50,80] //画板的边距
          },
          title : {
            text : '非均匀坐标轴'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          xAxis : {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
          },
          yAxis : [{
            position : 'left',
            
            title : {
              text : '金额',
              x : -40,
              rotate : -90
            }
          },{
            type : 'number',
            position : 'right',
            line : null,
            tickLine : null,
            labels : {
              label : {
                x : 12
              }
            },
            title : {
              text : '右边',
              x : 40,
              rotate : 90
            }
          }],
          seriesOptions : { //设置多个序列共同的属性
            lineCfg : { //不同类型的图对应不同的共用属性，lineCfg,areaCfg,columnCfg等，type + Cfg 标示
              smooth : true
              
            }
          },
          series : [{
              name: 'Rainfall',
              color: '#4572A7',
              type: 'column',
              yAxis: 1,
              data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
              tooltip: {
                  valueSuffix: ' mm'
              }

          }, {
              name: 'Temperature',
              color: '#89A54E',
              type: 'line',
              data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
              tooltip: {
                  valueSuffix: '°C'
              }
          }]
              
        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>
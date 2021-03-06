<?php $title="存在断点的区域图"?>
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
            text : '区域图'
          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          yAxis : {
            
            formatter : function  (value) {
              return value;
            }
          },
          seriesOptions : { //设置多个序列共同的属性
            areaCfg : { //如果数据序列未指定类型，则默认为指定了xxCfg的类型，否则都默认是line
              markers : {
                single : true
              },
              pointStart: 1940,
              pointInterval : 1
            }
          },
          tooltip : {
            valueSuffix : '￥'
          },
          series : [{ //中间存在断点，断点不做处理，不进行忽略
            name: 'USA',
            data: [null, null, null, null, null, 6 , 11, 32, 110, 235, 369, 640,1005, 1436,
                    2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,27387, 29459, 31056, 31982,
                    32040, 31233, 29224, 27342, 26662,26956, 27912, 28999, 28965, 27826, 25579,
                    25722, 24826, 24605,24304, null, null, 24099, 24357, 24237, 24401, 24344,
                    23586,22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
                    10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104
                ]
            }, {
                name: 'USSR/Russia',
                connectNulls : true, //此配置项会将null的数据忽略掉
                data: [null, null, null, null, null, null, null , null , null ,null,5, 25, 50,
                  120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,4238, 5221, 6129,
                  7089, 8339, 9399, 10538, 11643, 13092, 14478,15915, 17385, 19055, 21205,
                  23044, 25393, 27935, 30062, null,33952, 35804, 37431, 39197, 45000, 43000,
                  41000, 39000, 37000,35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000,
                  22000,21000, 20000, 19000, 18000, 18000, 17000, 16000
                ]
            }]

        });

        chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>

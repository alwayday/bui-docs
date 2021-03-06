<?php $title="固定toooltip"?>
<?php include("../../templates/chart-header.php"); ?>
<style>
  .ac-tooltip{
    border-width:  : 0;
    background-color: white;
    opacity: .8;
    padding: 20px;
  }

  .ac-tooltip .ac-title{
    margin: 0;
    padding: 5px 0;
  }

  .ac-tooltip .ac-list{
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .ac-tooltip li{
    line-height:  22px;
  }
</style>

    <div class="detail-section">
      <h2>点击图表显示提示信息</h2>
      <div class="row">
        <div class="span8">
          <div id="tip" class="ac-tooltip">
            <h3 class="ac-title"></h3>
            <table>
              <thead>
                <tr>
                  <td>index</td>
                  <td>name</td>
                  <td>value</td>
                </tr>
              </thead>
              <tbody class="ac-list">
                
              </tbody>
            </table>


          </div>
        </div>
      </div>
      <div id="canvas">

      </div>
    </div>

    <div style="display:none">
      
    </div>

  <?php include("../../templates/chart-script.php"); ?>
  <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
  <script type="text/javascript">
  
        var chart = new AChart({
          id : 'canvas', //render改成 id
          <?php print getTheme()."\n"?>
          width : 950,
          height : 500,
          plotCfg : {
            margin : [50,50,80] //画板的边距
          },
          title : {
            text : '一年的平均温度'

          },
          subTitle : {
            text : 'Source: WorldClimate.com'
          },
          xAxis : {
            categories : ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月']
          },
          yAxis : {
            title : {
              text : '温度',
              rotate : -90
            }
          },
          tooltip : {
            valueSuffix : '°C',
            shared : true, //是否多个数据序列共同显示信息
            custom : true, //自定义tooltip
            html : '#tip',//自定义tooltip的 模板或者 #id
            customFollow : false, //自定义tooltip不跟随移动
            triggerEvent : 'click', //点击触发显示tip
            formatter : function (item,index) {
              return AChart.Util.substitute('<tr><td>'+index+'</td><td>{name}</td><td style="color:{color}">{value}</td></tr>',item);
            },
            crosshairs : true //是否出现基准线
          },
          series : [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
          }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
          }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
          }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
          }, {
            name: 'Beijing',
            data: [13.9, 14.2, 15.7, 18.5, 21.9, 25.2, 27.0, 26.6, 24.2, 20.3, 16.6, 14.8]
          }, {
            name: 'Sahnghai',
            data: [17.0, 16.9, 19.5, 24.5, 28.2, 31.5, 35.2, 36.5, 33.3, 28.3, 23.9, 19.6]
          }]
        });

        chart.render();

  </script>
<?php include("../../templates/control-footer.php"); ?>

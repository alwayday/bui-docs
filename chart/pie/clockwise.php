<?php $title="多层饼图"?>
<?php include("../../templates/chart-header.php"); ?>

    <div class="detail-section">
      <div id="canvas">

      </div>
    </div>

  <?php include("../../templates/chart-script.php"); ?>

  <script type="text/javascript">
    var chart = new AChart({
      id : 'canvas',
      width : 300,
      height : 300,
      plotCfg : {
        margin : [0]
      },
      title : {
        text : '饼图'
      },
      tooltip : {
        shared : true
      },
      seriesOptions : {
          pieCfg : {
            allowPointSelect : false,
            labels : null,
            animate : false
          }
      },
      legend : {
        align : 'right',//top,left,right,bottom(默认)
        layout : 'vertical',//默认 horizontal
        dy : -100,
        dx : -100,
        back : null
      },
      tooltip : null,
      series: [{
          type: 'pie',
          radius : 100,
          innerRadius : 80,
          name: 'outter',
          color : 'rgb(169, 208, 82)',
          data: [
            {name : '',y : 40,attrs : {fill : '#fff'},placeHolder : true},
            {name : 'outter',   y : 60,attrs : {fill : 'rgb(169, 208, 82)'}}
          ]
      },
      {
          type: 'pie',
          name: 'middle',
          radius : 80,
          innerRadius : 60,
          color: 'rgb(85, 194, 187)',
          data: [
            
            {name : '',y : 70,attrs : {fill : '#fff'},placeHolder : true},
            {name : 'middle',   y : 30,attrs : {fill : 'rgb(85, 194, 187)'}}
          ]
      },
      {
          type: 'pie',
          name: 'inner',
          radius : 60,
          color : 'rgb(161, 45, 45)',
          innerRadius : 40,
          data: [
            
            {name : '',y : 50,attrs : {fill : '#fff'},placeHolder : true},
            {name : 'inner',   y : 50,attrs : {fill : 'rgb(161, 45, 45)'}}
          ]
      }]
    });

    chart.render();
      </script>
<?php include("../../templates/control-footer.php"); ?>

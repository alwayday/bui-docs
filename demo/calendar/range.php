<?php $title="日期范围"?>
<?php include("../../templates/control-header.php"); ?>
    <form  method="post">
      <h2>选择日期</h2>
      <p>
        <label>选择日期：</label><input type="text" class="calendar" />
      </p>
       <p>
        <label>选择日期：</label><input type="text" class="calendar" />
      </p>

    </form>
    <?php include("../../templates/script.php"); ?>
    <script type="text/javascript">
    <?php if($useKissy) {?>
KISSY.use('bui/calendar',function(S,Calendar){
    <?php }else if($useLoader) {?>
    BUI.use('bui/calendar',function(Calendar){
    <?php }else{?>
      var Calendar = BUI.Calendar
    <?php }?>
      var datepicker = new Calendar.DatePicker({
            trigger:'.calendar',
            minDate : '2015-12-01',
            maxDate : '2015-12-25',
            autoRender : true
          });
    <?php if($useLoader || $useKissy) {?>
    });
    <?php } ?>
</script>
<?php include("../../templates/control-footer.php"); ?>



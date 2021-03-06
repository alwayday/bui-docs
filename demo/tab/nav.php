<?php $title="按钮式标签"?>
<?php include("../../templates/control-header.php"); ?>
    <div class="toolbar">
      <button id="btnAdd" class="button button-primary">添加</button>
      <button id="btnRefresh" class="button button-primary">刷新</button>

    </div>
    <div id="tab"></div>
    
    <?php include("../../templates/script.php"); ?>
    <script type="text/javascript">
    <?php if($useKissy) {?>
      KISSY.use('bui/tab',function(S,Tab){
    <?php }else if($useLoader) {?>
      BUI.use('bui/tab',function(Tab){
    <?php }else{?> 
        var Tab = BUI.Tab
    <?php }?>  
        var tab = new Tab.NavTab({
          render:'#tab',
          height:300,
          children : [
            {
              title : '测试标签',
              href : 'http://www.baidu.com',
              actived:true
            },
            {
              title : '测试标签2',
              href : 'http://www.baidu.com'
            }
          ]
        });

        tab.render();
        $('#btnAdd').on('click',function(){
          var config = {
              title : '添加标签',
              href : 'http://www.baidu.com'
            };
          tab.addTab(config);
        });

        $('#btnRefresh').on('click',function(){
          var item = tab.getActivedItem();
          //item = tab.getItemById(id);//通过id获取
          item && item.reload();
        });
    <?php if($useLoader) {?>  
      });
    <?php } ?> 
    </script>
<?php include("../../templates/control-footer.php"); ?>


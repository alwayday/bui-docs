<?php $title="表格单元格编辑"?>
<?php include("../../templates/control-header.php"); ?>
    <div class="row">
      <div class="span16">
        <div id="grid">
          
        </div>
      </div>
    </div>
    <?php include("../../templates/script.php"); ?>
    <script type="text/javascript">
    <?php if($useKissy) {?>
    KISSY.use(['bui/grid','bui/data','bui/picker','bui/tree'],function(S,Grid,Data,Picker,Tree){
    <?php }else {?>
    BUI.use(['bui/grid','bui/data','bui/picker','bui/tree'],function(Grid,Data,Picker,Tree){
    <?php }?>
        

         //树节点数据，
        //text : 文本，
        //id : 节点的id,
        //leaf ：标示是否叶子节点，可以不提供，根据childern,是否为空判断
        //expanded ： 是否默认展开
        var nodes = [ 
              {text : '1',id : '1',children: [{text : '11',id : '11'}]},
              {text : '2',id : '2',expanded : true,children : [
                  {text : '21',id : '21',children : [{text : '211',id : '211'},{text : '212',id : '212'}]},
                  {text : '22',id : '22'}
              ]},
              {text : '3',id : '3'},
              {text : '4',id : '4'}
            ],
          //由于这个树，不显示根节点，所以可以不指定根节点
          tree = new Tree.TreeList({
            nodes : nodes,
            dirSelectable : false,//阻止树节点选中
            showLine : true //显示连接线
          });
     
        var  picker = new Picker.ListPicker({
            width:150,  //指定宽度
            children : [tree] //配置picker内的列表
          });
        var Grid = Grid,
          Store = Data.Store,
          enumObj = {"1" : "选项一","2" : "选项二","3" : "选项三"},
          columns = [
            {title : '文本',dataIndex :'a',editor : {xtype : 'text'}}, //editor中的定义等用于 BUI.Form.Field.Text的定义
            {title : '数字', dataIndex :'b',editor : {xtype : 'number',rules : {required : true}}},
            {title : '树单选',dataIndex : 'd', editor : {xtype :'select',select : {picker : picker}}},
            {title : '多选',dataIndex : 'e', editor : {xtype :'select',select:{multipleSelect : true},items : enumObj},renderer : Grid.Format.multipleItemsRenderer(enumObj)}
          ],
          data = [{a:'123',e:'2,3'},{a:'cdd',c:1363924044176},{a:'1333',b:2222,d:2}];
        var editing = new Grid.Plugins.CellEditing(),
          store = new Store({
            data : data,
            autoLoad:true
          }),
          grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            width : 700,
            forceFit : true,
            tbar:{ //添加、删除
                items : [{
                  btnCls : 'button button-small',
                  text : '<i class="icon-plus"></i>添加',
                  listeners : {
                    'click' : addFunction
                  }
                },
                {
                  btnCls : 'button button-small',
                  text : '<i class="icon-remove"></i>删除',
                  listeners : {
                    'click' : delFunction
                  }
                }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection],
            store : store
          });

        grid.render();

        //添加记录
        function addFunction(){
          var newData = {b : 0};
          store.addAt(newData,0);
          editing.edit(newData,'a'); //添加记录后，直接编辑
        }
        //删除选中的记录
        function delFunction(){
          var selections = grid.getSelection();
          store.remove(selections);
        }          
  });

</script>
<?php include("../../templates/control-footer.php"); ?>


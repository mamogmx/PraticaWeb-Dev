<?php
require_once "init.php";

?>
<html>
<head>
    
</head>
<body>
    
    
<form id="ff" class="form-horizontal easyui-form" action="services/xServer.php" method="post" data-options="novalidate:true">
    <div class="form-group">
        <label class="col-sm-1" for="user">Nome Utente</label>
        <div class="col-sm-1">
        <input name="user" id="user" data-options="required:true" class="f1 easyui-validatebox form-control" placeholder="Utente">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-1" for="pwd">Password</label>
        <div class="col-sm-1">
        <input id="pwd" name="pwd" data-options="required:true" class="f1 easyui-validatebox form-control" type="password" placeholder="Password">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-1">
        <input class="btn btn-default" type="submit" value="Accedi">
        </div>
    </div>
 



</form>
</div>
<style scoped>
    .f1{
        width:200px;
    }
</style>
<script type="text/javascript">
    $(function(){
        $('#ff').form({
            success:function(data){
                $.messager.alert('Info', data, 'info');
            },
            onSubmit:function(){
                return $(this).form('enableValidation').form('validate');
            },
            queryParams:{action:'login'}
        });
    });
    </script>    
</body>
</html>
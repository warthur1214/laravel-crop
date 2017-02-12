<!DOCTYPE html>
<html>

<head>
    <include file="Index:meta" />
    <include file="Index:css" />
    <style type="text/css">
    .alert_page_success {
        color: #468847;
        background-color: #dff0d8;
        border-color: #d6e9c6
    }
    
    .alert_page_error {
        color: #b94a48;
        background-color: #f2dede;
        border-color: #eed3d7
    }
    
    #allmap {
        width: 100%;
        height: 500px;
        overflow: hidden;
    }
    
    #result {
        width: 100%;
        font-size: 12px;
    }
    
    #myTablePopup .dataTables_wrapper div.dataTables_info {
        display: none;
    }
    </style>
</head>

<body>
    <section class="content-header">
        <h1>
        编辑角色
      </h1>
    </section>
    <!-- general form elements -->
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="title" colspan="6"><i class="fa fa fa-info-circle"></i> 基本信息</td>
                        </tr>
                        <tr>
                            <th><span class="text-red">*</span>角色归属</th>
                            <td colspan="2">
                                <div class="relative">
                                    <input type="hidden" name="organ_id">
                                    <input type="text" class="form-control" id="organ_id" placeholder="选择所属企业或机构" readonly="readonly">
                                    <div id="roleTree" class="role-tree-popup hide"></div>
                                </div>
                            </td>
                            <th><span class="text-red">*</span>角色名称</th>
                            <td colspan="2">
                                <input type="text" class="form-control" name="role_name" placeholder="请输入角色名称" required>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="text-red">*</span>角色描述</th>
                            <td colspan="5">
                                <textarea class="form-control" name="role_depict" placeholder="请输入角色描述" required></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--tab标签页-->
                <ul class="nav nav-tabs nav-tabs-cus">
                    <li class="active"><a href="#roleOrganTab" data-toggle="tab">数据权限</a></li>
                    <li><a href="#roleModuleTab" data-toggle="tab">功能权限</a></li>
                    <li><a href="#roleAccountTab" data-toggle="tab">角色成员</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active paddingT10" id="roleOrganTab">
                        <div id="roleOrganTree"></div>
                    </div>
                    <div class="tab-pane" id="roleModuleTab">
                        <div class="callout callout-cus" v-for="item in items">
                            <h4>{{item.system_name}}</h4>
                            <div v-for="itemModule in item.system_module" class="role-module-box">
                                <span class="title">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="role_module" value="{{itemModule.module_id}}">
                                        {{itemModule.module_name}}
                                    </label> 
                                </span>
                                <ul class="list-inline" v-for="itemSon in itemModule.son">
                                    <li>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="role_module" @click="checkItem" value="{{itemSon.module_id}}">{{itemSon.module_name}}
                                        </label>
                                    </li>
                                    <li v-for="itemSonSon in itemSon.son">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="role_module" @click="checkItemSon" value="{{itemSonSon.module_id}}">{{itemSonSon.module_name}}
                                        </label>
                                    </li>  
                                    <li>
                                        <label class="checkbox-inline checkbox-all">
                                            <input role="chkAll" type="checkbox" @click="checkItemAll">全选
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane paddingT10" id="roleAccountTab">
                        <input type="hidden" name="role_account">
                        <button type="button" id="AddRoleAccount" class="btn btn-sm btn-info">添加本角色账号</button>
                        <div id="roleAccountTree" class="role-account-tree hide"></div>
                        <table id="myTable" class="table table-bordered table-hover"></table>
                    </div>
                </div>
                <!--tab标签页-->
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="button" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="/Home/Role/roleList" class="btn btn-default"><i class="fa fa-arrow-left"></i> 返回</a>
        </div>
    </div>
    <!-- /.box -->
    <include file="Index:js" />
    <include file="Index:datatable" />
    <include file="Index:validate" />
    <script type="text/javascript" src="/Public/js/public/vue.js"></script>
    <script type="text/javascript" src="/Public/js/role/roleTree.js"></script>
    <script type="text/javascript" src="/Public/js/role/roleAccountTree.js"></script>
    <script type="text/javascript" src="/Public/js/role/roleAccountTreeNew.js"></script> 
    <script type="text/javascript" src="/Public/js/role/editRole.js"></script>
</body>

</html>

/**
 * Created by Administrator on 2016/10/26.
 */
$(function(){
    var _id = location.href.split('id=')[1];
    var htmlStr = '';
    AjaxJson('/Home/Organ/getInfoById/id/' + _id, function( res ){
        htmlStr += '<table class="table table-bordered">'
                +'<tbody>'
                +'<tr>'
                +'<td class="title" colspan="6"><i class="fa fa fa-info-circle"></i> 企业信息</td>'
                +'</tr>'
                +'<tr>'
                +'<th>企业名称</th>'
                +'<td>'+res.organ_name+'</td>'
                +'<th>企业简称</th>'
                +'<td>'+res.abbreviated_name+'</td>'
                +'<th>企业类型</th>'
                +'<td>'+res.type_name+'</td>'
                +'</tr>'
                +'<tr>'
                +'<th>企业地址</th>'
                +'<td>'+res.province+res.city+res.organ_address+'</td>'
                +'<th>联系人</th>'
                +'<td>'+res.contact_person+'</td>'
                +'<th>联系电话</th>'
                +'<td>'+res.contact_phone+'</td>'
                +'</tr>'
                +'<tr>'
                +'<th>联系邮箱</th>'
                +'<td>'+res.contact_email+'</td>'
                +'<th>合作类型</th>'
                +'<td>'+res.cooperate_type+'</td>'
                +'</tr>'
                +'<tr>'
                +'<th>channel_id</th>'
                +'<td>'+res.organ_channel_id+'</td>'
                +'<th>channel_secret</th>'
                +'<td>'+res.organ_channel_secret+'</td>'
                +'</tr>'
                +'<tr>'
                +'<th>企业信息备注</th>'
                +'<td colspan="5">'+res.comment+'</td>'
                +'</tr>'
                +'</tbody>'
                +'</table>';
        $("#info_form").html(htmlStr);
    });
    $("#editMsg").click(function () {
        window.location.href = 'editOrgan?id='+_id
    })
});
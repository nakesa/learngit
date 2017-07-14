<script type="text/javascript">
// $(document).ready(function(){
// 	$("#user_id").focus(function(){
// 		$("#user_name").val('');
// 		$("#account_name").val('');
// 	});
// 	$("#user_name").focus(function(){
// 		$("#user_id").val('');
// 		$("#account_name").val('');
// 	});
// 	$("#account_name").focus(function(){
// 		$("#user_id").val('');
// 		$("#user_name").val('');
// 	});
// })
</script>
<!--右侧-->
	<div class="sdk_right">
		<div class="sdk_rightnav">当前位置：日志管理  > 提现日志</div>
		<div class="sdk_righcon">
			<form action="" method="get">
			<div class="sdk_rightsearch">
				<span>开始日期：</span><input type="text" class="sdk_zhucetext" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" size="15" id="start_date" name="start_date" value="<?php echo $start_date?>"/>
				<span>结束日期：</span><input type="text" class="sdk_zhucetext" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" size="15" id="end_date" name="end_date" value="<?php echo $end_date?>" />
				<span>账号状态:
					<select id="account_state" name="account_state" style="height: 25px;">
						<option value="0" <?php if($account_state == 0){echo 'selected="selected"';}?>>全部</option>
						<option value="1" <?php if($account_state == 1){echo 'selected="selected"';}?>>正常</option>
    					<option value="2" <?php if($account_state == 2){echo 'selected="selected"';}?>>黑名单</option>
						<option value="3" <?php if($account_state == 3){echo 'selected="selected"';}?>>异常</option>
					</select>
				</span>
				<span>提现状态:
					<select id="cash_state" name="cash_state" style="height: 25px;">
						<option value="0" <?php if($cash_state == 0){echo 'selected="selected"';}?>>全部</option>
						<option value="1" <?php if($cash_state == 1){echo 'selected="selected"';}?>>未处理</option>
    					<option value="2" <?php if($cash_state == 2){echo 'selected="selected"';}?>>锁定</option>
    					<option value="3" <?php if($cash_state == 3){echo 'selected="selected"';}?>>处理中</option>
    					<option value="4" <?php if($cash_state == 4){echo 'selected="selected"';}?>>完成</option>
						<option value="5" <?php if($cash_state == 5){echo 'selected="selected"';}?>>失败</option>
					</select>
				</span>
				<span>确认状态:
					<select id="confirm_state" name="confirm_state" style="height: 25px;">
						<option value="0" <?php if($confirm_state == 0){echo 'selected="selected"';}?>>正常</option>
						<option value="1" <?php if($confirm_state == 1){echo 'selected="selected"';}?>>批准</option>
    					<option value="2" <?php if($confirm_state == 2){echo 'selected="selected"';}?>>拒绝</option>
					</select>
				</span>
				<span>角色ID：<input type="text" class="sdk_zhucetext" name="user_id" style="width:80px" value="<?php echo $user_id?>"/></span>
				<input type="submit" name="" class="sdk_rsbtn" id="" value="查看" />
			</div>
			</form>
			<form action="/admin/logmanagent/excel_export" method="get">
			<div class="sdk_rightsearch">
				<span>开始日期：</span><input type="text" class="sdk_zhucetext" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" size="15" id="start_date" name="start_date" value="<?php echo $start_date?>"/>
				<span>结束日期：</span><input type="text" class="sdk_zhucetext" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" size="15" id="end_date" name="end_date" value="<?php echo $end_date?>" />
				<input type="submit" name="" class="sdk_rsbtn" id="" value="導出" />
			</div>
			</form>
			<table cellspacing="0" cellpadding="0" border="0" width="100%" class="sdk_table">
				<tr>
					<th>ID</th>
					<th>用户Id</th>
					<th>支付宝账号</th>
					<th>账号名</th>
					<th>渠道</th>
					<th>申请额度</th>
					<th>银行余额</th>
					<th>手续费</th>
					<th>提现额度</th>
					<th>账号状态</th>
					<th>提现状态</th>
					<th>处理消息</th>
					<th>自动转账状态</th>
					<th>提现时间</th>
					<th>发放时间</th>
					<th>锁定时间</th>
					<th>备注</th>
					<th>操作</th>
					<th>确认按钮</th>
				</tr>
				<?php if($rs): ?>
				<?php foreach($rs as $key => $val):?>
				<tr>
                                        <td><?php echo $val['id'];?></td>
                                        <td><?php echo $val['uid'];?></td>
                        <td id="tdu-<?php echo $val['id'];?>">
                            <label id="<?php echo $val['id'].'alipay'?>" value="<?php echo $val['alipay']?>"><?php echo $val['alipay']?></label>
                        </td>
                        <td id="tda-<?php echo $val['id'];?>">
                            <label id="<?php echo $val['id'].'alipay_name'?>" value="<?php echo $val['alipay_name']?>"><?php echo $val['alipay_name']?></label>
                        </td>
					<td><?php echo $val['channel_id'];?></td>
					<td><?php echo $val['money'];?></td>
					<td><?php echo $val['bank_coin'];?></td>
					<td><?php echo $val['money']*0.02;?></td>
					<td><?php echo $val['money']-($val['money']*0.02);?></td>
					<td>
					<?php if ($val['cash_state'] == 4){
					    if ($val['account_state'] == 1){
					        echo "正常";
					    }else if ($val['account_state'] == 2){
					        echo "黑名单";
					    }else if ($val['account_state'] == 3){
					        echo "异常";
					    }else {
					        echo "未知类型";
					    }?>
					<?php }else{?>
					    <select id="<?php echo $val['id'].'account_state'?>" name="<?php echo $val['id'].'account_state'?>" style="height: 25px;">
    						<option value="1" <?php if($val['account_state'] == 1){echo 'selected="selected"';}?>>正常</option>
        					<option value="2" <?php if($val['account_state'] == 2){echo 'selected="selected"';}?>>黑名单</option>
    						<option value="3" <?php if($val['account_state'] == 3){echo 'selected="selected"';}?>>异常</option>
						</select>
					<?php }?>
					</td>
					<td>
					<?php if ($val['cash_state'] == 4){
    					echo "完成";?>
					<?php }else{?>
					    <select id="<?php echo $val['id'].'cash_state'?>" name="<?php echo $val['id'].'cash_state'?>" style="height: 25px;">
					    	<option value="1" <?php if($val['cash_state'] == 1){echo 'selected="selected"';}?>>未处理</option>
        					<option value="2" <?php if($val['cash_state'] == 2){echo 'selected="selected"';}?>>锁定</option>
        					<option value="3" <?php if($val['cash_state'] == 3){echo 'selected="selected"';}?>>处理中</option>
        					<option value="4" <?php if($val['cash_state'] == 4){echo 'selected="selected"';}?>>完成</option>
    						<option value="5" <?php if($val['cash_state'] == 5){echo 'selected="selected"';}?>>失败</option>
					    </select>
					<?php }?>
					</td>
					<td>
						<?php if ($val['cash_state'] != 4) : ?>
						<?php echo key_exists($val['return_msg'], $ky_return_msg) ? $ky_return_msg[$val['return_msg']] : $val['return_msg']; ?>
						<?php endif; ?>
					</td>
					<td>
					<?php 
					if ($val['return_state'] == 0){
					    echo "正常";
					}else if ($val['return_state'] == 1){
					    echo "转人工处理";
					}else {
					    echo "未知类型";
					}
					?>
					</td>
					<td><?php echo date('Y-m-d H:i:s',$val['create_time']);?></td>
					<td><?php if ($val['give_time'] != null ){
					    echo date('Y-m-d H:i:s',$val['give_time']);
    					} else{
    					    echo "未处理";
    					}
					    ?></td>
					<td><?php if ($val['lock_time'] != null ){
					    echo date('Y-m-d H:i:s',$val['lock_time']);
    					} else{
    					    echo "未锁定";
    					}
					    ?></td>
					<td>
						<input id="<?php echo $val['id'].'desc'?>" name="<?php echo $val['id'].'desc'?>"
						 type="text" class="sdk_zhucetext" style="width:120px" value="<?php echo trim($val['desc']);?>"/>
					</td>
					<td>
						<label><input name="<?php echo $val['id'].'confirm_state'?>" type="radio" <?php if($val['confirm_state'] == 1){echo 'checked="checked"';}?> value="1" />批准</label> 
						<label><input name="<?php echo $val['id'].'confirm_state'?>" type="radio" <?php if($val['confirm_state'] == 2){echo 'checked="checked"';}?> value="2" />拒绝</label>
						<?php if ($val['cash_state'] == 5){ ?>
							<a href="#" onclick="editRow(<?php echo $val['id']?>,'<?php echo $val['alipay']?>','<?php echo $val['alipay_name']?>')" id ="edit_confirm" >编辑</a>
						<?php }?>
					</td>
					<td><a href="javascript:void(0);" onclick="enter_confirm(<?php echo $val['id']?>,<?php echo $val['uid']?>,<?php echo $val['cash_state']?>)" id ="enter_confirm" >确认</a></td>
				</tr>
				<?php endforeach;?>
				<?php endif;?>
			</table>
			<table width="100%">
			<tr align="center">
			<td width="16%" align="center" valign="top">总共有 <b><?php echo $total;?></b> 条数据</td>
			<td align="left" valign="top"><?php echo $pageview;?>&nbsp;</td>
			</tr>
			</table>
			</div>
		</div>
		<div id="code_background"></div>
<!--右侧-->

<!--增加大区-->
<div class="tanceng" style="display:none" id="tanceng_add">
    <div class="bobg" id="bobg_add"></div>
    <div class="tc_con" id="tc_con_add">
        <div class="tc_contitle"><a href="javascript:void(0);" id="tc_close_add">关闭</a><h3>编辑提现</h3></div>
        <div class="tc_concon">
            <input type="hidden" name="edit_alipay_id" id="edit_alipay_id"/>
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tc_table">
                <tbody>
                <tr>
                    <td align="right">支付宝账号:</td>
                    <td><input type="text" value="" id="alipay_edit" class="sdk_zhucetext" name="name_add">
                        <span>
		                   <font color="red"><label class="error" id="name_add_error"></label></font>
		                </span>
                    </td>
                </tr>
                <tr>
                    <td align="right">账号名:</td>
                    <td><input type="text" value="" id="alipayname_edit" class="sdk_zhucetext" name="platform_id_add">
                        <span>
		                   <font color="red"><label class="error" id="platform_id_add_error"></label></font>
		                </span>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="tc_bottom">
                <input type="button" name="button" class="tc_subbtn" id="" value="确定" onClick="submitEdit()"/><a href="javascript:void(0);" class="tc_quxiao" id="tc_quxiao_add">取消</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// function excel_export() {
// 	var start_date_value = $('#start_date').val();
// // 	alert(start_date_value);

// 	var end_date_value = $('#end_date').val();
// // 	alert(end_date_value);

// 	var account_state_value = $('#account_state' +' option:selected').val();
// // 	alert(account_state_value);

// 	var cash_state_value = $('#cash_state' +' option:selected').val();
// // 	alert(cash_state_value);

// 	var confirm_state_value = $('#confirm_state' +' option:selected').val();
// // 	alert(confirm_state_value);
	
// 	$.post("/admin/logmanagent/excel_export", {
// 		start_date:start_date_value,
// 		end_date:end_date_value,
// 		account_state:account_state_value,
// 		cash_state:cash_state_value,
// 		confirm_state:confirm_state_value});
	
// // 	$.post("/admin/logmanagent/excel_export",{
// // 		start_date:start_date_value,
// // 		end_date:end_date_value,
// // 		account_state:account_state_value,
// // 		cash_state:cash_state_value,
// // 		confirm_state:confirm_state_value},
// // 			function(data){
// //     	    	alert(data.msg);
// //     	    },
// // 	  "json");//这里返回的类型有：json,html,xml,text
// }

function enter_confirm(id, uid, cash_state) {
// 	alert(cash_state);
	if(cash_state == 4){
		alert("该订单已提现.");
		return;
	}
	var confirm_state_value  = $('input[name='+ id+'confirm_state' +']:checked').val(); //获取被选中Radio的Value值
	if(confirm_state_value == undefined){
		alert("请先选中操作类型.");
		return;
	}
	
	var desc_value = $('#'+id+'desc').val();
// 	alert(desc_value);
	
	var alipay_value = $('#'+id+'alipay').attr("value");
	alert(alipay_value);

	var alipay_name_value = $('#'+id+'alipay_name').attr("value");
	alert(alipay_name_value);
	
	var account_state_value = $('#'+ id+'account_state' +' option:selected').val();
// 	alert(account_state_value);

	var cash_state_value = $('#'+ id+'cash_state' +' option:selected').val();
// 	alert(cash_state_value);
	
	$.ajax({
	    url:'/admin/logmanagent/ajaxcash',// 跳转到 action  
	    data:{
	        id : id,
	        uid : uid,
	        alipay : alipay_value,
	        alipay_name : alipay_name_value,
	        confirm_state : confirm_state_value,
	        desc : desc_value,
	        account_state : account_state_value,
	        cash_state : cash_state_value,
	    },
	    type:'POST',  
	    cache:false,  
	    dataType:'json',   
	    success:function(data) {    
	        if(data.msg == 1){
	        	alert("操作成功");
	        	window.location.reload(true);
	        }else{
		        alert("操作失败，请重新操作");
	        }
	     },
	     error : function() {    
	         alert("异常！");    
	     }  
	});
}

$(function(){
    $("#tc_quxiao_add,#tc_close_add").click(function(){
        $("#tanceng_add").hide();
    });
    $("#tc_quxiao_edit,#tc_close_edit").click(function(){
        $("#tanceng_edit").hide();
    });
});

function editRow(id, alipay, alipay_name){
    $("#edit_alipay_id").val(id);
    $("#alipay_edit").val(alipay);
    $("#alipayname_edit").val(alipay_name);


    var _height=  document.body.clientHeight;
    var _width = document.body.clientWidth;
    $("#bobg_add").css({"width":_width,"height":_height,"opacity":"0.5"});
    $("#tanceng_add").show();
    var _top =Math.floor((_height-$("#tc_con_add").height()-$(document).scrollTop())/2);
    var _left = Math.floor((_width-$("#tc_con_add").width())/2);
    $("#tc_con_add").css({"top":_top,"left":_left});

}

function submitEdit(){
    var id = $("#edit_alipay_id").val();
    var alipay = $("#alipay_edit").val();
    var alipay_name = $("#alipayname_edit").val();

    $.ajax({
        url:'/admin/logmanagent/ajaxcashEdit',// 跳转到 action
        data:{
            id : id,
            alipay : alipay,
            alipay_name : alipay_name,
        },
        type:'POST',
        cache:false,
        dataType:'json',
        success:function(data) {
            if(data.msg == 1){
                alert("操作成功");
                window.location.reload(true);
            }else{
                alert("操作失败，请重新操作");
            }
        },
        error : function() {
            alert("异常！");
        }
    });
}
</script>

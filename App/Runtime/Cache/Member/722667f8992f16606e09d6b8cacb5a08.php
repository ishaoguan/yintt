<?php if (!defined('THINK_PATH')) exit(); if($safe_question == '1'): ?><div class="us_rb4">
	<div class="u12_clew">
		<p><img src="__ROOT__/Style/H/images/ministar.gif" style="margin-right: 5px;">
		您已经设置安全问题</p>
	</div>
</div>
<?php else: ?>
<div class="us_rb12">
	<div style="overflow: auto; width: 594px; height: 435px;"
		id="mybox3_content">
		<div style="width: 100%; height: 270px;">
			<div
				style="width: 20%; height: 270px; line-height: 30px; float: left; font-size: 14px; text-align: center;">
				<img src="__ROOT__/Style/M/images/s_question.gif"
					style="vertical-align: middle">
			</div>
			<div
				style="width: 80%; height: 270px; line-height: 30px; float: left; font-size: 14px;">
				<span style="margin: 10px; display: block; text-align: left;">非常重要！请认真回答问题并牢记答案！
					<div style="vertical-align: top; margin: 2px;">
						问题：<select
							style="width: 180px; height: 21px; line-height: 21px; font-size: 14px; margin: 5px;"
							onchange="$(&quot;#qErr&quot;).html(&quot;&quot;)" id="question1"><option
								value="您母亲的生日是？">您母亲的生日是？</option>
							<option value="您母亲的姓名是？">您母亲的姓名是？</option>
							<option value="您父亲的生日是？">您父亲的生日是？</option>
							<option value="您父亲的姓名是？">您父亲的姓名是？</option>
							<option value="您孩子的生日是？">您孩子的生日是？</option>
							<option value="您孩子的姓名是？">您孩子的姓名是？</option>
							<option value="您配偶的名字是？">您配偶的名字是？</option>
							<option value="您配偶的生日是？">您配偶的生日是？</option>
							<option value="您的出生地是哪里？">您的出生地是哪里？</option>
							<option value="您最喜欢什么颜色？">您最喜欢什么颜色？</option>
							<option value="您是什么学历？">您是什么学历？</option>
							<option value="您的属相是什么的？">您的属相是什么的？</option>
							<option value="您小学就读的是哪所学校？">您小学就读的是哪所学校？</option>
							<option value="您最崇拜谁？">您最崇拜谁？</option>
							<option value="您打字经常用什么输入法？">您打字经常用什么输入法？</option>
							<option value="您是什么时间参加工作的？">您是什么时间参加工作的？</option></select>
					</div>
					<div style="vertical-align: top; margin: 2px;">
						答案：<input type="text"
							style="width: 173px; height: 21px; line-height: 21px; font-size: 14px; font-weight: bold; margin: 5px;"
							id="answer1"> <span style="color: red; font-size: 12px;"
							id="answer1err"></span>
					</div>
					<div style="vertical-align: top; margin: 2px;">
						问题：<select
							style="width: 180px; height: 21px; line-height: 21px; font-size: 14px; margin: 5px;"
							onchange="$(&quot;#qErr&quot;).html(&quot;&quot;)" id="question2"><option
								value="您母亲的生日是？">您母亲的生日是？</option>
							<option value="您母亲的姓名是？" selected="">您母亲的姓名是？</option>
							<option value="您父亲的生日是？">您父亲的生日是？</option>
							<option value="您父亲的姓名是？">您父亲的姓名是？</option>
							<option value="您孩子的生日是？">您孩子的生日是？</option>
							<option value="您孩子的姓名是？">您孩子的姓名是？</option>
							<option value="您配偶的名字是？">您配偶的名字是？</option>
							<option value="您配偶的生日是？">您配偶的生日是？</option>
							<option value="您的出生地是哪里？">您的出生地是哪里？</option>
							<option value="您最喜欢什么颜色？">您最喜欢什么颜色？</option>
							<option value="您是什么学历？">您是什么学历？</option>
							<option value="您的属相是什么的？">您的属相是什么的？</option>
							<option value="您小学就读的是哪所学校？">您小学就读的是哪所学校？</option>
							<option value="您最崇拜谁？">您最崇拜谁？</option>
							<option value="您打字经常用什么输入法？">您打字经常用什么输入法？</option>
							<option value="您是什么时间参加工作的？">您是什么时间参加工作的？</option></select> <span
							style="color: red; font-size: 12px;" id="qErr"></span>
					</div>
					<div style="vertical-align: top; margin: 2px;">
						答案：<input type="text"
							style="width: 173px; height: 21px; line-height: 21px; font-size: 14px; font-weight: bold; margin: 5px;"
							id="answer2"> <span style="color: red; font-size: 12px;"
							id="answer2err"></span>
					</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" class="u12_but2" value="提交完成" onclick="setSafeQuestion(3)" /><br>
				<span style="font-size: 12px; color: #999999;"><img
						src="__ROOT__/Style/M/images/zhuce1.gif"
						style="vertical-align: middle">&nbsp;&nbsp;请注意以下事项：</span><br>
				<span style="font-size: 12px; color: #999999;">1、安全问题是您修改手机号码，变更邮箱，找回密码和修改银行账号的必备信息。</span><br>
				<span style="font-size: 12px; color: #999999;">2、如果您在验证过程中，出现任何问题，请联系网站客服。</span>
				</span>
			</div>
		</div>
	</div>
</div><?php endif; ?>
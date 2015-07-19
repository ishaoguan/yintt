<?php if (!defined('THINK_PATH')) exit();?>      <h4><span>资</span>金存量：</h4>
      <ul>
       <li><p>可用现金金额：</p><span>￥<?php echo (($vo["kyxjje"])?($vo["kyxjje"]):"0.00"); ?></span><samp>(可以用来直接提现或投标的金额)</samp></li>
       <li><p>奖金余额：</p><span>￥<?php echo (($vo["jjje"])?($vo["jjje"]):"0.00"); ?></span><samp>(只能用于投标，但不能直接提现的金额)</samp></li>
       <li><p>待收本息金额：</p><span>￥<?php echo (($vo["dsbx"])?($vo["dsbx"]):"0.00"); ?></span><samp>(已经借出，尚未回收的本金和利息总额，已扣除佣金)</samp></li>
       <li><p>待付本息金额：</p><span>￥<?php echo (($vo["dfbx"])?($vo["dfbx"]):"0.00"); ?></span><samp>(已经借入，尚未偿还的本金和利息总额)</samp></li>
       <li><p>待确认投标：</p><span>￥<?php echo (($vo["dxrtb"])?($vo["dxrtb"]):"0.00"); ?></span><samp>(您已经投标，但尚未满标的投资金额)</samp></li>
       <li><p>待审核提现：</p><span>￥<?php echo (($vo["dshtx"])?($vo["dshtx"]):"0.00"); ?></span><samp>(您申请提现中的金额)</samp></li>
       <li class="botLine"><p>处理中提现：</p><span>￥<?php echo (($vo["clztx"])?($vo["clztx"]):"0.00"); ?></span><samp>(提现处理中的金额)</samp></li>
       <li class="sto"><p>账户资金总额：</p><span>￥<?php echo (($vo["total_1"])?($vo["total_1"]):"0.00"); ?></span><samp>(您在<?php echo ($glo["web_name"]); ?>平台上现有现金资产的总额)</samp></li>
       <li class="grBk">帐户资产总额=（可用现金金额+奖金余额+待收本息金额）-（待付本息金额+待确认投标+待审核提现+处理中提现）</li>
      </ul>
      
      <h4><span>资</span>金损益：</h4>
      <ul>
       <li><p>净赚利息：</p><span>￥<?php echo (($vo["jzlx"])?($vo["jzlx"]):"0.00"); ?></span><samp>(投资净赚的投资利息总和，已扣除佣金)</samp></li>
       <li><p>净付利息：</p><span>￥<?php echo (($vo["jflx"])?($vo["jflx"]):"0.00"); ?></span><samp>(借款支付的借款利息总和，已扣除佣金)</samp></li>
       <li><p>累计收到奖金：</p><span>￥<?php echo (($vo["ljjj"])?($vo["ljjj"]):"0.00"); ?></span><samp>(注册或介绍好友获得的奖金总和)</samp></li>
       <li><p>累计支付会员费：</p><span>￥<?php echo (($vo["ljhyf"])?($vo["ljhyf"]):"0.00"); ?></span><samp>(支付的<?php echo ($glo["web_name"]); ?>会员费总和)</samp></li>
       <li><p>累计提现手续费：</p><span>￥<?php echo (($vo["ljtxsxf"])?($vo["ljtxsxf"]):"0.00"); ?></span><samp>(支付的提现手续费总和)</samp></li>
       <li><p>累计投标奖励：</p><span>￥<?php echo (($vo["ljtbjl"])?($vo["ljtbjl"]):"0.00"); ?></span><samp>(投标获得的奖励总和)</samp></li>
       <li><p>累计推广奖励：</p><span>￥<?php echo (($vo["ljtgjl"])?($vo["ljtgjl"]):"0.00"); ?></span><samp>(推广下线获得的奖励总和)</samp></li>
       <li class="botLine"><p>累计充值手续费：</p><span>￥<?php echo (($vo["ljczsxf"])?($vo["ljczsxf"]):"0.00"); ?></span><samp>(支付的充值手续费总和)</samp></li>
       <li class="sto"><p>累计盈亏总额：</p><span>￥<?php echo (($vo["total_2"])?($vo["total_2"]):"0.00"); ?></span><samp>(您在<?php echo ($glo["web_name"]); ?>平台上累计盈亏的总额)</samp></li>
       <li class="grBk">累计盈亏总额= 净赚利息–净付利息 + 收到奖金–支付会员费–支付认证费–提现手续费–充值手续费 + 投标奖励 + 推广奖励</li>
      </ul>
      
      <h4><span>资</span>金流量：</h4>
      <ul>
       <li><p>累计投资金额：</p><span>￥<?php echo (($vo["ljtzje"])?($vo["ljtzje"]):"0.00"); ?></span><samp>(注册至今，您账户借出资金总和)</samp></li>
       <li><p>累计借入金额：</p><span>￥<?php echo (($vo["ljjrje"])?($vo["ljjrje"]):"0.00"); ?></span><samp>(注册至今，您账户借入资金总额)</samp></li>
       <li><p>累计充值金额：</p><span>￥<?php echo (($vo["ljczje"])?($vo["ljczje"]):"0.00"); ?></span><samp>(注册至今，您账户累计充值总额)</samp></li>
       <li><p>累计提现金额：</p><span>￥<?php echo (($vo["ljtxje"])?($vo["ljtxje"]):"0.00"); ?></span><samp>(注册至今，您账户累计提现总额)</samp></li>
       <li><p>累计支付佣金：</p><span>￥<?php echo (($vo["ljzfyj"])?($vo["ljzfyj"]):"0.00"); ?></span><samp>(支付的<?php echo ($glo["web_name"]); ?>佣金总和)</samp></li>
      </ul>
      
      <h4><span>资</span>金预期：</h4>
      <ul>
       <li><p>待收利息总额：</p><span>￥<?php echo (($vo["dslxze"])?($vo["dslxze"]):"0.00"); ?></span><samp>(已经借出，尚未回收的利息总额，未扣除佣金)</samp></li>
       <li><p>待付利息总额：</p><span>￥<?php echo (($vo["dflxze"])?($vo["dflxze"]):"0.00"); ?></span><samp>(已经借入，尚未偿还的利息总额)</samp></li>
      </ul>
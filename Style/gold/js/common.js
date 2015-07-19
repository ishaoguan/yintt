setCurUrl=function(obj){
	thisURL = document.URL;/*获取当前地址栏URL,根据此来判断当前页，从页实现页面导航不同样式*/

	strwrite = thisURL;
	urlreg = eval("/.*"+document.domain+"/ig"); // 创建正则表达式模式。 
	lasturl = strwrite.replace(urlreg, ""); // 用 "A" 替换 "The"。 

	urlarr = lasturl.split("/");
	$(obj).each(function(){
		strwrite1 = this.href;
		if(strwrite1 == "http://bbs.yesvion.com/"){
			return;
		}
		urlreg1 = eval("/.*"+document.domain+"/ig"); // 创建正则表达式模式。 
		lasturl1 = strwrite1.replace(urlreg1, ""); // 用 "A" 替换 "The"。 

		urlarr1 = lasturl1.split("/");
		if(urlarr1.length > 1 && urlarr.length > 1 && urlarr1[1] == urlarr[1]){
			$(this).parent().addClass("cen");
			return false;
		}
		if((urlarr.length > 1 && urlarr[1] == "indexs") || lasturl == "/"){
			$(obj + "[href='/index.html']").parent().addClass("cen");
			return false;
		}
	});
	if((urlarr.length > 3 && (urlarr[3] == "tuiguang")) || (urlarr.length > 2 && (urlarr[1] == "service"))){
		$(obj + "[href='/home/help/tuiguang']").parent().addClass("cen");
	}
};
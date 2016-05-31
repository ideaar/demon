//判断一个字符串是否为空
function isEmpty( subject ){
	var pattern = /^\s*$/
	
	if( pattern.test(subject)){
		return true;
	}else{
		return false;
	}
}

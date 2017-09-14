
　　if(event.keyCode==13 && event.srcElement.type!='button' && event.srcElement.type!='submit' && event.srcElement.type!='reset' && event.srcElement.type!='textarea' && event.srcElement.type!='')
　　event.keyCode=9;   //Tab的键值为9 Enter的键值为13

　　function getEnter(){
	　　fsubmit(document.form1);
　　}
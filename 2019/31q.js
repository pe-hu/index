function daily(){
mydate=new Date();
num=mydate.getDate()%31;
document.write('<img src="31q/'+num+'.jpg">');
}

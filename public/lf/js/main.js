var windoWidth = $(window).width(); 	//获得窗口的宽
var windoHeight = $(window).height(); 	//获得窗口的高

var can1;	//用于存放第一个canvas对象
var ctx1; 	//用于存放第一个canvas对象的上下文

var can2;	//用于存放第二个canvas对象
var ctx2; 	//用于存放第二个canvas对象的上下文

var curObj={};	//用于存放被选中的对象


$(function(){

	// 绑定入口事件，
	$("#intoBox>a").on("touchstart",entry);


	// 直接加载量房，测试用
	// lf.goin();
	// ssl.goin();

});

// 点击入口
function entry(){
	event.preventDefault();
	var id = this.id;

	$("#selectFN").fadeOut("fast",function(){
		switch(id){
			case "into_lf":
				lf.goin();
				$("#lf").fadeIn();
				break;

			case "into_ssl":
				ssl.goin();
				$("#ssl").fadeIn();
				break;

			default:break;

		}
	});
}
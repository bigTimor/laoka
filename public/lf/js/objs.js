// 量房对象集合，所有对象放在这里，用于被lf.allDarw调用。
var lf_objs = {
	wallIn:undefined,		// 墙对象
	doorIn:undefined,		// 门窗对象
	furnitIn:undefined,		// 家具对象
}


// 随手量对象集合，所有对象放在这里，用于被lf.allDarw调用。
var ssl_objs = {
	lineIn:undefined,		// 直线对象
	textIn:undefined,		// 文本对象
}



// 共同功能集合
var all_fn = {

	// 阻止事件冒泡
	noUpDefault:function(){
		if (event.stopPropagation) { 
			event.stopPropagation(); 
		}else if (window.event) { 
			window.event.cancelBubble = true; 
		}
	},

	//通过两点坐标计算角度
	getAngle:function(startX,startY,endX,endY){
		var rangeX = Math.abs(startX - endX);
		var rangeY = Math.abs(startY - endY);

		if(startX<endX && startY<endY){			// 左上方
			return (Math.atan(rangeY/rangeX)/Math.PI*180);
		}else if(startX>endX && startY<endY){			// 右上方
			return (180-Math.atan(rangeY/rangeX)/Math.PI*180);
		}else if(startX>endX && startY>endY){			// 右下方
			return (180+Math.atan(rangeY/rangeX)/Math.PI*180);
		}else if(startX<endX && startY>endY){			// 左下方
			return (360-Math.atan(rangeY/rangeX)/Math.PI*180);
		}else if(startX<endX && startY==endY){
			return (0);
		}else if(startX==endX && startY<endY){
			return (90);
		}else if(startX>endX && startY==endY){
			return (180);
		}else if(startX==endX && startY>endY){
			return (270);
		}
	},
	
	// 通过两点坐标计算斜线距离
	bevel:function(sx,sy,nx,ny){
		return Math.sqrt(Math.pow(Math.abs(sx-nx),2)+Math.pow(Math.abs(sy-ny),2));
	},

	// 通过起点坐标与角度、边长，计算另一点坐标
	coor:function(sx,sy,angle,bevel){
		var rad = Math.PI / 180 * angle;
		var nx = Math.cos(rad) * bevel;
		var ny = Math.sin(rad) * bevel;
		var i ={
			x: Math.round(sx+nx),
			y: Math.round(sy+ny)
		};
		return (i);
	},

	// 计算三个坐标中间的坐标向外扩展Bevel后的坐标,画转角飘窗时用
	coor2:function(x1,y1,x2,y2,x3,y3,Bevel){
		var angle0 = this.getAngle(x2,y2,x1,y1);
		var angle1 = this.getAngle(x2,y2,x3,y3);
		if(angle0>angle1){

			var angle = angle0-(angle0-angle1)/2-180;		// 转角距0度(三点钟方向为0角度)的角度
			var x1_2a = (angle0-angle1)/2;					// 转角点与c0点的角度
		}else{
			var angle = angle0-(angle0+360-angle1)/2-180;	// 转角距0度(三点钟方向为0角度)的角度
			var x1_2a = (angle0+360-angle1)/2;				// 转角点与c0点的角度
		}
		var bevel = Bevel/Math.sin(x1_2a*Math.PI/180);		// 通过需要扩展的长度Bevel计算出斜边
		var coor = this.coor(x2,y2,angle,bevel);

		return {x:coor.x,y:coor.y};
	},

	// 计算斜角的坐标，画家具时用
	coor3:function(x,y,a,l,a1,l1){

		var c0 = this.coor(x,y,a,l);
		var c1 = this.coor(c0.x,c0.y,a1,l1);

		return c1;
	},

	// 通过两条线计算交点，ab为线1，cd为线2，相交返回true,不相交返回false
	inters:function(a,b,c,d){
		if ( Math.max(a.x, b.x)<Math.min(c.x, d.x) ){
			return false;  
		}
		if ( Math.max(a.y, b.y)<Math.min(c.y, d.y) ) {
		return false;  
		}
		if ( Math.max(c.x, d.x)<Math.min(a.x, b.x) ){
			return false;  
		}
		if ( Math.max(c.y, d.y)<Math.min(a.y, b.y) ){
			return false;  
		}
		if ( mult(c, b, a)*mult(b, d, a)<0 ){
			return false;  
		}
		if ( mult(a, d, c)*mult(d, b, c)<0 ){
			return false;  
		}
		return true;
		function mult(aa,bb,cc){
			return (aa.x-cc.x)*(bb.y-cc.y)-(bb.x-c.x)*(aa.y-cc.y);
		}
	},

	//保存直线参数？计算对象移动时的坐标
	//使用的方法
	//var dab = all_fn.ab(absx,absy,abnx,abny);
	// if(dab.a===0){//垂直
	// 	Bx = Bx;
	// 	By = dab.b;
	// }else if(dab.a===false){
	// 	Bx = dab.b;
	// 	By = By;
	// }else{
	// 	Bx = Bx;
	// 	By = dab.a*Bx+dab.b;
	// }
	ab:function(sx,sy,nx,ny){
		if((sx-nx)==0){
			var aaa=false;
			var bbb=nx;//x=bbb;
		}else if((sy-ny)==0){
			var aaa=0;
			var bbb=ny;//y=aaa;
		}else{
			var aaa=(sy-ny)/(sx-nx);
			var bbb=ny-aaa*nx;
		}
		return {a:aaa,b:bbb};
	},

}
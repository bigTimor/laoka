var textObj = function(){
	// 所有对象的属性分别放在各个数组中，如第一个对象的属性是sx[0],sy[0],text[0];
	this.sx = [];	//x坐标数组
	this.sy = [];	//y坐标数组
	this.text = [];	//文本内容数组
	this.num = 0;
}

// 初始化用，暂未用到
textObj.prototype.init = function(){
	// 测试读取本地缓存用，暂无实际用途，可删
	if(localStorage.Datas){
		var Datas = $.parseJSON(localStorage.Datas);
		
		this.sx = Datas.textIn.sx;
		this.sy = Datas.textIn.sy;
		this.text = Datas.textIn.text;
		this.num = Datas.textIn.num;
		this.darw();
	}

}

// 清空
textObj.prototype.empty = function(){
	this.sx = [];
	this.sy = [];
	this.text = [];
	this.num = 0;
}


// 绘制对象，被lf.allDarw通过对象集合ssl_objs调用
textObj.prototype.darw = function(){

	for(var i=0;i<this.num;i++){
		ctx2.save();

		ctx2.fillStyle = "red";
		ctx2.beginPath();
		ctx2.arc(this.sx[i],this.sy[i],10,0,2*Math.PI);
		ctx2.fill();	

		ctx2.beginPath();
		ctx2.fillStyle = "white";
		ctx2.fillText(i+1,this.sx[i],this.sy[i]);

		ctx2.fillStyle = "rgba(0,0,0,0.6)";
		var sx = this.sx[i]+11;
		ctx2.beginPath();
		ctx2.moveTo(sx,this.sy[i]);
		ctx2.lineTo(sx+20,this.sy[i]-15);
		ctx2.lineTo(sx+110,this.sy[i]-15);
		ctx2.lineTo(sx+110,this.sy[i]+15);
		ctx2.lineTo(sx+20,this.sy[i]+15);
		ctx2.lineTo(sx,this.sy[i]);
		ctx2.closePath();

		ctx2.fill();	

		ctx2.restore();

		if(this.text[i] != ""){
			ctx2.save();
			ctx2.fillStyle = "white";
			ctx2.textAlign = "left";
			ctx2.beginPath();
			ctx2.fillText(this.text[i],sx+31,this.sy[i]);
			ctx2.restore();
		}
	}

}

// 检测鼠标是否点中对象，点中返回对象序号
textObj.prototype.check = function(i,x,y){

	ctx2.save();

	ctx2.beginPath();
	ctx2.arc(this.sx[i],this.sy[i],10,0,2*Math.PI);

	var sx = this.sx[i]+11;
	ctx2.moveTo(sx,this.sy[i]);
	ctx2.lineTo(sx+20,this.sy[i]-15);
	ctx2.lineTo(sx+110,this.sy[i]-15);
	ctx2.lineTo(sx+110,this.sy[i]+15);
	ctx2.lineTo(sx+20,this.sy[i]+15);
	ctx2.lineTo(sx,this.sy[i]);
	ctx2.closePath();
	
	ctx2.restore();

	if(ctx2.isPointInPath(x,y))
		return 1;
}

// 高亮绘制被点击的对象，被lf.allDarw通过对象集合ssl_objs调用
textObj.prototype.alive = function(i){
	ctx2.save();
	ctx2.beginPath();
	var sx = this.sx[i]+11;
	ctx2.moveTo(sx,this.sy[i]);
	ctx2.lineTo(sx+20,this.sy[i]-15);
	ctx2.lineTo(sx+110,this.sy[i]-15);
	ctx2.lineTo(sx+110,this.sy[i]+15);
	ctx2.lineTo(sx+20,this.sy[i]+15);
	ctx2.lineTo(sx,this.sy[i]);
	ctx2.closePath();
	ctx2.stroke();
	ctx2.restore();
}
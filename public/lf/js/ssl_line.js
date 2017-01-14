var lineObj = function(){
	// 所有对象的属性分别放在各个数组中，如第一个对象的属性是sx[0],sy[0],nx[0],ny[0],text[0];
	this.sx = [];	//起点X数组
	this.sy = [];	//起点Y数组
	this.nx = [];	//终点X数组
	this.ny = [];	//终点Y数组
	this.text = [];	//文本数组
	this.num = 0;	//对象数量
}

// 初始化用，暂未用到
lineObj.prototype.init = function() {
	// 测试读取本地缓存用，暂无实际用途，可删
	if(localStorage.Datas){
		var Datas = $.parseJSON(localStorage.Datas);

		this.sx = Datas.lineIn.sx;
		this.sy = Datas.lineIn.sy;
		this.nx = Datas.lineIn.nx;
		this.ny = Datas.lineIn.ny;
		this.text = Datas.lineIn.text;
		this.num = Datas.lineIn.num;
		this.darw();

	}
	
}

// 清空
lineObj.prototype.empty = function() {
	this.sx = [];
	this.sy = [];
	this.nx = [];
	this.ny = [];
	this.text = [];
	this.num = 0;
}


// 绘制对象，被lf.allDarw通过对象集合ssl_objs调用
lineObj.prototype.darw =function(){
	for(var i=0;i<this.num;i++){
		// 画线杆
		ctx2.beginPath();
		ctx2.moveTo(this.sx[i],this.sy[i]);
		ctx2.lineTo(this.nx[i],this.ny[i]);
		ctx2.stroke();

		var lineObjangle = all_fn.getAngle(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);
		var lineObjlength = all_fn.bevel(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);
		// 画箭头
		ctx2.save();
		ctx2.lineWidth  = 1;
		ctx2.translate(this.sx[i],this.sy[i]);
		ctx2.rotate((lineObjangle-90)*Math.PI/180);	

		ctx2.beginPath();
		ctx2.moveTo(-5,8);
		ctx2.lineTo(0,0);
		ctx2.lineTo(5,8);
		ctx2.stroke();

		ctx2.beginPath();
		ctx2.moveTo(-5,lineObjlength-8);
		ctx2.lineTo(0,lineObjlength);
		ctx2.lineTo(5,lineObjlength-8);
		ctx2.stroke();

		ctx2.restore();


		// 画文字
		if(this.text[i] != ""){
			ctx2.save();
			var coor = all_fn.coor(this.sx[i],this.sy[i],lineObjangle,lineObjlength/2);
			var textWidth = ctx2.measureText(this.text[i]+"mm").width;
			ctx2.translate(coor.x,coor.y);
			ctx2.rotate((lineObjangle)*Math.PI/180);	

			ctx2.save();
			ctx2.beginPath();
			ctx2.rect(-textWidth/2-5,-10,textWidth+10,20);
			ctx2.fillStyle = "white";
			
			ctx2.fill();
			ctx2.stroke();
			ctx2.restore();

			ctx2.fillText(this.text[i]+"mm",0,0);
			ctx2.restore();
		}


	}
}

// 检测鼠标是否点中对象，点中返回对象序号
lineObj.prototype.check = function(i,x,y){

	var lineObjangle = all_fn.getAngle(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);
	var lineObjlength = all_fn.bevel(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);

	//头
	ctx2.save();
	ctx2.translate(this.sx[i],this.sy[i]);
	ctx2.rotate((lineObjangle-90)*Math.PI/180);	

	ctx2.beginPath();
	ctx2.rect(-10,-10,20,25);
	if(ctx2.isPointInPath(x,y)){
		ctx2.restore();
		return 1;
	}  
		
	// 中间
	ctx2.beginPath();
	ctx2.rect(-10,16,20,lineObjlength-32);
	if(ctx2.isPointInPath(x,y)){
		ctx2.restore();
		return 2;
	}  

	// 尾
	ctx2.beginPath();
	ctx2.rect(-10,lineObjlength-15,20,25);
	if(ctx2.isPointInPath(x,y)){
		ctx2.restore();
		return 3;
	}  

	ctx2.restore();
}

// 高亮绘制被点击的对象，被lf.allDarw通过对象集合ssl_objs调用
lineObj.prototype.alive = function(i){

	var lineObjangle = all_fn.getAngle(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);
	var lineObjlength = all_fn.bevel(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);

	ctx2.save();

	ctx2.translate(this.sx[i],this.sy[i]);
	ctx2.rotate((lineObjangle-90)*Math.PI/180);	

	ctx2.beginPath();
	ctx2.arc(0,5,8,0,2*Math.PI);
	ctx2.stroke();

	ctx2.beginPath();
	ctx2.arc(0,lineObjlength-5,8,0,2*Math.PI);
	ctx2.stroke();

	ctx2.restore();

	// 画线杆
	ctx2.beginPath();
	ctx2.moveTo(this.sx[i],this.sy[i]);
	ctx2.lineTo(this.nx[i],this.ny[i]);
	ctx2.stroke();

	var lineObjangle = all_fn.getAngle(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);
	var lineObjlength = all_fn.bevel(this.sx[i],this.sy[i],this.nx[i],this.ny[i]);
	// 画箭头
	ctx2.save();
	ctx2.lineWidth  = 1;
	ctx2.translate(this.sx[i],this.sy[i]);
	ctx2.rotate((lineObjangle-90)*Math.PI/180);	

	ctx2.beginPath();
	ctx2.moveTo(-5,8);
	ctx2.lineTo(0,0);
	ctx2.lineTo(5,8);
	ctx2.stroke();

	ctx2.beginPath();
	ctx2.moveTo(-5,lineObjlength-8);
	ctx2.lineTo(0,lineObjlength);
	ctx2.lineTo(5,lineObjlength-8);
	ctx2.stroke();

	ctx2.restore();


	// 画文字
	if(this.text[i] != ""){
		ctx2.save();
		var coor = all_fn.coor(this.sx[i],this.sy[i],lineObjangle,lineObjlength/2);
		var textWidth = ctx2.measureText(this.text[i]+"mm").width;
		ctx2.translate(coor.x,coor.y);
		ctx2.rotate((lineObjangle)*Math.PI/180);	

		ctx2.save();
		ctx2.beginPath();
		ctx2.rect(-textWidth/2-5,-10,textWidth+10,20);
		ctx2.fillStyle = "white";
		
		ctx2.fill();
		ctx2.stroke();
		ctx2.restore();

		ctx2.fillText(this.text[i]+"mm",0,0);
		ctx2.restore();
	}
}
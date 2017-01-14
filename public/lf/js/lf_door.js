var doorObj = function(){		

	// 所有对象的属性分别放在各个数组中，如第一个对象的属性是c[0],s[0],attr[0];
	this.num = 0;		// 门窗对象的数量
	this.c = [];		// 所属墙体
	this.s = [];		// 门的样式
	this.attr = [];		// 门的属性
	// attr表
	// 		0-单开门
	// 			direction  —— 门的方向(左右)，默认为0
	// 			around  —— 门的朝向(内外)，默认为0
	// 			width —— 门的宽度
	// 			height —— 门的高度
	// 			
	// 		1-飘窗
	// 			height —— 高度，默认为1800
	// 			width —— 宽度，默认为lf_objs.doorIn.length
	// 			feet —— 离地高，默认为400
	// 			depth —— 飘出深度，默认为lf_objs.doorIn.length*0.4
	// 			radius —— 侧边角度，默认为90
	// 		
	// 		2-转角飘窗
	// 			height —— 高度，默认为1800
	// 			feet —— 离地高，默认为400
	// 			depth —— 飘出深度，默认为lf_objs.doorIn.length*0.4
	// 			leftW —— 左边宽度，默认为lf_objs.doorIn.length
	// 			rightW —— 右边宽度，默认为lf_objs.doorIn.length
	// 		
	// 		3-普通窗
	// 			height —— 高度，默认为1800
	// 			width —— 高度，默认为lf_objs.doorIn.length
	// 			feet —— 离地高，默认为400
	// 		
	// 		4-阳台门
	// 			height —— 高度，默认为2000
	// 			width —— 高度，默认为lf_objs.doorIn.length
	// 			
	// 		5-柱
	// 			height —— 高度，默认为400
	// 			width —— 高度，默认为lf_objs.doorIn.length/3
	// 			
	// 		6-梁
	// 			width —— 宽度,默认为lf_objs.doorIn.length/5
	// 			metope —— 离墙距离，默认为1252
	// 			feet ——	离地高，默认为2600
	// 			
	// 		7-墙洞
	// 			width —— 宽度,默认为lf_objs.doorIn.length/2
	// 			height —— 高度，默认为2100
	// 			feet ——	离地高，默认为0
	// 			
	// 		8-转角窗
	// 			height —— 高度，默认为1800
	// 			feet —— 离地高，默认为400
	// 			leftW —— 左边宽度，默认为lf_objs.doorIn.length
	// 			rightW —— 右边宽度，默认为lf_objs.doorIn.length 			
	// 
	// 		9-双开门
	// 			height —— 高度，默认为2000
	// 			width —— 宽度，默认为lf_objs.doorIn.length*2
	// 			
	// 		10-推拉门
	// 			height —— 高度，默认为2000
	// 			width —— 宽度，默认为lf_objs.doorIn.length
	// 			
	// 		11-折叠门
	// 			height —— 高度，默认为2000
	// 			width —— 宽度，默认为lf_objs.doorIn.length
					
					
	this.length = 50;						// 门的默认长度
	this.Thick = 3;							// 门的默认厚度
	this.stroke = 1;						// 画门的线宽
	this.fillColor = "white";				// 填充的颜色
	this.strokeColor = "black";				// 绘制的颜色
	this.aliveColor = "#ff6100";			// 当前选中的门颜色

	this.textStyle = "bold 14px Arial";		// 字体样式
	this.textAlign = "center";				// 字体水平居中
	this.textBaseline = "middle";				// 字体垂直居中
}

// 初始化，用于配置对象的默认属性。配置的变量为lf.config.door
doorObj.prototype.init = function(obj){
	if(obj)
		for( var i in obj)
			this[i] = obj[i];

	
}

// 点打开工具时，暂时用于测试
doorObj.prototype.open = function(){
	// 测试读取本地缓存用，暂无实际用途，可删
	if(localStorage.Datas){
		var Datas = $.parseJSON(localStorage.Datas);
		for(var i in Datas.doorIn)
			this[i] = Datas.doorIn[i];
	}
}

// 清空
doorObj.prototype.empty = function(){
	this.num = 0;
	this.c = [];
	this.s = [];
	this.attr = [];
}

// 绘制对象，被lf.allDarw通过对象集合ssl_objs调用
doorObj.prototype.darw = function(){
	ctx1.save();
	ctx1.lineWidth = this.stroke;
	ctx1.fillStyle = this.fillColor;
	ctx1.strokeStyle = this.strokeColor;
	for(var i=0;i<this.num;i++){
		var walls = {};	//x、y：门窗所占的第一个端点，也是绘制的起点，b：门窗的长度，a:门窗的角度，i：第i个门窗
		walls.x = lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]];
		walls.y = lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]];
		walls.b = all_fn.bevel(walls.x,walls.y,lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]+1],lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]+1]);
		walls.a = all_fn.getAngle(walls.x,walls.y,lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]+1],lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]+1]);
		walls.i = i;

		// 根据this.s的不同，画不同的门窗
		switch(this.s[i]){
			case 0:
				this.darwDKM(walls);
				break;

			case 1:
				this.darwPC(walls);
				break;

			case 2:
				this.darwZJPC(walls);
				break;

			case 3:
				this.darwPTC(walls);
				break;

			case 4:
				this.darwYTM(walls);
				break;

			case 5:
				this.darwZ(walls);
				break;

			case 6:
				this.darwL(walls);
				break;

			case 7:
				this.darwQD(walls);
				break;

			case 8:
				this.darwZJC(walls);
				break;

			case 9:
				this.darwSKM(walls);
				break;

			case 10:
				this.darwTLM(walls);
				break;

			case 11:
				this.darwZDM(walls);
				break;


			default: break;
		}
			
		
	}

	ctx1.restore();


}

// 检测鼠标是否点中对象，点中返回对象序号
doorObj.prototype.check = function(x,y){

	for(var i=0;i<this.num;i++){
		var walls = {};	//x、y：门窗所占的第一个端点，也是绘制的起点，b：门窗的长度，a:门窗的角度，i：第i个门窗
		walls.x = lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]];
		walls.y = lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]];
		walls.b = all_fn.bevel(walls.x,walls.y,lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]+1],lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]+1]);
		walls.a = all_fn.getAngle(walls.x,walls.y,lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]+1],lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]+1]);
		walls.i = i;


		// 根据this.s的不同，找不同的门窗
		switch(this.s[i]){
			case 0:
				this.checkDKM(walls);
				break;

			case 1:
				this.checkPC(walls);
				break;
			case 2:
				this.checkZJPC(walls);
				break;

			case 3:
				this.checkPTC(walls);
				break;

			case 4:
				this.checkYTM(walls);
				break;

			case 5:
				this.checkZ(walls);
				break;

			case 6:
				this.checkL(walls);
				break;

			case 7:
				this.checkQD(walls);
				break;

			case 8:
				this.checkZJC(walls);
				break;

			case 9:
				this.checkSKM(walls);
				break;

			case 10:
				this.checkTLM(walls);
				break;

			case 11:
				this.checkZDM(walls);
				break;

			default: break;
		}

		if(ctx1.isPointInPath(x,y))
			return i;
	}

}

// 高亮绘制被点击的对象，被lf.allDarw通过对象集合ssl_objs调用
doorObj.prototype.alive = function(i){
	var walls = {};	//x、y：门窗所占的第一个端点，也是绘制的起点，b：门窗的长度，a:门窗的角度，i：第i个门窗
	walls.x = lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]];
	walls.y = lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]];
	walls.b = all_fn.bevel(walls.x,walls.y,lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]+1],lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]+1]);
	walls.a = all_fn.getAngle(walls.x,walls.y,lf_objs.wallIn.walls[this.c[i][0]].x[this.c[i][1]+1],lf_objs.wallIn.walls[this.c[i][0]].y[this.c[i][1]+1]);
	walls.i = i;

	ctx1.save();
	ctx1.lineWidth = this.stroke;
	ctx1.fillStyle = this.aliveColor;
	ctx1.strokeStyle = this.strokeColor;
	
	// 根据this.s的不同，高亮不同的门窗
	switch(this.s[i]){
		case 0:
			this.aliveDKM(walls);
			break;

		case 1:
			this.alivePC(walls);
			break;

		case 2:
			this.aliveZJPC(walls);
			break;

		case 3:
			this.alivePTC(walls);
			break;

		case 4:
			this.aliveYTM(walls);
			break;

		case 5:
			this.aliveZ(walls);
			break;

		case 6:
			this.aliveL(walls);
			break;

		case 7:
			this.aliveQD(walls);
			break;

		case 8:
			this.aliveZJC(walls);
			break;

		case 9:
			this.aliveSKM(walls);
			break;

		case 10:
			this.aliveTLM(walls);
			break;

		case 11:
			this.aliveZDM(walls);
			break;

		default: break;
	}

	ctx1.restore();

	if(lf.config.ruler){
		if(this.s[i] == 2 || this.s[i] == 8){
			var walls = lf_objs.wallIn.walls[this.c[i][0]];
			var last = walls.x.length-2;
			var sx = walls.x[last-1],
				sy = walls.y[last-1],
				nx = walls.x[last],
				ny = walls.y[last];
			this.darwRuler(sx,sy,nx,ny);

			walls = lf_objs.wallIn.walls[this.c[i][1]];
			var sx = walls.x[1],
				sy = walls.y[1],
				nx = walls.x[2],
				ny = walls.y[2];
			this.darwRuler(sx,sy,nx,ny);
			
			
		}else{
			var walls = lf_objs.wallIn.walls[this.c[i][0]];
			var sx = walls.x[this.c[i][1]],
				sy = walls.y[this.c[i][1]],
				nx = walls.x[this.c[i][1]+1],
				ny = walls.y[this.c[i][1]+1];
			this.darwRuler(sx,sy,nx,ny);
		}

	}

}

doorObj.prototype.darwRuler = function(sx,sy,nx,ny){
	var wallIn = lf_objs.wallIn;

	// // 画标尺
	ctx1.save();
	ctx1.strokeStyle = wallIn.aliveColor;
	ctx1.fillStyle = wallIn.rulerBgColor;
	ctx1.lineWidth = wallIn.rulerLineWidth;
	ctx1.font = this.textStyle;
	ctx1.textAlign = this.textAlign;
	ctx1.textBaseline = this.textBaseline;

	// 第二步，画坚线
	var angle = all_fn.getAngle(sx,sy,nx,ny);
	var l = all_fn.bevel(sx,sy,nx,ny);			//线的长度
	var h = -Math.max(wallIn.rulerHeight*0.7,wallIn.rulerHeight-12); //横线的高度
	var tw = ctx1.measureText(Math.round(l)).width;		//文字占宽

	ctx1.translate(sx,sy);
	ctx1.rotate(angle*Math.PI/180);	
	// ctx1.translate(0,-wallIn.Thick);
	
	ctx1.beginPath();
	ctx1.moveTo(0,0);
	ctx1.lineTo(0,-wallIn.rulerHeight);
	ctx1.moveTo(l,0);
	ctx1.lineTo(l,-wallIn.rulerHeight);
	ctx1.stroke();

	// 第三步，画横线并标尺
	// 画线
	ctx1.beginPath();
	ctx1.moveTo(0,h);
	ctx1.lineTo(l,h);
	ctx1.stroke();

	// 画斜线
	var cbl = 8;
	var c20 = all_fn.coor(0,h,-135,cbl);
	var c21 = all_fn.coor(0,h,45,cbl);
	var c22 = all_fn.coor(l,h,-135,cbl);
	var c23 = all_fn.coor(l,h,45,cbl);
	ctx1.beginPath();
	ctx1.moveTo(c20.x,c20.y);
	ctx1.lineTo(c21.x,c21.y);
	ctx1.moveTo(c22.x,c22.y);
	ctx1.lineTo(c23.x,c23.y);
	ctx1.stroke();

	// 画背景
	ctx1.beginPath();
	ctx1.rect(l/2-tw/2-5,h-wallIn.rulerBgHeight/2,tw+10,wallIn.rulerBgHeight);
	ctx1.fill();
	ctx1.stroke();

	// 画字
	ctx1.fillStyle = wallIn.aliveColor;
	ctx1.fillText(Math.round(l),l/2,h);

	ctx1.restore();
}

doorObj.prototype.upData = function(){
	for(var i=0;i<this.num;i++){
		var walls = lf_objs.wallIn.walls;
		if(this.s[i] == 2 || this.s[i] == 8){
			var ixFrom = this.c[i][0];
			var ixFromLast = walls[ixFrom].x.length - 3;
			var ix = this.c[i][1];
			// var parm = this.attr[i];
			this.attr[i].leftW = Math.round(all_fn.bevel(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[ixFromLast+1],walls[ixFrom].y[ixFromLast+1]));
			this.attr[i].rightW = Math.round(all_fn.bevel(walls[ix].x[1],walls[ix].y[1],walls[ix].x[2],walls[ix].y[2]));

		}else{
			var width = all_fn.bevel(walls[this.c[i][0]].x[this.c[i][1]],walls[this.c[i][0]].y[this.c[i][1]],walls[this.c[i][0]].x[this.c[i][1]+1],walls[this.c[i][0]].y[this.c[i][1]+1]);
			this.attr[i].width = width;
		}
	}

}


// 画单开门
doorObj.prototype.darwDKM = function(walls,g){
	// 背景
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.lineTo(c0.x,c0.y);

	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}
	
	// 门体墙部分
	var c4 = all_fn.coor(c0.x,c0.y,walls.a,this.Thick);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor(c0.x,c0.y,walls.a,walls.b-this.Thick);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = all_fn.coor(c6.x,c6.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c7.x,c7.y);

	var c8 = all_fn.coor(c4.x,c4.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor(c8.x,c8.y,walls.a,walls.b-this.Thick*2);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor(c8.x,c8.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c10.x,c10.y);
	var c11 = all_fn.coor(c9.x,c9.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c11.x,c11.y);

	ctx1.stroke();


	//门部分 ,分四种状态，this.e[i]为0时向内，否则向外，thid.d[i]为0时向左，否则向右
	ctx1.beginPath();
	var cc = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick/2);
	if(this.attr[walls.i].around == 0){
		if(this.attr[walls.i].direction == 0){
			var c12 = all_fn.coor(cc.x,cc.y,walls.a,this.Thick);
			ctx1.arc(c12.x,c12.y,walls.b-this.Thick*2,walls.a*Math.PI/180,(walls.a+90)*Math.PI/180);
			ctx1.stroke();
		}else{
			var c12 = all_fn.coor(cc.x,cc.y,walls.a,walls.b-this.Thick);
			ctx1.arc(c12.x,c12.y,walls.b-this.Thick*2,(walls.a-180)*Math.PI/180,(walls.a-180-90)*Math.PI/180,true);
			ctx1.stroke();
		}
		var c13 = all_fn.coor(c12.x,c12.y,walls.a+90,walls.b-this.Thick*2);
	}else{
		if(this.attr[walls.i].direction == 0){
			var c12 = all_fn.coor(cc.x,cc.y,walls.a,this.Thick);
			ctx1.arc(c12.x,c12.y,walls.b-this.Thick*2,walls.a*Math.PI/180,(walls.a-90)*Math.PI/180,true);
			ctx1.stroke();
		}else{
			var c12 = all_fn.coor(cc.x,cc.y,walls.a,walls.b-this.Thick);
			ctx1.arc(c12.x,c12.y,walls.b-this.Thick*2,(walls.a-180)*Math.PI/180,(walls.a-90)*Math.PI/180);
			ctx1.stroke();
		}
		var c13 = all_fn.coor(c12.x,c12.y,walls.a-90,walls.b-this.Thick*2);
	}
	ctx1.save();
	ctx1.beginPath();
	ctx1.lineWidth = this.Thick;
	ctx1.moveTo(c12.x,c12.y);
	ctx1.lineTo(c13.x,c13.y);
	ctx1.stroke();
	
	ctx1.restore();

}

// 检测鼠标是否点中单开门，点中返回对象序号
doorObj.prototype.checkDKM = function(walls){
	if(this.attr[walls.i].around == 0){
		if(this.attr[walls.i].direction == 0){
			ctx1.beginPath();
			var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
			ctx1.arc(c0.x,c0.y,walls.b,walls.a*Math.PI/180,(walls.a+90)*Math.PI/180);
			ctx1.lineTo(c0.x,c0.y);
			ctx1.closePath();
		}else{
			ctx1.beginPath();
			var c0 = all_fn.coor(walls.x,walls.y,walls.a,walls.b);
			var c1 = all_fn.coor(c0.x,c0.y,walls.a-90,lf.config.wall.Thick);
			ctx1.arc(c1.x,c1.y,walls.b,(walls.a-180)*Math.PI/180,(walls.a-180-90)*Math.PI/180,true);
			ctx1.lineTo(c1.x,c1.y);
			ctx1.closePath();
		}
	}else{
		if(this.attr[walls.i].direction == 0){
			ctx1.beginPath();
			ctx1.arc(walls.x,walls.y,walls.b,walls.a*Math.PI/180,(walls.a-90)*Math.PI/180,true);
			ctx1.lineTo(walls.x,walls.y);
			ctx1.closePath();
		}else{
			ctx1.beginPath();
			var c0 = all_fn.coor(walls.x,walls.y,walls.a,walls.b)
			ctx1.arc(c0.x,c0.y,walls.b,(walls.a-180)*Math.PI/180,(walls.a-90)*Math.PI/180);
			ctx1.lineTo(c0.x,c0.y);
			ctx1.closePath();
		}
	}
}

// 高亮绘制被点击的单开门
doorObj.prototype.aliveDKM = function(walls){
	this.darwDKM(walls,1);
}


// 画漂窗
doorObj.prototype.darwPC = function(walls,g){
	ctx1.beginPath();
	ctx1.moveTo(walls.x,walls.y);

	var c1 = all_fn.coor(walls.x,walls.y,walls.a-90,this.attr[walls.i].depth);
	ctx1.lineTo(c1.x,c1.y);

	var c2 = all_fn.coor(c1.x,c1.y,walls.a,walls.b);
	ctx1.lineTo(c2.x,c2.y);

	var c3 = all_fn.coor(c2.x,c2.y,walls.a+90,this.attr[walls.i].depth);
	ctx1.lineTo(c3.x,c3.y);

	var c4 = all_fn.coor(c3.x,c3.y,walls.a-180,lf.config.wall.Thick/2);
	ctx1.lineTo(c4.x,c4.y);

	var c5 = all_fn.coor(c4.x,c4.y,walls.a-90,this.attr[walls.i].depth-lf.config.wall.Thick/2);
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor(c5.x,c5.y,walls.a-180,walls.b-lf.config.wall.Thick);
	ctx1.lineTo(c6.x,c6.y);

	var c7 = all_fn.coor(c6.x,c6.y,walls.a+90,this.attr[walls.i].depth-lf.config.wall.Thick/2);
	ctx1.lineTo(c7.x,c7.y);
	ctx1.lineTo(walls.x,walls.y);

	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}


	var c8 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor(c7.x,c7.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor(c3.x,c3.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c10.x,c10.y);
	var c11 = all_fn.coor(c4.x,c4.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c11.x,c11.y);
	
	ctx1.moveTo(c7.x,c7.y);
	ctx1.lineTo(c4.x,c4.y);

	ctx1.stroke();

}

// 检测飘窗
doorObj.prototype.checkPC = function(walls){
	ctx1.beginPath();
	ctx1.moveTo(walls.x,walls.y);
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,this.attr[walls.i].depth);
	ctx1.lineTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,this.attr[walls.i].depth);
	ctx1.lineTo(c2.x,c2.y);
	ctx1.closePath();
}
// 选择飘窗
doorObj.prototype.alivePC = function(walls){
	this.darwPC(walls,1);
}

// 画转角飘窗
doorObj.prototype.darwZJPC = function(walls){
	this.checkZJPC(walls);
	ctx1.stroke();
}

// 检测转角飘窗
doorObj.prototype.checkZJPC = function(walls){
	var index = walls.i;
	var ixFrom = this.c[index][0];
	var ix = this.c[index][1];
	var walls = lf_objs.wallIn.walls;

	var ixFromLast = walls[ixFrom].x.length-2;
	var ixFromAngle = all_fn.getAngle(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]);

	var ixAngle = all_fn.getAngle(walls[ix].x[1],walls[ix].y[1],walls[ix].x[2],walls[ix].y[2]);


	ctx1.beginPath();

	var c0 = all_fn.coor(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],ixFromAngle+90,this.attr[index].depth);
	ctx1.moveTo(c0.x,c0.y);
	ctx1.lineTo(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]);
	ctx1.lineTo(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast]);
	ctx1.lineTo(walls[ix].x[2],walls[ix].y[2]);

	var c1 = all_fn.coor(walls[ix].x[2],walls[ix].y[2],ixAngle-90,this.attr[index].depth);
	ctx1.lineTo(c1.x,c1.y);
	
	var c3 = all_fn.coor2(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ix].x[2],walls[ix].y[2],this.attr[index].depth);
	ctx1.lineTo(c3.x,c3.y);

	ctx1.closePath();

}

// 选择转角飘窗
doorObj.prototype.aliveZJPC = function(walls){
	this.checkZJPC(walls);
	ctx1.lineWidth = this.stroke+1;
	ctx1.strokeStyle = this.aliveColor;
	ctx1.stroke();
}

// 画转角窗
doorObj.prototype.darwZJC = function(walls,g){
	var index = walls.i;
	var ixFrom = this.c[index][0];
	var ix = this.c[index][1];
	var walls = lf_objs.wallIn.walls;

	var ixFromLast = walls[ixFrom].x.length-2;
	var ixFromAngle = all_fn.getAngle(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]);

	var ixAngle = all_fn.getAngle(walls[ix].x[1],walls[ix].y[1],walls[ix].x[2],walls[ix].y[2]);


	ctx1.beginPath();
	ctx1.moveTo(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]);
	ctx1.lineTo(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast]);

	var c0 = all_fn.coor(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],ixFromAngle+90,lf.config.wall.Thick/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor2(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ix].x[2],walls[ix].y[2],lf.config.wall.Thick/2);
	ctx1.lineTo(c1.x,c1.y);

	var c2 = all_fn.coor(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],ixFromAngle+90,lf.config.wall.Thick);
	ctx1.moveTo(c2.x,c2.y);
	var c3 = all_fn.coor2(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ix].x[2],walls[ix].y[2],lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);

	ctx1.moveTo(walls[ix].x[2],walls[ix].y[2]);
	ctx1.lineTo(walls[ix].x[1],walls[ix].y[1]);

	var c4 = all_fn.coor(walls[ix].x[2],walls[ix].y[2],ixAngle-90,lf.config.wall.Thick/2);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = c1;
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor(walls[ix].x[2],walls[ix].y[2],ixAngle-90,lf.config.wall.Thick);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = c3;
	ctx1.lineTo(c7.x,c7.y);

	if(g == undefined)
		ctx1.stroke();
}
// 检测转角窗
doorObj.prototype.checkZJC = function(walls){
	var index = walls.i;
	var ixFrom = this.c[index][0];
	var ix = this.c[index][1];
	var walls = lf_objs.wallIn.walls;
	var ixFromLast = walls[ixFrom].x.length-2;
	var ixFromAngle = all_fn.getAngle(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]);
	var ixAngle = all_fn.getAngle(walls[ix].x[1],walls[ix].y[1],walls[ix].x[2],walls[ix].y[2]);

	ctx1.beginPath();
	ctx1.moveTo(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]);
	ctx1.lineTo(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast]);
	ctx1.lineTo(walls[ix].x[2],walls[ix].y[2]);

	var c0 = all_fn.coor(walls[ix].x[2],walls[ix].y[2],ixAngle-90,lf.config.wall.Thick);
	ctx1.lineTo(c0.x,c0.y);

	var c1 = all_fn.coor2(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ix].x[2],walls[ix].y[2],lf.config.wall.Thick);
	ctx1.lineTo(c1.x,c1.y);

	var c2 = all_fn.coor(walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1],ixFromAngle+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);

	ctx1.closePath();

}
// 选择转角窗
doorObj.prototype.aliveZJC = function(walls){
	this.darwZJC(walls,1);
	ctx1.lineWidth = this.stroke+1;
	ctx1.strokeStyle = this.aliveColor;
	ctx1.stroke();

}


// 画普通窗
doorObj.prototype.darwPTC = function(walls,g){
	// 背景
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(walls.x,walls.y);
	ctx1.lineTo(c0.x,c0.y);
	
	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}


	// 门体墙部分
	var c4 = all_fn.coor(c0.x,c0.y,walls.a,lf.config.wall.Thick/2);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/2-lf.config.wall.Thick/4);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = all_fn.coor(c6.x,c6.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c7.x,c7.y);

	var c8 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/2+lf.config.wall.Thick/4);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor(c8.x,c8.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor(c0.x,c0.y,walls.a,walls.b-lf.config.wall.Thick/2);
	ctx1.moveTo(c10.x,c10.y);
	var c11 = all_fn.coor(c10.x,c10.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c11.x,c11.y);

	var c12 = all_fn.coor(c4.x,c4.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c12.x,c12.y);
	var c13 = all_fn.coor(c6.x,c6.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c13.x,c13.y);

	var c14 = all_fn.coor(c5.x,c5.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.moveTo(c14.x,c14.y);
	var c15 = all_fn.coor(c7.x,c7.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.lineTo(c15.x,c15.y);

	var c16 = all_fn.coor(c8.x,c8.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c16.x,c16.y);
	var c17 = all_fn.coor(c10.x,c10.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c17.x,c17.y);

	var c18 = all_fn.coor(c9.x,c9.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.moveTo(c18.x,c18.y);
	var c19 = all_fn.coor(c11.x,c11.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.lineTo(c19.x,c19.y);


	ctx1.stroke();
	
}
// 检测普通窗
doorObj.prototype.checkPTC = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择普通窗
doorObj.prototype.alivePTC = function(walls){
	this.darwPTC(walls,1);
}

// 画阳台门
doorObj.prototype.darwYTM = function(walls,g){
	// 背景
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(walls.x,walls.y);
	ctx1.lineTo(c0.x,c0.y);

	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}

	var c4 = all_fn.coor(c0.x,c0.y,walls.a,lf.config.wall.Thick/2);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/3-lf.config.wall.Thick/4);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = all_fn.coor(c6.x,c6.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c7.x,c7.y);

	var c8 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/3+lf.config.wall.Thick/4);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor(c8.x,c8.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/3*2-lf.config.wall.Thick/4);
	ctx1.moveTo(c10.x,c10.y);
	var c11 = all_fn.coor(c10.x,c10.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c11.x,c11.y);

	var c12 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/3*2+lf.config.wall.Thick/4);
	ctx1.moveTo(c12.x,c12.y);
	var c13 = all_fn.coor(c12.x,c12.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c13.x,c13.y);

	var c14 = all_fn.coor(c0.x,c0.y,walls.a,walls.b-lf.config.wall.Thick/2);
	ctx1.moveTo(c14.x,c14.y);
	var c15 = all_fn.coor(c14.x,c14.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c15.x,c15.y);

	var c16 = all_fn.coor(c4.x,c4.y,walls.a+90,lf.config.wall.Thick/3*2);
	ctx1.moveTo(c16.x,c16.y);
	var c17 = all_fn.coor(c6.x,c6.y,walls.a+90,lf.config.wall.Thick/3*2);
	ctx1.lineTo(c17.x,c17.y);

	var c18 = all_fn.coor(c8.x,c8.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c18.x,c18.y);
	var c19 = all_fn.coor(c10.x,c10.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c19.x,c19.y);

	var c20 = all_fn.coor(c12.x,c12.y,walls.a+90,lf.config.wall.Thick/3*2);
	ctx1.moveTo(c20.x,c20.y);
	var c21 = all_fn.coor(c14.x,c14.y,walls.a+90,lf.config.wall.Thick/3*2);
	ctx1.lineTo(c21.x,c21.y);

	ctx1.stroke();

}
// 检测阳台门
doorObj.prototype.checkYTM = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择阳台门
doorObj.prototype.aliveYTM = function(walls){
	this.darwYTM(walls,1);
}

// 画柱
doorObj.prototype.darwZ = function(walls){
	// 背景
	ctx1.fillStyle = lf_objs.wallIn.strokeColor;
	this.checkZ(walls);
	ctx1.fill();
}
// 检测柱
doorObj.prototype.checkZ = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick*2.3);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick*2.3);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择柱
doorObj.prototype.aliveZ = function(walls){
	ctx1.beginPath();
	ctx1.moveTo(walls.x,walls.y);
	var c0 = all_fn.coor(walls.x,walls.y,walls.a,walls.b);
	ctx1.lineTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick*1.3);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(walls.x,walls.y,walls.a+90,lf.config.wall.Thick*1.3);
	ctx1.lineTo(c2.x,c2.y);
	ctx1.closePath();
	ctx1.fill();
}

doorObj.prototype.inters = function(noNum,coor,coor1){
	var noCheck = false;
	var toCoor = {};
	for(var i=0;i<lf_objs.wallIn.num;i++){
		if(i==noNum) continue; 
		var toNum = 10000;
		var last = lf_objs.wallIn.walls[i].x.length-1;
		var a = {x:lf_objs.wallIn.walls[i].x[0],y:lf_objs.wallIn.walls[i].y[0]};
		var b = {x:lf_objs.wallIn.walls[i].x[last],y:lf_objs.wallIn.walls[i].y[last]};
		var c = {x:coor.x,y:coor.y};
		// var d = {x:lf.tempObj.nx,y:lf.tempObj.ny};
		var d = all_fn.coor(coor.x,coor.y,coor.a,toNum);

		if(all_fn.inters(a,b,c,d)){
			var c0 = {};
			var c1 = {};
			for(var j=1;j<=10000;j++){
				c0 = all_fn.coor(coor.x,coor.y,coor.a,j);
				if(all_fn.inters(a,b,c,c0)) break; 
			}
			for(var l=1;l<=10000;l++){
				c1 = all_fn.coor(coor1.x,coor1.y,coor.a,l);
				if(all_fn.inters(a,b,coor1,c1)) break; 
			}


			toCoor = {sx:c0.x,sy:c0.y,nx:c1.x,ny:c1.y};
			noCheck = !noCheck;
			break;
		}
	}
	return noCheck ? toCoor : noCheck ;
}

// 画梁
doorObj.prototype.darwL = function(walls){
	this.checkL(walls);
	ctx1.fillStyle = lf_objs.wallIn.strokeColor;
	ctx1.fill();
}
// 检测梁
doorObj.prototype.checkL = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	c0.a = walls.a+90;
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	var c2 = this.inters(this.c[walls.i][0],c0,c1);
	if(c2 == false) return;

	ctx1.moveTo(c0.x,c0.y);
	ctx1.lineTo(c2.sx,c2.sy);
	ctx1.lineTo(c2.nx,c2.ny);
	ctx1.lineTo(c1.x,c1.y);
	ctx1.closePath();
}
// 选择梁
doorObj.prototype.aliveL = function(walls){
	this.checkL(walls);
	ctx1.fillStyle = "red";
	ctx1.fill();
}

// 画墙洞
doorObj.prototype.darwQD = function(walls,g){
	this.checkQD(walls);
	
	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}

	// ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a,lf.config.wall.Thick/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c1.x,c1.y);

	var c2 = all_fn.coor(c1.x,c1.y,walls.a,walls.b-lf.config.wall.Thick);
	ctx1.moveTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);

	ctx1.stroke();
}
// 检测墙洞
doorObj.prototype.checkQD = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	ctx1.lineTo(walls.x,walls.y);
	ctx1.closePath();
}
// 选择墙洞
doorObj.prototype.aliveQD = function(walls){
	this.darwQD(walls,1);
}

// 画双开门
doorObj.prototype.darwSKM = function(walls,g){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	ctx1.lineTo(walls.x,walls.y);
	ctx1.lineTo(c0.x,c0.y);

	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}

	var c3 = all_fn.coor(c0.x,c0.y,walls.a,lf.config.wall.Thick/2);
	ctx1.moveTo(c3.x,c3.y);
	var c4 = all_fn.coor(walls.x,walls.y,walls.a,lf.config.wall.Thick/2);
	ctx1.lineTo(c4.x,c4.y);

	var c5 = all_fn.coor(c0.x,c0.y,walls.a,walls.b/2);
	ctx1.moveTo(c5.x,c5.y);
	var c6 = all_fn.coor(walls.x,walls.y,walls.a,walls.b/2);
	ctx1.lineTo(c6.x,c6.y);

	var c7 = all_fn.coor(c0.x,c0.y,walls.a,walls.b-lf.config.wall.Thick/2);
	ctx1.moveTo(c7.x,c7.y);
	var c8 = all_fn.coor(walls.x,walls.y,walls.a,walls.b-lf.config.wall.Thick/2);
	ctx1.lineTo(c8.x,c8.y);

	var c9 = all_fn.coor(c3.x,c3.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c9.x,c9.y);
	var c10 = all_fn.coor(c7.x,c7.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c10.x,c10.y);

	var c11 = all_fn.coor(c3.x,c3.y,walls.a+90,lf.config.wall.Thick/3*2);
	ctx1.moveTo(c11.x,c11.y);
	var c12 = all_fn.coor(c7.x,c7.y,walls.a+90,lf.config.wall.Thick/3*2);
	ctx1.lineTo(c12.x,c12.y);

	ctx1.stroke();

	ctx1.beginPath();
	var c13 = all_fn.coor(c3.x,c3.y,walls.a+90,lf.config.wall.Thick/2);
	ctx1.arc(c13.x,c13.y,walls.b/2-lf.config.wall.Thick/2,0,0.5*Math.PI);
	ctx1.stroke();
	
	ctx1.beginPath();
	var c14 = all_fn.coor(c7.x,c7.y,walls.a+90,lf.config.wall.Thick/2);
	ctx1.arc(c14.x,c14.y,walls.b/2-lf.config.wall.Thick/2,0.5*Math.PI,1*Math.PI);
	ctx1.stroke();

	ctx1.beginPath();
	ctx1.moveTo(c13.x,c13.y);
	var c15 = all_fn.coor(c13.x,c13.y,walls.a+90,walls.b/2-lf.config.wall.Thick/2);
	ctx1.lineTo(c15.x,c15.y);

	ctx1.moveTo(c14.x,c14.y);
	var c16 = all_fn.coor(c14.x,c14.y,walls.a+90,walls.b/2-lf.config.wall.Thick/2);
	ctx1.lineTo(c16.x,c16.y);

	ctx1.save();
	ctx1.lineWidth = this.Thick;
	ctx1.stroke();
	ctx1.restore();
}
// 检测双开门
doorObj.prototype.checkSKM = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.arc(c0.x,c0.y,walls.b/2,0,0.5*Math.PI);
	ctx1.lineTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	ctx1.arc(c1.x,c1.y,walls.b/2,0.5*Math.PI,1*Math.PI);
}
// 选择双开门
doorObj.prototype.aliveSKM = function(walls){
	this.darwSKM(walls,1);
}

// 画推拉门
doorObj.prototype.darwTLM = function(walls,g){
	this.checkTLM(walls);
	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}

	var c0 = all_fn.coor(walls.x,walls.y,walls.a,lf.config.wall.Thick/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c1.x,c1.y);
	
	var c2 = all_fn.coor(walls.x,walls.y,walls.a,walls.b/2-lf.config.wall.Thick/6);
	ctx1.moveTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);

	var c4 = all_fn.coor(walls.x,walls.y,walls.a,walls.b/2+lf.config.wall.Thick/6);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor(walls.x,walls.y,walls.a,walls.b-lf.config.wall.Thick/2);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = all_fn.coor(c6.x,c6.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c7.x,c7.y);


	var c8 = all_fn.coor(c0.x,c0.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor(c2.x,c2.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor(c5.x,c5.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.moveTo(c10.x,c10.y);
	var c11 = all_fn.coor(c7.x,c7.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c11.x,c11.y);

	ctx1.stroke();
}
// 检测推拉门
doorObj.prototype.checkTLM = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择推拉门
doorObj.prototype.aliveTLM = function(walls){
	this.darwTLM(walls,1);
}

// 画折叠门
doorObj.prototype.darwZDM = function(walls,g){
	this.checkZDM(walls);
	if(g != undefined){
		ctx1.fill();
		ctx1.beginPath();
	}

	var c0 = all_fn.coor(walls.x,walls.y,walls.a,lf.config.wall.Thick/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c1.x,c1.y);

	var c2 = all_fn.coor(walls.x,walls.y,walls.a,walls.b-lf.config.wall.Thick/2);
	ctx1.moveTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);


	var c4 = all_fn.coor(c0.x,c0.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(walls.x,walls.y,walls.a,walls.b*0.25);
	var c6 = all_fn.coor(c5.x,c5.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c6.x,c6.y);

	var c7 = all_fn.coor(c4.x,c4.y,walls.a,walls.b*0.35);
	ctx1.lineTo(c7.x,c7.y);

	var c8 = all_fn.coor(c0.x,c0.y,walls.a,walls.b*0.35);
	ctx1.lineTo(c8.x,c8.y);

	var c9 = all_fn.coor(c6.x,c6.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c9.x,c9.y);
	ctx1.lineTo(c0.x,c0.y);
	ctx1.moveTo(c6.x,c6.y);
	ctx1.lineTo(c9.x,c9.y);


	var c10 = all_fn.coor(c2.x,c2.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.moveTo(c10.x,c10.y);

	var c11 = all_fn.coor(walls.x,walls.y,walls.a,walls.b*0.75);
	var c12 = all_fn.coor(c11.x,c11.y,walls.a-90,lf.config.wall.Thick);
	ctx1.lineTo(c12.x,c12.y);

	var c13 = all_fn.coor(walls.x,walls.y,walls.a,walls.b*0.6);
	var c14 = all_fn.coor(c13.x,c13.y,walls.a-90,lf.config.wall.Thick/3);
	ctx1.lineTo(c14.x,c14.y);
	ctx1.lineTo(c13.x,c13.y);

	var c15 = all_fn.coor(c12.x,c12.y,walls.a+90,lf.config.wall.Thick/3);
	ctx1.lineTo(c15.x,c15.y);
	ctx1.lineTo(c2.x,c2.y);
	ctx1.moveTo(c12.x,c12.y);
	ctx1.lineTo(c15.x,c15.y);

	ctx1.stroke();
}
// 检测折叠门
doorObj.prototype.checkZDM = function(walls){
	ctx1.beginPath();
	var c0 = all_fn.coor(walls.x,walls.y,walls.a-90,lf.config.wall.Thick);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,walls.a,walls.b);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,walls.a+90,lf.config.wall.Thick);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择折叠门
doorObj.prototype.aliveZDM = function(walls){
	this.darwZDM(walls,1);
}


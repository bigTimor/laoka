var furnitObj = function(){
	this.num = 0;							// 家具对象的数量
	this.x = [];							// 家具对象的X坐标集
	this.y = [];							// 家具对象的Y坐标集
	this.a = [];							// 家具对象的角度集
	this.n = [];							// 家具对象的名称集
	this.s = [];							// 家具对象的类型集
	this.l = [];							// 家具对象的长(高)集
	this.w = [];							// 家具对象的宽集
	this.berth = [];						// 是否停靠
	this.style = [];						// 款式
	this.note = [];							// 备注


	this.stroke = 1;						// 绘画的线宽
	this.strokeColor = "black";				// 绘制的颜色
	this.aliveColor = "red";				// 当前选中的颜色
	this.textStyle = "lighter 8px Arial";	// 字体样式
	this.textAlign = "center";				// 字体水平居中
	this.textBaseline = "middle";			// 字体垂直居中
}

// 初始化
furnitObj.prototype.init = function(obj){
	if(obj)
		for(var i in obj)
			this[i] = obj[i];
}

// 打开加载
furnitObj.prototype.open = function(){
	// 测试读取本地缓存用，暂无实际用途，可删
	if(localStorage.Datas){
		var Datas = $.parseJSON(localStorage.Datas);
		for(var i in Datas.furnitIn)
			this[i] = Datas.furnitIn[i];
	}
}

// 清空
furnitObj.prototype.empty = function(){
	this.num = 0;
	this.x = [];
	this.y = [];
	this.a = [];
	this.n = [];
	this.s = [];
	this.l = [];
	this.w = [];
	this.berth = [];
	this.style = [];
	this.note = [];	
}



// 绘画对象
furnitObj.prototype.darw = function(){
	ctx1.save();

	ctx1.lineWidth = this.stroke;
	ctx1.strokeStyle = this.strokeColor;
	ctx1.font = this.textStyle;
	ctx1.textAlign = this.textAlign;
	ctx1.textBaseline = this.textBaseline;	

	for(var i=0;i<this.num;i++){

		switch(this.s[i]){
			case 0:
				this.darwWNTB(i);
				break;

			case 1:
			case 2:
				this.darwYMWBC(i);
				break;

			case 3:
				this.darwDYG(i);
				break;

			case 4:
				this.darwDYHYG(i);
				break;

			case 5:
				this.darwDYHYG2(i);
				break;

			case 6:
				this.darwCTG(i);
				break;

			case 7:
				this.darwSZT(i);
				break;

			case 8:
				this.darwSZ(i);
				break;

			case 9:
				this.darwSG(i);
				break;

			case 10:
				this.darwDSG(i);
				break;

			case 11:
				this.darwYJ(i);
				break;

			default:break;
		}

		ctx1.save();
		ctx1.translate(this.x[i],this.y[i]);
		ctx1.rotate(this.a[i]*Math.PI/180);
		ctx1.fillText(this.n[i],0,0);
		ctx1.restore();

	}
	ctx1.restore();
}

// 检测是否选中对象
furnitObj.prototype.check = function(x,y){
	ctx1.save();

	for(var i=0;i<this.num;i++){

		switch(this.s[i]){
			case 0:
				this.checkWNTB(i);
				break;

			case 1:
			case 2:
				this.checkYMWBC(i);
				break;

			case 3:
				this.checkDYG(i);
				break;

			case 4:
				this.checkDYHYG(i);
				break;

			case 5:
				this.checkDYHYG2(i);
				break;

			case 6:
				this.checkCTG(i);
				break;

			case 7:
				this.checkSZT(i);
				break;

			case 8:
				this.checkSZ(i);
				break;

			case 9:
				this.checkSG(i);
				break;

			case 10:
				this.checkDSG(i);
				break;

			case 11:
				this.checkYJ(i);
				break;

			default:break;
		}

	if(ctx1.isPointInPath(x,y))
		return i;

	}



	ctx1.restore();
}

// 高亮选择的对象
furnitObj.prototype.alive = function(i){
	ctx1.save();

	ctx1.strokeStyle = this.aliveColor;
	ctx1.font = this.textStyle;
	ctx1.textAlign = this.textAlign;
	ctx1.textBaseline = this.textBaseline;
	ctx1.lineWidth += 1;

	switch(this.s[i]){
		case 0:
			this.aliveWNTB(i);
			break;

		case 1:
		case 2:
			this.aliveYMWBC(i);
			break;

		case 3:
			this.aliveDYG(i);
			break;

		case 4:
			this.aliveDYHYG(i);
			break;

		case 5:
			this.aliveDYHYG2(i);
			break;

		case 6:
			this.aliveCTG(i);
			break;

		case 7:
			this.aliveSZT(i);
			break;

		case 8:
			this.aliveSZ(i);
			break;

		case 9:
			this.aliveSG(i);
			break;

		case 10:
			this.aliveDSG(i);
			break;

		case 11:
			this.aliveYJ(i);
			break;

		default:break;
	}


	ctx1.restore();
}



// 画万能图标
furnitObj.prototype.darwWNTB = function(i){
	this.checkWNTB(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2-this.l[i]*0.1,this.a[i]-90,this.l[i]/2-this.l[i]*0.1);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]-this.l[i]*0.2);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]-this.l[i]*0.2);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]-this.l[i]*0.2);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.lineTo(c0.x,c0.y);
	ctx1.moveTo(c3.x,c3.y);
	ctx1.lineTo(c1.x,c1.y);

	ctx1.stroke();
}
// 检测万能图标
furnitObj.prototype.checkWNTB = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择万能图标
furnitObj.prototype.aliveWNTB = function(i){
	this.darwWNTB(i);
}


// 画1.5米床\1.8床
furnitObj.prototype.darwYMWBC = function(i){
	this.checkYMWBC(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.02);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i],this.w[i]);
	ctx1.lineTo(c2.x,c2.y);

	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.07);
	var c4 = all_fn.coor(c3.x,c3.y,this.a[i],this.w[i]*0.1);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c3.x,c3.y,this.a[i],this.w[i]*0.48);
	ctx1.lineTo(c5.x,c5.y);
	var c6 = all_fn.coor(c5.x,c5.y,this.a[i]+90,this.l[i]*0.15);
	ctx1.lineTo(c6.x,c6.y);
	var c7 = all_fn.coor(c4.x,c4.y,this.a[i]+90,this.l[i]*0.15);
	ctx1.lineTo(c7.x,c7.y);
	ctx1.lineTo(c4.x,c4.y);

	var c8 = all_fn.coor(c3.x,c3.y,this.a[i],this.w[i]*0.52);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor(c3.x,c3.y,this.a[i],this.w[i]*0.9);
	ctx1.lineTo(c9.x,c9.y);
	var c10 = all_fn.coor(c9.x,c9.y,this.a[i]+90,this.l[i]*0.15);
	ctx1.lineTo(c10.x,c10.y);
	var c11 = all_fn.coor(c8.x,c8.y,this.a[i]+90,this.l[i]*0.15);
	ctx1.lineTo(c11.x,c11.y);
	ctx1.lineTo(c8.x,c8.y);

	var c12 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.25);
	var c13 = all_fn.coor(c12.x,c12.y,this.a[i],this.w[i]*0.05);
	ctx1.moveTo(c13.x,c13.y);
	var c14 = all_fn.coor(c13.x,c13.y,this.a[i]+90,this.l[i]*0.7);
	ctx1.lineTo(c14.x,c14.y);
	var c15 = all_fn.coor(c14.x,c14.y,this.a[i],this.w[i]*0.9);
	ctx1.lineTo(c15.x,c15.y);
	var c16 = all_fn.coor(c15.x,c15.y,this.a[i]-90,this.l[i]*0.5);
	ctx1.lineTo(c16.x,c16.y);
	var c17 = all_fn.coor(c16.x,c16.y,this.a[i]-180,this.w[i]*0.38);
	ctx1.lineTo(c17.x,c17.y);
	var c18 = all_fn.coor(c17.x,c17.y,this.a[i]-90,this.l[i]*0.2);
	ctx1.lineTo(c18.x,c18.y);
	ctx1.lineTo(c13.x,c13.y);
	ctx1.moveTo(c18.x,c18.y);
	ctx1.lineTo(c16.x,c16.y);
	ctx1.stroke();

	ctx1.save();

	ctx1.lineWidth += 1;
	ctx1.beginPath();
	var c19 = all_fn.coor(c13.x,c13.y,this.a[i]+90,this.l[i]*0.12);
	ctx1.moveTo(c19.x,c19.y);
	var c20 = all_fn.coor(c18.x,c18.y,this.a[i]+90,this.l[i]*0.12);
	ctx1.lineTo(c20.x,c20.y);

	var c20 = all_fn.coor(c13.x,c13.y,this.a[i]+90,this.l[i]*0.15);
	ctx1.moveTo(c20.x,c20.y);
	var c21 = all_fn.coor(c18.x,c18.y,this.a[i]+90,this.l[i]*0.15);
	ctx1.lineTo(c21.x,c21.y);
	ctx1.stroke();
	
	ctx1.restore();
}
// 检测1.5米床\1.8床
furnitObj.prototype.checkYMWBC = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择1.5米床\1.8床\1.8床
furnitObj.prototype.aliveYMWBC = function(i){
	this.darwYMWBC(i);
}

// 画大衣柜
furnitObj.prototype.darwDYG = function(i,g){
	if(g == undefined){
		this.checkDYG(i);
		var l = this.l[i];
		var w = this.w[i];
		var x = this.x[i];
		var y = this.y[i];
	}else{
		var l = g.l;
		var w = g.w;
		var x = g.x;
		var y = g.y;
	}

	var c0 = all_fn.coor(x,y,this.a[i]-180,w*0.48);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(x,y,this.a[i],w*0.48);
	ctx1.lineTo(c1.x,c1.y);

	var c2 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.05,this.a[i]-90,l*0.35);
	ctx1.moveTo(c2.x,c2.y);
	var c3 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.08,this.a[i]+90,l*0.32);
	ctx1.lineTo(c3.x,c3.y);

	var c4 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.12,this.a[i]-90,l*0.35);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.12,this.a[i]+90,l*0.35);
	ctx1.lineTo(c5.x,c5.y);

	var c6 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.18,this.a[i]-90,l*0.35);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.18,this.a[i]+90,l*0.35);
	ctx1.lineTo(c7.x,c7.y);

	var c8 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.21,this.a[i]-90,l*0.35);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.21,this.a[i]+90,l*0.33);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.225,this.a[i]-90,l*0.35);
	ctx1.moveTo(c10.x,c10.y);
	var c11 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.225,this.a[i]+90,l*0.35);
	ctx1.lineTo(c11.x,c11.y);

	var c12 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.29,this.a[i]-90,l*0.35);
	ctx1.moveTo(c12.x,c12.y);
	var c13 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.27,this.a[i]+90,l*0.35);
	ctx1.lineTo(c13.x,c13.y);

	var c12 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.36,this.a[i]-90,l*0.32);
	ctx1.moveTo(c12.x,c12.y);
	var c13 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.32,this.a[i]+90,l*0.38);
	ctx1.lineTo(c13.x,c13.y);

	var c14 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.41,this.a[i]-90,l*0.35);
	ctx1.moveTo(c14.x,c14.y);
	var c15 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.41,this.a[i]+90,l*0.35);
	ctx1.lineTo(c15.x,c15.y);

	var c16 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.46,this.a[i]-90,l*0.35);
	ctx1.moveTo(c16.x,c16.y);
	var c17 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.46,this.a[i]+90,l*0.35);
	ctx1.lineTo(c17.x,c17.y);

	var c18 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.49,this.a[i]-90,l*0.35);
	ctx1.moveTo(c18.x,c18.y);
	var c19 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.49,this.a[i]+90,l*0.35);
	ctx1.lineTo(c19.x,c19.y);

	var c20 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.53,this.a[i]-90,l*0.37);
	ctx1.moveTo(c20.x,c20.y);
	var c21 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.56,this.a[i]+90,l*0.32);
	ctx1.lineTo(c21.x,c21.y);

	var c22 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.61,this.a[i]-90,l*0.32);
	ctx1.moveTo(c22.x,c22.y);
	var c23 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.59,this.a[i]+90,l*0.35);
	ctx1.lineTo(c23.x,c23.y);

	var c24 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.69,this.a[i]-90,l*0.32);
	ctx1.moveTo(c24.x,c24.y);
	var c25 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.63,this.a[i]+90,l*0.35);
	ctx1.lineTo(c25.x,c25.y);

	var c26 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.72,this.a[i]-90,l*0.35);
	ctx1.moveTo(c26.x,c26.y);
	var c27 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.72,this.a[i]+90,l*0.35);
	ctx1.lineTo(c27.x,c27.y);

	var c28 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.75,this.a[i]-90,l*0.35);
	ctx1.moveTo(c28.x,c28.y);
	var c29 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.75,this.a[i]+90,l*0.35);
	ctx1.lineTo(c29.x,c29.y);

	var c30 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.79,this.a[i]-90,l*0.38);
	ctx1.moveTo(c30.x,c30.y);
	var c31 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.82,this.a[i]+90,l*0.33);
	ctx1.lineTo(c31.x,c31.y);

	var c32 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.88,this.a[i]-90,l*0.35);
	ctx1.moveTo(c32.x,c32.y);
	var c33 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.86,this.a[i]+90,l*0.35);
	ctx1.lineTo(c33.x,c33.y);

	var c34 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.94,this.a[i]-90,l*0.32);
	ctx1.moveTo(c34.x,c34.y);
	var c35 = all_fn.coor3(c0.x,c0.y,this.a[i],w*0.89,this.a[i]+90,l*0.35);
	ctx1.lineTo(c35.x,c35.y);



	ctx1.stroke();
}
// 检测大衣柜
furnitObj.prototype.checkDYG = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择大衣柜
furnitObj.prototype.aliveDYG = function(i){
	this.darwDYG(i);
	
}

// 画大圆弧衣柜
furnitObj.prototype.darwDYHYG = function(i){
	this.checkDYHYG(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]*0.9);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.moveTo(c3.x,c3.y);
	ctx1.lineTo(c2.x,c2.y);

	var c4 = all_fn.coor3(c1.x,c1.y,this.a[i]-180,this.w[i]*0.9/2,this.a[i]+90,this.l[i]/2);
	var g = {l:this.l[i], w:this.w[i]*0.9, x:c4.x, y:c4.y };
	this.darwDYG(i,g);
}
// 检测大圆弧衣柜
furnitObj.prototype.checkDYHYG = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor3(c1.x,c1.y,this.a[i]+90,this.l[i]*0.8,this.a[i],this.l[i]*0.1);
	var c3 = all_fn.coor3(c0.x,c0.y,this.a[i],this.w[i]*0.9,this.a[i]+90,this.l[i]);
	ctx1.quadraticCurveTo(c2.x,c2.y,c3.x,c3.y);
	var c4 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c4.x,c4.y);
	ctx1.closePath();
}
// 选择大圆弧衣柜
furnitObj.prototype.aliveDYHYG = function(i){
	this.darwDYHYG(i);
}


// 画大圆弧衣柜2
furnitObj.prototype.darwDYHYG2 = function(i){
	this.checkDYHYG2(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i],this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i]-180,this.w[i]*0.9);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]-180,this.w[i]);
	ctx1.moveTo(c3.x,c3.y);
	ctx1.lineTo(c2.x,c2.y);

	var c4 = all_fn.coor3(c1.x,c1.y,this.a[i],this.w[i]*0.9/2,this.a[i]+90,this.l[i]/2);
	var g = {l:this.l[i], w:this.w[i]*0.9, x:c4.x, y:c4.y };
	this.darwDYG(i,g);
}
// 检测大圆弧衣柜2
furnitObj.prototype.checkDYHYG2 = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i],this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i]-180,this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor3(c1.x,c1.y,this.a[i]+90,this.l[i]*0.8,this.a[i]-180,this.l[i]*0.1);
	var c3 = all_fn.coor3(c0.x,c0.y,this.a[i]-180,this.w[i]*0.9,this.a[i]+90,this.l[i]);
	ctx1.quadraticCurveTo(c2.x,c2.y,c3.x,c3.y);
	var c4 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c4.x,c4.y);
	ctx1.closePath();
}
// 选择大圆弧衣柜2
furnitObj.prototype.aliveDYHYG2 = function(i){
	this.darwDYHYG2(i);
}


// 画床头柜
furnitObj.prototype.darwCTG = function(i){
	this.checkCTG(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor3(c0.x,c0.y,this.a[i]+90,this.w[i]*0.1,this.a[i],this.w[i]*0.1);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i],this.w[i]-this.w[i]*0.2);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,this.a[i]+90,this.w[i]-this.w[i]*0.2);
	ctx1.lineTo(c3.x,c3.y);
	var c4 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.w[i]-this.w[i]*0.2);
	ctx1.lineTo(c4.x,c4.y);
	ctx1.lineTo(c1.x,c1.y);

	var c5 = all_fn.coor(this.x[i],this.y[i],this.a[i]-180,this.w[i]*0.25);
	ctx1.moveTo(c5.x,c5.y);
	var c6 = all_fn.coor(this.x[i],this.y[i],this.a[i],this.w[i]*0.25);
	ctx1.lineTo(c6.x,c6.y);
	var c7 = all_fn.coor(this.x[i],this.y[i],this.a[i]-90,this.w[i]*0.25);
	ctx1.moveTo(c7.x,c7.y);
	var c8 = all_fn.coor(this.x[i],this.y[i],this.a[i]+90,this.w[i]*0.25);
	ctx1.lineTo(c8.x,c8.y);

	ctx1.moveTo(this.x[i],this.y[i]);
	ctx1.arc(this.x[i],this.y[i],this.w[i]*0.1,0,2*Math.PI);
	ctx1.arc(this.x[i],this.y[i],this.w[i]*0.16,0,2*Math.PI);

	ctx1.stroke();
}
// 检测床头柜
furnitObj.prototype.checkCTG = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择床头柜
furnitObj.prototype.aliveCTG = function(i){
	this.darwCTG(i);
}


// 画梳妆台
furnitObj.prototype.darwSZT = function(i){
	this.checkSZT(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.07);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i],this.w[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.75);
	ctx1.lineTo(c3.x,c3.y);
	var c4 = all_fn.coor(c3.x,c3.y,this.a[i],this.w[i]*0.25);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,this.a[i],this.w[i]*0.5);
	ctx1.lineTo(c5.x,c5.y);


	ctx1.stroke();
}
// 检测梳妆台
furnitObj.prototype.checkSZT = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]*0.75);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,this.a[i]-180,this.w[i]*0.25);
	ctx1.lineTo(c3.x,c3.y);
	var c4 = all_fn.coor(c3.x,c3.y,this.a[i]+90,this.l[i]*0.25);
	ctx1.lineTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,this.a[i]-180,this.w[i]*0.5);
	ctx1.lineTo(c5.x,c5.y);
	var c6 = all_fn.coor(c5.x,c5.y,this.a[i]-90,this.l[i]*0.25);
	ctx1.lineTo(c6.x,c6.y);
	var c7 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.75);
	ctx1.lineTo(c7.x,c7.y);



	ctx1.closePath();
}
// 选择梳妆台
furnitObj.prototype.aliveSZT = function(i){
	this.darwSZT(i);
}


// 画书桌
furnitObj.prototype.darwSZ = function(i){
	this.checkSZ(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor3(c0.x,c0.y,this.a[i]+90,this.l[i]*0.05,this.a[i],this.w[i]*0.02);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i],this.w[i]*0.97);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,this.a[i]+90,this.l[i]*0.63);
	ctx1.lineTo(c3.x,c3.y);
	var c4 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]*0.63);
	ctx1.lineTo(c4.x,c4.y);
	ctx1.lineTo(c1.x,c1.y);

	var c5 = all_fn.coor3(c0.x,c0.y,this.a[i]+90,this.l[i]*0.7,this.a[i],this.w[i]*0.33);
	ctx1.moveTo(c5.x,c5.y);
	var c6 = all_fn.coor(c5.x,c5.y,this.a[i],this.w[i]*0.32);
	ctx1.lineTo(c6.x,c6.y);

	var c7 = all_fn.coor3(c5.x,c5.y,this.a[i]-180,this.w[i]*0.09,this.a[i]-90,this.l[i]*0.04);
	ctx1.moveTo(c7.x,c7.y);
	var c8 = all_fn.coor(c7.x,c7.y,this.a[i]-90,this.l[i]*0.35);
	ctx1.lineTo(c8.x,c8.y);
	var c9 = all_fn.coor(c8.x,c8.y,this.a[i],this.w[i]*0.52);
	ctx1.lineTo(c9.x,c9.y);
	var c10 = all_fn.coor(c9.x,c9.y,this.a[i]+90,this.l[i]*0.35);
	ctx1.lineTo(c10.x,c10.y);

	var c11 = all_fn.coor3(c5.x,c5.y,this.a[i],this.w[i]*0.01,this.a[i]+90,this.l[i]*0.1);
	ctx1.moveTo(c11.x,c11.y);
	var c12 = all_fn.coor3(c11.x,c11.y,this.a[i],this.w[i]*0.06,this.a[i]+90,this.l[i]*0.12);
	ctx1.lineTo(c12.x,c12.y);

	var c13 = all_fn.coor3(c6.x,c6.y,this.a[i]-180,this.w[i]*0.01,this.a[i]+90,this.l[i]*0.1);
	ctx1.moveTo(c13.x,c13.y);
	var c14 = all_fn.coor3(c13.x,c13.y,this.a[i]-180,this.w[i]*0.06,this.a[i]+90,this.l[i]*0.12);
	ctx1.lineTo(c14.x,c14.y);
	ctx1.lineTo(c12.x,c12.y);

	var c15 = all_fn.coor3(c5.x,c5.y,this.a[i],this.w[i]*0.05,this.a[i]+90,this.l[i]*0.01);
	ctx1.moveTo(c15.x,c15.y);
	var c16 = all_fn.coor(c15.x,c15.y,this.a[i]+90,this.l[i]*0.1);
	ctx1.lineTo(c16.x,c16.y);
	var c17 = all_fn.coor3(c16.x,c16.y,this.a[i],this.w[i]*0.04,this.a[i]+90,this.l[i]*0.07);
	ctx1.lineTo(c17.x,c17.y);
	var c18 = all_fn.coor(c17.x,c17.y,this.a[i],this.w[i]*0.13);
	ctx1.lineTo(c18.x,c18.y);
	var c19 = all_fn.coor(c16.x,c16.y,this.a[i],this.w[i]*0.22);
	ctx1.lineTo(c19.x,c19.y);
	var c20 = all_fn.coor(c15.x,c15.y,this.a[i],this.w[i]*0.22);
	ctx1.lineTo(c20.x,c20.y);

	var c21 = all_fn.coor(c15.x,c15.y,this.a[i],this.w[i]*0.02);
	ctx1.moveTo(c21.x,c21.y);
	var c22 = all_fn.coor(c16.x,c16.y,this.a[i],this.w[i]*0.02);
	ctx1.lineTo(c22.x,c22.y);
	var c23 = all_fn.coor3(c17.x,c17.y,this.a[i],this.w[i]*0.01,this.a[i]-90,this.l[i]*0.02);
	ctx1.lineTo(c23.x,c23.y);
	var c24 = all_fn.coor(c23.x,c23.y,this.a[i],this.w[i]*0.12);
	ctx1.lineTo(c24.x,c24.y);
	var c25 = all_fn.coor(c19.x,c19.y,this.a[i]-180,this.w[i]*0.02);
	ctx1.lineTo(c25.x,c25.y);
	var c26 = all_fn.coor(c20.x,c20.y,this.a[i]-180,this.w[i]*0.02);
	ctx1.lineTo(c26.x,c26.y);



	ctx1.stroke();
}
// 检测书桌
furnitObj.prototype.checkSZ = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]*0.7);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,this.a[i]-180,this.w[i]*0.35);
	ctx1.lineTo(c3.x,c3.y);
	var c4 = all_fn.coor(c3.x,c3.y,this.a[i]+90,this.l[i]*0.07);
	ctx1.lineTo(c4.x,c4.y);
	var c5 = all_fn.coor3(c4.x,c4.y,this.a[i]-180,this.w[i]*0.06,this.a[i]+90,this.l[i]*0.15);
	var c6 = all_fn.coor3(c4.x,c4.y,this.a[i]+90,this.l[i]*0.1,this.a[i],this.w[i]*0.01);
	ctx1.quadraticCurveTo(c6.x,c6.y,c5.x,c5.y);

	var c7 = all_fn.coor3(c5.x,c5.y,this.a[i]+90,this.l[i]*0.02,this.a[i],this.w[i]*0.03);
	ctx1.lineTo(c7.x,c7.y);
	var c8 = all_fn.coor(c7.x,c7.y,this.a[i]+90,this.l[i]*0.05);
	ctx1.lineTo(c8.x,c8.y);

	var c9 = all_fn.coor(c8.x,c8.y,this.a[i]-180,this.w[i]*0.27);
	ctx1.lineTo(c9.x,c9.y);

	var c10 = all_fn.coor(c9.x,c9.y,this.a[i]-90,this.l[i]*0.05);
	ctx1.lineTo(c10.x,c10.y);
	var c11 = all_fn.coor3(c10.x,c10.y,this.a[i]-90,this.l[i]*0.02,this.a[i],this.w[i]*0.03);
	ctx1.lineTo(c11.x,c11.y);

	var c12 = all_fn.coor3(c11.x,c11.y,this.a[i]-180,this.w[i]*0.06,this.a[i]-90,this.l[i]*0.15);
	var c13 = all_fn.coor3(c11.x,c11.y,this.a[i]-90,this.l[i]*0.02,this.a[i]-180,this.w[i]*0.07);
	ctx1.quadraticCurveTo(c13.x,c13.y,c12.x,c12.y);

	var c14 = all_fn.coor(c3.x,c3.y,this.a[i]-180,this.w[i]*0.32);
	ctx1.lineTo(c14.x,c14.y);

	var c15 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]*0.7);
	ctx1.lineTo(c15.x,c15.y);

	ctx1.closePath();
}
// 选择书桌
furnitObj.prototype.aliveSZ = function(i){
	this.darwSZ(i);
}


// 画书柜
furnitObj.prototype.darwSG = function(i){
	this.checkSG(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	var c1 = all_fn.coor3(c0.x,c0.y,this.a[i],this.l[i]*0.09,this.a[i]+90,this.l[i]*0.09);
	ctx1.moveTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i],this.w[i]-this.l[i]*0.19);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,this.a[i]+90,this.l[i]-this.l[i]*0.19);
	ctx1.lineTo(c3.x,c3.y);
	var c4 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]-this.l[i]*0.19);
	ctx1.lineTo(c4.x,c4.y);
	ctx1.lineTo(c1.x,c1.y);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.moveTo(c2.x,c2.y);
	ctx1.lineTo(c4.x,c4.y);

	ctx1.stroke();
}
// 检测书柜
furnitObj.prototype.checkSG = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择书柜
furnitObj.prototype.aliveSG = function(i){
	this.darwSG(i);
}


// 画电视柜
furnitObj.prototype.darwDSG = function(i){
	this.checkDSG(i);

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]*0.33,this.a[i]+90,this.l[i]*0.27);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor3(this.x[i],this.y[i],this.a[i],this.w[i]*0.33,this.a[i]+90,this.l[i]*0.27);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]-90,this.l[i]*0.35);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]-90,this.l[i]*0.35);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.lineTo(c0.x,c0.y);

	var c4 = all_fn.coor3(c0.x,c0.y,this.a[i],this.w[i]*0.1,this.a[i]-90,this.l[i]*0.01);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,this.a[i]-90,this.l[i]*0.12);
	ctx1.lineTo(c5.x,c5.y);
	var c6 = all_fn.coor3(c1.x,c1.y,this.a[i]-180,this.w[i]*0.1,this.a[i]-90,this.l[i]*0.12);
	ctx1.lineTo(c6.x,c6.y);
	var c7 = all_fn.coor3(c1.x,c1.y,this.a[i]-180,this.w[i]*0.1,this.a[i]-90,this.l[i]*0.01);
	ctx1.lineTo(c7.x,c7.y);

	var c8 = all_fn.coor3(c3.x,c3.y,this.a[i],this.w[i]*0.14,this.a[i]-90,this.l[i]*0.01);
	ctx1.moveTo(c8.x,c8.y);
	var c9 = all_fn.coor3(c8.x,c8.y,this.a[i],this.w[i]*0.08,this.a[i]-90,this.l[i]*0.18);
	ctx1.lineTo(c9.x,c9.y);
	var c10 = all_fn.coor3(c2.x,c2.y,this.a[i]-180,this.w[i]*0.22,this.a[i]-90,this.l[i]*0.18);
	ctx1.lineTo(c10.x,c10.y);
	var c11 = all_fn.coor3(c2.x,c2.y,this.a[i]-180,this.w[i]*0.14,this.a[i]-90,this.l[i]*0.01);
	ctx1.lineTo(c11.x,c11.y);




	ctx1.stroke();
}
// 检测电视柜
furnitObj.prototype.checkDSG = function(i){
	ctx1.beginPath();
	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-180,this.w[i]/2,this.a[i]-90,this.l[i]/2);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i],this.w[i]);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor(c1.x,c1.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c2.x,c2.y);
	var c3 = all_fn.coor(c0.x,c0.y,this.a[i]+90,this.l[i]);
	ctx1.lineTo(c3.x,c3.y);
	ctx1.closePath();
}
// 选择电视柜
furnitObj.prototype.aliveDSG = function(i){
	this.darwDSG(i);
}


// 画衣架
furnitObj.prototype.darwYJ = function(i){

	var r = Math.min(this.w[i]/2,this.l[i]/2);
	var R = Math.max(this.w[i]*0.6,this.l[i]*0.7);
	
	ctx1.save();
	this.checkYJ(i);
	ctx1.stroke();
	ctx1.moveTo(this.x[i],this.y[i]);
	ctx1.arc(this.x[i],this.y[i],r*0.15,0,2 * Math.PI,true);
	ctx1.clip();

	var c0 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-90,r*0.07,this.a[i]-135,R);
	ctx1.moveTo(c0.x,c0.y);
	var c1 = all_fn.coor(c0.x,c0.y,this.a[i]+45,R*2);
	ctx1.lineTo(c1.x,c1.y);
	var c2 = all_fn.coor3(this.x[i],this.y[i],this.a[i]+90,r*0.07,this.a[i]-135,R);
	ctx1.moveTo(c2.x,c2.y);
	var c3 = all_fn.coor(c2.x,c2.y,this.a[i]+45,R*2);
	ctx1.lineTo(c3.x,c3.y);

	var c4 = all_fn.coor3(this.x[i],this.y[i],this.a[i]-90,r*0.07,this.a[i]-45,R);
	ctx1.moveTo(c4.x,c4.y);
	var c5 = all_fn.coor(c4.x,c4.y,this.a[i]+135,R*2);
	ctx1.lineTo(c5.x,c5.y);
	var c6 = all_fn.coor3(this.x[i],this.y[i],this.a[i]+90,r*0.07,this.a[i]-45,R);
	ctx1.moveTo(c6.x,c6.y);
	var c7 = all_fn.coor(c6.x,c6.y,this.a[i]+135,R*2);
	ctx1.lineTo(c7.x,c7.y);

	ctx1.stroke();
	ctx1.restore();
}
// 检测衣架
furnitObj.prototype.checkYJ = function(i){
	ctx1.save();
	var r = Math.max(this.w[i]/2,this.l[i]/2);
	var ratioX = this.w[i]/2 / r;
	var ratioY = this.l[i]/2 / r;
	ctx1.scale(ratioX, ratioY);
	ctx1.beginPath();
	ctx1.arc(this.x[i] / ratioX, this.y[i] / ratioY, r, 0, 2 * Math.PI);
	ctx1.closePath();
	ctx1.restore();
}
// 选择衣架
furnitObj.prototype.aliveYJ = function(i){
	this.darwYJ(i);
}
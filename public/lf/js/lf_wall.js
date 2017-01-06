var wallObj = function(){
	this.dot = {x:[],y:[]};					// 墙体基础端点，其他端点从这些端点拓展出来的
	this.walls = [];						// 墙的端点数组
	this.close = false;						// 是否闭合
	this.num = 0;							// 基础端点的数量
	this.area = 0;							// 房间面积
	this.ceiling = 0;						// 天花高度

	this.dotR = 15;							// 基础端点画圆的半径
	this.Thick = 15;						// 墙体的厚度
	this.strokeColor = "#626262";			// 默认的绘制颜色
	this.fillColor = "#c0c0c0";				// 默认的填充颜色
	this.dotFillStyle = "rgba(0,0,0,0.5)";	// 闭合前，端点的圆圈填充颜色
	this.aliveColor = "#ff6100";			// 默认的墙体选中颜色

	this.textStyle = "bold 14px Arial";		//字体样式
	this.textAlign = "center";				//字体水平居中
	this.textBaseline = "middle";				//字体垂直居中

	this.rulerStrokeColor = "gray";			// 默认的标尺绘制颜色
	this.rulerBgColor = "white";			// 默认的标尺文字背景色
	this.rulerTextColor = "black";			// 默认的标尺文字颜色
	this.rulerBgHeight = 20;				// 默认的标尺文字背景高度
	this.rulerLineWidth = 0.5;				// 默认的标尺线宽
	this.rulerHeight = 30;					// 默认的标尺距离高度
}

// 初始化，用于配置对象的默认属性。配置的变量为lf.config.wall
wallObj.prototype.init = function(obj){
	if(obj)
		for( var i in obj)
			this[i] = obj[i];

}

// 点打开工具时，暂时用于测试
wallObj.prototype.open = function(){
	// 测试读取本地缓存用，暂无实际用途，可删
	if(localStorage.Datas){
		var Datas = $.parseJSON(localStorage.Datas);
		for(var i in Datas.wallIn)
			this[i] = Datas.wallIn[i];
	}
}

// 清空
wallObj.prototype.empty = function(){
	this.dot = {x:[],y:[]};
	this.walls = [];
	this.close = false;
	this.num = 0;		
}


// 绘制对象，被lf.allDarw通过对象集合ssl_objs调用
wallObj.prototype.darw = function(){
	ctx1.save();
	ctx1.lineWidth = this.Thick;
	ctx1.strokeStyle = this.strokeColor;
	
	ctx1.beginPath();

	// ctx1.moveTo(this.dot.x[0],this.dot.y[0]);
	for(var i=0;i<this.num;i++){
		ctx1.lineTo(this.dot.x[i],this.dot.y[i]);
	}

	if(this.close){
		ctx1.closePath();
		ctx1.fillStyle = this.fillColor;
		ctx1.fill();
		if(this.walls.length<=0){
			for(var i=1;i<=this.num;i++){
				var sx = this.dot.x[i-1],
					sy = this.dot.y[i-1],
					nx = this.dot.x[i],
					ny = this.dot.y[i];
				if(i == this.num){
					nx = this.dot.x[0];
					ny = this.dot.y[0];
				}
				var arr = {x:[sx,nx],y:[sy,ny],w:[0,0]};

				//保存直线参数			
				// if((arr.x[0]-arr.x[1])==0){
				// 	var aaa=false;
				// 	var bbb=arr.x[1];//x=bbb;
				// }else if((arr.y[0]-arr.y[1])==0){
				// 	var aaa=0;
				// 	var bbb=arr.y[1];//y=aaa;
				// }else{
				// 	var aaa=(arr.y[0]-arr.y[1])/(arr.x[0]-arr.x[1]);
				// 	var bbb=arr.y[1]-aaa*arr.x[1];
				// }
				// arr.ab = {a:aaa,b:bbb}

				

				this.walls.push(arr);
			}
			lf.config.procedure = 1;
			lf.procedure_show();
			lf.btn_show("#lf_move");

			curObj = {};
		}
		this.darwWall();

		if(lf.config.ruler)
			this.ruler();

	}else{
		ctx1.stroke();

		ctx1.save();
		ctx1.fillStyle = "white";
		ctx1.textAlign = "center";
		ctx1.textBaseline = "middle";
		for(var j=1;j<this.num;j++){
			var jsx = this.dot.x[j-1];
			var jsy = this.dot.y[j-1];
			var jnx = this.dot.x[j];
			var jny = this.dot.y[j];
			var b = all_fn.bevel(jsx,jsy,jnx,jny);
			var a = all_fn.getAngle(jsx,jsy,jnx,jny);
			ctx1.save();
			ctx1.beginPath();
			if(a<=90 || a>=270){
				ctx1.translate(jsx,jsy);
			}else{
				a = all_fn.getAngle(jnx,jny,jsx,jsy);
				ctx1.translate(jnx,jny);
			}
			ctx1.rotate(a*Math.PI/180);	
			ctx1.fillText(Math.round(b),b/2,0);
			ctx1.restore();
		}
		ctx1.restore();


	}


	if(this.num>0 && !this.close){
		ctx1.fillStyle = this.dotFillStyle;
		ctx1.beginPath();
		ctx1.arc(this.dot.x[0],this.dot.y[0],this.dotR,0,2*Math.PI);
		// ctx1.fill();

		// ctx1.beginPath();
		ctx1.arc(this.dot.x[this.num-1],this.dot.y[this.num-1],this.dotR,0,2*Math.PI);
		ctx1.fill();
	}

	ctx1.restore();

}

// 检测鼠标是否点中对象，点中返回对象序号
wallObj.prototype.check = function(x,y){

	if(this.close){
		for(var i=0;i<this.walls.length;i++)
			for(var j=0;j<this.walls[i].x.length;j=j+2){
				var sx = this.walls[i].x[j],
					sy = this.walls[i].y[j],
					nx = this.walls[i].x[j+1],
					ny = this.walls[i].y[j+1];

				var angle = all_fn.getAngle(sx,sy,nx,ny);
				var l = all_fn.bevel(sx,sy,nx,ny);

				ctx1.save();
				ctx1.translate(sx,sy);
				ctx1.rotate(angle*Math.PI/180);	
				ctx1.beginPath();
				ctx1.rect(0,0-this.Thick,l,this.Thick);
				// ctx1.stroke();

				ctx1.restore();
				if(ctx1.isPointInPath(x,y)){
					return [i,j];
				}
			}


	}else{
		ctx1.beginPath();
		ctx1.arc(this.dot.x[0],this.dot.y[0],this.dotR,0,2*Math.PI);
		if(ctx1.isPointInPath(x,y))
			return "s";

		ctx1.beginPath();
		ctx1.arc(this.dot.x[this.num-1],this.dot.y[this.num-1],this.dotR,0,2*Math.PI);
		if(ctx1.isPointInPath(x,y))
			return "n";

		for(var i=1;i<=this.num;i++){
			var sx = this.dot.x[i-1],
				sy = this.dot.y[i-1],
				nx = this.dot.x[i],
				ny = this.dot.y[i];
			if(i == this.num){
				nx = this.dot.x[0];
				ny = this.dot.y[0];
			}

			var angle = all_fn.getAngle(sx,sy,nx,ny);
			var l = all_fn.bevel(sx,sy,nx,ny);

			ctx1.save();
			ctx1.translate(sx,sy);
			ctx1.rotate(angle*Math.PI/180);	


			ctx1.beginPath();
			ctx1.rect(0-this.Thick/2,0-this.Thick/2,l+this.Thick,this.Thick);

			ctx1.restore();
			if(ctx1.isPointInPath(x,y))
				return i;
		}
	}

	

}

// 为创建转角飘窗提供墙角检测，判断是否触碰到墙角
wallObj.prototype.quote = function(x,y){
	for(var i=0;i<this.num;i++){
		ctx1.beginPath();
		ctx1.arc(this.dot.x[i],this.dot.y[i],this.dotR,0,2*Math.PI);
		if(ctx1.isPointInPath(x,y))
			return i;
	}
}

// 墙面绘制，在基础端点闭合后，通过walls数组绘制墙面，被this.darw调用
wallObj.prototype.darwWall = function(){
	// 通过walls数组绘制墙面
	for(var i=0;i<this.walls.length;i++)
		for(var j=0;j<this.walls[i].x.length;j=j+2){
			var sx = this.walls[i].x[j],
				sy = this.walls[i].y[j],
				nx = this.walls[i].x[j+1],
				ny = this.walls[i].y[j+1];
			var w = this.walls[i].w[j];

			var angle = all_fn.getAngle(sx,sy,nx,ny);
			var l = all_fn.bevel(sx,sy,nx,ny);

			ctx1.save();
			ctx1.translate(sx,sy);
			ctx1.rotate(angle*Math.PI/180);	
			ctx1.fillStyle = this.strokeColor;
			if(w>0)
				ctx1.fillStyle = "black";
			ctx1.beginPath();
			ctx1.rect(0,0-this.Thick,l,this.Thick);
			ctx1.fill();

			ctx1.restore();

		}


	// 画边角
	ctx1.save();
	ctx1.fillStyle = this.strokeColor;
	for(var j=0;j<this.num;j++){
		var ai = j == 0 ? this.num - 1 : j - 1;
		var bi = j;
		var ci = j == this.num - 1 ? 0 : j + 1;

		var ixFrom = {x:this.dot.x[ai],y:this.dot.y[ai]}
		var ix = {x:this.dot.x[bi],y:this.dot.y[bi]};
		var ixTo = {x:this.dot.x[ci],y:this.dot.y[ci]};

		var ixFromAngle = all_fn.getAngle(ixFrom.x,ixFrom.y,ix.x,ix.y);
		var ixAngle = all_fn.getAngle(ix.x,ix.y,ixTo.x,ixTo.y);

		ctx1.beginPath();
		ctx1.moveTo(ix.x,ix.y);
		var c0 = all_fn.coor(ix.x,ix.y,ixFromAngle-90,this.Thick);
		ctx1.lineTo(c0.x,c0.y);
		var c1 = all_fn.coor2(ixFrom.x,ixFrom.y,ix.x,ix.y,ixTo.x,ixTo.y,this.Thick);
		ctx1.lineTo(c1.x,c1.y);
		var c2 = all_fn.coor(ix.x,ix.y,ixAngle-90,this.Thick);
		ctx1.lineTo(c2.x,c2.y);
		ctx1.closePath();
		ctx1.fill();
	}
	ctx1.restore();

}

// 
wallObj.prototype.ruler =function(){
	// 当lf.config.ruler为true时，开始画标尺。画标标分三步：
	// 第一步：一次画完总长；
	// 第二步：遍历所有不在两端的端点，然后所有遍历到的端点画坚线；
	// 第三步：从0开始遍历所有端点，然后给所有连接的端点画横线，并标尺；
	// if(lf.config.ruler){
		ctx1.save();
		ctx1.strokeStyle = this.rulerStrokeColor;
		ctx1.fillStyle = this.rulerBgColor;
		ctx1.lineWidth = this.rulerLineWidth;
		ctx1.font=" bold 14px Arial";
		ctx1.textAlign = "center";
		ctx1.textBaseline = "middle";

		// 第一步，画总长
		for(var i=0;i<this.walls.length;i++){
			var sx = this.walls[i].x[0],
				sy = this.walls[i].y[0],
				nx = this.walls[i].x[this.walls[i].x.length-1],
				ny = this.walls[i].y[this.walls[i].y.length-1];

			var a = all_fn.getAngle(sx,sy,nx,ny);	//线的角度
			var l = all_fn.bevel(sx,sy,nx,ny);		//线的长度
			var rulerHeight;// = this.rulerHeight;
			rulerHeight = this.walls[i].x.length > 2 ? this.rulerHeight*1.6 : this.rulerHeight;
			var h = -Math.max(rulerHeight*0.7,rulerHeight-12);	//横线的高度
			var tw = ctx1.measureText(Math.round(l)).width;		//文字占宽


			//通过旋转画面进行绘制标尺 
			ctx1.save();

			ctx1.translate(sx,sy);
			ctx1.rotate(a*Math.PI/180);	
			// ctx1.translate(0,0);


			// 画线
			ctx1.beginPath();
			ctx1.moveTo(0,0);
			ctx1.lineTo(0,-rulerHeight);
			ctx1.moveTo(0,h);
			ctx1.lineTo(l,h);
			ctx1.moveTo(l,0);
			ctx1.lineTo(l,-rulerHeight);
			ctx1.stroke();

			// 画斜线
			var cbl = 8;
			var c0 = all_fn.coor(0,h,-135,cbl);
			var c1 = all_fn.coor(0,h,45,cbl);
			var c2 = all_fn.coor(l,h,-135,cbl);
			var c3 = all_fn.coor(l,h,45,cbl);
			ctx1.beginPath();
			ctx1.moveTo(c0.x,c0.y);
			ctx1.lineTo(c1.x,c1.y);
			ctx1.moveTo(c2.x,c2.y);
			ctx1.lineTo(c3.x,c3.y);
			ctx1.stroke();

			// 画背景
			ctx1.beginPath();
			ctx1.rect(l/2-tw/2-5,h-this.rulerBgHeight/2,tw+10,this.rulerBgHeight);
			ctx1.fill();
			ctx1.stroke();

			// 画字
			ctx1.fillStyle = this.rulerTextColor;
			ctx1.fillText(Math.round(l),l/2,h);





			ctx1.restore();
		}

		// 第二步，画坚线
		for(var i=0;i<this.walls.length;i++){
			var a = all_fn.getAngle(this.walls[i].x[0],this.walls[i].y[0],this.walls[i].x[this.walls[i].x.length-1],this.walls[i].y[this.walls[i].y.length-1]);
			for(var j=1;j<this.walls[i].x.length-1;j++){
				var sx = this.walls[i].x[j],
					sy = this.walls[i].y[j];

				ctx1.save();

				ctx1.translate(sx,sy);
				ctx1.rotate(a*Math.PI/180);	
				// ctx1.translate(0,-this.Thick);
				ctx1.beginPath();
				ctx1.moveTo(0,0);
				ctx1.lineTo(0,-this.rulerHeight);
				ctx1.stroke();

				ctx1.restore();
			}
		}

		// 第三步，画横线并标尺
		for(var i=0;i<this.walls.length;i++){
			var a = all_fn.getAngle(this.walls[i].x[0],this.walls[i].y[0],this.walls[i].x[this.walls[i].x.length-1],this.walls[i].y[this.walls[i].y.length-1]);
			if(this.walls[i].x.length>2)
				for(var j=0;j<this.walls[i].x.length-1;j++){
					var sx = this.walls[i].x[j],
						sy = this.walls[i].y[j],
						nx = this.walls[i].x[j+1],
						ny = this.walls[i].y[j+1];
					var h = -Math.max(this.rulerHeight*0.7,this.rulerHeight-12);
					var l = all_fn.bevel(sx,sy,nx,ny);		//线的长度
					var tw = ctx1.measureText(Math.round(l)).width;		//文字占宽

					ctx1.save();

					ctx1.translate(sx,sy);
					ctx1.rotate(a*Math.PI/180);	
					// ctx1.translate(0,-this.Thick);

					// 如果坐标相同，画完斜线就走，不用画其他的
					if(sx==nx && sy==ny){
						// 画斜线
						var c0 = all_fn.coor(0,h,-135,cbl);
						var c1 = all_fn.coor(0,h,45,cbl);
						ctx1.beginPath();
						ctx1.moveTo(c0.x,c0.y);
						ctx1.lineTo(c1.x,c1.y);
						if(j == this.walls[0].x.length-2){
							var c2 = all_fn.coor(l,h,-135,cbl);
							var c3 = all_fn.coor(l,h,45,cbl);
							ctx1.moveTo(c2.x,c2.y);
							ctx1.lineTo(c3.x,c3.y);
						}
						ctx1.stroke();
						ctx1.restore();
						continue;
					}

					// 画线
					ctx1.beginPath();
					ctx1.moveTo(0,h);
					ctx1.lineTo(l,h);
					ctx1.stroke();

					// 画斜线
					var c0 = all_fn.coor(0,h,-135,cbl);
					var c1 = all_fn.coor(0,h,45,cbl);
					ctx1.beginPath();
					ctx1.moveTo(c0.x,c0.y);
					ctx1.lineTo(c1.x,c1.y);
					if(j == this.walls[0].x.length-2){
						var c2 = all_fn.coor(l,h,-135,cbl);
						var c3 = all_fn.coor(l,h,45,cbl);
						ctx1.moveTo(c2.x,c2.y);
						ctx1.lineTo(c3.x,c3.y);
					}
					ctx1.stroke();

					// 画背景
					ctx1.beginPath();
					ctx1.rect(l/2-tw/2-5,h-this.rulerBgHeight/2,tw+10,this.rulerBgHeight);
					ctx1.fill();
					ctx1.stroke();

					// 画字
					ctx1.fillStyle = this.rulerTextColor;
					ctx1.fillText(Math.round(l),l/2,h);

					ctx1.restore();
				}
			}

		ctx1.restore();
	// }


}



// 高亮绘制被点击的对象，被lf.allDarw通过对象集合ssl_objs调用
wallObj.prototype.alive = function(i){
	// console.log(i);
	if(this.close){
		// 画墙体
		var sx = this.walls[i[0]].x[i[1]],
			sy = this.walls[i[0]].y[i[1]],
			nx = this.walls[i[0]].x[i[1]+1],
			ny = this.walls[i[0]].y[i[1]+1];

		var angle = all_fn.getAngle(sx,sy,nx,ny);
		// var l = all_fn.bevel(sx,sy,nx,ny)+this.Thick;
		var l = all_fn.bevel(sx,sy,nx,ny);
		// var x = 0-this.Thick/2;
		// var y = 0-this.Thick/2;

		ctx1.save();

		ctx1.translate(sx,sy);
		ctx1.rotate(angle*Math.PI/180);	
		ctx1.translate(0,-this.Thick);
		ctx1.fillStyle = this.aliveColor;

		ctx1.beginPath();
		ctx1.rect(0,0,l,this.Thick);
		ctx1.fill();

		ctx1.restore();


		if(lf.config.ruler){
			// 画标尺
			ctx1.save();
			ctx1.strokeStyle = this.aliveColor;
			ctx1.fillStyle = this.rulerBgColor;
			ctx1.lineWidth = this.rulerLineWidth;
			ctx1.font=" bold 14px Arial";
			ctx1.textAlign = "center";
			ctx1.textBaseline = "middle";

			// 第二步，画坚线
			var l = all_fn.bevel(sx,sy,nx,ny);			//线的长度
			var h = -Math.max(this.rulerHeight*0.7,this.rulerHeight-12); //横线的高度
			var tw = ctx1.measureText(Math.round(l)).width;		//文字占宽

			ctx1.translate(sx,sy);
			ctx1.rotate(angle*Math.PI/180);	
			// ctx1.translate(0,-this.Thick);
			
			ctx1.beginPath();
			ctx1.moveTo(0,0);
			ctx1.lineTo(0,-this.rulerHeight);
			ctx1.moveTo(l,0);
			ctx1.lineTo(l,-this.rulerHeight);
			ctx1.stroke();

			// 第三步，画横线并标尺
			// 画线
			ctx1.beginPath();
			ctx1.moveTo(0,h);
			ctx1.lineTo(l,h);
			ctx1.stroke();
			
			// 画斜线
			var cbl = 8;
			var c0 = all_fn.coor(0,h,-135,cbl);
			var c1 = all_fn.coor(0,h,45,cbl);
			var c2 = all_fn.coor(l,h,-135,cbl);
			var c3 = all_fn.coor(l,h,45,cbl);
			ctx1.beginPath();
			ctx1.moveTo(c0.x,c0.y);
			ctx1.lineTo(c1.x,c1.y);
			ctx1.moveTo(c2.x,c2.y);
			ctx1.lineTo(c3.x,c3.y);
			ctx1.stroke();

			// 画背景
			ctx1.beginPath();
			ctx1.rect(l/2-tw/2-5,h-this.rulerBgHeight/2,tw+10,this.rulerBgHeight);
			ctx1.fill();
			ctx1.stroke();

			// 画字
			ctx1.fillStyle = this.aliveColor;
			ctx1.fillText(Math.round(l),l/2,h);

			ctx1.restore();
				
		}

	}else{
		var sx = this.dot.x[i-1],
			sy = this.dot.y[i-1];
			if(i == this.num) i=0;
		var	nx = this.dot.x[i],
			ny = this.dot.y[i];

		var angle = all_fn.getAngle(sx,sy,nx,ny);
		var l = all_fn.bevel(sx,sy,nx,ny);
		var x = 0;
		var y = 0-this.Thick/2;

		ctx1.save();
		ctx1.translate(sx,sy);
		ctx1.rotate(angle*Math.PI/180);	
		ctx1.fillStyle = this.aliveColor;

		ctx1.beginPath();

		// if(i == 1 && !this.close){
		// 	l = l+this.Thick/2;
		// }else if(i == this.num-1 && !this.close){
		// 	x = x-this.Thick/2;
		// 	l = l+this.Thick/2;
		// }else{
		// 	x = x-this.Thick/2;
		// 	l = l+this.Thick;
		// }

		ctx1.rect(x,y,l,this.Thick);
		ctx1.fill();

		ctx1.restore();

		ctx1.save();
		ctx1.fillStyle = "white";
		ctx1.textAlign = "center";
		ctx1.textBaseline = "middle";
		for(var j=1;j<this.num;j++){
			var jsx = this.dot.x[j-1];
			var jsy = this.dot.y[j-1];
			var jnx = this.dot.x[j];
			var jny = this.dot.y[j];
			var b = all_fn.bevel(jsx,jsy,jnx,jny);
			var a = all_fn.getAngle(jsx,jsy,jnx,jny);
			ctx1.save();
			ctx1.beginPath();
			if(a<=90 || a>=270){
				ctx1.translate(jsx,jsy);
			}else{
				a = all_fn.getAngle(jnx,jny,jsx,jsy);
				ctx1.translate(jnx,jny);
			}
			ctx1.rotate(a*Math.PI/180);	
			ctx1.fillText(Math.round(b),b/2,0);
			ctx1.restore();
		}
		ctx1.restore();
	}

}

wallObj.prototype.upData = function(){
	var inWalls = [];
	// 保留改变前的数组
	for(var i=0;i<this.walls.length;i++){
		var Last = this.walls[i].x.length-1;
		var sx = this.walls[i].x[0];
		var sy = this.walls[i].y[0];
		var nx = this.walls[i].x[Last];
		var ny = this.walls[i].y[Last];
		var angle = Math.round(all_fn.getAngle(sx,sy,nx,ny));
		var bevel = Math.round(all_fn.bevel(sx,sy,nx,ny));
		inWalls.push({sx:sx,sy:sy,nx:nx,ny:ny,angle:angle,bevel:bevel});
	}

	// 将基本数组的端点坐标更新到walls数组的两端
	for(var i=1;i<=this.num;i++){
		var sx = this.dot.x[i-1],
			sy = this.dot.y[i-1],
			nx = this.dot.x[i],
			ny = this.dot.y[i];
		if(i == this.num){
			nx = this.dot.x[0];
			ny = this.dot.y[0];
		}

		this.walls[i-1].x[0] = sx;
		this.walls[i-1].y[0] = sy;
		this.walls[i-1].x[this.walls[i-1].x.length-1] = nx;
		this.walls[i-1].y[this.walls[i-1].y.length-1] = ny;
	}

	// 更新墙体数组walls里的端点
	for(var i=0;i<this.walls.length;i++){

		var walls = this.walls[i];
		var last = walls.x.length-1;	// 取墙体数组未尾
		var angle = Math.round(all_fn.getAngle(walls.x[0],walls.y[0],walls.x[last],walls.y[last]));	// 取墙体的角度,从头到尾
		var angle1 = Math.round(all_fn.getAngle(walls.x[last],walls.y[last],walls.x[0],walls.y[0]));	// 取墙体的角度,从尾到头
		var bevel = Math.round(all_fn.bevel(walls.x[0],walls.y[0],walls.x[last],walls.y[last]));	// 取墙体的长度

		// 以后面对齐更新端点
		if(walls.x[0]!=inWalls[i].sx || walls.y[0]!=inWalls[i].sy){
			for(var j=last-1;j>0;j--){
				var myBevel =  walls.w[j]>0?walls.w[j]:Math.round(all_fn.bevel(walls.x[j],walls.y[j],walls.x[j+1],walls.y[j+1]));
				var coor = all_fn.coor(walls.x[j+1],walls.y[j+1],angle1,myBevel);

				if(walls.x[j] == inWalls[i].sx){
					walls.x[j] = walls.x[0];
				}else if(walls.x[j] == inWalls[i].nx){
					walls.x[j] = walls.x[Last];
				}else{
					walls.x[j] = coor.x;
				}

				if(walls.y[j] == inWalls[i].sy){
					walls.y[j] = walls.y[0];
				}else if(walls.y[j] == inWalls[i].ny){
					walls.y[j] = walls.y[Last];
				}else{
					walls.y[j] = coor.y;
				}

			}
			// console.log(i+"说：我头动了，要参考尾来更新数组");
		}else{
			// 以前面对齐更新端点
			for(var j=1;j<last;j++){
				var myBevel =  walls.w[j-1]>0?walls.w[j-1]:Math.round(all_fn.bevel(walls.x[j],walls.y[j],walls.x[j-1],walls.y[j-1]));
				var coor = all_fn.coor(walls.x[j-1],walls.y[j-1],angle,myBevel);

				if(walls.x[j] == inWalls[i].sx){
					walls.x[j] = walls.x[0];
				}else if(walls.x[j] == inWalls[i].nx){
					walls.x[j] = walls.x[Last];
				}else{
					walls.x[j] = coor.x;
				}

				if(walls.y[j] == inWalls[i].sy){
					walls.y[j] = walls.y[0];
				}else if(walls.y[j] == inWalls[i].ny){
					walls.y[j] = walls.y[Last];
				}else{
					walls.y[j] = coor.y;
				}
			}
			// console.log(i+"说：我头没动，可以参考头来更新数组");
		}
	}
	lf_objs.doorIn.upData();
}

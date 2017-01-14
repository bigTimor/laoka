var lf = {
	// 配置项
	config:{

		// 是否显示标尺
		ruler:true,

		// 缩放比例，用了变换属性后，暂时没用上
		scale:1,

		// 存放原始的墙体长度与角度(闭合后的第一个状态)，用了变换属性后，暂时没用上
		original:{x:[],y:[]},

		// 第几阶段，0为墙体，1为门窗，2为量尺，3为家具
		procedure:0,

		// 是否第一次闭合，用于切换不同阶段，为true为第一次闭合，在进入门窗阶段时自动弹出天花高窗口
		procedureOne:true,

		// 墙体弹出框属性，0为天花高，1为墙段，2为墙体总长
		wallProcedure:-1,


		// 是否添加门窗，-1为不添加，添加时doorStyle等于要添加的门窗所对应的序号(>=0)
		doorStyle:-1,

		// 是否添加家具，-1为不添加，添加时furnitStyle等于要添加的家具所对应的序号(>=0)
		furnitStyle:-1,

		// 拉动时吸附的距离，低于sorption则吸附
		sorption:20,


		// 背景配置属性
		bg:{
			interval:30,							// 背景画布的格子间隔
			stroke:2,								// 背景画布的格子线宽
			strokeColor:"#ccc",						// 背景画布的格子线条颜色
		},

		// 墙体配置属性
		wall:{
			dotR:18,								// 墙体端点圆形的半径
			Thick:15,								// 墙体的厚度
			strokeColor:"#626262",					// 墙体的颜色
			fillColor:"#c0c0c0",					// 墙体填充色
			dotFillStyle:"rgba(0,0,0,0.5)",			// 墙体端点圆形的颜色
			aliveColor:"#ff9e3e",					// 当前选中的墙体颜色

			textStyle:"bold 14px Arial",			// 字体样式
			textAlign:"center",						// 字体水平居中
			textBaseline:"middle",					// 字体垂直居中


			rulerStrokeColor:"gray",				// 标尺的颜色
			rulerBgColor:"white",					// 标尺文字的背景色
			rulerTextColor:"black",					// 标尺文字的颜色
			rulerBgHeight:20,						// 标尺文字的背景高度
			rulerLineWidth:0.5,						// 标尺的线宽
			rulerHeight:50,							// 标尺离端点的高度
		},

		// 门窗配置属性
		door:{
			stroke:1,								// 画门的线宽
			Thick:5,								// 门的厚度
			length:100,								// 默认长宽
			fillColor:"white",						// 填充的颜色
			strokeColor:"black",					// 绘制的颜色
			aliveColor:"#ff6100",					// 当前选中的门颜色

			textStyle:"bold 14px Arial",			// 字体样式
			textAlign:"center",						// 字体水平居中
			textBaseline:"middle",					// 字体垂直居中
		},

		// 家具配置属性
		furnit:{
			stroke:1,								// 绘画的线宽
			strokeColor:"black",					// 绘制的颜色
			aliveColor:"red",						// 当前选中的颜色
			textStyle:"bold 16px Microsoft YaHei",	// 字体样式
			textAlign:"center",						// 字体水平居中
			textBaseline:"middle",					// 字体垂直居中
		},


	}, // config结束标签


	// 临时对象，用于添加线段辅助参考线
	tempObj:{
		sx:0,			// 起始X坐标
		sy:0,			// 起始Y坐标
		nx:0,			// 终点X坐标
		ny:0,			// 终点Y坐标
		color:"#666",	// 参考线的初始颜色
	},


// ------------		分割线		(↑上面是参数部分，↓下面是基础功能部分)		------------------------------

	// 初始化
	init:function(){
		
		// 设置canvas1Box的高度
		var lf_stage_height = parseInt($("#header_lf").css("height"));
		$("#canvas1Box").css({"width":windoWidth,"height":windoHeight-lf_stage_height});

		// 获得量房canvas对象
		can1 = document.getElementById('canvas1');

		// 设置量房canvas的宽高及初始位置
		can1.width = windoWidth;
		can1.height = windoHeight-lf_stage_height;

		// 获得量房canvas上下文
		ctx1 = can1.getContext("2d");
		ctx1.save();

		// 初始化墙体、门窗、家具对象
		lf.initObj();

		// 点击事件集
		lf.clicks();

		// 清空原画及绘制背景
		lf.bg();
		
		var int_alpha=0;
		
		
		if(window.DeviceOrientationEvent){
			window.addEventListener('deviceorientation',lf.compassTo,false);
		}else{
			alert("您的设备无法使用指南针！");
		}
		

		
		
	},

	// 二次初始化
	goin:function(){

		// 初始化活动对象
		curObj={};

		// 清空对象内容
		lf_objs.doorIn.empty();
		lf_objs.wallIn.empty();
		lf_objs.furnitIn.empty();	


	}, // goin结束标签


	// 初始化墙体、门窗、家具对象
	initObj:function(){
		
		
		// 初始化墙体对象
		lf_objs.wallIn = new wallObj();
		lf_objs.wallIn.init(lf.config.wall);

		// 初始化门窗对象
		lf_objs.doorIn = new doorObj();
		lf_objs.doorIn.init(lf.config.door);

		// 初始化家具对象
		lf_objs.furnitIn = new furnitObj();
		lf_objs.furnitIn.init(lf.config.furnit);
		
	},


	// 绘画对象
	allDarw:function(){
		// 清空原画及绘制背景
		lf.bg();


		// 绘出所有对象
		for(var i in lf_objs)
			lf_objs[i].darw();


		// 如果当前选择了对象，就绘制当前对象
		if(curObj.obj)
			curObj.obj.alive(curObj.i);


		// 如果当前选中的是墙体，就再画一次门窗，避免被选中的墙体高亮时遮挡到门窗对象
		if(curObj.obj == lf_objs.wallIn)
			lf_objs.doorIn.darw()


		// 绘制临时对象(辅助参考线)
		if(this.tempObj.sx >0)
			lf.darwTempObj();


	}, // allDarw结束标签


	// 清空原画及绘制背景
	bg:function(){
		// 清空画布
//		 ctx1.clearRect(0,0,can1.width,can1.height);
		// ctx1.clearRect(-can1.width*50,-can1.height*50,can1.width*50,can1.height*50);
		ctx1.clearRect(-can1.width*50,-can1.height*50,can1.width*100,can1.height*100);
		ctx1.save();
		ctx1.lineWidth = lf.config.bg.stroke;
		ctx1.strokeStyle = lf.config.bg.strokeColor;

		ctx1.beginPath();

		// 绘画竖线
//		 for(var i=0;i<can1.width;i+=lf.config.bg.interval){
//			ctx1.moveTo(i,0);
//			ctx1.lineTo(i,can1.height);
//		}	
		for(var i=(-can1.width*50);i<can1.width*100;i+=lf.config.bg.interval){
			ctx1.moveTo(i,-can1.height*50);
			ctx1.lineTo(i,can1.height*50);
		}
//
		// 绘画横线
//		 for(var j=0;j<can1.height;j+=lf.config.bg.interval){
//			ctx1.moveTo(0,j);
//			ctx1.lineTo(can1.width,j);
//		}	
		for(var j=(-can1.height*50);j<can1.height*100;j+=lf.config.bg.interval){
			ctx1.moveTo(-can1.width*50,j);
			ctx1.lineTo(can1.width*50,j);
		}
		

			
		ctx1.stroke();
		ctx1.restore();

	}, // bg结束标签


	// 绘画辅助参考线
	darwTempObj:function(){
		ctx1.save();
		// 画线
		ctx1.beginPath();
		ctx1.strokeStyle = this.tempObj.color;
		ctx1.moveTo(this.tempObj.sx,this.tempObj.sy);
		ctx1.lineTo(this.tempObj.nx,this.tempObj.ny);
		ctx1.stroke();

		ctx1.fillStyle = this.tempObj.color;
		ctx1.textAlign = "center";
		ctx1.textBaseline = "middle";

		// 画字
		var sx = this.tempObj.sx;
		var sy = this.tempObj.sy;
		var nx = this.tempObj.nx;
		var ny = this.tempObj.ny;
		var b = all_fn.bevel(sx,sy,nx,ny);
		var a = all_fn.getAngle(sx,sy,nx,ny);

		ctx1.beginPath();
		if(a<=90 || a>=270){
			ctx1.translate(sx,sy);
		}else{
			a = all_fn.getAngle(nx,ny,sx,sy);
			ctx1.translate(nx,ny);
		}
		ctx1.rotate(a*Math.PI/180);	
		ctx1.translate(0,-10);
		ctx1.fillText(Math.round(b)+" , "+Math.round(a)+"°",b/2,0);

		ctx1.restore();

	}, // darwTempObj结束标签


	// 将坐标转换为canvas内的坐标
	windowToCanvas:function(x,y){
		var canC = can1.getBoundingClientRect();
		return {x:x-canC.left,y:y-canC.top};
	},// windowToCanvas结束标签


	// 取消绑定的移动、松开事件
	offEvent:function(){
		// $(can1).off("mousemove");
		// $(can1).off("mouseup");
		$(can1).off("touchmove");
		$(can1).off("touchend");

		// $(document).off("mousemove");
		// $(document).off("mouseup");
		$(document).off("touchmove");
		$(document).off("touchend");


	},


	// 取消弹出框
	offPopup:function(){
		// 如果插入门窗面板是开着，就关闭
		if($("#lf_tools_doors").css("display") == "block")
			$("#lf_tools_doors").hide();

		// 如果插入家具面板是开着，就关闭
		if($("#lf_tools_furnits").css("display") == "block")
			$("#lf_tools_furnits").hide();

	},




	// 检测是否有选择中的对象
	haveObj:function(){
		all_fn.noUpDefault();

		var handle = false;

		if(curObj.obj == lf_objs.furnitIn){
			handle = lf.furnitEvent();
		}

		if(curObj.obj == lf_objs.doorIn){
			handle = lf.doorEvent();
		}

		if(curObj.obj == lf_objs.wallIn){
			handle = lf.wallEvent();
		}

		return handle;
	},
	

	// 计算是否在原地
	origin:function(){
		if(lf.tempObj.sx == lf.tempObj.nx && lf.tempObj.sy == lf.tempObj.ny)
			return true;
	},


	// 计算是否在同一条线上
	direction:function(i){
		var d = 2;	// d:容许出现的误差偏差
		// s：传入的端点的上一个端点坐标，与传入的端点坐标计算出的角度
		var s = all_fn.getAngle(lf_objs.wallIn.dot.x[i-1],lf_objs.wallIn.dot.y[i-1],lf_objs.wallIn.dot.x[i],lf_objs.wallIn.dot.y[i]);
		// n：输入的端点坐标与参考线的终点计算出的角度
		var n = all_fn.getAngle(lf_objs.wallIn.dot.x[i],lf_objs.wallIn.dot.y[i],lf.tempObj.nx,lf.tempObj.ny);
		if((Math.abs(s - n)<180+d && Math.abs(s - n)>180-d) || (Math.abs(s - n)<0+d ))
			return true;
	},

	// 计算是否相交
	inters:function(){
		if(lf_objs.wallIn.num >2 )
			for(var i=1;i<lf_objs.wallIn.num-1;i++){

				var a = {x:lf_objs.wallIn.dot.x[i-1],y:lf_objs.wallIn.dot.y[i-1]};
				var b = {x:lf_objs.wallIn.dot.x[i],y:lf_objs.wallIn.dot.y[i]};
				var c = {x:lf.tempObj.sx,y:lf.tempObj.sy};
				var d = {x:lf.tempObj.nx,y:lf.tempObj.ny};

				if(all_fn.inters(a,b,c,d))
					if(i == 1 && lf.tempObj.nx == lf_objs.wallIn.dot.x[0] && lf.tempObj.ny == lf_objs.wallIn.dot.y[0]){
						lf_objs.wallIn.close = true;
						break;
					}else{
						lf_objs.wallIn.close = false;
						return true;
					}
			}
	},

	// 放大、缩小更新lf_objs.wallIn.dot信息
	zoom:function(multiple){

		// 基础端点数组
		var dot = lf_objs.wallIn.dot;
		// 基础端点数组的备份，用于做缩放的基准
		var ori = lf.config.original;

		// 从第0个端点开始，以原有长度角度乘于缩放比例计算出后面点端的坐标，然后再以第二个为基准复上一步，直到最后，注：不更改0端点坐标
		for(var i=0;i<lf_objs.wallIn.num-1;i++){
			var ix = i;
			var ixTo = i == lf_objs.wallIn.num-1 ? 0 : i + 1;

			var angle = all_fn.getAngle(ori.x[ix],ori.y[ix],ori.x[ixTo],ori.y[ixTo]);
			var bevel = all_fn.bevel(ori.x[ix],ori.y[ix],ori.x[ixTo],ori.y[ixTo]);

			// 根据前面端点坐标与初始的角度、长度计算等于缩放比例计算出后面的端点的坐标
			var coor = all_fn.coor(dot.x[ix],dot.y[ix],angle,Math.round(bevel * multiple));

			dot.x[ixTo] = coor.x;
			dot.y[ixTo] = coor.y;

		}

		// ori.x[ix] == lf_objs.wallIn.walls[0].x[0]
		// ori.x[ixTo] == lf_objs.wallIn.walls[0].x[length-1]

		// 墙体数组对象集
		var walls = lf_objs.wallIn.walls;
		// 用于存放墙体数组对象集的备份，下面更改距离时用来做基准
		var inWalls = [];

		// 保留改变前的数组
		for(var j=0;j<walls.length;j++){			// 第一重循环，遍历每一个墙体
			inWalls.push({x:[],y:[],w:[]});			// 每循环一次，就跟着增加一个对象用放存放墙体对象的备份
			for(var l=0;l<walls[j].x.length;l++){	// 第二重循环，遍历墙体数组中的每一个节点
				inWalls[j].x.push(walls[j].x[l]);
				inWalls[j].y.push(walls[j].y[l]);
				inWalls[j].w.push(walls[j].w[l]);
			}
		}

		console.log(inWalls);
		// 将墙体数组更新为缩放后的坐标
		for(var p=0;p<walls.length;p++){					// 遍历每一面墙体数组
			console.log("");
			var inx = p;									// 当前遍历到的墙体数组左边对应的端点序号			
			var inxTo = p == walls.length-1 ? 0 : p + 1;	// 当前遍历到的墙体数组右边对应的端点序号
			for(var o=0;o<walls[p].x.length;o++){			// 遍历每一面墙体的所有端点坐标

				if(o==0){	// 如果是墙体数组中的第一个端点，赋值为左边基础端点坐标
					walls[p].x[o] = dot.x[inx];
					walls[p].y[o] = dot.y[inx];
				}else if(o==walls[p].x.length-1){	// 如果是墙体数组中的第一个端点，赋值为右边基础端点坐标
					walls[p].x[o] = dot.x[inxTo];
					walls[p].y[o] = dot.y[inxTo];
				}else{
					var ob = all_fn.bevel(inWalls[inx].x[o-1],inWalls[inx].y[o-1],inWalls[inx].x[o],inWalls[inx].y[o]);
					var oa = all_fn.getAngle(inWalls[inx].x[o-1],inWalls[inx].y[o-1],inWalls[inx].x[o],inWalls[inx].y[o]);

					// console.log(Math.round(ob*multiple),o,inWalls[inx].x[o-1]);
					var c0 = all_fn.coor(walls[p].x[o-1],walls[p].y[o-1],oa,ob*multiple);
					// console.log(c0);
					walls[p].x[o] = c0.x;
					walls[p].y[o] = c0.y;
				}

			}	// for(var o=0;o<walls[p].x.length;o++)结束标签
		}	// for(var p=0;p<walls.length;p++)结束标签

		console.log(ob);
		// console.log(multiple);
		
		// lf_objs.doorIn.upData();





	},



	// 显示家具弹出框
	furnit_popup_show:function(){
		// 有选中对象的时候才显示
		if(curObj.obj){
			var f = lf_objs.furnitIn;
			var i = curObj.i;

			// 将选中对象的名称、长度、宽度、款式、备注，赋值给弹出框
			$("#furnit_popup_n").val(f.n[i]);
			$("#furnit_popup_l").val(f.l[i]);
			$("#furnit_popup_w").val(f.w[i]);
			$("#furnit_popup_style").val(f.style[i]);
			$("#furnit_popup_note").val(f.note[i]);

			// 是否停靠
			if(f.berth[i]){
				$("#furnit_berth_btn").css("backgroundColor","#ad0101")
				$("#furnit_berth_btn_dot").css({"float":"right"});
			}else{
				$("#furnit_berth_btn").css("backgroundColor","gray")
				$("#furnit_berth_btn_dot").css({"float":"left"});
			}

			// 显示弹出框DIV，将家具弹出框设为block显示并居中，其他弹出框设为none隐藏
			$("#popupUI").css("display","block");
			$("#furnit_popup").css({"left":"50%","top":"50%","display":"block"}).siblings().css("display","none");
		}

	},


	// 显示门窗弹出框
	door_popup_show:function(){
		if(curObj.obj){
			var d = lf_objs.doorIn;
			var i = curObj.i;
			var attr = [];
			var name;

			// 因为门窗样式太多，每个都不同，所以显示之前要清空，然后针对不同门窗显示不同内容
			$("#door_popup_content").empty();

			switch(d.s[i]){
				case 0:
					// 添加单开门的内外、左右按钮
					$("#door_popup_content").append('<button id="door_popup_direction" class="popup_btn">左右</button><button id="door_popup_around" class="popup_btn">内外</button>');
					// 绑定门窗弹出框的左右按钮的点击事件
					$("#door_popup_direction").on("touchstart",lf.door_popup_direction_click);
					// 绑定门窗弹出框的内外按钮的点击事件
					$("#door_popup_around").on("touchstart",lf.door_popup_around_click);
					name = "单开门"
					arr = [["高度","height"],["宽度","width"]];
					break;

				case 1:
					name = "飘窗"
					arr = [["高度","height"],["宽度","width"],["离地高","feet"],["飘出深度","depth"],["侧边角度","radius"]];
					break;

				case 2:
					name = "转角飘窗"
					arr = [["高度","height"],["离地高","feet"],["飘出深度","depth"],["左边宽度","leftW"],["右边宽度","rightW"]];
					break;

				case 3:
					name = "普通窗"
					arr = [["高度","height"],["宽度","width"],["离地高","feet"]];
					break;

				case 4:
					name = "阳台门"
					arr = [["高度","height"],["宽度","width"]];
					break;

				case 5:
					name = "柱"
					arr = [["高度","height"],["宽度","width"]];
					break;

				case 6:
					name = "梁"
					arr = [["高度","height"],["离墙距离","metope"],["离地高","feet"]];
					break;

				case 7:
					name = "墙洞"
					arr = [["高度","height"],["宽度","width"],["离地高","feet"]];
					break;

				case 8:
					name = "转角窗"
					arr = [["高度","height"],["离地高","feet"],["左边宽度","leftW"],["右边宽度","rightW"]];
					break;

				case 9:
					name = "双开门"
					arr = [["高度","height"],["宽度","width"]];
					break;

				case 10:
					name = "推拉门"
					arr = [["高度","height"],["宽度","width"]];
					break;

				case 11:
					name = "折叠门"
					arr = [["高度","height"],["宽度","width"]];
					break;


				default:break;
			}


			// 生成选中门窗所需的弹出框内容HTML
			var html = '';
			for(var j=0;j<arr.length;j++){
				html = html + '<p class="popup_content_box"><span class="inPopup popup_name">'+arr[j][0]+'：</span><input type="number" class="inPopup popup_text popup_number" min="10" id="door_popup_'+arr[j][1]+'" value="'+d.attr[i][arr[j][1]]+'"><span class="inPopup popup_unit">mm</span></p>';
			}

			// 将生成的HTML加进门窗弹出框中、更改弹出框的名称为选中的门窗名称，并重新绑定input框的获得焦点事件
			$("#door_popup_content").append(html);
			$(".popup_text").on("touchstart",this.popup_text_click);
			$("#door_popup_name").text(name);

			// 显示弹出框DIV，将门窗弹出框设为block显示并居中，其他弹出框设为none隐藏
			$("#popupUI").css("display","block");
			$("#door_popup").css({"left":"50%","top":"50%","display":"block"}).siblings().css("display","none");
		}

	},	// door_popup_show结束标签


	// 显示墙体弹出框
	wall_popup_show:function(){

		// 墙体弹出框包含有天花高、墙段、总长三个参数，弹出前先隐藏所有的，然后再根据需要显示相应的参数内容
		$("#wall_popup_content .popup_content_box").css("display","none");

		// lf.config.wallProcedure：当前需要显示的内容 ，0：天花高，1：墙段，2：总长
		switch(lf.config.wallProcedure){
			case 0:
				$("#wall_popup_area").parent().css("display","block");		// 显示弹出框的面积
				$("#wall_popup_ceiling").parent().css("display","block");	// 显示弹出框的天花高
				$("#wall_popup_name").text("天花高");						// 设置弹出框的标题
				$("#wall_popup_area").val(lf_objs.wallIn.area);				// 设置弹出框的内容
				$("#wall_popup_ceiling").val(lf_objs.wallIn.ceiling);		// 设置弹出框的内容
				break;

			case 1:
				// 判断当前墙段是否分几段，如果不是则提示用总长工具
				var walls = lf_objs.wallIn.walls[curObj.i[0]];
				var ix = curObj.i[1];
				var wallWH = Math.round(all_fn.bevel(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]));
				if(walls.x.length<=2){
					alert("不能直接修改总长，请使用墙体总长！");
					return;
				}

				$("#wall_popup_size").parent().css("display","block");		// 显示弹出框的尺寸
				$("#wall_popup_name").text("墙段");							// 设置弹出框的标题
				$("#wall_popup_size").val(wallWH);							// 设置弹出框的内容
				break;

			case 2:
				var dots =  lf_objs.wallIn.dot;
				var ixFrom = curObj.i[0];
				var ix = (ixFrom == dots.x.length-1) ? 0 : (ixFrom + 1);
				var wallWH = Math.round(all_fn.bevel(dots.x[ixFrom],dots.y[ixFrom],dots.x[ix],dots.y[ix]));

				$("#wall_popup_size").parent().css("display","block");		// 显示弹出框的尺寸
				$("#wall_popup_name").text("总长");							// 设置弹出框的标题
				$("#wall_popup_size").val(wallWH);							// 设置弹出框的内容
				break;

			default:break;			
		}

		// 显示弹出框DIV，将墙体弹出框设为block显示并居中，其他弹出框设为none隐藏
		$("#popupUI").css("display","block");
		$("#wall_popup").css({"left":"50%","top":"50%","display":"block"}).siblings().css("display","none");
	},	// wall_popup_show结束标签


	// 切换工具栏
	procedure_show:function(){
		curObj = {};
		lf.allDarw();

		// 取消顶部工具栏的高亮显示
		$(".procedure").removeClass("procedurea");
		// 取消底部工具条的高亮显示
		$(".btnBox").removeClass("btnBoxa");

		// 根据不同阶段高亮不同的顶部工具并显示该阶段对应的底部工具条
		$("#stage"+lf.config.procedure).addClass("procedurea");
		$("#procedure"+lf.config.procedure).addClass("btnBoxa");
	},

	// 切换工具显示
	btn_show:function(id){
		// 取消底部工具的高亮
		$("#lf_tool .btn").removeClass("btna");
		// 高亮显示指定的ID
		$(id).addClass("btna");
	},

	//控制指南针方向
	compassTo:function(deg){

		$("#compass").css("transform","rotate("+deg.alpha+"deg)");
	},



// ------------		分割线		(↑上面是基础功能部分，↓下面是点击事件部分)		------------------------------


	// 所有点击事件集
	clicks:function(){

		// 阻止屏幕默认滑动事件
		// $(document).on("touchstart",function(){event.preventDefault()});

		// 初始化画布鼠标/触摸事件点击事件
		// $(can1).on("mousedown",this.can1Mousedown);
		$(can1).on("touchstart",this.can1Mousedown);

		// 门窗工具的点击事件集
		lf.doorsClickEvent();

		// 家具工具的点击事件集
		lf.furnitsClickEvent();

		// 工具栏的点击事件集
		lf.toolsClickEvent();

		// 弹出框的点击事件集
		lf.popupClickEvent();


	}, // clicks结束标签


	// 门窗组件的点击事件集
	doorsClickEvent:function(){
		// 单开门，用于插入单开门
		// $("#lf_tools_DKM").on("mousedown",this.lf_tools_DKM_click);
		$("#lf_tools_DKM").on("touchstart",this.lf_tools_DKM_click);

		// 飘窗，用于插入飘窗
		// $("#lf_tools_PC").on("mousedown",this.lf_tools_PC_click);
		$("#lf_tools_PC").on("touchstart",this.lf_tools_PC_click);
		
		// 转角飘窗，用于插入转角飘窗
		// $("#lf_tools_ZJPC").on("mousedown",this.lf_tools_ZJPC_click);
		$("#lf_tools_ZJPC").on("touchstart",this.lf_tools_ZJPC_click);

		// 普通窗，用于插入普通窗
		// $("#lf_tools_PTC").on("mousedown",this.lf_tools_PTC_click);
		$("#lf_tools_PTC").on("touchstart",this.lf_tools_PTC_click);

		// 阳台门，用于插入阳台门
		// $("#lf_tools_YTM").on("mousedown",this.lf_tools_YTM_click);
		$("#lf_tools_YTM").on("touchstart",this.lf_tools_YTM_click);

		// 柱，用于插入柱
		// $("#lf_tools_Z").on("mousedown",this.lf_tools_Z_click);
		$("#lf_tools_Z").on("touchstart",this.lf_tools_Z_click);

		// 梁，用于插入梁
		// $("#lf_tools_L").on("mousedown",this.lf_tools_L_click);
		$("#lf_tools_L").on("touchstart",this.lf_tools_L_click);

		// 墙洞，用于插入墙洞
		// $("#lf_tools_QD").on("mousedown",this.lf_tools_QD_click);
		$("#lf_tools_QD").on("touchstart",this.lf_tools_QD_click);

		// 转角窗，用于插入转角窗
		// $("#lf_tools_ZJC").on("mousedown",this.lf_tools_ZJC_click);
		$("#lf_tools_ZJC").on("touchstart",this.lf_tools_ZJC_click);

		// 双开门，用于插入双开门
		// $("#lf_tools_SKM").on("mousedown",this.lf_tools_SKM_click);
		$("#lf_tools_SKM").on("touchstart",this.lf_tools_SKM_click);
		
		// 推拉门，用于插入推拉门
		// $("#lf_tools_TLM").on("mousedown",this.lf_tools_TLM_click);
		$("#lf_tools_TLM").on("touchstart",this.lf_tools_TLM_click);

		// 折叠门，用于插入折叠门
		// $("#lf_tools_ZDM").on("mousedown",this.lf_tools_ZDM_click);
		$("#lf_tools_ZDM").on("touchstart",this.lf_tools_ZDM_click);

	}, // doorsClickEvent结束标签


	// 单开门点击事件
	lf_tools_DKM_click:function(){
		lf.config.doorStyle = 0;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 飘窗点击事件
	lf_tools_PC_click:function(){
		lf.config.doorStyle = 1;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 转角飘窗点击事件
	lf_tools_ZJPC_click:function(){
		lf.config.doorStyle = 2;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 普通窗
	lf_tools_PTC_click:function(){
		lf.config.doorStyle = 3;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 阳台门
	lf_tools_YTM_click:function(){
		lf.config.doorStyle = 4;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 柱
	lf_tools_Z_click:function(){
		lf.config.doorStyle = 5;
		lf.toDoor(lf_objs.doorIn.length/3);
	},

	// 梁
	lf_tools_L_click:function(){
		lf.config.doorStyle = 6;
		lf.toDoor(lf_objs.doorIn.length/5);
	},

	// 墙洞
	lf_tools_QD_click:function(){
		lf.config.doorStyle = 7;
		lf.toDoor(lf_objs.doorIn.length/2);
	},

	// 转角窗
	lf_tools_ZJC_click:function(){
		lf.config.doorStyle = 8;
		lf.toDoor(lf_objs.doorIn.length);
	},
	
	// 双开门
	lf_tools_SKM_click:function(){
		lf.config.doorStyle = 9;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 推拉门
	lf_tools_TLM_click:function(){
		lf.config.doorStyle = 10;
		lf.toDoor(lf_objs.doorIn.length);
	},

	// 折叠门
	lf_tools_ZDM_click:function(){
		lf.config.doorStyle = 11;
		lf.toDoor(lf_objs.doorIn.length);
	},

	




	// 家具组件的点击事件集
	furnitsClickEvent:function(){

		// 万能图标，用于插入万能图标
		// $("#lf_tools_WNTB").on("mousedown",this.lf_tools_WNTB_click);
		$("#lf_tools_WNTB").on("touchstart",this.lf_tools_WNTB_click);

		// 1.5米床，用于插入1.5米床
		// $("#lf_tools_YMWC").on("mousedown",this.lf_tools_YMWC_click);
		$("#lf_tools_YMWC").on("touchstart",this.lf_tools_YMWC_click);

		// 1.8米床，用于插入1.8米床
		// $("#lf_tools_YMBC").on("mousedown",this.lf_tools_YMBC_click);
		$("#lf_tools_YMBC").on("touchstart",this.lf_tools_YMBC_click);

		// 大衣柜，用于插入大衣柜
		// $("#lf_tools_DYG").on("mousedown",this.lf_tools_DYG_click);
		$("#lf_tools_DYG").on("touchstart",this.lf_tools_DYG_click);

		// 大圆弧衣柜，用于插入大圆弧衣柜
		// $("#lf_tools_DYHYG").on("mousedown",this.lf_tools_DYHYG_click);
		$("#lf_tools_DYHYG").on("touchstart",this.lf_tools_DYHYG_click);

		// 大圆弧衣柜2，用于插入大圆弧衣柜2
		// $("#lf_tools_DYHYG2").on("mousedown",this.lf_tools_DYHYG2_click);
		$("#lf_tools_DYHYG2").on("touchstart",this.lf_tools_DYHYG2_click);

		// 床头柜，用于插入床头框
		// $("#lf_tools_CTG").on("mousedown",this.lf_tools_CTG_click);
		$("#lf_tools_CTG").on("touchstart",this.lf_tools_CTG_click);

		// 梳妆台，用于插入梳妆台
		// $("#lf_tools_SZT").on("mousedown",this.lf_tools_SZT_click);
		$("#lf_tools_SZT").on("touchstart",this.lf_tools_SZT_click);

		// 书桌，用于插入书桌
		// $("#lf_tools_SZ").on("mousedown",this.lf_tools_SZ_click);
		$("#lf_tools_SZ").on("touchstart",this.lf_tools_SZ_click);

		// 书柜，用于插入书柜
		// $("#lf_tools_SG").on("mousedown",this.lf_tools_SG_click);
		$("#lf_tools_SG").on("touchstart",this.lf_tools_SG_click);

		// 电视柜，用于插入电视柜
		// $("#lf_tools_DSG").on("mousedown",this.lf_tools_DSG_click);
		$("#lf_tools_DSG").on("touchstart",this.lf_tools_DSG_click);

		// 衣架，用于插入衣架
		// $("#lf_tools_YJ").on("mousedown",this.lf_tools_YJ_click);
		$("#lf_tools_YJ").on("touchstart",this.lf_tools_YJ_click);

	}, // furnitsClickEvent结束标签


	// 万能图标
	lf_tools_WNTB_click:function(){
		lf.config.furnitStyle = 0;
		lf.toFurnit();
	},

	// 1.5米床
	lf_tools_YMWC_click:function(){
		lf.config.furnitStyle = 1;
		lf.toFurnit();
	},

	// 1.8米床
	lf_tools_YMBC_click:function(){
		lf.config.furnitStyle = 2;
		lf.toFurnit();
	},

	// 大衣柜
	lf_tools_DYG_click:function(){
		lf.config.furnitStyle = 3;
		lf.toFurnit();
	},

	// 大圆弧衣柜
	lf_tools_DYHYG_click:function(){
		lf.config.furnitStyle = 4;
		lf.toFurnit();
	},

	// 大圆弧衣柜2
	lf_tools_DYHYG2_click:function(){
		lf.config.furnitStyle = 5;
		lf.toFurnit();
	},

	// 床头柜
	lf_tools_CTG_click:function(){
		lf.config.furnitStyle = 6;
		lf.toFurnit();
	},

	// 梳妆台
	lf_tools_SZT_click:function(){
		lf.config.furnitStyle = 7;
		lf.toFurnit();
	},

	// 书桌
	lf_tools_SZ_click:function(){
		lf.config.furnitStyle = 8;
		lf.toFurnit();
	},

	// 书柜
	lf_tools_SG_click:function(){
		lf.config.furnitStyle = 9;
		lf.toFurnit();
	},

	// 电视柜
	lf_tools_DSG_click:function(){
		lf.config.furnitStyle = 10;
		lf.toFurnit();
	},

	// 衣架
	lf_tools_YJ_click:function(){
		lf.config.furnitStyle = 11;
		lf.toFurnit();
	},




	// 工具组件的点击事件集
	toolsClickEvent:function(){

		// 顶部工具栏

		// 绑定画墙工具的点击事件，用于切换到画墙阶段
		$("#stage0").on("touchstart",this.stage0_click);

		// 绑定门窗工具的点击事件，用于切换到门窗阶段
		$("#stage1").on("touchstart",this.stage1_click);

		// 绑定量尺工具的点击事件，用于切换到量尺阶段
		$("#stage2").on("touchstart",this.stage2_click);

		// 绑定家具工具的点击事件，用于切换到家具阶段
		$("#stage3").on("touchstart",this.stage3_click);
		
		// 绑定上一步工具的点击事件
		$("#lf_back").on("touchstart",this.lf_back_click);

		// 绑定下一步工具的点击事件
		$("#lf_next").on("touchstart",this.lf_next_click);



		// 底部工具条
		
		// procedure0	---------------------------
			
		// 绑定矩形工具的点击事件，用于生成矩形墙体
		$("#lf_tool_rect").on("touchstart",this.lf_tool_rect_click);

		// 绑定T形工具的点击事件，用于生成T形墙体
		$("#lf_tool_polygon").on("touchstart",this.lf_tool_polygon_click);

		// 绑定清空工具的点击事件，用于清空所有墙体、门窗、家具
		$("#lf_tool_empty").on("touchstart",this.lf_tool_empty_click);

		// 绑定撤销工具的点击事件，用于撤销最后一段墙体
		$("#lf_tool_annul").on("touchstart",this.lf_tool_annul_click);

		
		// procedure1	---------------------------


		// 绑定插入门窗的点击事件，用于弹出插入门窗弹出框
		$("#lf_tool_insertDoor").on("touchstart",this.lf_tool_insertDoor_click);


		
		// procedure2	---------------------------


		// 绑定天花高的点击事件，用于设置面积、天花高度
		$("#lf_tool_ceiling").on("touchstart",this.lf_tool_ceiling_click);

		// 绑定参数设置的点击事件，用于设置门窗属性
		$("#lf_tool_parm").on("touchstart",this.lf_tool_parm_click);

		// 绑定墙体尺寸的点击事件，用于墙段长度
		$("#lf_tool_wallSize").on("touchstart",this.lf_tool_wallSize_click);

		// 绑定墙体总长的点击事件，用于墙体总长
		$("#lf_tool_wallLong").on("touchstart",this.lf_tool_wallLong_click);

			

		// procedure3	---------------------------


		// 绑定插入家具工具的点击事件，用于弹出插入家具弹出框
		$("#lf_tool_insertFurnit").on("touchstart",this.lf_tool_insertFurnit_click);

		// 绑定家具清空工具的点击事件，用于清空所有家具
		$("#lf_tool_emptyFurnit").on("touchstart",this.lf_tool_emptyFurnit_click);




		// 保存工能在这里

		// // 临时添加一个保存工具用于测试功能
		// $("#lf_tools_save").on("touchstart",this.lf_tools_save_click);

		// // 临时添加一个打开工具用于测试功能
		// $("#lf_tools_open").on("touchstart",this.lf_tools_open_click);

		// // 临时添加一个清除工具用于测试功能
		// $("#lf_tools_empty").on("touchstart",this.lf_tools_empty_click);


		// 底部右边工具条

		// 绑定居中工具的点击事件，用于根据内容居中显示
		$("#lf_tools_mediacy").on("touchstart",this.lf_tools_mediacy_click);

		// 绑定标尺工具的点击事件，用于是否显示标尺
		$("#lf_tools_ruler").on("touchstart",this.lf_tools_ruler_click);

		// 绑定放大工具的点击事件，用于放大
		$("#lf_tools_big").on("touchstart",this.lf_tools_big_click);

		// 绑定缩小工具的点击事件，用于缩小
		$("#lf_tools_small").on("touchstart",this.lf_tools_small_click);

		


	}, // toolsClickEvent结束标签



	// 顶部工具栏
	
	// 画墙工具的点击事件
	stage0_click:function(){
		// 更新lf.config.procedure为0，画墙阶段，然后更新显示工具，并将移动工具高亮
		lf.config.procedure = 0;
		lf.procedure_show();
		lf.btn_show("#lf_move");
	},

	// 门窗工具的点击事件
	stage1_click:function(){
		// 如果墙体闭合状态为true，则可以更新lf.config.procedure为1，门窗阶段，然后更新显示工具，并将移动工具高亮
		if(lf_objs.wallIn.close){
			lf.config.procedure = 1;
			lf.procedure_show();
			lf.btn_show("#lf_move");
		}
	},

	// 量尺工具的点击事件
	stage2_click:function(){
		// 如果墙体闭合状态为true并且有门窗对象，则可以更新lf.config.procedure为2，量尺阶段，然后更新显示工具，并将移动工具高亮
		if(lf_objs.wallIn.close){
			if(lf_objs.doorIn.num<=0){
				alert("至少要插入一个门窗");
				return;
			}

			// 如果这是第一次进入量尺阶段，自动弹出天花高面板。并且lf.config.procedureOne取反，后面进入就不会自动弹出天花高面板
			if(lf.config.procedureOne){
				lf.config.procedureOne = !lf.config.procedureOne;
				lf.lf_tool_ceiling_click();	
			}
			lf.config.procedure = 2;
			lf.procedure_show();
			lf.btn_show("#lf_move");

			// 将 procedure2下的各个参数隐藏
			$("#procedure2 .parm").css("display","none");
			// 将天花高参数显示
			$("#lf_tool_ceiling").css("display","inline");

		}
	},

	// 家具工具的点击事件
	stage3_click:function(){
		// 通过取反lf.config.procedureOne判断是否经过量尺阶段，是则可以更新lf.config.procedure为3，家具阶段，然后更新显示工具，并将移动工具高亮
		if(!lf.config.procedureOne){
			lf.config.procedure = 3;
			lf.procedure_show();
			lf.btn_show("#lf_move");
		}
	},


	// 上一步工具的点击事件
	lf_back_click:function(){

		
		if(lf.config.procedure == 0){	// 如果当前阶段为画墙
			

		}else if(lf.config.procedure == 1){	// 如果当前阶段为门窗
			// 将lf.config.procedure-1后退为画墙阶段
			lf.config.procedure--;
			lf.procedure_show();
			lf.btn_show("#lf_move")		

			// 将 procedure2下的各个参数隐藏
			$("#procedure2 .parm").css("display","none");
			// 将天花高参数显示
			$("#lf_tool_ceiling").css("display","inline");
		}else if(lf.config.procedure == 2){	// 如果当前阶段为量尺
			// 将lf.config.procedure-1后退为门窗阶段
			lf.config.procedure--;
			lf.procedure_show();
			lf.btn_show("#lf_move")
		}else if(lf.config.procedure == 3){	// 如果当前阶段为家具
			// 将lf.config.procedure-1后退为家具阶段
			lf.config.procedure--;
			lf.procedure_show();
			lf.btn_show("#lf_move")
		}



	},	// lf_back_click结束标签

	

	// 下一步工具的点击事件
	lf_next_click:function(){

		if(lf.config.procedure == 0){	// 如果当前阶段为画墙
			// 如果墙体为闭合状态则可以将lf.config.procedure+1进行为门窗阶段
			if(lf_objs.wallIn.close){
				lf.config.procedure++;
				lf.procedure_show();
				lf.btn_show("#lf_move")
			}
		}else if(lf.config.procedure == 1){	// 如果当前阶段为门窗
			// 如果门窗对象为0，提示用户插入门窗。必须要有门窗
			if(lf_objs.doorIn.num == 0){
				alert("至少要插入一个门窗");
				return;
			}

			// 将lf.config.procedure+1进行为量尺阶段
			lf.config.procedure++;
			lf.procedure_show();
			lf.btn_show("#lf_move")

			// 如果这是第一次进入量尺阶段，自动弹出天花高面板。并且lf.config.procedureOne取反，后面进入就不会自动弹出天花高面板
			if(lf.config.procedureOne){
				lf.config.procedureOne = !lf.config.procedureOne;
				lf.lf_tool_ceiling_click();			
			}

			// 将 procedure2下的各个参数隐藏
			$("#procedure2 .parm").css("display","none");
			// 将天花高参数显示
			$("#lf_tool_ceiling").css("display","inline");


		}else if(lf.config.procedure == 2){	// 如果当前阶段为量尺
			// 将lf.config.procedure+1进行为家具阶段
			lf.config.procedure++;
			lf.procedure_show();
			lf.btn_show("#lf_move")


		}else if(lf.config.procedure == 3){

		}



	},	// lf_next_click结束标签


	// 底部工具条

	// procedure0	---------------------------

	// 矩形工具的点击事件
	lf_tool_rect_click:function(){

		// 清空所有家具、门窗、墙体
		lf.lf_tool_empty_click();
		
		// 获得底部工具条的高度
		var botHeight = parseInt($("#lf .lf_tools").css("height"));

		// 获得canvas1宽高及坐标信息
		var canvas1Size = $(can1)[0].getBoundingClientRect();

		// 定义留边多少
		var liubian = 80;

		// 根据canvas1的div的宽高设置墙体的x坐标
		lf_objs.wallIn.dot.x.push(
			canvas1Size.left + liubian,
			canvas1Size.right - liubian,
			canvas1Size.right - liubian,
			canvas1Size.left + liubian
		);

		// 根据canvas1的div的宽高设置墙体的y坐标
		lf_objs.wallIn.dot.y.push(
			liubian,
			liubian,
			canvas1Size.height - botHeight - liubian,	
			canvas1Size.height - botHeight - liubian	
		);

		// 初始化墙体端点的数量为实际数量
		lf_objs.wallIn.num = 4;

		// 将墙体闭合
		lf_objs.wallIn.close = true;

		// 将lf.config.procedure设置1，进行为家具阶段
		lf.config.procedure = 1;
		lf.procedure_show();
		lf.btn_show("#lf_move");

		lf.allDarw();

	},	// lf_tool_rect_click结束标签


	// T形工具的点击事件
	lf_tool_polygon_click:function(){

		// 清空所有家具、门窗、墙体
		lf.lf_tool_empty_click();
		
		// 获得底部工具条的高度
		var botHeight = parseInt($("#lf .lf_tools").css("height"));

		// 获得canvas1宽高及坐标信息
		var canvas1Size = $(can1)[0].getBoundingClientRect();

		// 定义留边多少
		var liubian = 80;

		// 根据canvas1的div的宽高设置墙体的x坐标
		lf_objs.wallIn.dot.x.push(
			canvas1Size.left + liubian,
			canvas1Size.right - liubian,
			canvas1Size.right - liubian,
			Math.min(canvas1Size.right - canvas1Size.width*0.2,canvas1Size.right - liubian*1.8),
			Math.min(canvas1Size.right - canvas1Size.width*0.2,canvas1Size.right - liubian*1.8),
			canvas1Size.left + liubian
		);

		// 根据canvas1的div的宽高设置墙体的y坐标
		lf_objs.wallIn.dot.y.push(
			liubian,
			liubian,
			canvas1Size.height - botHeight - liubian,
			canvas1Size.height - botHeight - liubian,
			Math.min(canvas1Size.height - botHeight - liubian*1.8,canvas1Size.height - botHeight - canvas1Size.height*0.2),
			Math.min(canvas1Size.height - botHeight - liubian*1.8,canvas1Size.height - botHeight - canvas1Size.height*0.2)
		);

		// 初始化墙体端点的数量为实际数量
		lf_objs.wallIn.num = 6;

		// 将墙体闭合
		lf_objs.wallIn.close = true;

		// 将lf.config.procedure设置1，进行为家具阶段
		lf.config.procedure = 1;
		lf.procedure_show();
		lf.btn_show("#lf_move");

		lf.allDarw();


	},	// lf_tool_polygon_click结束标签


	// 清空工具的点击事件
	lf_tool_empty_click:function(){
		console.log(this.id);
		lf_objs.doorIn.empty();
		lf_objs.wallIn.empty();
		lf_objs.furnitIn.empty();
		
		ctx1.setTransform(1,0,0,1,0,0);
		lf.config.scale = 1;
		lf.config.original = {x:[],y:[]};
		lf_objs.wallIn.close = false;

		curObj = {};
		if(this.id == "lf_tool_empty")
			lf.allDarw();
//		lf.allDarw();
	},	// lf_tool_empty_click结束标签


	// 撤销工具的点击事件
	lf_tool_annul_click:function(){
		if(lf_objs.furnitIn.num == 0 && lf_objs.doorIn.num == 0){
			// 如果墙体是闭合的，则取消闭合
			if(lf_objs.wallIn.close){
				lf_objs.wallIn.close = !lf_objs.wallIn.close;
				lf.config.original = {x:[],y:[]};
				lf.allDarw();
				return;
			}

			// 如果墙体端点的数量少于或等于2，直接清空，否则删除最后一个端点的坐标，数量减1
			if(lf_objs.wallIn.num<=2){
				lf.lf_tool_empty_click();
			}else{
				lf_objs.wallIn.dot.x.pop()
				lf_objs.wallIn.dot.y.pop()
				lf_objs.wallIn.num--;
				lf.allDarw();
			}

			lf.allDarw();
		}else{
			alert("房间存在门窗或家具，不能撤销！");
		}
		
	},	// lf_tool_annul_click结束标签

	

	// procedure1	---------------------------


	// 插入门窗，点击事件
	lf_tool_insertDoor_click:function(){
		// 关闭插入门窗、家具的弹出框
		lf.offPopup();
		// 显示插入门窗弹出框
		$("#lf_tools_doors").show();
	},


	// procedure2	---------------------------


	// 天花高的点击事件
	lf_tool_ceiling_click:function(){
		// 设置墙体弹出框的属性为0，通过lf.wall_popup_show在显示天花高弹出框
		lf.config.wallProcedure = 0;
		lf.wall_popup_show();
	},

	// 参数设置的点击事件
	lf_tool_parm_click:function(){
		// 显示门窗弹出框
		lf.door_popup_show();
	},


	// 墙体尺寸的点击事件
	lf_tool_wallSize_click:function(){
		// 设置墙体弹出框的属性为1，通过lf.wall_popup_show在显示墙段弹出框
		lf.config.wallProcedure = 1;
		lf.wall_popup_show();
	},

	// 墙体总长的点击事件
	lf_tool_wallLong_click:function(){
		// 设置墙体弹出框的属性为2，通过lf.wall_popup_show在显示总长弹出框
		lf.config.wallProcedure = 2;
		lf.wall_popup_show();
	},




	// 绑定插入家具的点击事件
	lf_tool_insertFurnit_click:function(){
		// 关闭插入门窗、家具弹出框
		lf.offPopup();
		// 显示插入家具弹出框
		$("#lf_tools_furnits").show();
	},

	// 绑定家具清空的点击事件
	lf_tool_emptyFurnit_click:function(){
		// 清空家具对象的数组
		lf_objs.furnitIn.empty();
		// 如果当前选择的对象是家具，则初始化当前对象
		if(curObj.obj == lf_objs.furnitIn)
			curObj = {};
		lf.allDarw();
	},

	


	// 居中工具的点击事件
	lf_tools_mediacy_click:function(){
		// 如果墙体闭合了才进行居中
		if(lf_objs.wallIn.close){
			ctx1.setTransform(1,0,0,1,0,0);
			lf.allDarw();
//			lf.allDarw();
			
			
			
			// lf.config.scale = 1;
			// lf.zoom(lf.config.scale);

			// // 取端点数组的最小值，设置留边100
			// var left = getMin(lf_objs.wallIn.dot.x);
			// var top = getMin(lf_objs.wallIn.dot.y);
			// var blank = 100;

			// // 设置canvas1的定位
			// $(can1).css({
			// 	left:-left + blank,
			// 	top:-top + blank
			// });

			// lf.allDarw();

			// function getMin (arr){
			// 	var num = arr[0];
			// 	for(var i=0;i<arr.length;i++)
			// 		if(arr[i]<num)
			// 			num = arr[i]; 
			// 	return num;
			// }
		}
	},


	
	// 标尺工具的点击事件
	lf_tools_ruler_click:function(){
		if(lf_objs.wallIn.close){
			// 取反标尺状态
			lf.config.ruler = !lf.config.ruler;
			lf.allDarw();
//			lf.allDarw();
		}
	},

	// 放大工具的点击事件
	lf_tools_big_click:function(){
		// 放大0.2倍
		// ctx1.scale(1.2,1.2);

		// 如果墙体闭合了才进行缩放
		if(lf_objs.wallIn.close){
			// lf.config.scale += 0.2;
			// lf.zoom(lf.config.scale);
			ctx1.scale(1.2,1.2);
			lf.allDarw();
//			lf.allDarw();
		}
	},

	// 缩小工具的点击事件
	lf_tools_small_click:function(){
		// 缩小0.2倍
		// ctx1.scale(1.2,1.2);

		// 如果墙体闭合了才进行缩放
		if(lf_objs.wallIn.close){
			// lf.config.scale = Math.max(lf.config.scale - 0.2,0.2);
			// lf.zoom(lf.config.scale);
			ctx1.scale(0.8,0.8);
			lf.allDarw();
//			lf.allDarw();
		}

	},

	
	

	

	









	// 保存工具，暂时测试用
	lf_tools_save_click:function(){

		if(lf_objs.wallIn.num == 0 && lf_objs.doorIn.num == 0 && lf_objs.furnitIn.num == 0 ){
			alert("没有绘制，无需保存！");
		}else{
			if(localStorage.Datas){
				alert("已有缓存数据存在，无法保存！");
				return;
			}

			var objs = {};
			for(var i in lf_objs)
				objs[i] = lf_objs[i];

			var jsonStr = JSON.stringify(objs);
			localStorage.Datas=jsonStr;
			alert("保存成功！");
		}
		
	},

	// 打开工具，暂时测试用
	lf_tools_open_click:function(){
		if(localStorage.Datas){
			for(var i in lf_objs)
				lf_objs[i].open();
			lf.allDarw();
		}else{
			alert("没有找到缓存数据！");
		}
	},

	// 清除工具，暂时测试用
	lf_tools_empty_click:function(){
		if(localStorage.Datas){
			localStorage.removeItem("Datas");
			alert("缓存数据已经清除！");
		}else{
			alert("没有要清除的缓存数据");
		}
	},












	// 弹出框的点击事件集
	popupClickEvent:function(){

		// 弹出框通用事件

		// 给弹出框input绑定触摸获得焦点，原生的不知道为什么失去了触摸获得焦点
		$(".popup_text").on("touchstart",this.popup_text_click);

		// 绑定门窗弹出框的测距仪录入按钮的点击事件，用于给获得焦点的输入框设置数据
		$(".popup_finder").on("touchstart",this.popup_finder_click);



		// 家具弹出框-------------------------------

		// 绑定家具弹出框加点击事件做拖动效果
		$("#furnit_popup").on("touchstart",this.furnit_popup_click);

		// 绑定家具弹出框的旋转按钮点击事件，用于旋转家具
		$("#furnit_btn_turn").on("touchstart",this.furnit_btn_turn_click);

		// 绑定家具弹出框的删除按钮点击事件，用于删除家具
		$("#furnit_btn_del").on("touchstart",this.furnit_btn_del_click);

		// 绑定家具弹出框的停靠按钮点击事件，用于设置是否停靠
		$("#furnit_berth_btn").on("touchstart",this.furnit_berth_btn_click);

		// 绑定家具弹出框的取消按钮点击事件，用于取消家具弹出框的显示
		$("#furnit_popup_no").on("touchstart",this.furnit_popup_no_click);

		// 绑定家具弹出框的确定按钮点击事件，用于将用户输入的数据更新到选中的家具对象参数中
		$("#furnit_popup_ok").on("touchstart",this.furnit_popup_ok_click);

		
		// 门窗弹出框-------------------------------
		
		// 限制door_popup_content下的popup_number不能少于10
		$("#door_popup_content .popup_number").on("change",this.popup_number_change);
		
		// 绑定门窗弹出框加点击事件做拖动效果
		$("#door_popup").on("touchstart",this.door_popup_click);


		// 绑定门窗弹出框的确定按钮的点击事件，用于将用户输入的数据更新到选中的家具对象参数中
		$("#door_popup_ok").on("touchstart",this.door_popup_ok_click);


		// 墙体弹出框-------------------------------
		
		
		// 绑定墙体弹出框加点击事件做拖动效果
		$("#wall_popup").on("touchstart",this.wall_popup_click);

		// 绑定墙体弹出框的确定按钮的点击事件，用于将用户输入的天花、墙段、总长数据更新到墙体对象中
		$("#wall_popup_ok").on("touchstart",this.wall_popup_ok_click);




		



	},	// popupClickEvent结束标签

	// 弹出框input绑定触摸获得焦点
	popup_text_click:function(){
		// 阻止事件冒泡，获得焦点
		all_fn.noUpDefault();
		this.focus();
	},

	// 门窗弹出框的测距仪录入按钮的点击事件
	popup_finder_click:function(){
		// 阻止事件冒泡，设置焦点输入框的值
		all_fn.noUpDefault();
		$(".popup_text:focus").val("");
	},


	// 家具弹出框名称加点击事件做拖动效果
	furnit_popup_click:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		var left = Cx - parseInt($("#furnit_popup").css("left"));
		var top = Cy - parseInt($("#furnit_popup").css("top"));
		
		// 绑定移动事件
		// $(document).on("mousemove",popupMove);
		$(document).on("touchmove",popupMove);

		// 绑定松开事件
		// $(document).on("mouseup",lf.offEvent);
		$(document).on("touchend",lf.offEvent);

		// 移动事件
		function popupMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}
			
			$("#furnit_popup").css({"left":Mx-left,"top":My-top});
			
		}


	},	// furnit_popup_click结束标签

	
	// 家具弹出框的旋转按钮点击事件
	furnit_btn_turn_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();
		if(curObj.obj){
			// 设置选中的家具对象的角度+45或为0
			lf_objs.furnitIn.a[curObj.i] + 45 >= 360 ? lf_objs.furnitIn.a[curObj.i] = 0 : lf_objs.furnitIn.a[curObj.i] += 45;
			lf.allDarw();
		}

	},

	


	// 家具弹出框的删除按钮点击事件
	furnit_btn_del_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		if(curObj.obj){
			// 删除选中家具对象的属性，家具对象数量减1
			lf_objs.furnitIn.x.splice(curObj.i,1);
			lf_objs.furnitIn.y.splice(curObj.i,1);
			lf_objs.furnitIn.a.splice(curObj.i,1);
			lf_objs.furnitIn.n.splice(curObj.i,1);
			lf_objs.furnitIn.s.splice(curObj.i,1);
			lf_objs.furnitIn.l.splice(curObj.i,1);
			lf_objs.furnitIn.w.splice(curObj.i,1);
			lf_objs.furnitIn.berth.splice(curObj.i,1);
			lf_objs.furnitIn.style.splice(curObj.i,1);
			lf_objs.furnitIn.note.splice(curObj.i,1);
			lf_objs.furnitIn.num--;

			// 初始化当前对象
			curObj = {};
			lf.allDarw();

			// 隐藏弹出框DIV，清空家具弹出框的输入框，初始化并隐藏家具弹出框
			$("#popupUI").css("display","none");
			$("#furnit_popup .popup_text").val("");
			$("#furnit_popup").css({"left":"50%","top":"50%","display":"none"});

		}

	},


	// 家具弹出框的停靠按钮点击事件
	furnit_berth_btn_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		if(curObj.obj){
			// 根据当前背景色判断是否为rgb(173.1.1)，是的话设置为灰色，不是则设置为rgb(173.1.1)
			var color = $(this).css("backgroundColor");
			if(color == "rgb(173, 1, 1)"){
				$(this).css("backgroundColor","gray")
				$("#furnit_berth_btn_dot").css({"float":"left"});
			}else{
				$(this).css("backgroundColor","#ad0101")
				$("#furnit_berth_btn_dot").css({"float":"right"});
			}
		}

	},

	// 家具弹出框的取消按钮点击事件
	furnit_popup_no_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		// 隐藏弹出框DIV，清空家具弹出框的输入框内容，初始化并隐藏家具弹出框
		$("#popupUI").css("display","none");
		$("#furnit_popup .popup_text").val("");
		$("#furnit_popup").css({"left":"50%","top":"50%","display":"none"});
	},

	// 家具弹出框的确定按钮点击事件
	furnit_popup_ok_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		if(curObj.obj){
			var f = lf_objs.furnitIn;
			var i = curObj.i;

			// 设置选中的家具对象的名称、长、宽、款式备注、用户备注、是否停靠
			f.n[i] = $("#furnit_popup_n").val();
			f.l[i] = $("#furnit_popup_l").val();
			f.w[i] = $("#furnit_popup_w").val();
			f.style[i]= $("#furnit_popup_style").val();
			f.note[i] = $("#furnit_popup_note").val();
			f.berth[i] = $("#furnit_berth_btn").css("backgroundColor") == "rgb(173, 1, 1)" ? true : false;

			// 隐藏弹出框DIV，初始化并隐藏家具弹出框
			$("#popupUI").css("display","none");
			$("#furnit_popup").css({"left":"50%","top":"50%","display":"none"});

			lf.allDarw();
		}
	},	// furnit_popup_ok_click结束标签


	// 限制door_popup_content下的popup_nuchange能少于10
	popup_number_change:function(){
		// 如果输入框的值小于10，则设置该值为10
		if(this.value<10)
			this.value = 10;
	},


	// 家具弹出框名称加点击事件做拖动效果
	door_popup_click:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		var left = Cx - parseInt($("#door_popup").css("left"));
		var top = Cy - parseInt($("#door_popup").css("top"));
		
		// 绑定移动事件
		// $(document).on("mousemove",popupMove);
		$(document).on("touchmove",popupMove);

		// 绑定松开事件
		// $(document).on("mouseup",lf.offEvent);
		$(document).on("touchend",lf.offEvent);

		// 移动事件
		function popupMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}
			
			$("#door_popup").css({"left":Mx-left,"top":My-top});
			
		}


	},	// door_popup_click结束标签



	



	// 绑定门窗弹出框的确定按钮的点击事件
	door_popup_ok_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		if(curObj.obj){
			var d = lf_objs.doorIn;
			var index = curObj.i;
			var arr = [];

			// 根据造选中的门窗的类型不同，设置不同的属性
			switch(d.s[index]){
				case 0:
					arr = ["height","width"];
					break;

				case 1:
					arr = ["height","width","feet","depth","radius"];
					break;

				case 2:
					arr = ["height","leftW","rightW","feet","depth"];
					break;

				case 3:
					arr = ["height","width","feet"];
					break;

				case 4:
					arr = ["height","width"];
					break;

				case 5:
					arr = ["height","width"];
					break;

				case 6:
					arr = ["height","metope","feet"];
					break;

				case 7:
					arr = ["height","width","feet"];
					break;

				case 8:
					arr = ["height","leftW","rightW","feet"];
					break;

				case 9:
					arr = ["height","width"];
					break;

				case 10:
					arr = ["height","width"];
					break;

				case 11:
					arr = ["height","width"];
					break;

				default:break;
			}

			// 如果类型为2(转角飘窗)或为8(转角窗)，而通过以下方式更改对象属性
			if(d.s[index] == 2 || d.s[index] == 8){
				var walls = lf_objs.wallIn.walls;				// 将walls指向墙体数组对象
				var ixFrom = lf_objs.doorIn.c[curObj.i][0];		// 将ixForm指向选中的对象的转角左边的墙体序号
				var ixFromLast = walls[ixFrom].x.length - 3;	// 获得选中对象的转角最左边的端点序号
				var ix = lf_objs.doorIn.c[curObj.i][1];			// 获得先中对象的转角的第一个端点序号
				var parm = lf_objs.doorIn.attr[curObj.i];		// 将parm指向选中对象的attr参数集

				// 获得用户输入的左边宽、右边宽
				var leftW = $("#door_popup_"+arr[1]).val();
				var rightW = $("#door_popup_"+arr[2]).val();

				var beforeDot = (-1);		// 转角对象左边可改变的端点序号，-1为没有可改变的端点
				var afterDot = (-1);		// 转角对象右边可改变的端点序号，-1为没有可改变的端点

				// 往前面找可移动的端点，将找到的端点序号赋值给beforeDot
				for(var i=ixFromLast;i>=0;i--)
					if(walls[ixFrom].w[i]==0){
						beforeDot = i;
						break;
					}
				// 往后面找可移动的端点,将找到的端点序号赋值给afterDot
				for(var i=1;i<walls[ix].w.length-1;i++)
					if(walls[ix].w[i]==0){
						afterDot = i;
						break;
					}

				// 获取角度
				var leftAngle = all_fn.getAngle(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[ixFromLast+1],walls[ixFrom].y[ixFromLast+1]);
				var rightAngle = all_fn.getAngle(walls[ix].x[1],walls[ix].y[1],walls[ix].x[2],walls[ix].y[2]);

				// 要移动的距离
				var leftJuli = leftW - parm.leftW;
				var rightJuli = rightW - parm.rightW;

				// 移动左边墙前面的端点
				for(var i=ixFromLast;i>beforeDot && i != 0;i--){
					var goCoor = all_fn.coor(walls[ixFrom].x[i],walls[ixFrom].y[i],leftAngle,-leftJuli);
					walls[ixFrom].x[i] = goCoor.x;
					walls[ixFrom].y[i] = goCoor.y;
				}

				// 移动右边墙后面的端点
				for(var i=1;i<afterDot;i++){
					var goCoor = all_fn.coor(walls[ix].x[i+1],walls[ix].y[i+1],rightAngle,rightJuli);
					walls[ix].x[i+1] = goCoor.x;
					walls[ix].y[i+1] = goCoor.y;
				}

				// 将长度赋值给W标识起来
				walls[ixFrom].w[ixFromLast] = leftW;
				walls[ix].w[1] = rightW;

			}else if(d.s[index] != 6){	// 如果不等于6(梁)，则通过以下方式更改

				//区别墙体和门体 
				// if(curObj.obj == lf_objs.wallIn){
				// 	var walls = lf_objs.wallIn.walls[curObj.i[0]];
				// 	var ix = curObj.i[1];
				// 	var wallWH = Math.round(all_fn.bevel(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]));
				// }else if(curObj.obj == lf_objs.doorIn){
				// 	var walls = lf_objs.wallIn.walls[lf_objs.doorIn.c[curObj.i][0]];
				// 	var ix = lf_objs.doorIn.c[curObj.i][1];
				// 	var wallWH = Math.round(all_fn.bevel(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]));
				// }
				
				// 将walls指向选中对象所属的墙体
				var walls = lf_objs.wallIn.walls[lf_objs.doorIn.c[curObj.i][0]];
				// 将ix指向所属的端点序号
				var ix = lf_objs.doorIn.c[curObj.i][1];
				// 将选中对象的宽度赋值给wallWH
				var wallWH = Math.round(all_fn.bevel(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]));
				// 获得用户输入的宽度
				var lineLength = $("#door_popup_"+arr[1]).val();

				// 如果宽度不为null或等于原来的宽度，就改变对象的宽度，及更新所在墙体数组信息
				if(lineLength != null && lineLength != wallWH){
					var beforeDot = (-1);			
					var afterDot = (-1);	
					// 往前面找可移动的端点，将找到的端点序号赋值给beforeDot
					for(var i=ix-1;i>=0;i--)
						if(walls.w[i]==0){
							beforeDot = i;
							break;
						}
					// 往后面找可移动的端点,将找到的端点序号赋值给afterDot
					for(var i=ix+1;i<walls.w.length-1;i++)
						if(walls.w[i]==0){
							afterDot = i;
							break;
						}


					// 获取角度
					var angle = all_fn.getAngle(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]);

					// 要移动的距离
					var juli = lineLength - wallWH;


					// 优先移动后面的端点
					for(var i=ix;i<afterDot;i++){
						var goCoor = all_fn.coor(walls.x[i+1],walls.y[i+1],angle,juli);
						walls.x[i+1] = goCoor.x;
						walls.y[i+1] = goCoor.y;
						// console.log("我在后面设置了："+i);
					}

					// 当后面没端点移动时，移动前面的端点
					if(afterDot<0)
						for(var i=ix;i>beforeDot && i != 0;i--){
							// if(i != 0){
								var goCoor = all_fn.coor(walls.x[i],walls.y[i],angle,-juli);
								walls.x[i] = goCoor.x;
								walls.y[i] = goCoor.y;
								// console.log("我在前面设置了："+i);
							// }
						}

					// 将长度赋值给W标识起来
					if(beforeDot>=0 || afterDot>=0){
						walls.w[ix] = lineLength;
					}
				}
			}

			
			
			// 初始化当前对象
			curObj={};

			lf.allDarw();
			lf.allDarw();

			// 更新选中对象的attr参数集为用户输入的内容
			for(var g=0;g<arr.length;g++)
				d.attr[index][arr[g]] = $("#door_popup_"+arr[g]).val();
		}

		// 显示弹出框DIV，将门窗弹出框的输入框区域清空，初始化门窗弹出框并隐藏
		$("#popupUI").css("display","none");
		$("#door_popup_content").empty();
		$("#door_popup").css({"left":"50%","top":"50%","display":"none"});
	},



	// 绑定门窗弹出框的左右按钮的点击事件
	door_popup_direction_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		// 切换单开门的左右
		if(curObj.obj){
			if(lf_objs.doorIn.attr[curObj.i].direction == 0){
				lf_objs.doorIn.attr[curObj.i].direction = 1;
			}else{
				lf_objs.doorIn.attr[curObj.i].direction = 0;
			}
			
			lf.allDarw();
		}
	},


	// 绑定门窗弹出框的内外按钮的点击事件
	door_popup_around_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		// 切换单开门的内外
		if(curObj.obj){
			if(lf_objs.doorIn.attr[curObj.i].around == 0){
				lf_objs.doorIn.attr[curObj.i].around = 1;
			}else{
				lf_objs.doorIn.attr[curObj.i].around = 0;
			}
			
			lf.allDarw();
		}
	},

	// 墙体弹出框加点击事件做拖动效果
	wall_popup_click:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		var left = Cx - parseInt($("#wall_popup").css("left"));
		var top = Cy - parseInt($("#wall_popup").css("top"));
		
		// 绑定移动事件
		// $(document).on("mousemove",popupMove);
		$(document).on("touchmove",popupMove);

		// 绑定松开事件
		// $(document).on("mouseup",lf.offEvent);
		$(document).on("touchend",lf.offEvent);

		// 移动事件
		function popupMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}
			
			$("#wall_popup").css({"left":Mx-left,"top":My-top});
			
		}

	},


	// 墙体弹出框的确定按钮的点击事件
	wall_popup_ok_click:function(){
		// 阻止事件冒泡
		all_fn.noUpDefault();

		// lf.config.wallProcedure：当前显示的内容 ，0：天花高，1：墙段，2：总长
		switch(lf.config.wallProcedure){
			case 0:
				// 将用户输入的面积、天花高度赋值到墙体对象的ceiling、area属性中。
				lf_objs.wallIn.ceiling = $("#wall_popup_ceiling").val();
				lf_objs.wallIn.area = $("#wall_popup_area").val();
				break;

			case 1:
				// 将walls指向当前墙体对象的序号，
				var walls = lf_objs.wallIn.walls[curObj.i[0]];
				// 将ix指向当前对象所属的墙段
				var ix = curObj.i[1];
				// 将当前选中的墙段的长度赋值给wallWH
				var wallWH = Math.round(all_fn.bevel(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]));
				// 将用户输入的长度赋值给lineLength
				var lineLength = $("#wall_popup_size").val();

				// 如果宽度不为null或等于原来的，就改变对象的宽度，及更新所在墙体数组信息
				if(lineLength != null && lineLength != wallWH){
					var beforeDot = (-1);			
					var afterDot = (-1);	
					// 往前面找可移动的端点，将找到的端点序号赋值给beforeDot
					for(var i=ix-1;i>=0;i--)
						if(walls.w[i]==0){
							beforeDot = i;
							break;
						}
					// 往后面找可移动的端点,将找到的端点序号赋值给afterDot
					for(var i=ix+1;i<walls.w.length-1;i++)
						if(walls.w[i]==0){
							afterDot = i;
							break;
						}

					// 获取角度
					var angle = all_fn.getAngle(walls.x[ix],walls.y[ix],walls.x[ix+1],walls.y[ix+1]);

					// 要移动的距离
					var juli = lineLength - wallWH;


					// 优先移动后面的端点
					for(var i=ix;i<afterDot;i++){
						var goCoor = all_fn.coor(walls.x[i+1],walls.y[i+1],angle,juli);
						walls.x[i+1] = goCoor.x;
						walls.y[i+1] = goCoor.y;
					}

					// 当后面没端点移动时，移动前面的端点
					if(afterDot<0)
						for(var i=ix;i>beforeDot && i != 0;i--){
							var goCoor = all_fn.coor(walls.x[i],walls.y[i],angle,-juli);
							walls.x[i] = goCoor.x;
							walls.y[i] = goCoor.y;
						}

					// 将长度赋值给W标识起来
					if(beforeDot>=0 || afterDot>=0)
						walls.w[ix] = lineLength;
				}

				curObj={};
				lf.allDarw();

				break;

			case 2:
				// 将dots指向墙体基础端点数组
				var dots =  lf_objs.wallIn.dot;
				// 将ixForm指向选中的墙体左边的端点序号
				var ixFrom = curObj.i[0];
				// 将ix指向选中墙体的右边端点序号
				var ix = (ixFrom == dots.x.length-1) ? 0 : (ixFrom + 1);
				// 将ixTo指向选中端点的右边的下一个端点的序号
				var ixTo = (ix == dots.x.length-1) ? 0 : (ix + 1);

				// 将选中墙体长度赋值给wallWH
				var wallWH = Math.round(all_fn.bevel(dots.x[ixFrom],dots.y[ixFrom],dots.x[ix],dots.y[ix]));
				// 将用户输入的总长赋值给lineLength
				var lineLength = $("#wall_popup_size").val();

				// 如果用户输入的不为null或和原来的一样，而通过下面改变总长
				if(lineLength != null && lineLength != wallWH){
					// 获得选中墙体的角度
					var angle = all_fn.getAngle(dots.x[ixFrom],dots.y[ixFrom],dots.x[ix],dots.y[ix]);
					// 计算出以选中墙体左边端点为基准，以原来的角度，延伸到用户输入的长度的坐标
					var goCoor = all_fn.coor(dots.x[ixFrom],dots.y[ixFrom],angle,lineLength);

					// 改变总长时，相应的要改变与这段墙体端点的X或Y坐标相同的坐标，注：改变总长，改变的是墙体右边的端点坐标
					// 如果左端点的x等于右端点的x，则改变该x为改变后的x
					if(dots.x[ixFrom] == dots.x[ix]){
						dots.x[ixFrom] = goCoor.x;
						// console.log("我操作了这个ixFrom的X");
					}

					// 如果左端点的y等于右端点的y，则改变该y为改变后的y
					if(dots.y[ixFrom] == dots.y[ix]){
						dots.y[ixFrom] = goCoor.y;
						// console.log("我操作了这个ixFrom的Y");
					}

					// 如果下一个端点的x等于右端点的x，则改变该x为改变后的x
					if(dots.x[ixTo] == dots.x[ix]){
						dots.x[ixTo] = goCoor.x;
						// console.log("我操作了这个ixTo的X");
					}

					// 如果下一个端点的y等于右端点的y，则改变该y为改变后的y
					if(dots.y[ixTo] == dots.y[ix]){
						dots.y[ixTo] = goCoor.y;
						// console.log("我操作了s这个ixTo的Y");
					}
					
					// 更新选中墙右边的端点坐标
					dots.x[ix] = goCoor.x;
					dots.y[ix] = goCoor.y;

				}

				curObj={};
				// 重新计算所有墙体端点与墙段数组的角度与坐标，进行更新
				lf_objs.wallIn.upData();
				lf.allDarw();

				break;

			default:break;
		}


		// 更新lf.config.wallProcedure-1，重新刷新顶部与底部工具栏的显示
		lf.config.wallProcedure = -1;
		lf.procedure_show();
		lf.btn_show("#lf_move")

		// 将 procedure2下的各个参数隐藏
		$("#procedure2 .parm").css("display","none");
		// 将天花高参数显示
		$("#lf_tool_ceiling").css("display","inline");

		// 隐藏弹出框DIV，清空墙体弹出框的输入框，初始化并隐藏墙体弹出框
		$("#popupUI").css("display","none");
		$("#wall_popup .popup_text").val("");
		$("#wall_popup_content .popup_content_box").css("display","none");
		$("#wall_popup").css({"left":"50%","top":"50%","display":"none"});
	},
	











	// 画布的点击事件
	can1Mousedown:function(){
		event.preventDefault();

		// 取消弹出框
		lf.offPopup();

		// 检测是否有选择中的对象
		var h1 = lf.haveObj();
		if(h1) return;

		// 在家具阶段才执行家具事件
		if(lf.config.procedure==3){
			
		// 家具事件
		var h2 = lf.furnitEvent();
		if(h2) return;
			
		}

		// 门窗事件
		var h3 = lf.doorEvent();
		if(h3) return;

		// 墙体事件
		var h4 = lf.wallEvent();
		if(h4) return;

		// 移动画布事件
		lf.moveEvent();

		// console.log("最后的事件");
		
	},



// ------------		分割线		(↑上面是点击事件部分，↓下面是家具事件部分)		------------------------------
	// 家具事件集
	furnitEvent:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		// 将鼠标坐标计算为画面内的坐标
		var tempCC = lf.windowToCanvas(Cx,Cy);

		// 检测该坐标是否点中家具对象
		var temp = lf_objs.furnitIn.check(tempCC.x,tempCC.y);

		// 如果temp大于等于0，则有点击家具，进行高亮显示或移动或弹出框
		if(temp>=0){
			// 将当前对象指向家具对象，高亮显示第curObj.i个家具对象
			curObj.obj = lf_objs.furnitIn;
			curObj.i = temp;
			lf.allDarw();

			// 将计算坐标在家具对象内的差值
			var Fx = tempCC.x - lf_objs.furnitIn.x[temp];
			var Fy = tempCC.y - lf_objs.furnitIn.y[temp];

			// 声明一个变量用于判断是否弹出框，默认为true在松开鼠标时弹出框，在移动事件中设置false不弹出
			var popup = true;

			// 绑定移动事件
			// $(can1).on("mousemove",canvasMove);
			$(can1).on("touchmove",canvasMove);

			// 绑定松开事件
			// $(can1).on("mouseup",canvasUp);
			$(can1).on("touchend",canvasUp);

		}

		function canvasMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}
			
			var tempMC = lf.windowToCanvas(Mx,My);

			if(popup && (Math.abs(Mx-Cx)>5 || Math.abs(My-Cy)))
				popup = !popup;

			lf_objs.furnitIn.x[temp] = tempMC.x - Fx;
			lf_objs.furnitIn.y[temp] = tempMC.y - Fy;
			lf.allDarw();
			
		}

		function canvasUp(){
			if(popup)
				lf.furnit_popup_show();

			lf.offEvent();
		}

		return temp>=0?true:false;

	}, // furnitEvent结束标签

	// 放置家具
	toFurnit:function(){
		var event = event || window.event;
		event.preventDefault();

		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		lf.offPopup();

		$("body").append('<div id="moveIco"></div>');

		switch(lf.config.furnitStyle){
			case 0:
				var l = 40;
				var w = 160;
				var n = "万能图标";
				break;

			case 1:
				var l = 220;
				var w = 160;
				var n = "1.5米床";
				break;

			case 2:
				var l = 220;
				var w = 190;
				var n = "1.8米床";
				break;

			case 3:
				var l = 60;
				var w = 250;
				var n = "大衣柜";
				break;

			case 4:
				var l = 60;
				var w = 280;
				var n = "大圆弧衣柜";
				break;

			case 5:
				var l = 60;
				var w = 280;
				var n = "大圆弧衣柜2";
				break;

			case 6:
				var l = 48;
				var w = 48;
				var n = "床头柜";
				break;

			case 7:
				var l = 57;
				var w = 75;
				var n = "梳妆台";
				break;

			case 8:
				var l = 83;
				var w = 120;
				var n = "书桌";
				break;

			case 9:
				var l = 30;
				var w = 120;
				var n = "书柜";
				break;

			case 10:
				var l = 42;
				var w = 120;
				var n = "电视柜";
				break;

			case 11:
				var l = 43;
				var w = 43;
				var n = "衣架";
				break;

			default:break;
		}

		$("#moveIco").css({width:w,height:l,left:Cx-w/2,top:Cy-l/2,borderColor:"red",zIndex:10001});

		// 绑定移动事件
		// $(document).on("mousemove",canvasMove);
		$(document).on("touchmove",canvasMove);

		// 绑定松开事件
		// $(document).on("mouseup",canvasUp);
		$(document).on("touchend",canvasUp);

		var CC,Mx,My;

		function canvasMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				Mx = event.touches[0].pageX;
				My = event.touches[0].pageY;
			}else{
				Mx = event.pageX;
				My = event.pageY;
			}
			
			CC = lf.windowToCanvas(Mx,My);
			var can1Size = can1.getBoundingClientRect();

			if(Mx>can1Size.left && Mx<can1Size.right && My>can1Size.top && My<can1Size.bottom){
				$("#moveIco").css({width:w,height:l,left:Mx-w/2,top:My-l/2,borderColor:"#59ff59"});
			}else{
				$("#moveIco").css({width:w,height:l,left:Mx-w/2,top:My-l/2,borderColor:"red"});
			}

		}

		function canvasUp(){
			var event = event || window.event;
			event.preventDefault();

			$("#moveIco").remove();
						
			// 获得画布的上下左右
			var can1Size = can1.getBoundingClientRect();
			// 如果在画布内，则添加一个家具对象
			if(Mx>can1Size.left && Mx<can1Size.right && My>can1Size.top && My<can1Size.bottom){
				lf_objs.furnitIn.x.push(CC.x);
				lf_objs.furnitIn.y.push(CC.y);
				lf_objs.furnitIn.a.push(0);
				lf_objs.furnitIn.n.push(n);
				lf_objs.furnitIn.s.push(lf.config.furnitStyle);
				lf_objs.furnitIn.l.push(l);
				lf_objs.furnitIn.w.push(w);
				lf_objs.furnitIn.berth.push(false);
				lf_objs.furnitIn.style.push("");
				lf_objs.furnitIn.note.push("");
				lf_objs.furnitIn.num++;
				lf.allDarw();
			}
			// 将添加类型恢复为-1
			lf.config.furnitStyle = -1;
			lf.offEvent();
		}

	},	// toFurnit结束标签


// ------------		分割线		(↑上面是家具事件部分，↓下面是门窗事件部分)		------------------------------
	// 门窗事件集
	doorEvent:function(){
		// all_fn.noUpDefault();

		// 如果门窗对象为0，直接跳出门窗事件
		if(lf_objs.doorIn.num == 0)
			return false;

		// 执行移动门窗事件后，有个是否找到门窗返回值，如未找到门窗则可以向下一个事件触发
		return lf.moveDoor();

	},

	// 移动门窗
	moveDoor:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		// 计算鼠标在画布内的坐标，并通过该坐标检测是否点击到门窗
		var tempCC = lf.windowToCanvas(Cx,Cy);
		var temp = lf_objs.doorIn.check(tempCC.x,tempCC.y);

		// 如果temp大于等于0，则点击了门窗，高亮显示门窗或移动。并相应的底部工具
		if(temp>=0){
			curObj.obj = lf_objs.doorIn;
			curObj.i = temp;
			lf.allDarw();

			var ix = lf_objs.doorIn.c[temp][1];								//选中对象所属的那段墙的序号
			var myX = lf_objs.wallIn.walls[lf_objs.doorIn.c[temp][0]].x;	//选中对象所属的那面墙的X坐标数组
			var myY = lf_objs.wallIn.walls[lf_objs.doorIn.c[temp][0]].y;	//选中对象所属的那面墙的Y坐标数组
			var myB = all_fn.bevel(myX[ix],myY[ix],myX[ix+1],myY[ix+1]);	//选中对象所在的那段墙的长度

			//选中对象所属的那段墙的角度，用于all_fn.coor求坐标
			var angle = Math.round(all_fn.getAngle(myX[0],myY[0],myX[myX.length-1],myY[myX.length-1]));

			//选中对象所属的那面墙的AB公式
			var AB = all_fn.ab(myX[0],myY[0],myX[myX.length-1],myY[myX.length-1]);	

			// 墙的标识数组，默认为0，如果被赋值了，长度就固定了。不能被移动所改变
			var w = lf_objs.wallIn.walls[lf_objs.doorIn.c[temp][0]].w;

			//鼠标在选中对象内的坐标
			var polX = tempCC.x - myX[ix];
			var polY = tempCC.y - myY[ix];

			var beforeDot = (-1);	// 转角对象左边可改变的端点序号，-1为没有可改变的端点		
			var afterDot = (-1);	// 转角对象右边可改变的端点序号，-1为没有可改变的端点
			for(var i=ix-1;i>=0;i--)
				if(w[i]==0){
					beforeDot = i;
					break;
				}

			for(var i=ix+1;i<w.length-1;i++)
				if(w[i]==0){
					afterDot = i;
					break;
				}
			

			// 左边或右边存在可移动的对象，才可以移动
			if(beforeDot>=0&&afterDot>=0){

				// 绑定移动事件
				// $(can1).on("mousemove",canvasMove);
				$(can1).on("touchmove",canvasMove);



			}	// if(beforeDot>=0&&afterDot>=0)结束标签

			// 绑定松开事件
			// $(can1).on("mouseup",canvasUp);
			$(can1).on("touchend",canvasUp);


			function canvasMove(){
				var event = event || window.event;
				event.preventDefault();
				
				if(event.type == "touchmove"){
					var Mx = event.touches[0].pageX;
					var My = event.touches[0].pageY;
				}else{
					var Mx = event.pageX;
					var My = event.pageY;
				}
				

				// 转算鼠标在画布内的坐标
				var tempMC = lf.windowToCanvas(Mx,My);
				var goX = tempMC.x - polX;	//变更后的X坐标
				var goY = tempMC.y - polY;	//变更后的Y坐标

				// 计算出线上的坐标
				if(AB.a===0){
					goX = goX;
					goY = AB.b;
				}else if(AB.a===false){
					goX = AB.b;
					goY = goY;
				}else{
					goX = goX;
					goY = AB.a*goX+AB.b;
				}

				// 改变前的距离，从前面一个点到当前点
				var originalB = all_fn.bevel(myX[0],myY[0],myX[ix],myY[ix]);

				// 改变后的距离，从前面一个点到当前点
				var changeB = all_fn.bevel(myX[0],myY[0],goX,goY);
				// 需要移动的距离
				var juli = changeB - originalB;

				// 限制对象在walls数组中在对象前面和后面的端点之间
				//通过x和y的最大最小值比较，确定对象是否在可移动范围内
				if(moveOk()){
					
					// 把左边可以移动的元素都往右边移动juli这么多
					for(var i=ix;i>beforeDot;i--){
						var goCoor = all_fn.coor(myX[i],myY[i],angle,juli);
						myX[i] = goCoor.x;
						myY[i] = goCoor.y;
						
					}

					// 把右边可以移动的元素都往左边移动juli这么多
					for(var i=ix;i<afterDot;i++){
						var goCoor = all_fn.coor(myX[i+1],myY[i+1],angle,juli);
						myX[i+1] = goCoor.x;
						myY[i+1] = goCoor.y;
					}

					lf.allDarw();
				}


				// 判断是否可以移动，通过x和y的最大最小值比较
				function moveOk(){
					var beforeX = myX[beforeDot],
						beforeY = myY[beforeDot],
						afterX = myX[afterDot+1],
						afterY = myY[afterDot+1];

					var sc = all_fn.coor(myX[beforeDot+1],myY[beforeDot+1],angle,juli);
					var nc = all_fn.coor(myX[afterDot],myY[afterDot],angle,juli);
					var headX = sc.x,
						headY = sc.y,
						tailX = nc.x,
						tailY = nc.y;
					if(beforeDot == 0){
						headX = goX;
						headY = goY;
					}
						
					if(angle == 90 || angle == 270){//Y轴

						// 从前面防止门被挤没
						if(beforeDot%2>0)
							if(Math.max(beforeY,headY) - Math.min(beforeY,headY) < 10 || Math.abs(all_fn.getAngle(beforeX,beforeY,headX,headY)) - angle > 2)
								return false;

						// 从后面防止门被挤没
						if(afterDot%2>0)
							if(Math.max(afterY,tailY) - Math.min(afterY,tailY) < 10 || Math.abs(all_fn.getAngle(tailX,tailY,afterX,afterY)) - angle > 2)
								return false;

						// 从最小值比较
						if(Math.min(beforeY,afterY) > Math.min(headY,tailY))
							return false;

						// 从最大值比较
						if(Math.max(headY,tailY) > Math.max(beforeY,afterY))
							return false;

					}else{//Y轴以外的

						// 从前面防止门被挤没
						if(beforeDot%2>0)
							if(Math.max(beforeX,headX) - Math.min(beforeX,headX) < 10 || Math.abs(all_fn.getAngle(beforeX,beforeY,headX,headY)) - angle > 2)
								return false;

						// 从后面防止门被挤没
						if(afterDot%2>0)
							if(Math.max(afterX,tailX) - Math.min(afterX,tailX) < 10 || Math.abs(all_fn.getAngle(tailX,tailY,afterX,afterY)) - angle > 2)
								return false;

						// 从最小值比较
						if(Math.min(beforeX,afterX) > Math.min(headX,tailX))
							return false;

						// 从最大值比较
						if(Math.max(headX,tailX) > Math.max(beforeX,afterX))
							return false;
					}

					return true;
				}	// moveOk结束标签


			}	// canvasMove结束标签


			function canvasUp(){
				// 如果当前阶段为量尺，将参数设置显示出来，其他的隐藏
				if(lf.config.procedure == 2){
					lf.btn_show("#lf_move")
					$("#procedure2 .parm").css("display","none");
					$("#lf_tool_parm").css("display","inline");
				}

				lf.offEvent();
			}
					

		}	// if(temp>=0)结束标签


		return temp>=0?true:false;

	},	// moveDoor结束标签


	// 放置门窗前的检测
	toDoor:function(w){
		var event = event || window.event;
		event.preventDefault();

		all_fn.noUpDefault();
		lf.offPopup();

		$("body").append('<div id="moveIco"></div>');

		// 声明temp用于存放是否找到可以放置的位置
		var temp = undefined;
		var darw = false;

		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		var tempCC = lf.windowToCanvas(Cx,Cy);

		$("#moveIco").css({width:w,height:w,left:Cx-w/2,top:Cy-w/2,borderColor:"red",zIndex:10001});

		var point = {};

		// 绑定移动事件
		// $(document).on("mousemove",canvasMove);
		$(document).on("touchmove",canvasMove);

		// 绑定松开事件
		// $(document).on("mouseup",canvasUp);
		$(document).on("touchend",canvasUp);


		// 移动事件
		function canvasMove(){
			var event = event || window.event;
			event.preventDefault();

			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}

			var tempMC = lf.windowToCanvas(Mx,My);

			point.lt = {x:tempMC.x-w/2,y:tempMC.y-w/2};
			point.rt = {x:tempMC.x+w/2,y:tempMC.y-w/2};
			point.lb = {x:tempMC.x-w/2,y:tempMC.y+w/2};
			point.rb = {x:tempMC.x+w/2,y:tempMC.y+w/2};

			temp = lf.checkOkDoor(point);

			if(temp != undefined){
				$("#moveIco").css({width:w,height:w,left:Mx-w/2,top:My-w/2,borderColor:"#59ff59"});
			}else{
				$("#moveIco").css({width:w,height:w,left:Mx-w/2,top:My-w/2,borderColor:"red"});
			}


		}


		function canvasUp(){
			var event = event || window.event;
			event.preventDefault();

			$("#moveIco").remove();
			// $(".tools").css("background","none");
			// lf.view();

			// temp里包含了i和point，i：哪面墙的哪一段，point：放置的坐标
			if(temp != undefined)
				lf.placeDoor(temp,lf.config.doorStyle,w);
			lf.config.doorStyle = -1;
			lf.offEvent();
		}

	},	// toDoor结束标签

	// 是否可以放置门窗
	checkOkDoor:function(point){
		if(lf.config.doorStyle == 2 || lf.config.doorStyle == 8){
			var A = lf_objs.wallIn.quote(point.lt.x,point.lt.y);	//左上角
			var B = lf_objs.wallIn.quote(point.rt.x,point.rt.y);	//右上角
			var C = lf_objs.wallIn.quote(point.rb.x,point.rb.y);	//右下角
			var D = lf_objs.wallIn.quote(point.lb.x,point.lb.y);	//左下角

				
			if(A>=0 && style2ToWall(A))
				return A;

			if(B>=0 && style2ToWall(B))
				return B;

			if(C>=0 && style2ToWall(C))
				return C;

			if(D>=0 && style2ToWall(D))
				return D;

			function style2ToWall(i){
				var ixFrom = i == 0 ? lf_objs.wallIn.num-1 : i-1;
				var ix = i;
				var walls = lf_objs.wallIn.walls;

				var ixFromLast = walls[ixFrom].x.length-1
				var ixFromBevel = Math.round(all_fn.bevel(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[ixFromLast-1],walls[ixFrom].y[ixFromLast-1]));

				var ixLast = walls[ix].x.length-1
				var ixBevel = Math.round(all_fn.bevel(walls[ix].x[0],walls[ix].y[0],walls[ix].x[1],walls[ix].y[1]));

				return ixFromBevel>=lf_objs.doorIn.length&&ixBevel>=lf_objs.doorIn.length?true:false;
			}


		}else{
			var A = lf_objs.wallIn.check(point.lt.x,point.lt.y);	//左上角
			var B = lf_objs.wallIn.check(point.rt.x,point.rt.y);	//右上角
			var C = lf_objs.wallIn.check(point.rb.x,point.rb.y);	//右下角
			var D = lf_objs.wallIn.check(point.lb.x,point.lb.y);	//左下角

			if(A&&B&&getWallAngle(A)==0){
				return {i:A,point:{x:point.lt.x,y:point.lt.y}};
			}

			if(B&&C&&getWallAngle(B)==90){
				return {i:B,point:{x:point.rt.x,y:point.rt.y}};
			}

			if(C&&D&&getWallAngle(C)==180){
				return {i:C,point:{x:point.rb.x,y:point.rb.y}};
			}

			if(D&&A&&getWallAngle(D)==270){
				return {i:D,point:{x:point.lb.x,y:point.lb.y}};
			}

			if(A&&getWallAngle(A)>270&&getWallBevel(A,point.lt))
				return {i:A,point:{x:point.lt.x,y:point.lt.y}};
			if(B&&getWallAngle(B)>0&&getWallAngle(B)<90&&getWallBevel(B,point.rt))
				return {i:B,point:{x:point.rt.x,y:point.rt.y}};
			if(C&&getWallAngle(C)>90&&getWallAngle(C)<180&&getWallBevel(C,point.rb))
				return {i:C,point:{x:point.rb.x,y:point.rb.y}};
			if(D&&getWallAngle(D)>180&&getWallAngle(D)<270&&getWallBevel(D,point.lb))
				return {i:D,point:{x:point.lb.x,y:point.lb.y}};
		}


		function getWallAngle(i){
			var walls = toWall(i);
			var angle = all_fn.getAngle(walls.sx,walls.sy,walls.nx,walls.ny);
			return angle;
		}

		function getWallBevel(i,point){
			var walls = toWall(i);
			var b = Math.round(all_fn.bevel(walls.sx,walls.sy,walls.nx,walls.ny));
			if(b < lf.config.door.length)
				return false;
			var to = Math.round(all_fn.bevel(walls.sx,walls.sy,point.x,point.y));
			return (b-to) > lf.config.door.length ? true : false;
		}

		function toWall(i){
			var sx = lf_objs.wallIn.walls[i[0]].x[i[1]],
				sy = lf_objs.wallIn.walls[i[0]].y[i[1]],
				nx = lf_objs.wallIn.walls[i[0]].x[i[1]+1],
				ny = lf_objs.wallIn.walls[i[0]].y[i[1]+1];
			return {sx:sx,sy:sy,nx:nx,ny:ny};
		}

	},	// checkOkDoor结束标签

	// 放置门窗
	placeDoor:function(i,style,w){
		// 如果style为2(转角飘窗)或为8(转角窗)，进行下面代码添加门窗
		if(style == 2 || style == 8){
			// 将ixFrom指向找到的墙体左边的端点的前一个端点
			var ixFrom = i == 0 ? lf_objs.wallIn.num-1 : i-1;
			// 将ixFrom指向找到的墙体左边的端点
			var ix = i;
			// 将walls指向墙体数组
			var walls = lf_objs.wallIn.walls;

			// 定义attr变量用于放置添加的门窗参数属性
			var attr = {};
			attr.height = 1800;						// 高度
			attr.feet =	400;						// 离地高
			if(style == 2)
				attr.depth = lf_objs.doorIn.length*0.4;	// 飘出深度
			attr.leftW = w;		// 左边宽度
			attr.rightW = w;	// 右边宽度	

			// 添加门窗对象
			lf_objs.doorIn.c.push([ixFrom,ix]);
			lf_objs.doorIn.s.push(style);
			lf_objs.doorIn.attr.push(attr);
			lf_objs.doorIn.num++;

			// 更新同一面墙的数组,解决在前面插入门时端点错乱问题
			for(var j=0;j<lf_objs.doorIn.num-1;j++)
				if(lf_objs.doorIn.c[j][0]==ix && lf_objs.doorIn.c[j][1]>=1 && lf_objs.doorIn.s[j] != 2 && lf_objs.doorIn.s[j] != 8)
					lf_objs.doorIn.c[j][1]+=2;

			// 左边的墙
			var ixFromLast = walls[ixFrom].x.length-1
			var ixFromAngle = all_fn.getAngle(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],walls[ixFrom].x[0],walls[ixFrom].y[0]);
			var ixFromCoor = all_fn.coor(walls[ixFrom].x[ixFromLast],walls[ixFrom].y[ixFromLast],ixFromAngle,w);

			//将门接触墙的两边坐标插入数组
			walls[ixFrom].x.splice(ixFromLast,0,ixFromCoor.x,walls[ixFrom].x[ixFromLast]);
			walls[ixFrom].y.splice(ixFromLast,0,ixFromCoor.y,walls[ixFrom].y[ixFromLast]);
			walls[ixFrom].w.splice(ixFromLast,1,attr.leftW,1,1);

			// 右边的墙
			var ixLast = walls[ix].x.length-1
			var ixAngle = all_fn.getAngle(walls[ix].x[0],walls[ix].y[0],walls[ix].x[ixLast],walls[ix].y[ixLast]);
			var ixCoor = all_fn.coor(walls[ix].x[0],walls[ix].y[0],ixAngle,w);

			//将门接触墙的两边坐标插入数组
			walls[ix].x.splice(1,0,walls[ix].x[0],ixCoor.x);
			walls[ix].y.splice(1,0,walls[ix].y[0],ixCoor.y);
			walls[ix].w.splice(0,1,1,attr.rightW,0);

		}else{
			// lf_objs.wallIn.walls[i.i[0]].x[i.i[1]] 代表第几个walls数组里第几个点
			// i.i[0]代表第几个walls数组，i.i[1]代表第几个点
			var sx = lf_objs.wallIn.walls[i.i[0]].x[i.i[1]],
				sy = lf_objs.wallIn.walls[i.i[0]].y[i.i[1]],
				nx = lf_objs.wallIn.walls[i.i[0]].x[i.i[1]+1],
				ny = lf_objs.wallIn.walls[i.i[0]].y[i.i[1]+1];
			
			var angle = all_fn.getAngle(sx,sy,nx,ny);
			var cur = Math.round(all_fn.bevel(sx,sy,i.point.x,i.point.y));
			// 门接触墙左边的坐标
			var c = all_fn.coor(sx,sy,angle,cur);
			// 门接触墙右边的坐标
			var c0 = all_fn.coor(c.x,c.y,angle,w);

			var attr = {};
			switch(style){
				case 0: //门
					attr.direction = 0;	//门的方向(左右)
					attr.around = 0;	//门的朝向(内外)
					attr.height = 2000;	//门的高度
					attr.width = w;
					break;

				case 1: //飘窗
					attr.height = 1800;		// 高度
					attr.width = w;			// 宽度
					attr.feet =	400;		// 离地高
					attr.depth = w*0.4;		// 飘出深度
					attr.radius = 90;		// 侧边角度
					break;

				case 3: //普通窗
					attr.height = 1200;		// 高度
					attr.width = w;			// 宽度
					attr.feet =	400;		// 离地高
					break;

				case 4: //阳台门
					attr.height = 2000;		// 高度
					attr.width = w;			// 宽度
					break;

				case 5: //柱
					attr.height = 400;		// 高度
					attr.width = w;			// 宽度
					break;

				case 6: //梁
					attr.width = w;			// 宽度
					attr.metope = 1252;		// 离墙距离
					attr.feet =	2600;		// 离地高
					break;

				case 7: //墙洞
					attr.width = w;			// 宽度
					attr.height = 2100;		// 高度
					attr.feet =	0;			// 离地高
					break;

				case 9: //双开门
					attr.width = w;			// 宽度
					attr.height = 2000;		// 高度
					break;

				case 10: //推拉门
					attr.width = w;			// 宽度
					attr.height = 2000;		// 高度
					break;

				case 11: //折叠门
					attr.width = w;			// 宽度
					attr.height = 2000;		// 高度
					break;

				default: break;
			}

			// 创建一个门
			i.i[1]+=1;
			lf_objs.doorIn.c.push(i.i);
			lf_objs.doorIn.s.push(style);
			lf_objs.doorIn.attr.push(attr);
			lf_objs.doorIn.num++;

			//将门接触墙的两边坐标插入数组
			lf_objs.wallIn.walls[i.i[0]].x.splice(i.i[1],0,c.x,c0.x);
			lf_objs.wallIn.walls[i.i[0]].y.splice(i.i[1],0,c.y,c0.y);
			lf_objs.wallIn.walls[i.i[0]].w.splice(i.i[1],0,0,0);

			// 更新同一面墙的数组,解决在前面插入门时端点错乱问题
			for(var j=0;j<lf_objs.doorIn.num-1;j++)
				if(lf_objs.doorIn.c[j][0]==i.i[0] && lf_objs.doorIn.c[j][1]>=i.i[1] && lf_objs.doorIn.s[j] != 2 && lf_objs.doorIn.s[j] != 8)
					lf_objs.doorIn.c[j][1]+=2;
		}

		curObj.obj = lf_objs.doorIn;
		curObj.i = lf_objs.doorIn.num-1;
		lf.allDarw();

	},	// placeDoor结束标签


// ------------		分割线		(↑上面是门窗事件部分，↓下面是墙体事件部分)		------------------------------
	// 墙体事件集
	wallEvent:function(){
		// 如果当前为量尺阶段，则将底部工具初始化到天花高度
		if(lf.config.procedure == 2){
			lf.procedure_show();
			lf.btn_show("#lf_move")

			$("#procedure2 .parm").css("display","none");
			$("#lf_tool_ceiling").css("display","inline");

		}

		// 从无到有，绘制第一面墙
		if(lf_objs.wallIn.num == 0){
			lf.oneWall();
			return true;
		}

		// 延伸墙体及选中
		var h = lf.addWall();
		if(h) return h;
	},

	// 从无到有，绘制第一面墙
	oneWall:function(){
		var event = event || window.event;
		event.preventDefault();

		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}

		// 计算鼠标在画布内的坐标，赋给临时参考线对象，用于画参考线
		var tempCC = lf.windowToCanvas(Cx,Cy);
		lf.tempObj.sx = tempCC.x;
		lf.tempObj.sy = tempCC.y;
		lf.tempObj.nx = tempCC.x;
		lf.tempObj.ny = tempCC.y;
		var addOk = false;

		// 绑定移动事件
		// $(can1).on("mousemove",canvasMove);
		$(can1).on("touchmove",canvasMove);

		// 绑定松开事件
		// $(can1).on("mouseup",canvasUp);
		$(can1).on("touchend",canvasUp);


		// 移动事件
		function canvasMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}

			var tempMC = lf.windowToCanvas(Mx,My);
			lf.tempObj.nx = tempMC.x;
			lf.tempObj.ny = tempMC.y;


			if(Math.abs(lf.tempObj.sx-lf.tempObj.nx)<40)
				lf.tempObj.nx = lf.tempObj.sx;
			if(Math.abs(lf.tempObj.sy-lf.tempObj.ny)<40)
				lf.tempObj.ny = lf.tempObj.sy;


			if(all_fn.bevel(lf.tempObj.sx,lf.tempObj.sy,lf.tempObj.nx,lf.tempObj.ny) > 30 && !addOk){
				addOk = !addOk;
			}

			lf.allDarw();

		} // canvasMove结束标签



		// 松开事件
		function canvasUp(){
			var event = event || window.event;
			event.preventDefault();
			
			// 如果addOk为true，并通过lf.origin判断不是在原地，而添加墙体端点
			if(addOk && !lf.origin()){
				lf_objs.wallIn.dot.x.push(lf.tempObj.sx);
				lf_objs.wallIn.dot.y.push(lf.tempObj.sy);
				lf_objs.wallIn.num++;
				lf_objs.wallIn.dot.x.push(lf.tempObj.nx);
				lf_objs.wallIn.dot.y.push(lf.tempObj.ny);
				lf_objs.wallIn.num++;
			}

			lf.tempObj = {sx:0,sy:0,nx:0,ny:0,color:"#666"};
			lf.allDarw();
			lf.offEvent();

		} // canvasUp结束标签

	}, // oneWall结束标签

	// 延伸墙体及选中
	addWall:function(){

		// noCheck为true则没有找到墙体，addOk为false则不可以添加
		var noCheck=true;
		var addOk = false;

		var event = event || window.event;
		event.preventDefault();

		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		// 计算鼠标在画布内的坐标
		var tempCC = lf.windowToCanvas(Cx,Cy);

		if(lf_objs.wallIn.close){
			
			// 当闭合时，只查找墙段，没有两边的圆点
			var temp = lf_objs.wallIn.check(tempCC.x,tempCC.y);
			
			switch(typeof temp){
				case "object":
					lf.seletWall(temp);
					return true;
//					break;
				
				case "number":
					var dotX = tempCC.x - lf_objs.wallIn.dot.x[temp];
					var dotY = tempCC.y - lf_objs.wallIn.dot.y[temp];
					
					// 如果点击到的是端点，而可拖动大小
					$(can1).on("touchmove",wallSizeTo);
					$(can1).on("touchend",lf.offEvent);
					return true;
					
				default:break;
			}
			

			
		}else{
			
			// 这里是没闭合时，查找到尾部就可以拖动，松开鼠标时判断能否添加墙体
			var temp = lf_objs.wallIn.check(tempCC.x,tempCC.y);
			
			if(temp == "s"){			// 第一个端点的时候，暂时用不上了
//				noCheck = !noCheck;
			}else if(temp == "n"){		// 选中最后一个端点的时候，将最后一个端点的坐标赋值给临时对象
				noCheck = !noCheck;
				lf.tempObj.sx = lf_objs.wallIn.dot.x[lf_objs.wallIn.num-1];
				lf.tempObj.sy = lf_objs.wallIn.dot.y[lf_objs.wallIn.num-1];
				lf.tempObj.nx = lf_objs.wallIn.dot.x[lf_objs.wallIn.num-1];
				lf.tempObj.ny = lf_objs.wallIn.dot.y[lf_objs.wallIn.num-1];
			}else if(temp >= 0){		// 选中其他端点的时候，高亮显示选中端点与下一端点之关的墙体
				lf.seletWall(temp);
				return true;
			}

			if(!noCheck){
				// 绑定移动事件
				// $(can1).on("mousemove",canvasMove);
				$(can1).on("touchmove",canvasMove);

				// 绑定松开事件
				// $(can1).on("mouseup",canvasUp);
				$(can1).on("touchend",canvasUp);
			}
		}

		

		// 选中时的当前对象
		if(noCheck && curObj.obj){
			curObj = {};
			lf.allDarw();
		}

		if(!noCheck)
			return true;

		// 移动事件
		function canvasMove(){
			var event = event || window.event;
			event.preventDefault();

			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}

			// 计算鼠标在画布内的坐标
			var tempMC = lf.windowToCanvas(Mx,My);
			// 将sorp指向吸附距离(距离小于多少自动吸附);
			var sorp = lf.config.sorption;

			// temp为检测到的对象，s为第一个端点，n为最后一个端点
			switch(temp){
				case "s":
					// if(Math.abs(Bx-x)<sorp)
					// 	Bx = x;
					// if(Math.abs(By-y)<sorp)
					// 	By = y;

					// lf_objs.wallIn.dot.x[0] = Bx;
					// lf_objs.wallIn.dot.y[0] = By;
					break;

				case "n":
					lf.tempObj.nx = tempMC.x;
					lf.tempObj.ny = tempMC.y;

					// 这里是判断临时参考线的起点与终点在一定的垂直、水平线上吸附
					if(Math.abs(lf.tempObj.sx-lf.tempObj.nx)<sorp)
						lf.tempObj.nx = lf.tempObj.sx;
					if(Math.abs(lf.tempObj.sy-lf.tempObj.ny)<sorp)
						lf.tempObj.ny = lf.tempObj.sy;

					// 这里是判断临时参考线的终点与墙体头部在一定的垂直、水平线上吸附
					if(Math.abs(lf_objs.wallIn.dot.x[0]-lf.tempObj.nx)<sorp+10)
						lf.tempObj.nx = lf_objs.wallIn.dot.x[0];
					if(Math.abs(lf_objs.wallIn.dot.y[0]-lf.tempObj.ny)<sorp+10)
						lf.tempObj.ny = lf_objs.wallIn.dot.y[0];


					// 这里判断参考线拖动的距离达到30就可以添加墙体
					if(all_fn.bevel(lf.tempObj.sx,lf.tempObj.sy,lf.tempObj.nx,lf.tempObj.ny) > 30 && !addOk){
						addOk = !addOk;
					}

					// 判断参考线与最后一段墙体是否在同一条线上
					lf.tempObj.color = lf.direction(lf_objs.wallIn.num-1) ? "red" : "#666";

					break;


				default:
					break; 
			}

			lf.allDarw();

		} // canvasMove结束标签


		// 松开事件
		function canvasUp(){
			// 阻止默认事件
			event.preventDefault();

			// addOK成立时，添加墙体或改变墙体
			if(addOk)
				// 判断参考线是否在原地或与最后一段墙体水平，是就改变最后一段墙体的坐标
				if(lf.direction(lf_objs.wallIn.num-1) || lf.origin()){
					lf_objs.wallIn.dot.x[lf_objs.wallIn.num-1] = lf.tempObj.nx;
					lf_objs.wallIn.dot.y[lf_objs.wallIn.num-1] = lf.tempObj.ny;
				}else{
					// 判断参考线是否与之前的墙体相交，或墙体已闭合。如果没相交也没闭合。则添加一个端点绘制墙体
					if(!lf.inters() && !lf_objs.wallIn.close){
						lf_objs.wallIn.dot.x.push(lf.tempObj.nx);
						lf_objs.wallIn.dot.y.push(lf.tempObj.ny);
						lf_objs.wallIn.num++;
					}
				}

			lf.tempObj = {sx:0,sy:0,nx:0,ny:0,color:"#666"};
			lf.allDarw();
			lf.offEvent();
		}
		
		function wallSizeTo(){

			var event = event || window.event;
			event.preventDefault();

			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}

			// 计算鼠标在画布内的坐标
			var tempMC = lf.windowToCanvas(Mx,My);
			
			// 将dots指向墙体基础端点数组
			var dots =  lf_objs.wallIn.dot;
			// 将ixForm指向选中的墙体左边的端点序号
			var ixFrom = temp==0?lf_objs.wallIn.num-1:temp-1;
			// 将ix指向选中墙体的右边端点序号
			var ix = temp;
			// 将ixTo指向选中端点的右边的下一个端点的序号
			var ixTo = temp==lf_objs.wallIn.num-1?0:temp+1;

			var goCoor = {x:tempMC.x - dotX,y:tempMC.y - dotY};


			// 改变总长时，相应的要改变与这段墙体端点的X或Y坐标相同的坐标，注：改变总长，改变的是墙体右边的端点坐标
			// 如果左端点的x等于右端点的x，则改变该x为改变后的x
			if(dots.x[ixFrom] == dots.x[ix])
				dots.x[ixFrom] = goCoor.x;
		

			// 如果左端点的y等于右端点的y，则改变该y为改变后的y
			if(dots.y[ixFrom] == dots.y[ix])
				dots.y[ixFrom] = goCoor.y;
		

			// 如果下一个端点的x等于右端点的x，则改变该x为改变后的x
			if(dots.x[ixTo] == dots.x[ix])
				dots.x[ixTo] = goCoor.x;
		

			// 如果下一个端点的y等于右端点的y，则改变该y为改变后的y
			if(dots.y[ixTo] == dots.y[ix])
				dots.y[ixTo] = goCoor.y;
			
			
			// 更新选中墙右边的端点坐标
			dots.x[ix] = goCoor.x;
			dots.y[ix] = goCoor.y;



			curObj={};
			// 重新计算所有墙体端点与墙段数组的角度与坐标，进行更新
			lf_objs.wallIn.upData();
			lf.allDarw();
		}

	}, // addWall结束标签

	// 选择墙体
	seletWall:function(i){
		curObj.obj = lf_objs.wallIn;
		curObj.i = i;
		lf.allDarw();

		// 将墙体工具隐藏，然后显示墙段设置，墙体总长工具
		$("#procedure2 .parm").css("display","none");
		$("#lf_tool_wallSize").css("display","inline");
		$("#lf_tool_wallLong").css("display","inline");
	},


// ------------		分割线		(↑上面是墙体事件部分，↓下面是移动事件部分)		------------------------------
	// 移动画布事件
	moveEvent:function(){
		// 如果墙体没闭合，不能移动画面
		if(!lf_objs.wallIn.close)
			return;
		
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		// 只用于两指缩放
		if(event.type == "touchstart" && event.touches.length >= 2){
			var Ctox = event.touches[1].pageX;
			var Ctoy = event.touches[1].pageY;
			var CBevel = all_fn.bevel(Cx,Cy,Ctox,Ctoy);
		}
		


		// 绑定移动事件
		// $(can1).on("mousemove",canvasMove);
		$(can1).on("touchmove",canvasMove);

		// 绑定松开事件
		// $(can1).on("mouseup",lf.offEvent);
		$(can1).on("touchend",lf.offEvent);

		function canvasMove(){
			var event = event || window.event;
			event.preventDefault();
			
			if(event.type == "touchmove"){
				var Mx = event.touches[0].pageX;
				var My = event.touches[0].pageY;
			}else{
				var Mx = event.pageX;
				var My = event.pageY;
			}
			
			// 做两指缩放功能
			if(event.type == "touchmove" && event.touches.length >= 2){
				var Mtox = event.touches[1].pageX;
				var Mtoy = event.touches[1].pageY;
				var MBevel = all_fn.bevel(Mx,My,Mtox,Mtoy);
				
				var num = Math.abs(MBevel-CBevel)>15?0.03:0.02;
				if(MBevel<CBevel){
					ctx1.scale(1-num,1-num);
				}else{
					ctx1.scale(1+num,1+num);
				}
				
				lf.allDarw();
				CBevel = MBevel;
				
				return;
			}
			

			ctx1.translate(Math.round(Mx-Cx),Math.round(My-Cy));
			lf.allDarw();

			Cx = Mx;
			Cy = My;

		}

	},

// ------------		分割线		(↑上面是移动事件部分，↓下面是**功能部分)		------------------------------

	




} // lf结束标签



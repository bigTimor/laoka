var ssl = {
	// 参数、数据
	data:{
		tools_state:0,	//直线工具被选中状态，0为不选中，1为选中。用于创建直线工具
		sx:0,			//临时坐标，用于存放选中的直线的起点X坐标与鼠标的偏差
		sy:0,			//临时坐标，用于存放选中的直线的起点y坐标与鼠标的偏差
		nx:0,			//临时坐标，用于存放选中的直线的终点X坐标与鼠标的偏差
		ny:0,			//临时坐标，用于存放选中的直线的终点y坐标与鼠标的偏差

	},
	
	// 初始化
	init:function(){
		
		// 获得canvas上下文
		can2 = document.getElementById('canvas2');
		
		can2.width = windoWidth;
		can2.height = windoHeight-parseInt($("#ssl_tools").css("height"));

		$("#canvas2Bg").css({"width":can2.width,"height":can2.height});


		ctx2 = can2.getContext("2d");
		ctx2.strokeStyle = "red";
		ctx2.lineWidth  = 2;
		ctx2.font=" bold 14px Arial";
		ctx2.textAlign = "center";
		ctx2.textBaseline = "middle";
		

		// 初始化直线对象
		ssl_objs.lineIn = new lineObj();
		
		// 初始化文字对象
		ssl_objs.textIn = new textObj();

		// 绘制对象
		this.allDarw();


		// 给直线工具绑定点击事件
		$("#tools_line").on("touchstart",this.tools_line_sele);

		// 给加字工具绑定点击事件
		$("#tools_text").on("touchstart",this.tools_text_sele);

		// 给画布绑定鼠标按下事件
		can2.addEventListener("touchstart",this.can2Mousedown);


		// 给保存按钮绑定点击事件
		$("#ssl_edit>.icoFont-ok").on("touchstart",ssl.saveText);


		// 给删除按钮绑定事件
		$("#ssl_edit>.icoFont-trash").on("touchstart",ssl.dellLine);
		

		// //给保存工具绑定事件
		// $("#tools_addS").on("touchstart",ssl.saveData);

		// //给打开工具绑定事件
		// $("#tools_addO").on("touchstart",ssl.openData);
		


		// 给删除按钮绑定事件
		$("#ssl_edit>.ssl_text").on("touchstart",function(){
			all_fn.noUpDefault();
			this.focus();
		});
		
	},
	
	// 二次初始化
	goin:function(){
		
		// 初始化活动对象
		curObj={};
		
		// 清空
		ssl_objs.lineIn.empty();
		ssl_objs.textIn.empty();

	},

	//绘出存在的对象
	allDarw:function(){
		// 清空画布
		ctx2.clearRect(0,0,can2.width,can2.height);
		
		// 绘出所有对象
		for(var i in ssl_objs)
			ssl_objs[i].darw();

		if(curObj.obj)
			curObj.obj.alive(curObj.i);
		

	},

	//直线工具点击事件
	tools_line_sele:function(){
		ssl.data.tools_state = 1;
		$("#tools_line").css("background","#c6f0f0").siblings().css("background","none");
	},

	//文本工具点击事件
	tools_text_sele:function(){
		ssl.data.tools_state = 2;
		$("#tools_text").css("background","#c6f0f0").siblings().css("background","none");
	},

	// 画面按下事件
	can2Mousedown:function(){
		if(ssl.data.tools_state == 1){
			ssl.addLine();
		}else if(ssl.data.tools_state == 2){
			ssl.addText();
		}else{
			ssl.moveGo();
		}
	},

	// 添加直线
	addLine:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		var tempCC = ssl.windowToCanvas(Cx,Cy);
		var addOk = false;

		// 绑定移动事件
		// $(can2).on("mousemove",canvasMove);
		$(can2).on("touchmove",canvasMove);

		// 绑定松开事件
		// $(can2).on("mouseup",canvasUp);
		$(can2).on("touchend",canvasUp);

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
			
			var tempMC = ssl.windowToCanvas(Mx,My);

			if(all_fn.bevel(tempCC.x,tempCC.y,tempMC.x,tempMC.y) > 30 && !addOk){
				addOk = !addOk;
				ssl_objs.lineIn.sx.push(tempCC.x);
				ssl_objs.lineIn.sy.push(tempCC.y);
				ssl_objs.lineIn.nx.push(tempMC.x);
				ssl_objs.lineIn.ny.push(tempMC.y);
				ssl_objs.lineIn.text.push("");
				ssl_objs.lineIn.num++;
			}
			if(addOk){
				ssl_objs.lineIn.nx[ssl_objs.lineIn.num-1] = tempMC.x;
				ssl_objs.lineIn.ny[ssl_objs.lineIn.num-1] = tempMC.y;
				ssl.allDarw();
			}

		}

		function canvasUp(){
			if(addOk){
				ssl.data.tools_state = 0;
				$("#tools_line").css("background","none");
				// ssl.select(ssl_objs.lineIn.num-1,ssl_objs.lineIn);
			}

			ssl.offEvent();
		}

	},

	// 添加文本
	addText:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		var tempCC = ssl.windowToCanvas(Cx,Cy);

		ssl_objs.textIn.sx.push(tempCC.x);
		ssl_objs.textIn.sy.push(tempCC.y);
		ssl_objs.textIn.text.push("");
		ssl_objs.textIn.num++;

		ssl.allDarw();
		ssl.data.tools_state = 0;
		$("#tools_text").css("background","none");

	},

	// 移动直线
	moveGo:function(){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		var tempCC = ssl.windowToCanvas(Cx,Cy);

		
		var noCheck=true;
		var x = event.pageX-can2.offsetLeft;
		var y = event.pageY-can2.offsetTop;

		if(curObj.obj){
			var temp = curObj.obj.check(curObj.i,tempCC.x,tempCC.y);
			if(temp){
				noCheck = !noCheck;
				ssl.select(curObj.i,curObj.obj);
			}
		}
			
		for(var i=ssl_objs.textIn.num-1;i>=0 && noCheck;i--){
			var temp = ssl_objs.textIn.check(i,tempCC.x,tempCC.y);
			if(temp){
				noCheck=!noCheck;
				ssl.select(i,ssl_objs.textIn);
				break;
			}
		}
		
		for(var i=ssl_objs.lineIn.num-1;i>=0 && noCheck;i--){
			var temp = ssl_objs.lineIn.check(i,tempCC.x,tempCC.y);
			if(temp){
				noCheck=!noCheck;
				ssl.select(i,ssl_objs.lineIn);
				break;
			}
		}

		if(noCheck){
			$("#ssl_items").css("display","block").siblings().css("display","none");
			curObj={};
			ssl.allDarw();
		}


		if(curObj.obj){

			// 绑定移动事件
			// $(can2).on("mousemove",canvasMove);
			$(can2).on("touchmove",canvasMove);

			// 绑定松开事件
			// $(can2).on("mouseup",ssl.offEvent);
			$(can2).on("touchend",ssl.offEvent);

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
				
				var tempMC = ssl.windowToCanvas(Mx,My);

				// 当curObj.obj存在时，代表选中了对象，temp为1选中头部，为2选中身体，为3选中尾部
				// temp为1或3时，头或尾跟着鼠标移动，temp为2时，头尾一起跟着鼠标移动
				switch(temp){
					case 1:
						curObj.obj.sx[curObj.i] = tempMC.x - ssl.data.sx;
						curObj.obj.sy[curObj.i] = tempMC.y - ssl.data.sy;
						break;

					case 2:
						curObj.obj.sx[curObj.i] = tempMC.x - ssl.data.sx;
						curObj.obj.sy[curObj.i] = tempMC.y - ssl.data.sy;
						curObj.obj.nx[curObj.i] = tempMC.x - ssl.data.nx;
						curObj.obj.ny[curObj.i] = tempMC.y - ssl.data.ny;
						break;

					case 3:
						curObj.obj.nx[curObj.i] = tempMC.x - ssl.data.nx;
						curObj.obj.ny[curObj.i] = tempMC.y - ssl.data.ny;
						break;

					default:break;
				}
				ssl.allDarw();
				

			}	// canvasMove结束标签
		}	// if(curObj.obj)结束标签
	},

	// 选中对象
	select:function(i,obj){
		var event = event || window.event;
		event.preventDefault();
		
		if(event.type == "touchstart"){
			var Cx = event.touches[0].pageX;
			var Cy = event.touches[0].pageY;
		}else{
			var Cx = event.pageX;
			var Cy = event.pageY;
		}
		
		var tempCC = ssl.windowToCanvas(Cx,Cy);

		curObj.obj = obj;
		curObj.i = i;
		ssl.data.sx = tempCC.x - curObj.obj.sx[i];
		ssl.data.sy = tempCC.y - curObj.obj.sy[i];
		if(obj == ssl_objs.lineIn){
			ssl.data.nx = tempCC.x - curObj.obj.nx[i];
			ssl.data.ny = tempCC.y - curObj.obj.ny[i];
		}
		ssl.allDarw();
		$("#ssl_edit").css("display","block").siblings().css("display","none");
		ssl.editText(i,obj);
	},

	// input内容
	editText:function(i,obj){
		// console.log(obj);
		if(obj.text[i] != ""){
			$("#ssl_edit>.ssl_text").val(obj.text[i]);
		}else{
			$("#ssl_edit>.ssl_text").val("");
		}
		
	},

	// 保存input内容
	saveText:function(){
		curObj.obj.text[curObj.i] = $("#ssl_edit>.ssl_text").val();
		ssl.allDarw();

	},

	// 删除对象
	dellLine:function(){

		// for(var i = curObj.i;i<curObj.obj.num;i++)
		// 	if(i == curObj.obj.num-1){
		// 		curObj.obj.sx.pop();
		// 		curObj.obj.sy.pop();
		// 		if(curObj.obj == ssl_objs.lineIn){
		// 			console.log("我是ssl_objs.lineIn");
		// 			curObj.obj.nx.pop();
		// 			curObj.obj.ny.pop();
		// 		}
		// 		curObj.obj.text.pop();
		// 		curObj.obj.num--;
		// 	}else{
		// 		curObj.obj.sx[i] = curObj.obj.sx[i+1];
		// 		curObj.obj.sy[i] = curObj.obj.sy[i+1];
		// 		if(curObj.obj == ssl_objs.lineIn){
		// 			curObj.obj.nx[i] = curObj.obj.nx[i+1];
		// 			curObj.obj.ny[i] = curObj.obj.ny[i+1];
		// 		}
		// 		curObj.obj.text[i] = curObj.obj.text[i+1];
		// 	}

		curObj.obj.sx.splice(curObj.i,1);
		curObj.obj.sy.splice(curObj.i,1);
		if(curObj.obj == ssl_objs.lineIn){
			curObj.obj.nx.splice(curObj.i,1);
			curObj.obj.ny.splice(curObj.i,1);
		}
		curObj.obj.text.splice(curObj.i,1);
		curObj.obj.num--;

		
		curObj = {};
		ssl.allDarw();

	},


	saveData:function(){
		if(ssl_objs.lineIn.num == 0 && ssl_objs.textIn.num == 0){
			alert("没有绘制，无需保存！");
		}else{
			var objs = {};
			for(var i in ssl_objs)
				objs[i] = ssl_objs[i];

			var jsonStr = JSON.stringify(objs);
			localStorage.Datas=jsonStr;
			console.log(jsonStr);
			alert("保存成功！");
		}
		
	},

	openData:function(){


		if(localStorage.Datas){
			for(var i in ssl_objs)
				ssl_objs[i].init();
			
			localStorage.removeItem("Datas");
			alert("打开完成，将清空缓存数据，如还需缓存数据，请点击保存。");
		}else{
			alert("没有找到缓存数据！");
		}
	},


	windowToCanvas:function(x,y){
		var canC = can2.getBoundingClientRect();
		return {x:x-canC.left,y:y-canC.top};
	},

	// 取消绑定的移动、松开事件
	offEvent:function(){
		// $(can2).off("mousemove");
		// $(can2).off("mouseup");
		$(can2).off("touchmove");
		$(can2).off("touchend");

		// $(document).off("mousemove");
		// $(document).off("mouseup");
		// $(document).off("touchmove");
		// $(document).off("touchend");
	},



}



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" name="viewport">
	<title>量房宝</title>
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="{{ asset('lf/css/init.css') }}">
	<link rel="stylesheet" href="{{ asset('lf/css/styles.css') }}">
	<script src="{{ asset('lf/js/jquery-1.10.2.js') }}"></script>
	<script src="{{ asset('lf/js/objs.js') }}"></script>
	<script src="{{ asset('lf/js/main.js') }}"></script>
	<script src="{{ asset('lf/js/lf.js') }}"></script>
	<script src="{{ asset('lf/js/lf_wall.js') }}"></script>
	<script src="{{ asset('lf/js/lf_door.js') }}"></script>
	<script src="{{ asset('lf/js/lf_furnit.js') }}"></script>
</head>
<body>
	
	<!-- 欢迎界面 -->
	<div id="selectFN">
		<div id="intoBox">
			<a href="####" id="into_lf">量房</a>
			<a href="####" id="into_ssl">随手量</a>
		</div>
	</div>

	<!-- 量房界面 -->
	<div id="lf">

		<!-- 顶部工具条 -->
		<div id="lf_stage">
			<button id="lf_back" class="btn">&lt;</button>
			<div class="btn-group">
				<button id="stage0" class="btn procedure procedurea">画墙</button>
				<button id="stage1" class="btn procedure">门窗</button>
				<button id="stage2" class="btn procedure">量尺</button>
				<button id="stage3" class="btn procedure">家具</button>
			</div>
			<button id="lf_next" class="btn">下一步</button>
		</div>
		
		<!-- canvas画布 -->
		<div id="canvas1Box">
			<canvas id="canvas1">您的设备不支持绘画</canvas>
		</div>

		<!-- 底部工具栏 -->
		<div class="lf_tools">

			<!-- 第一个阶段的工具 -->
			<div id="lf_tool">

				<!-- 左边工具 -->
				<div class="btn-group">
					<button id="lf_move" class="btn">移动</button>

					<!-- 墙体阶段 -->
					<span id="procedure0" class="btnBox btnBoxa">
						<button class="btn" id="lf_tool_rect">矩形</button>
						<button class="btn" id="lf_tool_polygon">T形</button>
						<button class="btn btna" id="lf_tool_custom">手动</button>
						<button class="btn" id="lf_tool_empty">清空</button>
						<button class="btn">录音</button>
						<button class="btn">图片</button>
						<button class="btn" id="lf_tool_annul">撤销</button>
					</span>

					<!-- 门窗阶段 -->
					<span id="procedure1" class="btnBox">
						<button class="btn" id="lf_tool_insertDoor">插入门窗</button>
						<button class="btn">录音</button>
						<button class="btn">图片</button>
					</span>

					<!-- 量尺阶段 -->
					<span id="procedure2" class="btnBox">
						<button class="btn parm" id="lf_tool_ceiling">天花高</button>
						<button class="btn parm" id="lf_tool_parm">参数设置</button>
						<button class="btn parm" id="lf_tool_wallSize">墙体尺寸</button>
						<button class="btn parm" id="lf_tool_wallLong">墙体总长</button>
						<button class="btn">录音</button>
						<button class="btn">图片</button>
					</span>

					<!-- 家具阶段 -->
					<span id="procedure3" class="btnBox">
						<button class="btn" id="lf_tool_insertFurnit">插入家具</button>
						<button class="btn">推荐方案</button>
						<button class="btn">录音</button>
						<button class="btn">图片</button>
						<button class="btn">尺子</button>
						<button class="btn" id="lf_tool_emptyFurnit">清空</button>
					</span>
				</div>

				<!-- 右边工具 -->
				<div class="btnGroup">
					<button class="btn" id="lf_tool_mediacy">居中</button>
					<button class="btn" id="lf_tools_ruler">标尺</button>
					<button class="btn" id="lf_tools_big">+</button>
					<button class="btn" id="lf_tools_Small">-</button>
				</div>

			</div>	<!-- id="lf_tool"结束标签 -->

			<!-- 插入门窗弹出框 -->
			<div id="lf_tools_doors">
				<i id="lf_tools_doors_arrow"></i>
				<span id="lf_tools_PTC" class="tools">普通窗</span>
				<span id="lf_tools_PC" class="tools">漂窗</span>
				<span id="lf_tools_DKM" class="tools">单开门</span>
				<span id="lf_tools_YTM" class="tools">阳台门</span>
				<span id="lf_tools_Z" class="tools">柱</span>
				<span id="lf_tools_L" class="tools">梁</span>
				<span id="lf_tools_QD" class="tools">墙洞</span>
				<span id="lf_tools_ZJC" class="tools">转角窗</span>
				<span id="lf_tools_ZJPC" class="tools">转角漂窗</span>
				<span id="lf_tools_SKM" class="tools">双开门</span>
				<span id="lf_tools_TLM" class="tools">推拉门</span>
				<span id="lf_tools_ZDM" class="tools">折叠门</span>
			</div>

			<!-- 底部工具的弹出菜单 -->
			<div id="lf_tools_furnits">
				<p>插入家具</p>
				<div id="lf_tools_furnits_box">
					<span id="lf_tools_WNTB" class="tools">万能图标</span>
					<span id="lf_tools_YMWC" class="tools">1.5米床</span>
					<span id="lf_tools_YMBC" class="tools">1.8米床</span>
					<span id="lf_tools_DYG" class="tools">大衣柜</span>
					<span id="lf_tools_DYHYG" class="tools">大圆弧衣柜</span>
					<span id="lf_tools_DYHYG2" class="tools">大圆弧衣柜2</span >
					<span id="lf_tools_CTG" class="tools">床头柜</span >
					<span id="lf_tools_SZT" class="tools">梳妆台</span >
					<span id="lf_tools_SZ" class="tools">书桌</span >
					<span id="lf_tools_SG" class="tools">书柜</span >
					<span id="lf_tools_DSG" class="tools">电视柜</span >
					<span id="lf_tools_YJ" class="tools">衣架</span >
				</div>
			</div>			

		</div> <!-- class="lf_tools" 结束标签 -->

		<div id="popupUI">

			<div id="furnit_popup" class="popupBox">
				<p class="popupName">家具</p>
				<div class="popup_box">

					<div id="furnit_btn">
						<button id="furnit_btn_turn" class="popup_btn">旋转</button>
						<button id="furnit_btn_del" class="popup_btn">删除</button>
					</div>

					<hr>

					<div id="furnit_content">
						<p class="popup_content_box">
							<span class="inPopup popup_name">家具名：</span>
							<input type="text" id="furnit_popup_n" class="inPopup popup_text">
							<span class="inPopup popup_unit">mm</span>
						</p>
						<p class="popup_content_box">
							<span class="inPopup popup_name">长：</span>
							<input type="text" id="furnit_popup_l" class="inPopup popup_text">
							<span class="inPopup popup_unit">mm</span>
						</p>
						<p class="popup_content_box">
							<span class="inPopup popup_name">宽：</span>
							<input type="text" id="furnit_popup_w" class="inPopup popup_text">
							<span class="inPopup popup_unit">mm</span>
						</p>
					</div>

					<hr>
					<div class="furnit_note_box" id="furnit_berth">
						<span class="furnit_note">停靠：</span>
						<span id="furnit_berth_btn">
							<i id="furnit_berth_btn_dot"></i>
						</span>
					</div>

					<hr>
					<div class="furnit_note_box">
						<span class="furnit_note">造型款式：</span>
						<input type="text" id="furnit_popup_style" class="popup_text" placeholder="请输入款式">
					</div>

					<hr>
					<div class="furnit_note_box">
						<span class="furnit_note">需求备注：</span>
						<input type="text" id="furnit_popup_note" class="popup_text" placeholder="请输入备注">
					</div>

					<hr>
					<div id="furnit_okno">
						<button id="furnit_popup_no">取消</button>
						<button id="furnit_popup_ok">确定</button>
					</div>

				</div>	<!-- popup_box结束标签 -->
			</div>	<!-- furnit_popup结束标签 -->

			<div id="door_popup" class="popupBox">
				<p class="popupName" id="door_popup_name">门窗</p>
				<div class="popup_box">
					<div id="door_popup_content"></div>
					<div id="door_okBox">
						<button class="popup_finder">测距仪录入</button>
						<button class="popup_ok" id="door_popup_ok">确定</button>
					</div>
				</div>
			</div>	<!-- door_popup结束标签 -->

			<div id="wall_popup" class="popupBox">
				<p class="popupName" id="wall_popup_name">墙体</p>
				<div class="popup_box">
					<div id="wall_popup_content">
						<p class="popup_content_box">
							<span class="inPopup popup_name">尺寸：</span>
							<input type="number" class="inPopup popup_text popup_number" min="10" id="wall_popup_size">
							<span class="inPopup popup_unit">mm</span>
						</p>
						<p class="popup_content_box">
							<span class="inPopup popup_name">面积：</span>
							<input type="number" class="inPopup popup_text popup_number" min="10" id="wall_popup_area">
							<span class="inPopup popup_unit">m<sup>2</sup></span>
						</p>
						<p class="popup_content_box">
							<span class="inPopup popup_name">天花高度：</span>
							<input type="number" class="inPopup popup_text popup_number" min="10" id="wall_popup_ceiling">
							<span class="inPopup popup_unit">mm</span>
						</p>
					</div>
					<div id="wall_okBox">
						<button class="popup_finder">测距仪录入</button>
						<button class="popup_ok" id="wall_popup_ok">确定</button>
					</div>
				</div>
			</div>	<!-- door_popup结束标签 -->


		</div>	<!-- popupUI结束标签 -->


	</div> <!-- id="lf" 结束标签 -->

	
</body>
</html>
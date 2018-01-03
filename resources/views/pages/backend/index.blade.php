@extends('master')

@section('content')				
<!--//area-->

<!-- pie-chart -->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#demo-pie-1').pieChart({
	        barColor: '#3bb2d0',
	        trackColor: '#eee',
	        lineCap: 'round',
	        lineWidth: 8,
	        onStep: function (from, to, percent) {
	            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
	        }
	    });

	    $('#demo-pie-2').pieChart({
	        barColor: '#fbb03b',
	        trackColor: '#eee',
	        lineCap: 'butt',
	        lineWidth: 8,
	        onStep: function (from, to, percent) {
	            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
	        }
	    });

	    $('#demo-pie-3').pieChart({
	        barColor: '#ed6498',
	        trackColor: '#eee',
	        lineCap: 'square',
	        lineWidth: 8,
	        onStep: function (from, to, percent) {
	            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
	        }
	    });
	});
</script>
<div class="col-md-5 skil">
	@include('partials.statistics')
</div> 
<div class="col-md-7 mid-content-top">
	@include('partials.latest-products')
</div>
<div class="clearfix"></div>

<div class="content-top">
	<div class="col-md-6 content-top-lft">
		<div class="panel panel-widget">
			<div class="panel-title">
			  Real Time Updates				 
			</div>
			<div class="panel-body">
				<div class="demo-container">
					<div id="placeholder" class="demo-placeholder"></div>
				</div>
				<p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
			</div>
		</div>
	</div>

	<div class="col-md-6 content-top-2">
		<!---start-chart---->
		<!----->
		<div class="content-graph">
			<div class="content-color">
				<div class="content-ch"><p><i></i>Chrome </p><span>100%</span>
				<div class="clearfix"> </div>
				</div>
				<div class="content-ch1"><p><i></i>Safari</p><span> 50%</span>
				<div class="clearfix"> </div>
				</div>
			</div>
		<!--graph-->
		<link rel="stylesheet" href="css/graph.css">
		<!--//graph-->
		<script src="js/jquery.flot.js"></script>

		<script>
			$(document).ready(function () {
			
				// Graph Data ##############################################
				var graphData = [{
						// Visits
						data: [ [6, 1300], [7, 1600], [8, 1900], [9, 2100], [10, 2500], [11, 2200], [12, 2000], [13, 1950], [14, 1900], [15, 2000] ],
						color: '#999999'
					}, {
						// Returning Visits
						data: [ [6, 500], [7, 600], [8, 550], [9, 600], [10, 800], [11, 900], [12, 800], [13, 850], [14, 830], [15, 1000] ],
						color: '#999999',
						points: { radius: 4, fillColor: '#7f8c8d' }
					}
				];
			
				// Lines Graph #############################################
				$.plot($('#graph-lines'), graphData, {
					series: {
						points: {
							show: true,
							radius: 5
						},
						lines: {
							show: true
						},
						shadowSize: 0
					},
					grid: {
						color: '#7f8c8d',
						borderColor: 'transparent',
						borderWidth: 20,
						hoverable: true
					},
					xaxis: {
						tickColor: 'transparent',
						tickDecimals: 2
					},
					yaxis: {
						tickSize: 1000
					}
				});
			
				// Bars Graph ##############################################
				$.plot($('#graph-bars'), graphData, {
					series: {
						bars: {
							show: true,
							barWidth: .9,
							align: 'center'
						},
						shadowSize: 0
					},
					grid: {
						color: '#7f8c8d',
						borderColor: 'transparent',
						borderWidth: 20,
						hoverable: true
					},
					xaxis: {
						tickColor: 'transparent',
						tickDecimals: 2
					},
					yaxis: {
						tickSize: 1000
					}
				});
			
				// Graph Toggle ############################################
				$('#graph-bars').hide();
			
				$('#lines').on('click', function (e) {
					$('#bars').removeClass('active');
					$('#graph-bars').fadeOut();
					$(this).addClass('active');
					$('#graph-lines').fadeIn();
					e.preventDefault();
				});
			
				$('#bars').on('click', function (e) {
					$('#lines').removeClass('active');
					$('#graph-lines').fadeOut();
					$(this).addClass('active');
					$('#graph-bars').fadeIn().removeClass('hidden');
					e.preventDefault();
				});
			
				// Tooltip #################################################
				function showTooltip(x, y, contents) {
					$('<div id="tooltip">' + contents + '</div>').css({
						top: y - 16,
						left: x + 20
					}).appendTo('body').fadeIn();
				}
			
				var previousPoint = null;
			
				$('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;
							$('#tooltip').remove();
							var x = item.datapoint[0],
								y = item.datapoint[1];
								showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');
						}
					} else {
						$('#tooltip').remove();
						previousPoint = null;
					}
				});
			
			});
		</script>
		
		<div class="graph-container">								
			<div id="graph-lines" style="padding: 0px;"> <canvas class="flot-base" width="883" height="528" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 883px; height: 528px;"></canvas>
				<div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
					<div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 49px; text-align: center;">6.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 138px; text-align: center;">7.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 225px; text-align: center;">8.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 314px; text-align: center;">9.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 398px; text-align: center;">10.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 489px; text-align: center;">11.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 575px; text-align: center;">12.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 664px; text-align: center;">13.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 752px; text-align: center;">14.00</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 486px; left: 840px; text-align: center;">15.00</div>
					</div>
					<div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
						<div class="flot-tick-label tickLabel" style="position: absolute; top: 470px; left: 51px; text-align: right;">0</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; top: 316px; left: 23px; text-align: right;">1000</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; top: 163px; left: 20px; text-align: right;">2000</div>
						<div class="flot-tick-label tickLabel" style="position: absolute; top: 9px; left: 20px; text-align: right;">3000</div>
					</div>
				</div>

				<canvas class="flot-overlay" width="883" height="528" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 883px; height: 528px;">						
				</canvas>
			</div>
			<div id="graph-bars" style="padding: 0px; display: none;">
				 <canvas class="flot-base" width="883" height="528" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 883px; height: 528px;">								 	
				 </canvas>
				 <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
					 <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 85px; text-align: center;">6.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 166px; text-align: center;">7.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 245px; text-align: center;">8.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 326px; text-align: center;">9.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 402px; text-align: center;">10.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 485px; text-align: center;">11.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 563px; text-align: center;">12.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 644px; text-align: center;">13.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 724px; text-align: center;">14.00
						 </div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 73px; top: 486px; left: 804px; text-align: center;">15.00
						 </div>
					 </div>
					 <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
						 <div class="flot-tick-label tickLabel" style="position: absolute; top: 470px; left: 51px; text-align: right;">0</div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; top: 316px; left: 23px; text-align: right;">1000</div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; top: 163px; left: 20px; text-align: right;">2000</div>
						 <div class="flot-tick-label tickLabel" style="position: absolute; top: 9px; left: 20px; text-align: right;">3000</div>
					 </div>
				 </div>
				 <canvas class="flot-overlay" width="883" height="528" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 883px; height: 528px;">								 	
				 </canvas>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>


<!--area-->					
@include('partials.area')	
<!--//area-->

<div class="fo-top-di">
	@include('partials.join')		
</div>

@include('partials.footer')
@endsection
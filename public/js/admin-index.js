$(document).ready(function() {
	Chart.defaults.global.responsive = true;
	var primary_color = "#A132B7";
	var secondary_color = "#F191B3";
	
	$.ajax({
		url: 'admin/statistic-graph',
        method: 'POST',
        dataType: 'json',
        success: loadGraphPostSuccess,
        error: function(xhr, status, error) {
			console.log(error);
		}
	});
	
	function loadGraphPostSuccess(data, status, xhr) {
		var blogposts_month = data.blogposts_month;
		var imageposts_month = data.imageposts_month;
		var subscriptions_month = data.subscriptions_month;
		console.log(blogposts_month);
		console.log(imageposts_month);
		console.log(subscriptions_month);
		
		var labels = [];
		var plot_data_bp = [];
		var plot_data_ip = [];
		var plot_data_subsc = [];
		var max_y_post = 8;
		var max_y_subsc = 20;
		
		// Blog posts array
		for (var i = 0; i < blogposts_month.length; i++) {
			bp_m = blogposts_month[i];
			labels.push(moment('1-' + bp_m.month + '-' + bp_m.year, 'DD-M-YYYY').format('MMM'));
			plot_data_bp.push(bp_m.count);
			if (bp_m.count > max_y_post) {
				max_y_post = 4 * Math.ceil(bp_m.count/4);
			} 
		}
		
		// Image posts array
		for (var j = 0; j < imageposts_month.length; j++) {
			ip_m = imageposts_month[j];
			plot_data_ip.push(ip_m.count);
			if (ip_m.count > max_y_post) {
				max_y_post = 4 * Math.ceil(ip_m.count/4);
			} 
		}
		
		// Subscriptions array
		for (var j = 0; j < subscriptions_month.length; j++) {
			subsc_m = subscriptions_month[j];
			plot_data_subsc.push(subsc_m.count);
			if (subsc_m.count > max_y_subsc) {
				max_y_subsc = 4 * Math.ceil(subsc_m.count/4);
			} 
		}
		
		//console.log(labels);
		//console.log(plot_data_bp);
		
		// Post graph
		post_graph_data = {
			labels: labels,
		    datasets: [
		        {
		        	label: "Blog posts",
		            fillColor: "rgba(161,50,183,0.5)",
		            strokeColor: "rgba(161,50,183,0.75)",
		            highlightFill: "rgba(161,50,183,0.75)",
		            highlightStroke: "rgba(161,50,183,1)",
		            data: plot_data_bp
		        }, 
		        {
		        	label: "Image posts",
		            fillColor: "rgba(241,145,179,0.5)",
		            strokeColor: "rgba(241,145,179,0.75)",
		            highlightFill: "rgba(241,145,179,0.75)",
		            highlightStroke: "rgba(241,145,179,1)",
		            data: plot_data_ip
		        }
		    ]
		};
		
		var post_graph_options = {
			scaleGridLineColor : "rgba(0,0,0,.05)",
			scaleOverride: true,
			scaleSteps: 4,
			scaleStepWidth: max_y_post/4,
    		scaleStartValue: 0,
    		tooltipCornerRadius: 0,
    		multiTooltipTemplate: "<%= datasetLabel %> : <%= value %>"
		};
		
		var canvas_ctx = $("#graph-post").get(0).getContext("2d");
		
		var postGraph = new Chart(canvas_ctx).Bar(post_graph_data, post_graph_options);
		
		// Subsciptions graph data
		subsc_graph_data = {
			labels: labels,
			datasets: [
		        {
		        	label: "Blog posts",
		            fillColor: "rgba(220,220,220,0)",
		            strokeColor: primary_color,
		            pointColor: primary_color,
		            pointStrokeColor: primary_color,
		            pointHighlightFill: "#AAA",
		            pointHighlightStroke: "#AAA",
		            data: plot_data_subsc
		        }
	        ]
		};
		
		var subsc_graph_options = {
			scaleGridLineColor : "rgba(0,0,0,.05)",
			scaleOverride: true,
			scaleSteps: 4,
			scaleStepWidth: max_y_subsc/4,
    		scaleStartValue: 0,
    		pointDotRadius: 4,
    		pointDotStrokeWidth: 2,
    		tooltipCornerRadius: 0
		};
		
		var canvas_ctx = $("#graph-subsc").get(0).getContext("2d");
		
		var subscGraph = new Chart(canvas_ctx).Line(subsc_graph_data, subsc_graph_options);
	}
});


//# sourceMappingURL=admin-index.js.map

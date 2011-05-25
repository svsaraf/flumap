<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=false">
</script>
	<link media="screen" rel="stylesheet" href="colorbox.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="jquery.colorbox.js"></script>
	<script>
		$(document).ready(function(){
			$(".example6").colorbox({iframe:true, innerWidth:540, innerHeight:460});
		});
	</script>
<script type="text/javascript">
  /*function initialize() {
    var latlng = new google.maps.LatLng(37.424166, -122.165);
    var myOptions = {
      zoom: 7,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
  }
  */
  var map;
  var chicago = new google.maps.LatLng(37.424166,-122.165);

  
function HomeControl(controlDiv, map) {

  // Set CSS styles for the DIV containing the control
  // Setting padding to 5 px will offset the control
  // from the edge of the map
  controlDiv.style.padding = '5px';

  // Set CSS for the control border
  var controlUI = document.createElement('DIV');
  controlUI.style.backgroundColor = 'white';
  controlUI.style.borderStyle = 'solid';
  controlUI.style.borderWidth = '2px';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to set the map to Home';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior
  var controlText = document.createElement('DIV');
  controlText.style.fontFamily = 'Arial,sans-serif';
  controlText.style.fontSize = '12px';
  controlText.style.paddingLeft = '4px';
  controlText.style.paddingRight = '4px';
  controlText.innerHTML = 'Home';
  controlUI.appendChild(controlText);
  //document.write('<a class='example6' href="http://player.vimeo.com/video/4416281?title=0&amp;byline=0&amp;portrait=0" title="">What is this?</a>');
  // Setup the click event listeners: simply set the map to Chicago
  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.setCenter(chicago)
  });
}
 
 
 
function initialize() {
  var myLatlng = new google.maps.LatLng(37.424166,-122.165);
  var myOptions = {
    zoom: 6,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  var homeControlDiv = document.createElement('DIV');
  var homeControl = new HomeControl(homeControlDiv, map);
	var layer = new google.maps.FusionTablesLayer({
	  query: {
		select: 'Geocodable address',
		from: '877808'
	  },
	});
	layer.setMap(map);
  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
}

// The five markers show a secret message when clicked
// but that message is not within the marker's instance data

//Obsolete code.

function attachSecretMessage(marker, number) {
  var message = ["This","is","the","secret","message"];
  var infowindow = new google.maps.InfoWindow(
      { content: message[number],
        size: new google.maps.Size(50,50)
      });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

// Script taken from Andrew Hedges, http://andrew.hedges.name/resume/
// Learned a lot about javascript.
	compute = function(form) {
		var cost;
		
		// get values
		var first = form['string_a'].value;
		var m = first.length;
		
		var second = form['string_b'].value;
		var n = second.length;
		
		if (m < n) {
			var c=first;first=second;second=c;
			var o=m;m=n;n=o;
		}
		
		var r = new Array();
		r[0] = new Array();
		for (var c = 0; c < n+1; c++) {
			r[0][c] = c;
		}
		
		for (var i = 1; i < m+1; i++) {
			r[i] = new Array();
			r[i][0] = i;
			for (var j = 1; j < n+1; j++) {
				cost = (first.charAt(i-1) == second.charAt(j-1))? 0: 1;
				r[i][j] = calculateMin(r[i-1][j]+1,r[i][j-1]+1,r[i-1][j-1]+cost);
			}
		}
		
		return r;
	}
	

	calculateMin = function(x,y,z) {
		if (x < y && x < z) return x;
		if (y < x && y < z) return y;
		return z;
	}
	
	analyze = function(form) {
		var distArray = compute(form);
		var dist = distArray[distArray.length-1][distArray[distArray.length-1].length-1];

		form['result'].value = dist;

	}

</script>
</head>
<body onload="initialize()">
  <div id="map_canvas" style="width:100%; height:77%"></div>
  
  <form onsubmit="analyze(this);return false;">

&nbsp;&nbsp;&nbsp;
		<input type="text" size="150" maxlength="255" name="string_a" value="" /> Sequence 1<br />
&nbsp;&nbsp;&nbsp;
		<input type="text" size="150" maxlength="255" name="string_b" value="" /> Sequence 2<br />
&nbsp;&nbsp;&nbsp;
		<input type="text" size="10" name="result" value="" disabled="true" /> Distance<br />
	</p>
&nbsp;&nbsp;&nbsp;
		<input type="button" value="Calculate" onclick="analyze(this.form);" />
		<input type="reset" value="Reset"/>
<DIV align="center">
<a class='example6' href="http://player.vimeo.com/video/24193921?title=0&amp;byline=0&amp;portrait=0" title="">What is this?</a>
</DIV>
<DIV align="right">
E25 bonus project by Sanjay Saraf &nbsp; &nbsp;</p>
</DIV>
</form>
</body>
</html>
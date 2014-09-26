<!--this is view-->
<?php
echo $this->Html->css('current_location');
?>
<!-- Geolocation set current location script -->
<?php echo $this->Html->script('CurrentLocation', array('inline' => false)); ?>
<div id="map-canvas"></div>

<div id="current_location_container">
<div id="topic">Save Current location<div id="jp">　現在場</div></div>
    <form method="post" >
     
    <input type="hidden" name="latitude" value="0" />
    <input type="hidden" name="longitude" value="0" />
  	<div>Location Name　<span id="jp">場所名前</span></div>
  	<input type="text" name="location_name" />
  	<div>Memo　<span id="jp">メモ</span></div>
  	<input type="text" name="memo" />
    <br/>	
    <input type="submit" value="Save" />

    </form>

</div>



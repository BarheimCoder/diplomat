<script>
let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(<?php the_field('map_center'); ?>),
    zoom: 16,
  });

  const features = [
  {
    title: "<?php the_sub_field('marker_title') ?>",
    content: "<?php the_sub_field('marker_content') ?>",
    position: new google.maps.LatLng(<?php the_sub_field('marker_latlng') ?>),
    icon: <?php the_sub_field('marker_icon') ?>
  },
  ];

  // Create markers.
  for (let i = 0; i < features.length; i++) {
    const marker = new google.maps.Marker({
      map: map,
      title: features[i].title,
      position: features[i].position,
      icon: features[i].icon,
    });

    let content;

    const infowindow = new google.maps.InfoWindow({
      content: features[i].content,
    });

    marker.addListener("click", () => {
      infowindow.open({
        anchor: marker,
        map,
        shouldFocus: false,
      });
    });
  }
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEVWtUxUzqHvsUY5H9meZsaSyzP2JAiaY&callback=initMap">
</script>
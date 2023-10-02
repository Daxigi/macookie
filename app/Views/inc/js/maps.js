function initMap() {
  const myLatLng = { lat: -27.474096, lng: -58.800537 }; // ubicación del marcador

  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: myLatLng,
  }); // crear el mapa y ubicarlo en la ubicación del marcador

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "macookie!",
  }); // crear el marcador y agregarlo al mapa
}

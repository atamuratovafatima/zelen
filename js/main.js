/*
let coutriesList = document
  .querySelector(".svgWorldMap")
  .getSVGDocument()
  .querySelectorAll("path");
*/
getMapState();

async function getMapState() {
  let response = await fetch("/api/getMapState.php");

  if (response.ok) {
    let json = await response.json();
    localStorage.setItem("mapState", JSON.stringify(json));
  }
}

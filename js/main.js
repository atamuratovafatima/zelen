getMapState()

document
  .querySelectorAll('input[type=radio][name="map"]')
  .forEach((radio) => radio.addEventListener("click", setColorWorldMap))

async function getMapState() {
  let response = await fetch("/api/getMapState.php")

  if (response.ok) {
    let json = await response.json()
    localStorage.mapState = JSON.stringify(json)
  }
}

function setColorWorldMap(event) {
  let countries = JSON.parse(localStorage.mapState)
  let selectedCategory = document.querySelector(
    'input[name="map"]:checked'
  ).value

  let countryOnMap

  countries.forEach(function (c) {
    countryOnMap = document
      .querySelector(".svgWorldMap")
      .getSVGDocument()
      .getElementById(c["Country_code"])

    if (
      c[selectedCategory] == "Closed" ||
      c[selectedCategory] == "Yes" ||
      c[selectedCategory] == "Against RU"
    ) {
      countryOnMap.style.fill = "red"
    } else if (
      c[selectedCategory] == "Open" ||
      c[selectedCategory] == "No" ||
      c[selectedCategory] == "Supports RU"
    ) {
      countryOnMap.style.fill = "green"
    } else {
      countryOnMap.style.fill = "white"
    }
  })
}

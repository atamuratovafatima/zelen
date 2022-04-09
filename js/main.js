let coutriesList = document
  .querySelector(".svgWorldMap")
  .getSVGDocument()
  .querySelectorAll("path");

let c = [];
coutriesList.forEach((e) => {
  c.push([e.getAttribute("id"), e.getAttribute("title")]);
});

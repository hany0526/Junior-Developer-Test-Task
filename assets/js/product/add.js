productTypeChanged();

function productTypeChanged() {
    var productType = document.getElementById("productType");
    console.log(productType.value);

    var DVD = document.getElementById("DVD");
    var Book = document.getElementById("Book");
    var Furniture = document.getElementById("Furniture");

    DVD.style.display = "none";
    Book.style.display = "none";
    Furniture.style.display = "none";

    var size = document.getElementById("size");
    var weight = document.getElementById("weight");

    var height = document.getElementById("height");
    var width = document.getElementById("width");
    var length = document.getElementById("length");

    size.removeAttribute("required")
    weight.removeAttribute("required")

    height.removeAttribute("required")
    width.removeAttribute("required")
    length.removeAttribute("required")

    if (productType.value === "DVD") {
        DVD.style.display = "block";
        size.setAttribute("required", true)
    }

    if (productType.value === "Book") {
        Book.style.display = "block";
        weight.setAttribute("required", true)
    }

    if (productType.value === "Furniture") {
        Furniture.style.display = "block";
        height.setAttribute("required", true)
        width.setAttribute("required", true)
        length.setAttribute("required", true)
    }

}
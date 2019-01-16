<script>
	let cartToCartButton = document.querySelector("#art_to_cart");
	cartToCartButton.addEventListener("click", (e) => {
		e.preventDefault();
		let size = document.querySelector("#size").value;
		let productid = document.querySelector("#productid").value;
		let price = document.querySelector("#price").value;
		let name = document.querySelector("#name").value;
		let quantity = document.querySelector("#quantity").value;
		let qtyValue = document.querySelector("#qty");
		let url = `handlers/cart.php?id=${productid}&name=${name}&price=${price}&quantity=${quantity}&size=${size}`;

		if(size == ""){
			alert("Please Select The Product Size");
			return false;
		}

		if(quantity == ""){
			alert("Please Select The Product Quantity");
			return false;
		}								

		let xhr = new XMLHttpRequest();
		xhr.open("GET", url, true);
		xhr.onload = (e) => {
			if(xhr.status === 200){
				let currentQtyVal = parseInt(qtyValue.textContent);
				qtyValue.textContent = currentQtyVal + parseInt(quantity);
				alert("Product Added to Cart");
			}
		}
		xhr.send();
	});
</script>				
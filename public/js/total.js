//inputs
var inputQuantity = document.getElementsByClassName('quantity');
var inputTotal = document.getElementById('total');
var inputPrice = document.getElementsByClassName('price');

//set total price
var i;

function calculateTotal()
{
	var total = 0;
	document.getElementById("order").style.display = "block";

	//array [prices]
	for (i = 0; i < inputPrice.length; i++)
	{ 
		//array quantity
		for (i = 0; i < inputQuantity.length; i++)
		{ 
	    	total = total + (inputQuantity[i].value * inputPrice[i].value);

		}   
	}

	//set total in input
	inputTotal.value = total;
}
